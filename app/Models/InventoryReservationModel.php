<?php
require_once '../app/Core/Model.php';

class InventoryReservationModel extends Model
{


public function create($data)
{
    $inventory_id = (int)$data['inventory_id'];
    $location_id  = (int)$data['location_id'];
    $quantity     = (float)$data['quantity'];

    if ($quantity <= 0) {
        throw new Exception(
            __('reservation_quantity_must_be_greater_than_zero')
        );
    }

    return $this->db->transaction(function () use (
        $data,
        $inventory_id,
        $location_id,
        $quantity
    ) {

        /*
        |--------------------------------------------------------------------------
        | LOCK WAREHOUSE STOCK
        |--------------------------------------------------------------------------
        */

        // Use the same Database connection as this reservation model.
        $stockModel = new InventoryLocationStockModel($this->db);

        $stock = $stockModel->getStockForUpdate(
            $inventory_id,
            $location_id
        );

        if (!$stock) {
            throw new Exception(
                __('not_enough_stock_in_selected_warehouse')
            );
        }

        /*
        |--------------------------------------------------------------------------
        | CALCULATE AVAILABLE QUANTITY WHILE HOLDING THE LOCK
        |--------------------------------------------------------------------------
        */

        $physicalQty = (float)$stock->quantity;

        $reservedQty = $this->getReservedQuantity(
            $inventory_id,
            $location_id
        );

        $availableQty = $physicalQty - $reservedQty;

        if ($quantity > $availableQty) {
            throw new Exception(
                sprintf(
                    __('insufficient_available_stock'),
                    number_format(max(0, $availableQty), 2)
                )
            );
        }

        /*
        |--------------------------------------------------------------------------
        | CREATE RESERVATION
        |--------------------------------------------------------------------------
        */

        return $this->db->query(
            "
            INSERT INTO inventory_reservations
            (
                inventory_id,
                location_id,
                project_id,
                required_by_date,
                quantity,
                reference,
                notes,
                created_by
            )
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
            ",
            [
                $inventory_id,
                $location_id,
                $data['project_id'],
                $data['required_by_date'],
                $quantity,
                $data['reference'] ?? null,
                $data['notes'] ?? null,
                $_SESSION['user_id'] ?? null
            ]
        );
    });
}

    public function getActiveReservedQty($inventory_id)
    {
        $result = $this->db->query(
            "
            SELECT COALESCE(SUM(quantity),0) AS total

            FROM inventory_reservations

            WHERE inventory_id = ?
            AND status = 'ACTIVE'
            ",
            [$inventory_id]
        )->fetch();

        return (float)$result->total;
    }

    public function getAll()
    {
        return $this->db->query(
            "
           SELECT
    r.*,

    i.name AS item_name,
    
    i.sku,

    p.title AS project_name,

    u.full_name AS created_by_name

FROM inventory_reservations r

LEFT JOIN inventory i
    ON r.inventory_id = i.id

LEFT JOIN projects p
    ON r.project_id = p.id

LEFT JOIN users u
    ON r.created_by = u.id

ORDER BY r.created_at DESC
            "
        )->fetchAll();
    }

    public function fulfill($id)
    {
        // Get reservation
        $reservation = $this->db->query(
    
            "
            SELECT *
            FROM inventory_reservations
            WHERE id = ?
            LIMIT 1
            ",
            [$id]
    
        )->fetch();
    
        if (!$reservation) {
            return false;
        }
    
        // Already processed
        if ($reservation->status !== 'ACTIVE') {
            return false;
        }
    
        // Reduce physical stock
        $updated = $this->db->query(
    
            "
            UPDATE inventory
    
            SET quantity = quantity - ?
    
            WHERE id = ?
            AND quantity >= ?
            ",
            [
                $reservation->quantity,
                $reservation->inventory_id,
                $reservation->quantity
            ]
    
        );
    
        // If stock update failed
        if ($updated->rowCount() <= 0) {
            return false;
        }
    
        // Mark reservation fulfilled
        return $this->db->query(
    
            "
            UPDATE inventory_reservations
    
            SET status = 'FULFILLED'
    
            WHERE id = ?
            ",
            [$id]
    
        );
    }

    public function markFulfilled(int $id): bool
{
    $result = $this->db->query(
        "
        UPDATE inventory_reservations

        SET status = 'FULFILLED'

        WHERE id = ?

        AND status = 'ACTIVE'
        ",
        [$id]
    );

    return $result->rowCount() > 0;
}

    public function cancel($id)
{
    return $this->db->query(
        "
        UPDATE inventory_reservations
        SET status = 'CANCELLED'
        WHERE id = ?
          AND status = 'ACTIVE'
        ",
        [$id]
    );
}

 

public function getById($id)
{
    return $this->db->query(
        "
        SELECT
            ir.*,
            i.name AS inventory_name,
            u.unit_name AS unit_name,
            u.unit_name_a AS unit_name_a,
            i.allow_fraction AS allow_fraction,
            il.code AS location_name,
            p.title AS project_title
        FROM inventory_reservations ir
        LEFT JOIN inventory i
            ON i.id = ir.inventory_id
        LEFT JOIN units u
            ON u.id = i.unit_id
        LEFT JOIN inventory_locations il
            ON il.id = ir.location_id
        LEFT JOIN projects p
            ON p.id = ir.project_id
        WHERE ir.id = ?
        LIMIT 1
        ",
        [(int) $id]
    )->fetch();
}


public function update($id, $data)
{
    return $this->db->transaction(function () use ($id, $data) {

        $id = (int) $id;
        $quantity = $data['quantity'] ?? null;

        // 1. Validate the requested quantity.
        if (!is_numeric($quantity) || (float) $quantity <= 0) {
            throw new RuntimeException(
                'Reservation quantity must be greater than zero.'
            );
        }

        $quantity = (float) $quantity;

        // 2. Lock the reservation and verify its status.
        $reservation = $this->db->query(
            "
            SELECT *
            FROM inventory_reservations
            WHERE id = ?
            LIMIT 1
            FOR UPDATE
            ",
            [$id]
        )->fetch();

        if (!$reservation) {
            throw new RuntimeException(
                __('reservation_not_found')
            );
        }

        if ($reservation->status !== 'ACTIVE') {
            throw new RuntimeException(
                __('only_active_reservations_can_be_edited')
            );
        }

        $inventoryId = (int) $reservation->inventory_id;
        $locationId  = (int) $reservation->location_id;

        // 3. Check the inventory item's quantity rules.
        $item = $this->db->query(
            "
            SELECT id, allow_fraction
            FROM inventory
            WHERE id = ?
            LIMIT 1
            ",
            [$inventoryId]
        )->fetch();

        if (!$item) {
            throw new RuntimeException(
                __('inventory_item_not_found')
            );
        }

        if (
            (int) $item->allow_fraction !== 1
            && floor($quantity) != $quantity
        ) {
            throw new RuntimeException(
                'This inventory item does not allow fractional quantities.'
            );
        }

        // 4. Lock the stock row before checking availability.
        $stockModel = new InventoryLocationStockModel($this->db);

        $stock = $stockModel->getStockForUpdate(
            $inventoryId,
            $locationId
        );

        if (!$stock) {
            throw new RuntimeException(
                'No stock record exists for this item and warehouse.'
            );
        }

        // 5. Calculate availability excluding this reservation.
        $reservedByOthers = $this->getReservedQuantityExcluding(
            $inventoryId,
            $locationId,
            $id
        );

        $availableQuantity =
            (float) $stock->quantity - $reservedByOthers;

        if ($quantity > $availableQuantity) {
            throw new RuntimeException(
                'The requested quantity exceeds the available stock.'
            );
        }

        // 6. Update permitted fields only.
        return $this->db->query(
            "
            UPDATE inventory_reservations
            SET
                quantity = ?,
                required_by_date = ?,
                reference = ?,
                notes = ?
            WHERE id = ?
              AND status = 'ACTIVE'
            ",
            [
                $quantity,
                !empty($data['required_by_date'])
                    ? $data['required_by_date']
                    : null,
                $data['reference'] ?? null,
                $data['notes'] ?? null,
                $id
            ]
        );
    });
}


public function delete($id)
{
    return $this->db->query(

        "
        DELETE FROM inventory_reservations
        WHERE id = ?
        ",
        [$id]

    );
}

public function getReservedQuantity(
    int $inventory_id,
    int $location_id
): float {

    $result = $this->db->query(
        "
        SELECT
            COALESCE(SUM(quantity), 0) AS reserved_qty

        FROM inventory_reservations

        WHERE inventory_id = ?

        AND location_id = ?

        AND status = 'ACTIVE'
        ",
        [
            $inventory_id,
            $location_id
        ]
    )->fetch();

    return (float)(
        $result->reserved_qty ?? 0
    );
}

// displaying the stock information read-only
public function getEditStockSummary(int $reservationId)
{
    return $this->db->query(    
        "
        SELECT
            ir.id AS reservation_id,
            ir.inventory_id,
            ir.location_id,
            ir.quantity AS current_quantity,
            ir.status,
            i.allow_fraction,
            COALESCE(ils.quantity, 0) AS physical_quantity,
            COALESCE(r.reserved_by_others, 0) AS reserved_by_others,
            (
                COALESCE(ils.quantity, 0)
                - COALESCE(r.reserved_by_others, 0)
            ) AS max_editable_quantity
        FROM inventory_reservations ir
        JOIN inventory i
            ON i.id = ir.inventory_id
        LEFT JOIN inventory_location_stock ils
            ON ils.inventory_id = ir.inventory_id
           AND ils.location_id = ir.location_id
        LEFT JOIN (
            SELECT
                inventory_id,
                location_id,
                SUM(quantity) AS reserved_by_others
            FROM inventory_reservations
            WHERE status = 'ACTIVE'
              AND id <> ?
            GROUP BY inventory_id, location_id
        ) r
            ON r.inventory_id = ir.inventory_id
           AND r.location_id = ir.location_id
        WHERE ir.id = ?
        LIMIT 1
        ",
        [$reservationId, $reservationId]
    )->fetch();
}


public function getReservedQuantityExcluding(
    int $inventory_id,
    int $location_id,
    int $exclude_reservation_id
): float {
    $result = $this->db->query(
        "
        SELECT COALESCE(SUM(quantity), 0) AS reserved_qty
        FROM inventory_reservations
        WHERE inventory_id = ?
          AND location_id = ?
          AND status = 'ACTIVE'
          AND id <> ?
        ",
        [
            $inventory_id,
            $location_id,
            $exclude_reservation_id
        ]
    )->fetch();

    return (float) ($result->reserved_qty ?? 0);
}


}
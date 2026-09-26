<?php
require_once '../app/Services/BaseService.php';

class InventoryService extends BaseService
{
    private InventoryLocationStockModel $stockModel;
    private InventoryMovementModel $movementModel;
    private InventoryTransferModel $transferModel;

    public function __construct(
        InventoryLocationStockModel $stockModel,
        InventoryMovementModel $movementModel,
        InventoryTransferModel $transferModel
    ) {
        parent::__construct();

        $this->stockModel = $stockModel;
        $this->movementModel = $movementModel;
        $this->transferModel = $transferModel;
    }

    /**
     * Receive stock into a warehouse.
     */

    public function receive(array $data): bool
    {
        $inventoryId = (int)($data['inventory_id'] ?? 0);
        $locationId  = (int)($data['location_id'] ?? 0);
        $quantity    = (float)($data['quantity'] ?? 0);
        $unitCost    = (float)($data['unit_cost'] ?? 0);

        if ($inventoryId <= 0) {
            throw new Exception(__('invalid_inventory_item'));
        }

        if ($locationId <= 0) {
            throw new Exception(__('invalid_warehouse_location'));
        }

        if ($quantity <= 0) {
            throw new Exception(__('invalid_quantity'));
        }

        if ($unitCost < 0) {
            throw new Exception(__('unit_cost_cannot_be_negative'));
        }

        /*
    |--------------------------------------------------------------------------
    | RECEIVE PHYSICAL STOCK
    |--------------------------------------------------------------------------
    */

        $success = $this->stockModel->adjustStock(
            $inventoryId,
            $locationId,
            $quantity
        );

        if (!$success) {
            throw new Exception(__('unable_to_add_stock'));
        }

        /*
    |--------------------------------------------------------------------------
    | UPDATE CURRENT INVENTORY COST
    |--------------------------------------------------------------------------
    |
    | The latest actual received purchase cost becomes the
    | current cost_price for future inventory usage.
    |
    */

        $this->db->query(
            "UPDATE inventory
         SET cost_price = ?
         WHERE id = ?",
            [
                $unitCost,
                $inventoryId
            ]
        );

        /*
    |--------------------------------------------------------------------------
    | RECORD INVENTORY MOVEMENT
    |--------------------------------------------------------------------------
    */

        $this->movementModel->addMovement([
            'inventory_id' => $inventoryId,
            'location_id'  => $locationId,
            'type'         => 'IN',
            'quantity'     => $quantity,
            'unit_cost'    => $unitCost,
            'supplier_id'  => $data['supplier_id'] ?? null,
            'reference'    => $data['reference'] ?? null,
            'notes'        => $data['notes'] ?? '',
            'created_by'   => $data['created_by']
                ?? $_SESSION['user_id']
                ?? null
        ]);

        return true;
    }

    /**
     * Issue stock from a warehouse.
     */
    public function issue(array $data): bool
    {
        return $this->transaction(function () use ($data) {

            $inventoryId = (int)($data['inventory_id'] ?? 0);
            $locationId  = (int)($data['location_id'] ?? 0);
            $quantity    = (float)($data['quantity'] ?? 0);

            if ($inventoryId <= 0) {
                throw new Exception(__('invalid_inventory_item'));
            }

            if ($locationId <= 0) {
                throw new Exception(__('invalid_warehouse_location'));
            }

            if ($quantity <= 0) {
                throw new Exception(__('invalid_quantity'));
            }

            /*
        |--------------------------------------------------------------------------
        | REMOVE PHYSICAL STOCK
        |--------------------------------------------------------------------------
        */

            $success = $this->stockModel->adjustStock(
                $inventoryId,
                $locationId,
                -$quantity
            );

            if (!$success) {
                throw new Exception(__('not_enough_stock_selected_warehouse'));
            }

            /*
        |--------------------------------------------------------------------------
        | RECORD MOVEMENT
        |--------------------------------------------------------------------------
        */

            $this->movementModel->addMovement([

                'inventory_id' => $inventoryId,

                'location_id' => $locationId,

                'type' => 'OUT',

                'quantity' => $quantity,

                'unit_cost' => (float)($data['unit_cost'] ?? 0),

                'supplier_id' => $data['supplier_id'] ?? null,

                'reference' => $data['reference'] ?? null,

                'notes' => $data['notes'] ?? '',

                'created_by' =>
                $data['created_by']
                    ?? $this->currentUserId()

            ]);

            return true;
        });
    }
    /**
     * Transfer stock between warehouses.
     */
    public function transfer(array $data): int
    {
        $this->db->beginTransaction();

        try {

            /*
        |--------------------------------------------------------------------------
        | 1. Validation
        |--------------------------------------------------------------------------
        */

            if ($data['quantity'] <= 0) {
                throw new Exception(__('invalid_quantity'));
            }

            if ($data['from_location_id'] == $data['to_location_id']) {
                throw new Exception(__('source_destination_warehouses_same'));
            }

            /*
        |--------------------------------------------------------------------------
        | 2. Move Stock
        |--------------------------------------------------------------------------
        */

            $ok = $this->stockModel->transferStock(
                $data['inventory_id'],
                $data['from_location_id'],
                $data['to_location_id'],
                $data['quantity']
            );

            if (!$ok) {
                throw new Exception(__('not_enough_stock_source_warehouse'));
            }

            /*
        |--------------------------------------------------------------------------
        | 3. Save Transfer
        |--------------------------------------------------------------------------
        */

            $transferId = $this->transferModel->create($data);

            /*
        |--------------------------------------------------------------------------
        | 4. OUT Movement
        |--------------------------------------------------------------------------
        */

            $this->movementModel->addMovement([
                'inventory_id' => $data['inventory_id'],
                'location_id'  => $data['from_location_id'],
                'type'         => 'OUT',
                'quantity'     => $data['quantity'],
                'reference'    => $data['reference'],
                'notes'        => 'Warehouse Transfer #' . $transferId,
                'created_by'   => $data['created_by']
            ]);

            /*
        |--------------------------------------------------------------------------
        | 5. IN Movement
        |--------------------------------------------------------------------------
        */

            $this->movementModel->addMovement([
                'inventory_id' => $data['inventory_id'],
                'location_id'  => $data['to_location_id'],
                'type'         => 'IN',
                'quantity'     => $data['quantity'],
                'reference'    => $data['reference'],
                'notes'        => 'Warehouse Transfer #' . $transferId,
                'created_by'   => $data['created_by']
            ]);

            $this->db->commit();

            return $transferId;
        } catch (Throwable $e) {

            $this->db->rollBack();

            throw $e;
        }
    }

    /**
     * Inventory adjustment.
     *
     * Positive quantity = increase stock
     * Negative quantity = decrease stock
     */
    public function adjust(array $data): bool
    {
        return $this->transaction(function () use ($data) {

            $inventoryId = (int)($data['inventory_id'] ?? 0);
            $locationId  = (int)($data['location_id'] ?? 0);
            $delta       = (float)($data['delta'] ?? 0);

            if ($inventoryId <= 0) {
                throw new Exception(__('invalid_inventory_item'));
            }

            if ($locationId <= 0) {
                throw new Exception(__('invalid_warehouse_location'));
            }

            if ($delta == 0) {
                throw new Exception(__('adjustment_quantity_cannot_be_zero'));
            }

            /*
|--------------------------------------------------------------------------
| CHECK ACTIVE RESERVATION
|--------------------------------------------------------------------------
| A stock decrease can Not consume quantities already reserved
| for active reservations at this location.
|--------------------------------------------------------------------------
*/

            if ($delta < 0) {

                $reservationModel =
                    new InventoryReservationModel();

                $reservedQty =
                    $reservationModel->getReservedQuantity(
                        $inventoryId,
                        $locationId
                    );

                $stock =
                    $this->stockModel->getStock(
                        $inventoryId,
                        $locationId
                    );

                $physicalQty =
                    (float)($stock->quantity ?? 0);

                $availableQty =
                    $physicalQty - $reservedQty;

                if (abs($delta) > $availableQty) {

                    throw new Exception(
                        sprintf(
                            __('adjustment_exceeds_available_stock'),
                            number_format(max(0, $availableQty), 2)
                        )
                    );
                }
            }
            /*
        |--------------------------------------------------------------------------
        | ADJUST PHYSICAL STOCK
        |--------------------------------------------------------------------------
        */

            $success = $this->stockModel->adjustStock(
                $inventoryId,
                $locationId,
                $delta
            );

            if (!$success) {

                if ($delta < 0) {
                    throw new Exception(__('adjustment_insufficient_stock'));
                }

                throw new Exception(__('unable_to_adjust_inventory_stock'));
            }


            /*
|--------------------------------------------------------------------------
| RECORD MOVEMENT
|--------------------------------------------------------------------------
*/

            $this->movementModel->addMovement([

                'inventory_id' => $inventoryId,

                'location_id' => $locationId,

                'type' => 'ADJUSTMENT',

                'quantity' => $delta,

                'unit_cost' => (float)($data['unit_cost'] ?? 0),

                'supplier_id' => $data['supplier_id'] ?? null,

                'reference' => $data['reference'] ?? null,

                'notes' => $data['notes'] ?? 'Inventory adjustment',

                'created_by' =>
                $data['created_by']
                    ?? $this->currentUserId()

            ]);

            return true;
        });
    }

    /**
     * Current available quantity.
     */
    public function available(
        int $inventory_id,
        int $location_id
    ): float {
        $stock = $this->stockModel->getStock(
            $inventory_id,
            $location_id
        );

        return (float)($stock->quantity ?? 0);
    }
}

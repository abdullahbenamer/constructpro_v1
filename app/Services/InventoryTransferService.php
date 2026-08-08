<?php
 require_once '../app/Core/Model.php';
class InventoryTransferService extends Model
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
        throw new Exception('Not implemented');
    }

    /**
     * Issue stock from a warehouse.
     */
    public function issue(array $data): bool
    {
        throw new Exception('Not implemented');
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
            throw new Exception('Invalid quantity.');
        }

        if ($data['from_location_id'] == $data['to_location_id']) {
            throw new Exception(
                'Source and destination warehouses cannot be the same.'
            );
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
            throw new Exception(
                'Not enough stock in source warehouse.'
            );
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
     */
    public function adjust(array $data): bool
    {
        throw new Exception('Not implemented');
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

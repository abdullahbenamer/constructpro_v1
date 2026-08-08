<?php

class ProjectCostService extends Model
{
    private ProjectCostModel $costModel;
    private InventoryLocationStockModel $stockModel;
    private InventoryMovementModel $movementModel;
    private ProjectLedgerServiceModel $ledgerService;
    private InventoryModel $inventoryModel;

    public function __construct(
        ProjectCostModel $costModel,
        InventoryLocationStockModel $stockModel,
        InventoryMovementModel $movementModel,
        ProjectLedgerServiceModel $ledgerService,
        InventoryModel $inventoryModel
    ) {
        parent::__construct();

        $this->costModel      = $costModel;
        $this->stockModel     = $stockModel;
        $this->movementModel  = $movementModel;
        $this->ledgerService  = $ledgerService;
        $this->inventoryModel = $inventoryModel;
    }

public function create(array $data): int
{
    $data = $this->validate($data);

    $this->db->beginTransaction();

    try {

        /*
        |--------------------------------------------------------------------------
        | Inventory
        |--------------------------------------------------------------------------
        */

        $this->deductInventory($data);

        /*
        |--------------------------------------------------------------------------
        | Project Cost
        |--------------------------------------------------------------------------
        */

        $costId = $this->costModel->create($data);

        /*
        |--------------------------------------------------------------------------
        | Inventory History
        |--------------------------------------------------------------------------
        */

        $this->recordInventoryMovement(

            $costId,

            $data,

            'OUT'

        );

        /*
        |--------------------------------------------------------------------------
        | Ledger
        |--------------------------------------------------------------------------
        */

        $this->recordLedger(

            $costId,

            $data

        );

        $this->db->commit();

        return $costId;

    } catch (Throwable $e) {

        $this->db->rollBack();

        throw $e;
    }
}

    public function update(int $id, array $data): bool
    {
    }

    public function delete(int $id): bool
    {
    }
private function validate(array $data): array
{
    if (empty($data['cost_type'])) {
        throw new Exception('Cost type is required.');
    }

    if ($data['quantity'] <= 0) {
        throw new Exception('Quantity must be greater than zero.');
    }

    if (
        $data['cost_type'] !== 'materials'
        && $data['unit_price'] <= 0
    ) {
        throw new Exception(
            'Unit price must be greater than zero.'
        );
    }

    if ($data['cost_type'] !== 'materials') {
        return $data;
    }

    if (empty($data['inventory_id'])) {
        throw new Exception(
            'Please select a material.'
        );
    }

    if (empty($data['location_id'])) {
        throw new Exception(
            'Please select a warehouse.'
        );
    }

    $item = $this->inventoryModel->getById(
        $data['inventory_id']
    );

    if (!$item) {
        throw new Exception(
            'Inventory item not found.'
        );
    }

    $stock = $this->stockModel->getStock(
        $data['inventory_id'],
        $data['location_id']
    );

    $available = $stock->quantity ?? 0;

    if ($available < $data['quantity']) {
        throw new Exception(
            'Not enough stock in selected warehouse.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Always use inventory cost price
    |--------------------------------------------------------------------------
    */

    $data['unit_price'] = (float)$item->cost_price;

    return $data;
}

   private function isMaterial(array $data): bool
{
    return $data['cost_type'] === 'materials';
}

    
private function deductInventory(array $data): void
{
    if (!$this->isMaterial($data)) {
        return;
    }

    $success = $this->stockModel->adjustStock(

        $data['inventory_id'],

        $data['location_id'],

        -$data['quantity']

    );

    if (!$success) {

        throw new Exception(
            'Unable to deduct inventory.'
        );

    }
}

private function restoreInventory(array $data): void
{
    if (!$this->isMaterial($data)) {
        return;
    }

    $this->stockModel->adjustStock(

        $data['inventory_id'],

        $data['location_id'],

        $data['quantity']

    );
}

private function recordInventoryMovement(
    int $costId,
    array $data,
    string $type
): void
{
    if (!$this->isMaterial($data)) {
        return;
    }

    $this->movementModel->addMovement([

        'inventory_id' => $data['inventory_id'],

        'location_id'  => $data['location_id'],

        'type'         => strtoupper($type),

        'quantity'     => $data['quantity'],

        'reference'    => 'PROJECT #' . $data['project_id'],

        'notes'        => $data['description'],

        'created_by'   => $_SESSION['user_id']

    ]);
}

private function recordLedger(
    int $costId,
    array $data
): void
{
    $total = $data['quantity'] * $data['unit_price'];

    $this->ledgerService->addEntry([

        'project_id'   => $data['project_id'],

        'entry_type'   => 'cost',

        'ref_table'    => 'project_costs',

        'ref_id'       => $costId,

        'description'  => $data['description'],

        'debit'        => $total,

        'credit'       => 0,

        /*
         * Your current model expects this.
         * We'll improve ledger balances later.
         */
        'balance_after' => 0

    ]);
}

}
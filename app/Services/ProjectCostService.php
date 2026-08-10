<?php

// require_once '../app/Services/BaseService.php';
require_once __DIR__ . '/BaseService.php';

class ProjectCostService extends BaseService
{
    private ProjectCostModel $costModel;
    private InventoryLocationStockModel $stockModel;
    private InventoryMovementModel $movementModel;
    private ProjectLedgerModel $ledgerService;
    private InventoryModel $inventoryModel;

    public function __construct(
        ProjectCostModel $costModel,
        InventoryLocationStockModel $stockModel,
        InventoryMovementModel $movementModel,
        ProjectLedgerModel $ledgerService,
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

    return $this->transaction(function () use ($data) {

        $this->deductInventory($data);

        $costId = $this->costModel->create($data);

        $this->recordInventoryMovement(
            $data,
            'OUT'
        );

        $this->recordLedger(
            $costId,
            $data
        );

        return $costId;
    });
}
    public function update(int $id, array $data): bool
    {
    }

public function delete(int $id): void
{
    $this->transaction(function () use ($id) {

        /*
        |--------------------------------------------------------------------------
        | Load Cost
        |--------------------------------------------------------------------------
        */

        $data = $this->normalize(
            $this->loadCost($id)
        );

        /*
        |--------------------------------------------------------------------------
        | Restore Inventory
        |--------------------------------------------------------------------------
        */

        if ($this->isMaterial($data)) {

            $this->restoreInventory($data);

            $this->recordInventoryMovement(
                $data,
                'IN'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Reverse Project Ledger
        |--------------------------------------------------------------------------
        */

        $this->ledgerService->reverseCost($id);

        /*
        |--------------------------------------------------------------------------
        | Delete Operational Cost
        |--------------------------------------------------------------------------

        */

        $this->costModel->delete($id);
    });
}

private function normalize(object $cost): array
{
    return [

        'project_id'   => $cost->project_id,
        'cost_type'    => $cost->cost_type,
        'description'  => $cost->description,
        'quantity'     => $cost->quantity,
        'unit_price'   => $cost->unit_price,
        'inventory_id' => $cost->inventory_id,
        'location_id'  => $cost->location_id

    ];
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
    return strtolower($data['cost_type']) === 'materials';
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
    $total = $this->total($data);

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

private function loadCost(int $id)
{
    $cost = $this->costModel->getById($id);

    if (!$cost) {
        throw new Exception(
            'Project cost not found.'
        );
    }

    return $cost;
}


private function total(array $data): float
{
    return
        $data['quantity']
        * $data['unit_price'];
}

}
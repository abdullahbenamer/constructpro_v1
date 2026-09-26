<?php

require_once '../app/Services/BaseService.php';

class ReservationFulfillmentService extends BaseService
{
    private $reservationModel;
    private $inventoryModel;
    private $projectCostService;


    public function __construct(
    Database $db,
    InventoryReservationModel $reservationModel,
    InventoryModel $inventoryModel,
    InventoryLocationStockModel $locationStockModel,
    InventoryMovementModel $movementModel,
    ProjectCostService $projectCostService
) {
    parent::__construct($db);

    $this->reservationModel = $reservationModel;

    $this->inventoryModel = $inventoryModel;

    $this->locationStockModel = $locationStockModel;

    $this->movementModel = $movementModel;

    $this->projectCostService = $projectCostService;
}

   public function fulfill(int $reservationId): void
{
    $this->transaction(function () use ($reservationId) {

        /*
        |--------------------------------------------------------------------------
        | 1. GET RESERVATION
        |--------------------------------------------------------------------------
        */

        $reservation =
            $this->reservationModel->getById(
                $reservationId
            );

        if (!$reservation) {
            throw new Exception(
                __('reservation_not_found')
            );
        }

        /*
        |--------------------------------------------------------------------------
        | 2. VALIDATE STATUS
        |--------------------------------------------------------------------------
        */

        if ($reservation->status !== 'ACTIVE') {
            throw new Exception(
                __('only_active_reservations_can_be_fulfilled')
            );
        }

        /*
        |--------------------------------------------------------------------------
        | 3. GET INVENTORY ITEM
        |--------------------------------------------------------------------------
        */

        $item =
            $this->inventoryModel->getById(
                $reservation->inventory_id
            );

        if (!$item) {
            throw new Exception(
                __('inventory_item_not_found')
            );
        }

        /*
        |--------------------------------------------------------------------------
        | 4. CREATE PROJECT COST
        |--------------------------------------------------------------------------
        */

        $this->projectCostService->create([

            'project_id' =>
                (int)$reservation->project_id,

            'cost_type' =>
                'materials',

            'description' =>
                'Reservation Fulfillment: '
                . $item->name,

            'quantity' =>
                (float)$reservation->quantity,

            'unit_price' =>
                (float)$item->cost_price,

            'inventory_id' =>
                (int)$reservation->inventory_id,

            'location_id' =>
                (int)$reservation->location_id
        ]);

        /*
        |--------------------------------------------------------------------------
        | 5. MARK RESERVATION FULFILLED
        |--------------------------------------------------------------------------
        */

        $this->reservationModel->markFulfilled(
            $reservationId
        );
    });
}

}

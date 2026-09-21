<?php

class InventoryReservations extends Controller
{
    public function index()
    {
        $model = $this->model(
            'InventoryReservation'
        );

        $data['reservations'] =
            $model->getAll();

        $this->view(
            'inventory-reservations/index',
            $data
        );
    }

  public function create()
{
    $inventoryModel =
        $this->model('Inventory');

    $locationModel =
        $this->model('InventoryLocation');

    $projectModel =
        $this->model('Project');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        /*
        |--------------------------------------------------------------------------
        | SERVER-SIDE VALIDATION
        |--------------------------------------------------------------------------
        */

        if (empty($_POST['inventory_id'])) {

        FlashHelper::error(
    __('please_select_inventory_item')
);

            header(
                'Location: ' .
                URLROOT .
                '/inventoryreservations/create'
            );

            exit;
        }

        if (empty($_POST['location_id'])) {

            FlashHelper::error(
                __('please_select_location')
            );

            header(
                'Location: ' .
                URLROOT .
                '/inventoryreservations/create'
            );

            exit;
        }

        if (empty($_POST['project_id'])) {

       FlashHelper::error(
    __('please_select_project')
);

            header(
                'Location: ' .
                URLROOT .
                '/inventoryreservations/create'
            );

            exit;
        }

        if (empty($_POST['required_by_date'])) {

         FlashHelper::error(
    __('please_select_required_by_date')
);

            header(
                'Location: ' .
                URLROOT .
                '/inventoryreservations/create'
            );

            exit;
        }

        if (
            !isset($_POST['quantity']) ||
            (float) $_POST['quantity'] <= 0
        ) {

      FlashHelper::error(
    __('reservation_quantity_must_be_greater_than_zero')
);

            header(
                'Location: ' .
                URLROOT .
                '/inventoryreservations/create'
            );

            exit;
        }


        /*
        |--------------------------------------------------------------------------
        | CREATE RESERVATION
        |--------------------------------------------------------------------------
        */

        $reservationModel =
            $this->model('InventoryReservation');

        $reservationModel->create([

            'inventory_id' =>
                (int) $_POST['inventory_id'],

            'location_id' =>
                (int) $_POST['location_id'],

            'project_id' =>
                (int) $_POST['project_id'],

            'required_by_date' =>
                $_POST['required_by_date'],

            'quantity' =>
                (float) $_POST['quantity'],

            'reference' =>
                trim($_POST['reference'] ?? ''),

            'notes' =>
                trim($_POST['notes'] ?? '')

        ]);


    FlashHelper::success(
    __('reservation_created_successfully')
);


        header(
            'Location: ' .
            URLROOT .
            '/inventoryreservations'
        );

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | LOAD FORM DATA
    |--------------------------------------------------------------------------
    */

    $data['inventory'] =
        $inventoryModel->getAll();

    $data['locations'] =
        $locationModel->getAll();

    $data['projects'] =
        $projectModel->getAll();


    $this->view(
        'inventory-reservations/create',
        $data
    );
}

 public function fulfill($id)
{
    try {

        $service = new ReservationFulfillmentService(

            $this->model('InventoryReservation'),

            $this->model('Inventory'),

            $this->model('InventoryLocationStock'),

            $this->model('InventoryMovement'),

            $this->service('ProjectCost')
        );

        $service->fulfill(
            (int)$id
        );

        FlashHelper::success(
    __('reservation_fulfilled_successfully')
);

    } catch (Throwable $e) {

        FlashHelper::error(
            $e->getMessage()
        );
    }

    header(
        'Location: ' .
        URLROOT .
        '/inventoryreservations'
    );

    exit;
}

    public function cancel($id)
    {
        $model = $this->model(
            'InventoryReservation'
        );

        $model->cancel($id);

        header(
            'Location: ' .
                URLROOT .
                '/inventoryreservations'
        );
    }

    public function edit($id)
    {
        $model = $this->model(
            'InventoryReservation'
        );

        $inventoryModel =
            $this->model('Inventory');

        $locationModel =
            $this->model('InventoryLocation');

        $projectModel =
            $this->model('Project');

        $reservation =
            $model->getById($id);

        if (!$reservation) {
            header(
                'Location: ' .
                    URLROOT .
                    '/inventoryreservations'
            );
            exit;
        }

        // Only ACTIVE editable
        if ($reservation->status !== 'ACTIVE') {

    FlashHelper::error(
    __('active_reservations_only_editable')
);

            header(
                'Location: ' .
                    URLROOT .
                    '/inventoryreservations'
            );

            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $model->update($id, [

                'inventory_id' =>
                $_POST['inventory_id'],

                'location_id' =>
                $_POST['location_id'] ?: null,

                'project_id' =>
                $_POST['project_id'] ?: null,

                'quantity' =>
                $_POST['quantity'],

                'reference' =>
                $_POST['reference'],

                'notes' =>
                $_POST['notes']
            ]);

            header(
                'Location: ' .
                    URLROOT .
                    '/inventoryreservations'
            );

            exit;
        }

        $data['reservation'] = $reservation;

        $data['inventory'] =
            $inventoryModel->getAll();

        $data['locations'] =
            $locationModel->getAll();

        $data['projects'] =
            $projectModel->getAll();

        $this->view(
            'inventory-reservations/edit',
            $data
        );
    }

    public function delete($id)
    {
        $model = $this->model(
            'InventoryReservation'
        );

        $reservation =
            $model->getById($id);

        if (!$reservation) {

            header(
                'Location: ' .
                    URLROOT .
                    '/inventoryreservations'
            );

            exit;
        }

        // Only ACTIVE deletable
        if ($reservation->status !== 'ACTIVE') {

           FlashHelper::error(
    __('active_reservations_only_deletable')
);
            header(
                'Location: ' .
                    URLROOT .
                    '/inventoryreservations'
            );

            exit;
        }

        $model->delete($id);

        header(
            'Location: ' .
                URLROOT .
                '/inventoryreservations'
        );
    }

public function getItemLocations()
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        exit;
    }

    header('Content-Type: application/json');

    $inventory_id = (int)($_POST['inventory_id'] ?? 0);

    $stockModel =
        $this->model('InventoryLocationStock');

    $locations =
        $stockModel->getAvailableItemLocations(
            $inventory_id
        );

    echo json_encode($locations ?: []);
}


public function getLocationStock()
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        exit;
    }

    header('Content-Type: application/json');

    $inventory_id = (int)(
        $_POST['inventory_id'] ?? 0
    );

    $location_id = (int)(
        $_POST['location_id'] ?? 0
    );


    // PHYSICAL STOCK

    $stockModel =
        $this->model('InventoryLocationStock');

    $stock = $stockModel->getStock(
        $inventory_id,
        $location_id
    );

    $physicalQty =
        (float)($stock->quantity ?? 0);


    // ACTIVE RESERVED QUANTITY

    $reservationModel =
        $this->model('InventoryReservation');

    $reservedQty =
        $reservationModel->getReservedQuantity(
            $inventory_id,
            $location_id
        );


    // ACTUAL AVAILABLE QUANTITY

    $availableQty =
        $physicalQty - $reservedQty;


    echo json_encode([

        'physical_qty' =>
            $physicalQty,

        'reserved_qty' =>
            $reservedQty,

        'available_qty' =>
            max(0, $availableQty)

    ]);
}
    }

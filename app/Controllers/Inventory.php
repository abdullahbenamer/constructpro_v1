<?php
require_once '../app/Core/CrudController.php';

class Inventory extends Controller
{

    public function index()
    {
        AuthHelper::can('inventory.view');

        $inventoryModel = $this->model('Inventory');

        $data['inventoryValue'] = $inventoryModel->getInventoryValue();
        $data['low_stock'] = $inventoryModel->getLowStockAlerts();
        $data['stock'] = $inventoryModel->getStock();
        $data['title'] = 'Inventory';

        $this->view('inventory/index', $data);
    }

    public function create()
    {
        AuthHelper::can('inventory.create');

        $inventoryModel = $this->model('Inventory');
        $brandModel = $this->model('Brand');
        $countryModel = $this->model('Country');
        $unitModel = $this->model('Unit');

        $viewData = [
            'brands' => $brandModel->getAll(),
            'countries' => $countryModel->getAll(),
            'units' => $unitModel->getActive()
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $input = [
                'name' => trim($_POST['name'] ?? ''),
                'sku' => trim($_POST['sku'] ?? ''),
                'category' => $_POST['category'] ?? null,

                'brand_id' => !empty($_POST['brand_id'])
                    ? (int)$_POST['brand_id']
                    : null,

                'country_id' => !empty($_POST['country_id'])
                    ? (int)$_POST['country_id']
                    : null,

                'unit_id' => !empty($_POST['unit_id'])
                    ? (int)$_POST['unit_id']
                    : null,

                'min_stock' => (int)($_POST['min_stock'] ?? 10),

                'allow_fraction' =>
                !empty($_POST['allow_fraction']) ? 1 : 0
            ];

            if ($input['name'] === '' || $input['sku'] === '') {

                FlashHelper::error(__('inventory_name_sku_required'));

                $_SESSION['old'] = $_POST;

                header(
                    'Location: ' .
                        URLROOT .
                        '/inventory/create'
                );

                exit;
            }

            $inventoryId = $inventoryModel->create($input);

            if ($inventoryId) {

                header(
                    'Location: ' .
                        URLROOT .
                        '/inventory'
                );

                exit;
            }

            FlashHelper::error(__('inventory_insert_failed'));

            $_SESSION['old'] = $_POST;

            header(
                'Location: ' .
                    URLROOT .
                    '/inventory/create'
            );

            exit;
        }

        $this->view(
            'inventory/create',
            $viewData
        );
    }

    public function edit($id)
    {
        AuthHelper::can('inventory.edit');

        $inventoryModel = $this->model('Inventory');
        $brandModel     = $this->model('Brand');
        $countryModel   = $this->model('Country');
        $unitModel = $this->model('Unit');

        $inventory = $inventoryModel->getById($id);

        if (!$inventory) {

            header('Location: ' . URLROOT . '/inventory');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $input = [

                'name' => trim($_POST['name'] ?? ''),

                'sku' => trim($_POST['sku'] ?? ''),

                'category' => $_POST['category'] ?? null,

                'brand_id' => !empty($_POST['brand_id'])
                    ? (int)$_POST['brand_id']
                    : null,

                'country_id' => !empty($_POST['country_id'])
                    ? (int)$_POST['country_id']
                    : null,

                'unit_id' => !empty($_POST['unit_id'])
                    ? (int)$_POST['unit_id']
                    : null,

                'min_stock' => (int)($_POST['min_stock'] ?? 10),

                'allow_fraction' =>
                !empty($_POST['allow_fraction']) ? 1 : 0
            ];


            if ($input['name'] === '' || $input['sku'] === '') {

                FlashHelper::error(__('inventory_name_sku_required'));

                $_SESSION['old'] = $_POST;

                header(
                    'Location: ' .
                        URLROOT .
                        '/inventory/edit/' .
                        (int)$id
                );

                exit;
            }


            $inventoryModel->update($id, $input);

            header(
                'Location: ' .
                    URLROOT .
                    '/inventory'
            );

            exit;
        }


        $data['inventory'] = $inventory;

        $data['brands'] = $brandModel->getAll();

        $data['countries'] = $countryModel->getAll();

        $data['units'] = $unitModel->getActive();


        $this->view(
            'inventory/edit',
            $data
        );
    }

    public function delete($id)
    {
        AuthHelper::can('inventory.delete'); // ✅ ADD THIS

        $inventoryModel = $this->model('Inventory');

        $inventoryModel->delete($id);

        header('Location: ' . URLROOT . '/inventory');
        exit;
    }

    public function details($id)
    {
        AuthHelper::can('inventory.view');

        $inventoryModel = $this->model('Inventory');
        $movementModel = $this->model('InventoryMovement');
        $costModel = $this->model('ProjectCost');

        // inventory item
        $item = $inventoryModel->getById($id);

        if (!$item) {
            header('Location: ' . URLROOT . '/inventory');
            exit;
        }

        // movements
        $movements = $movementModel->getMovementsDetailed($id);

        // project usage
        $projectUsage = $costModel->getInventoryUsage($id);

        $data = [
            'item' => $item,
            'movements' => $movements,
            'projectUsage' => $projectUsage
        ];

        $this->view('inventory/view', $data);
    }

    //* show stock details for a specific inventory item stored in different locations, including reserved quantities and available stock *//
    public function stockDetails($id)
    {
        AuthHelper::can('inventory.view');

        $inventoryModel =
            $this->model('Inventory');

        $reservationModel =
            $this->model('InventoryReservation');


        /*
    |--------------------------------------------------------------
    | GET INVENTORY ITEM
    |--------------------------------------------------------------
    */

        $item =
            $inventoryModel->getById($id);

        if (!$item) {

       FlashHelper::error(
    __('inventory_item_not_found')
);

            header(
                'Location: ' .
                    URLROOT .
                    '/inventory'
            );

            exit;
        }


        /*
    |--------------------------------------------------------------
    | GET LOCATION STOCK BREAKDOWN
    |--------------------------------------------------------------
    */

        $locations =
            $inventoryModel
            ->getLocationBreakdown(
                (int)$id
            );


        /*
    |--------------------------------------------------------------
    | TOTAL ACTIVE RESERVATIONS
    |--------------------------------------------------------------
    */

        $reservedQty =
            $reservationModel
            ->getActiveReservedQty(
                (int)$id
            );


        /*
    |--------------------------------------------------------------
    | CALCULATE TOTAL PHYSICAL STOCK
    |--------------------------------------------------------------
    */

        $locationTotal = 0;

        foreach ($locations as $location) {

            $locationTotal +=
                (float)$location->physical_qty;
        }


        /*
    |--------------------------------------------------------------
    | PREPARE VIEW DATA
    |--------------------------------------------------------------
    */

        $data = [

            'item' => $item,

            'locations' => $locations,

            // Existing stored global quantity
            'system_qty' =>
            (float)$item->quantity,

            // Actual total from all locations
            'location_total' =>
            $locationTotal,

            // Active reservations
            'reserved_qty' =>
            (float)$reservedQty,

            // Actual available stock
            'available_qty' =>
            max(
                0,
                $locationTotal - $reservedQty
            )

        ];


        $this->view(
            'inventory/stock_details',
            $data
        );
    }
}

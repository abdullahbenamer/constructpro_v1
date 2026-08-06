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
        $inventoryStockModel = $this->model('InventoryLocationStock');
        $brandModel = $this->model('Brand');
        $countryModel = $this->model('Country');
        $locationModel = $this->model('InventoryLocation');

        // ALWAYS LOAD VIEW DATA
        $viewData = [
            'brands' => $brandModel->getAll(),
            'countries' => $countryModel->getAll(),
            'locations' => $locationModel->getAll(),
            'default_location_id' => 1
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // =========================
            // REQUIRED VALIDATION FIRST
            // =========================
            if (!isset($_POST['location_id']) || empty($_POST['location_id'])) {
                $_SESSION['error'] = "Storage location is required";
                $_SESSION['old'] = $_POST;

                header('Location: ' . URLROOT . '/inventory/create');
                exit;
            }

            // =========================
            // COLLECT INPUT
            // =========================
            $input = [
                'name'         => trim($_POST['name'] ?? ''),
                'sku'          => trim($_POST['sku'] ?? ''),
                'category'     => $_POST['category'] ?? null,

                'brand_id'     => !empty($_POST['brand_id']) ? (int)$_POST['brand_id'] : null,
                'country_id'   => !empty($_POST['country_id']) ? (int)$_POST['country_id'] : null,

                'location_id'  => (int)$_POST['location_id'],

                'quantity'     => (float)($_POST['quantity'] ?? 0),
                'min_stock'    => (int)($_POST['min_stock'] ?? 10),

                'cost_price'   => (float)($_POST['cost_price'] ?? 0),
            ];

            // =========================
            // BASIC VALIDATION
            // =========================
            if ($input['name'] === '' || $input['sku'] === '') {
                $_SESSION['error'] = "Name and SKU are required";
                $_SESSION['old'] = $_POST;

                header('Location: ' . URLROOT . '/inventory/create');
                exit;
            }

            if ($input['quantity'] < 0) {
                $_SESSION['error'] = "Invalid quantity";
                $_SESSION['old'] = $_POST;

                header('Location: ' . URLROOT . '/inventory/create');
                exit;
            }

            // =========================
            // SAVE
            // =========================
            $inventoryId = $inventoryModel->create($input);

            if ($inventoryId) {

                $inventoryStockModel->createInitialStock(
                    $inventoryId,
                    $input['location_id'],
                    $input['quantity']
                );

                header('Location: ' . URLROOT . '/inventory');
                exit;
            }

            $_SESSION['error'] = "Insert failed";
            $_SESSION['old'] = $_POST;

            header('Location: ' . URLROOT . '/inventory/create');
            exit;
        }

        $this->view('inventory/create', $viewData);
    }

    public function edit($id)
    {
        AuthHelper::can('inventory.edit'); // ✅ ADD THIS

        $model = $this->model('Inventory');

        if ($_POST) {
            if ($model->update($id, $_POST)) {
                header('Location: ' . URLROOT . '/inventory');
                exit;
            }
        }

        $item = $model->getById($id);

        if (!$item) {
            header('Location: ' . URLROOT . '/inventory');
            exit;
        }

        $data['inventory'] = $item;

        $this->view('inventory/edit', $data);
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

    }

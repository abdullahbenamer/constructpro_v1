<?php

class InventoryTransfers extends Controller
{
    private $inventoryModel;

    public function __construct()
    {
        $this->inventoryModel = new InventoryModel();
    }

    public function index()
    {
        $transferModel = $this->model('InventoryTransfer');

        $data['transfers'] =
            $transferModel->getAll();

        $this->view(
            'inventory-transfers/index',
            $data
        );
    }

    public function create()
    {
        $inventoryModel = $this->model('Inventory');
        $locationModel = $this->model('InventoryLocation');
        $stockModel = $this->model('InventoryLocationStock');
        $transferModel = $this->model('InventoryTransfer');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $inventory_id = (int)$_POST['inventory_id'];

            $from_location_id = (int)$_POST['from_location_id'];
            $to_location_id   = (int)$_POST['to_location_id'];

            if ($from_location_id === $to_location_id) {

                $_SESSION['error'] = 'Source and destination locations cannot be the same.';
                header('Location: ' . URLROOT . '/inventorytransfers/create');
                exit;
            }

            $quantity =
                (float)$_POST['quantity'];

            $reference =
                trim($_POST['reference'] ?? '');

            $notes =
                trim($_POST['notes'] ?? '');

            if ($quantity <= 0) {
                $_SESSION['error'] = "Invalid quantity";
                header('Location: ' . URLROOT . '/inventorytransfers');
                exit;
            }

            $result = $transferModel->createTransfer([
                'inventory_id'      => $inventory_id,
                'from_location_id'  => $from_location_id,
                'to_location_id'    => $to_location_id,
                'quantity'          => $quantity,
                'reference'         => $reference,
                'notes'             => $notes
            ]);

            if (!$result['success']) {

                FlashHelper::error($result['message']);

                header('Location: ' . URLROOT . '/inventorytransfers/create');
                exit;
            }

            FlashHelper::success('Transfer completed successfully.');

            header('Location: ' . URLROOT . '/inventorytransfers');
            exit;
          
        }

        $data['inventory'] =
            $inventoryModel->getAll();

        $data['locations'] =
            $locationModel->getAll();

        $this->view(
            'inventory-transfers/create',
            $data
        );
    }

    public function createTransfer($data)
{
    // Models needed
    $stockModel = new InventoryLocationStockModel();
    $movementModel = new InventoryMovementModel();

    try {

        // =====================================
        // START TRANSACTION
        // =====================================

        $this->db->query("START TRANSACTION");

        // =====================================
        // MOVE STOCK
        // =====================================
        
        $result = $stockModel->transferStock(
            $data['inventory_id'],
            $data['from_location_id'],
            $data['to_location_id'],
            $data['quantity']
        );

        if (!$result) {

            $this->db->query("ROLLBACK");

            return [
                'success' => false,
                'message' => 'Not enough stock in source warehouse.'
            ];
        }

        // =====================================
        // SAVE TRANSFER
        // =====================================

        $this->create($data);

        $transfer_id = $this->db->lastInsertId();

        // =====================================
        // INVENTORY MOVEMENT (OUT)
        // =====================================

        $movementModel->addMovement([

            'inventory_id' => $data['inventory_id'],
            'location_id'  => $data['from_location_id'],
            'type'         => 'OUT',
            'quantity'     => $data['quantity'],
            'reference'    => $data['reference'],
            'notes'        => 'Warehouse Transfer #' . $transfer_id,
            'created_by'   => $_SESSION['user_id']

        ]);

        // =====================================
        // INVENTORY MOVEMENT (IN)
        // =====================================

        $movementModel->addMovement([

            'inventory_id' => $data['inventory_id'],
            'location_id'  => $data['to_location_id'],
            'type'         => 'IN',
            'quantity'     => $data['quantity'],
            'reference'    => $data['reference'],
            'notes'        => 'Warehouse Transfer #' . $transfer_id,
            'created_by'   => $_SESSION['user_id']

        ]);

        // =====================================
        // COMMIT
        // =====================================

        $this->db->query("COMMIT");

        return [
            'success' => true,
            'transfer_id' => $transfer_id
        ];
    }
    catch (Exception $e) {

        $this->db->query("ROLLBACK");

        return [
            'success' => false,
            'message' => $e->getMessage()
        ];
    }
}

    public function getLocationStock()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            exit;
        }

        $inventory_id = $_POST['inventory_id'] ?? 0;
        $location_id  = $_POST['location_id'] ?? 0;

        $stockModel = $this->model('InventoryLocationStock');

        $stock = $stockModel->getStock(
            $inventory_id,
            $location_id
        );

        $qty = $stock->quantity ?? 0;

        echo json_encode([
            'quantity' => $qty
        ]);
    }

    public function getBySku()
    {
        header('Content-Type: application/json');

        try {

            $value = $_POST['value'] ?? null;

            if (!$value) {
                echo json_encode(null);
                return;
            }

            $item = $this->inventoryModel->getBySku($value);

            echo json_encode($item ?: null);
        } catch (Throwable $e) {

            http_response_code(500);

            echo json_encode([
                'error' => $e->getMessage()
            ]);
        }
    }

    public function getItemLocations()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            exit;
        }

        header('Content-Type: application/json');

        $inventory_id = (int)($_POST['inventory_id'] ?? 0);

        $stockModel = $this->model('InventoryLocationStock');

        // $locations = $stockModel->getLocationsByItem($inventory_id);
        $locations = $stockModel->getAvailableItemLocations($inventory_id);

        echo json_encode($locations ?: []);
    }

    public function reverse($id)
    {
        $model = $this->model('InventoryTransfer');

        $result = $model->reverse($id);

        if ($result['success']) {
            FlashHelper::success('Transfer reversed successfully.');
        } else {
            FlashHelper::error($result['message']);
        }

        header('Location: ' . URLROOT . '/inventorytransfers');
        exit;
    }
}

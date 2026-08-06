<?php

class InventoryMovements extends Controller
{
    public function index()
    {
        $model = $this->model('InventoryMovement');

        $data['movements'] = $model->getAllMovements();
        // $data['locations'] = $locationModel->getAll();

        $this->view('inventory/movements', $data);
    }

    public function add($inventory_id)
    {

        $model = $this->model('InventoryMovement');
        $locationModel = $this->model('InventoryLocation');

        if ($_POST) {

            $model->addMovement($_POST);

            header('Location: ' . URLROOT . '/inventory');
            exit;
        }

        $data['inventory_id'] = $inventory_id;

        $data['locations'] = $locationModel->getAll();

        $this->view('inventory/movement_add', $data);
    }

    public function receive()
    {

        AuthHelper::can('inventory.edit');

        $purchaseOrderModel = $this->model('PurchaseOrder');
        $inventoryModel = $this->model('Inventory');
        $movementModel = $this->model('InventoryMovement');
        $supplierModel = $this->model('Supplier');
        $locationModel = $this->model('InventoryLocation');

        require_once '../app/Services/GoodsReceiptService.php';
        
 if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  require_once '../app/Services/GoodsReceiptService.php';

$service = new GoodsReceiptService(
    $this->model('PurchaseOrder'),
    $this->model('GoodsReceipt'),
    $this->model('GoodsReceiptItem'),
    $this->model('InventoryMovement'),
    $this->model('SupplierLedger')
);

$service->receive($_POST);

header("Location: " . URLROOT . "/inventorymovements");
exit;
}

        $data['inventory'] = $inventoryModel->getAll();
        $data['suppliers'] = $supplierModel->getAll();
        $data['locations'] = $locationModel->getAll();
        $data['purchaseOrders'] = $purchaseOrderModel->getOpenPurchaseOrders();

        $this->view('inventory/receive', $data);
    }
}

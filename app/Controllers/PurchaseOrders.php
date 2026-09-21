<?php

class PurchaseOrders extends Controller
{
    // list all purchase orders
    public function index()
    {
        AuthHelper::can('purchase-orders.view');

        $model = $this->model('PurchaseOrder');

        $data['orders'] = $model->getAll();

        $this->view('purchase-orders/index', $data);
    }

        /*
    |--------------------------------------------------------------------------
    | DETAILS
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $supplierModel = $this->model('Supplier');
        $locationModel = $this->model('InventoryLocation');
        $projectModel  = $this->model('Project');

        $data = [
            'suppliers' => $supplierModel->getAll(),
            // 'warehouses' => $locationModel->getAll(),

            // prevent project inventory locations from appearing in the warehouse selector.
            'warehouses' => array_filter(
                $locationModel->getAll(),
                function ($location) {
                    return strpos($location->code ?? '', 'PRJ-') !== 0;
                }
            ),

            'projects' => $projectModel->getAll()
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $po_number = 'PO-' . date('YmdHis');

            $delivery_method = $_POST['delivery_method'] ?? 'WAREHOUSE';

            $target_warehouse_id = null;
            $project_id = null;

            if ($delivery_method === 'WAREHOUSE') {

                $target_warehouse_id = !empty($_POST['target_warehouse_id'])
                    ? (int)$_POST['target_warehouse_id']
                    : null;

                if (!$target_warehouse_id) {
                    FlashHelper::error(__('delivery_warehouse_required'));
                    $this->view('purchase-orders/create', $data);
                    return;
                }
            } elseif ($delivery_method === 'DIRECT_TO_PROJECT_SITE') {

                $project_id = !empty($_POST['project_id'])
                    ? (int)$_POST['project_id']
                    : null;

                if (!$project_id) {
                   FlashHelper::error(__('project_required'));
                    $this->view('purchase-orders/create', $data);
                    return;
                }
            }

            $poData = [
                'po_number'           => $po_number,
                'supplier_id'         => (int)$_POST['supplier_id'],
                'project_id'          => $project_id,
                'requisition_id'      => null,
                'target_warehouse_id' => $target_warehouse_id,
                'delivery_method'     => $delivery_method,
                'order_date'          => $_POST['order_date'] ?? null,
                'expected_date'       => $_POST['expected_date'] ?? null,
                'notes'               => trim($_POST['notes'] ?? '')
            ];

            try {

                $model = $this->model('PurchaseOrderModel');

                $id = $model->create($poData);

                if ($id) {
                    FlashHelper::success(__('purchase_order_created_successfully'));

                    header(
                        'Location: ' .
                            URLROOT .
                            '/PurchaseOrders/details/' .
                            $id
                    );
                    exit;
                }
            } catch (Throwable $e) {

                FlashHelper::error($e->getMessage());
            }
        }

        $this->view('purchase-orders/create', $data);
    }


    public function details($id)
    {
        AuthHelper::can('purchase_orders.view');

        $model = $this->model('PurchaseOrder');
        $inventoryModel = $this->model('Inventory');

        $po = $model->getById($id);

        if (!$po) {

            header('Location: ' . URLROOT . '/purchaseorders');
            exit;
        }

        $data['po'] = $po;

        $data['items'] =
            $model->getItems($id);

        $data['inventory'] =
            $inventoryModel->getAll();

        $this->view('purchase-orders/details', $data);
    }

    public function items($po_id)
    {

        AuthHelper::can('inventory.edit');

        $purchaseOrderModel = $this->model('PurchaseOrder');

        header('Content-Type: application/json');

        echo json_encode(
            $purchaseOrderModel->getPOItems((int)$po_id)
        );

        exit;
    }


    // for PO items add view
    public function itemsPage($po_id)
    {
        AuthHelper::can('purchase_orders.view');

        $model = $this->model('PurchaseOrder');
        $inventoryModel = $this->model('Inventory');

        $po = $model->getById($po_id);

        if (!$po) {
            header('Location: ' . URLROOT . '/purchaseorders');
            exit;
        }

        $data['po'] = $po;
        $data['items'] = $model->getItems($po_id); // HTML view data
        $data['inventory'] = $inventoryModel->getAll();

        $this->view('purchase-orders/items', $data);
    }

    public function addItem($po_id)
    {
        AuthHelper::can('purchase-orders.create');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . URLROOT . '/purchaseorders/itemsPage/' . $po_id);
            exit;
        }

        $itemModel = $this->model('PurchaseOrderItem');

        // Lock the PO
        $poModel = $this->model('PurchaseOrder');

        if (!$poModel->isEditable($po_id)) {

            $_SESSION['error'] =
                'Purchase Order is locked and cannot be modified.';

            header(
                'Location: ' .
                    URLROOT .
                    '/purchaseorders/itemsPage/' .
                    $po_id
            );

            exit;
        }

        $total =
            $_POST['quantity'] *
            $_POST['unit_cost'];

        $itemModel->create([
            'purchase_order_id' => $po_id,
            'inventory_id' => $_POST['inventory_id'],
            'quantity' => $_POST['quantity'],
            'unit_cost' => $_POST['unit_cost'],
            'total_cost' => $total
        ]);

        // 🔥 ADD THIS
        $poModel = $this->model('PurchaseOrder');
        $poModel->updateTotals($po_id);

        // header('Location: ' . URLROOT . '/purchaseorders/items/' . $po_id);
        header('Location: ' . URLROOT . '/purchaseorders/itemsPage/' . $po_id);

        exit;
    }

    public function deleteItem($id)
    {
        AuthHelper::can('purchase_orders.edit');

        $itemModel = $this->model('PurchaseOrderItem');

        $item = $itemModel->getById($id);

        if (!$item) {
            header('Location: ' . URLROOT . '/purchaseorders');
            exit;
        }

        $po_id = $item->purchase_order_id;

        // lock the PO
        $poModel = $this->model('PurchaseOrder');

        if (!$poModel->isEditable($po_id)) {

      FlashHelper::error(__('purchase_order_locked'));

            header(
                'Location: ' .
                    URLROOT .
                    '/purchaseorders/itemsPage/' .
                    $po_id
            );

            exit;
        }

        $itemModel->delete($id);

        header('Location: ' . URLROOT . '/purchaseorders/itemsPage/' . $po_id);
        exit;
    }

    public function approve($id)
    {
        AuthHelper::can('purchase_orders.edit');

        $model = $this->model('PurchaseOrder');

        $po = $model->getById($id);

        if (!$po) {

         $_SESSION['error'] = __('purchase_order_not_found');

            header(
                'Location: ' .
                    URLROOT .
                    '/purchaseorders'
            );

            exit;
        }

        /*
    |--------------------------------------------------------------------------
    | ONLY DRAFT PURCHASE ORDERS CAN BE APPROVED
    |--------------------------------------------------------------------------
    */

        if ($po->status !== 'draft') {

         $_SESSION['error'] =
    __('draft_purchase_orders_only_approve');

            header(
                'Location: ' .
                    URLROOT .
                    '/purchaseorders/details/' .
                    $id
            );

            exit;
        }

        /*
    |--------------------------------------------------------------------------
    | PO MUST CONTAIN AT LEAST ONE ITEM
    |--------------------------------------------------------------------------
    */

        $items = $model->getItems($id);

        if (empty($items)) {

         $_SESSION['error'] =
    __('add_item_before_approving_po');

            header(
                'Location: ' .
                    URLROOT .
                    '/purchaseorders/details/' .
                    $id
            );

            exit;
        }

        /*
    |--------------------------------------------------------------------------
    | APPROVE
    |--------------------------------------------------------------------------
    */

        $model->approve(
            $id,
            $_SESSION['user_id']
        );

   $_SESSION['success'] =
    __('purchase_order_approved_successfully');

        header(
            'Location: ' .
                URLROOT .
                '/purchaseorders/details/' .
                $id
        );

        exit;
    }

    public function cancel($id)
    {
        AuthHelper::can('purchase_orders.edit');

        try {

            $service = $this->service('PurchaseOrder');

            $service->cancel((int)$id);

          FlashHelper::success(
    __('purchase_order_cancelled_successfully')
);

        } catch (Throwable $e) {

            FlashHelper::error(
                $e->getMessage()
            );
        }

        header(
            'Location: ' .
                URLROOT .
                '/purchaseorders'
        );

        exit;
    }

    /*
|--------------------------------------------------------------------------
| PRINT PURCHASE ORDER
|--------------------------------------------------------------------------
*/

    public function print($id)
    {
        AuthHelper::can('purchase_orders.view');

        $model = $this->model('PurchaseOrder');

        $po = $model->getById((int)$id);

        if (!$po) {

            header(
                'Location: ' .
                    URLROOT .
                    '/purchaseorders'
            );

            exit;
        }

        /*
    |--------------------------------------------------------------------------
    | ONLY APPROVED / RECEIVED POs SHOULD BE PRINTED AS OFFICIAL PO
    |--------------------------------------------------------------------------
    */

        if (
            !in_array(
                $po->status,
                ['approved', 'partial', 'received'],
                true
            )
        ) {

        $_SESSION['error'] =
    __('approved_purchase_orders_only_print');

            header(
                'Location: ' .
                    URLROOT .
                    '/purchaseorders/details/' .
                    $id
            );

            exit;
        }

        $data['po'] =
            $po;

        $data['items'] =
            $model->getItems((int)$id);

        $this->view(
            'purchase-orders/print',
            $data,
            False // preventing from loading web page Header and footer
        );
    }
}

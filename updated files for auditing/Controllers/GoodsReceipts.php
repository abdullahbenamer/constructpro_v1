<?php

class GoodsReceipts extends Controller
{
    public function create()
    {
        AuthHelper::can('goods_receipts.create');

        $purchaseOrderModel = $this->model('PurchaseOrder');
        $supplierModel      = $this->model('Supplier');
        $locationModel      = $this->model('InventoryLocation');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            require_once '../app/Services/GoodsReceiptService.php';

            $db = $this->model('Supplier')->db; // any model has DB reference

            $service = new GoodsReceiptService(
                $this->model('PurchaseOrder'),
                $this->model('GoodsReceipt'),
                $this->model('GoodsReceiptItem'),
                $this->model('SupplierLedger'),
                $this->model('InventoryService')
            );

            try {

                $service->receive($_POST);

                FlashHelper::success(
                    __('goods_receipt_created_successfully')
                );

                header(
                    'Location: ' . URLROOT . '/goodsreceipts'
                );

                exit;
            } catch (Throwable $e) {

                FlashHelper::error(
                    $e->getMessage()
                );

                header(
                    'Location: ' . URLROOT . '/goodsreceipts/create'
                );

                exit;
            }
        }

        $data['purchaseOrders'] = $purchaseOrderModel->getOpenPurchaseOrders();
        $data['locations']       = $locationModel->getAll();
        $data['suppliers']       = $supplierModel->getAll();

        $this->view('goodsreceipts/create', $data);
    }
}

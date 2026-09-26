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

    try {

        $service = $this->service('GoodsReceipt');

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

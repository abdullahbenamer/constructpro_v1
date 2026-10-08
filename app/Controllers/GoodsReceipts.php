<?php

class GoodsReceipts extends Controller
{

    /**
     * GRN LIST
     */
    public function index()
    {
        AuthHelper::can('goods_receipts.view');

        $model =
            $this->model('GoodsReceipt');

        $data['goodsReceipts'] =
            $model->getAll();

        $this->view(
            'goodsreceipts/index',
            $data
        );
    }


    /**
     * CREATE GRN
     */
    public function create()
    {
        AuthHelper::can('goods_receipts.create');

        $purchaseOrderModel =
            $this->model('PurchaseOrder');

        $supplierModel =
            $this->model('Supplier');

        $locationModel =
            $this->model('InventoryLocation');


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            try {

                $service =
                    $this->service('GoodsReceipt');

                $service->receive($_POST);

                FlashHelper::success(
                    __('goods_receipt_created_successfully')
                );

                header(
                    'Location: ' .
                    URLROOT .
                    '/goods-receipts'
                );

                exit;

            } catch (Throwable $e) {

                FlashHelper::error(
                    $e->getMessage()
                );

                header(
                    'Location: ' .
                    URLROOT .
                    '/goods-receipts/create'
                );

                exit;
            }
        }


        $data['purchaseOrders'] =
            $purchaseOrderModel->getOpenPurchaseOrders();

        $data['locations'] =
            $locationModel->getAll();

        $data['suppliers'] =
            $supplierModel->getAll();


        $this->view(
            'goodsreceipts/create',
            $data
        );
    }


    /**
     * PRINT GRN
     */
    public function print($id)
    {
        AuthHelper::can('goods_receipts.print');

        $grnModel =
            $this->model('GoodsReceipt');

        $itemModel =
            $this->model('GoodsReceiptItem');


        $grn =
            $grnModel->getById(
                (int)$id
            );


        if (!$grn) {

            header(
                'Location: ' .
                URLROOT .
                '/goods-receipts'
            );

            exit;
        }


        $data['grn'] =
            $grn;

        $data['items'] =
            $itemModel->getItems(
                (int)$id
            );


        /*
        |--------------------------------------------------------------
        | Standalone GRN print view
        |--------------------------------------------------------------
        */

        $this->view(
            'inventory/receive_print',
            $data,
            false
        );
    }
}
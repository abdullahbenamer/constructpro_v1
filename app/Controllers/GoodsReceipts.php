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
            'goods-receipts/index',
            $data
        );
    }

    /**
     * CREATE GRN
     */
    /** public function create()
     * {
     *   AuthHelper::can('goods_receipts.create');
     *  create of GRN is handled by InventoryMovements::Receive() controller
     * }
     * */


    /**
     * PRINT GRN
     **/
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

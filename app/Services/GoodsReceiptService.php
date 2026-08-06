<?php

class GoodsReceiptService extends Model
{
    private PurchaseOrderModel $poModel;
    private GoodsReceiptModel $grnModel;
    private GoodsReceiptItemModel $grnItemModel;
    private InventoryMovementModel $movementModel;
    private SupplierLedgerModel $ledgerModel;

    public function __construct(
        PurchaseOrderModel $poModel,
        GoodsReceiptModel $grnModel,
        GoodsReceiptItemModel $grnItemModel,
        InventoryMovementModel $movementModel,
        SupplierLedgerModel $ledgerModel
    ) {
        parent::__construct();

        $this->poModel       = $poModel;
        $this->grnModel      = $grnModel;
        $this->grnItemModel  = $grnItemModel;
        $this->movementModel = $movementModel;
        $this->ledgerModel   = $ledgerModel;
    }

    /**
     * ERP Goods Receipt Workflow
     */
    public function receive(array $data): int
    {
        try {

            $this->db->beginTransaction();

            /*
            |--------------------------------------------------------------------------
            | 1. Calculate totals
            |--------------------------------------------------------------------------
            */
            $total = (float)$data['quantity'] * (float)$data['unit_cost'];

            /*
            |--------------------------------------------------------------------------
            | 2. Create GRN Header
            |--------------------------------------------------------------------------
            */
            $grnId = $this->grnModel->create([
                'grn_number'        => $this->grnModel->nextNumber(),
                'purchase_order_id' => $data['po_id'],
                'supplier_id'       => $data['supplier_id'],
                'receipt_date'      => date('Y-m-d'),
                'subtotal'          => $total,
                'total_amount'      => $total,
                'remarks'           => $data['notes'] ?? ''
            ]);

            /*
            |--------------------------------------------------------------------------
            | 3. Validate PO item
            |--------------------------------------------------------------------------
            */
            $poItem = $this->poModel->getPOItem(
                $data['po_id'],
                $data['inventory_id']
            );

            if (!$poItem) {
                throw new Exception("PO item not found.");
            }

            /*
            |--------------------------------------------------------------------------
            | 4. Create GRN Item
            |--------------------------------------------------------------------------
            */
            $this->grnItemModel->create([
                'goods_receipt_id'       => $grnId,
                'purchase_order_item_id' => $poItem->id,
                'inventory_id'           => $data['inventory_id'],
                'quantity'               => $data['quantity'],
                'unit_cost'              => $data['unit_cost'],
                'total_cost'             => $total
            ]);

            /*
            |--------------------------------------------------------------------------
            | 5. Inventory Movement (IN)
            |--------------------------------------------------------------------------
            */
            $this->movementModel->addMovement([
                'inventory_id' => $data['inventory_id'],
                'location_id'  => $data['location_id'],
                'type'         => 'IN',
                'quantity'     => $data['quantity'],
                'unit_cost'    => $data['unit_cost'],
                'supplier_id'  => $data['supplier_id'],
                'reference'    => 'GRN-' . $grnId,
                'notes'        => $data['notes'] ?? '',
                'created_by'   => $_SESSION['user_id'] ?? null
            ]);

            /*
            |--------------------------------------------------------------------------
            | 6. Update Purchase Order Received Qty
            |--------------------------------------------------------------------------
            */
            $this->poModel->receiveItem(
                $data['po_id'],
                $data['inventory_id'],
                $data['quantity']
            );

            /*
            |--------------------------------------------------------------------------
            | 7. Update PO Status (partial/full received)
            |--------------------------------------------------------------------------
            */
            $this->poModel->updateReceivingStatus($data['po_id']);

            /*
            |--------------------------------------------------------------------------
            | 8. Supplier Ledger Entry (ERP accounting core)
            |--------------------------------------------------------------------------
            */
            $this->ledgerModel->add([
                'supplier_id'    => $data['supplier_id'],
                'type'           => 'GRN',
                'reference_type' => 'GoodsReceipt',
                'reference_id'   => $grnId,
                'amount'         => $total,
                'direction'      => 'DEBIT'
            ]);

            /*
            |--------------------------------------------------------------------------
            | 9. Commit transaction
            |--------------------------------------------------------------------------
            */
            $this->db->commit();

            return $grnId;

        } catch (Exception $e) {

            $this->db->rollBack();
            throw $e;
        }
    }
}
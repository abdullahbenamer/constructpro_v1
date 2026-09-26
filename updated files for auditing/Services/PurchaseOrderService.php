<?php

require_once '../app/Services/BaseService.php';

class PurchaseOrderService extends BaseService
{
    private PurchaseOrderModel $poModel;

    public function __construct(
        PurchaseOrderModel $poModel
    ) {
        parent::__construct();

        $this->poModel = $poModel;
    }

    /**
     * Cancel a Purchase Order.
     *
     * Allowed:
     *   draft
     *   approved
     *   partial
     *
     * Not allowed:
     *   received
     *   cancelled
     *
     * Cancellation does NOT affect:
     *   - inventory quantity
     *   - warehouse quantity
     *   - inventory movements
     *   - GRNs
     *   - supplier ledger
     *
     * receiving_status is intentionally preserved.
     */
    public function cancel(int $poId): bool
    {
        return $this->transaction(function () use ($poId) {

            /*
            |--------------------------------------------------------------------------
            | 1. Validate PO ID
            |--------------------------------------------------------------------------
            */

            if ($poId <= 0) {
                throw new Exception(
                    __('invalid_purchase_order')
                );
            }

            /*
            |--------------------------------------------------------------------------
            | 2. Load Purchase Order
            |--------------------------------------------------------------------------
            */

            $po = $this->poModel->getById($poId);

            if (!$po) {
                throw new Exception(
                 __('purchase_order_not_found')
                    
                );
            }

            /*
            |--------------------------------------------------------------------------
            | 3. Validate current status
            |--------------------------------------------------------------------------
            */

            if ($po->status === 'cancelled') {
                throw new Exception(
               __('purchase_order_already_cancelled')
                );
            }

            if ($po->status === 'received') {
                throw new Exception(
                    __('fully_received_po_cannot_be_cancelled')
                );
            }

            if (!in_array(
                $po->status,
                ['draft', 'approved', 'partial'],
                true
            )) {
                throw new Exception(
                     __('purchase_order_cannot_be_cancelled')
                );
            }

            /*
            |--------------------------------------------------------------------------
            | 4. Cancel PO
            |--------------------------------------------------------------------------
            |
            | IMPORTANT:
            | receiving_status is NOT changed.
            |
            | Examples:
            |
            | draft    + OPEN    -> cancelled + OPEN
            | approved + OPEN    -> cancelled + OPEN
            | partial  + PARTIAL -> cancelled + PARTIAL
            |
            */

            $this->poModel->cancel($poId);

            return true;
        });
    }
}

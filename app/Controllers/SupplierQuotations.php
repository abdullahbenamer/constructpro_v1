<?php

class SupplierQuotations extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        AuthHelper::can('purchase_orders.view');

        $model = $this->model('SupplierQuotation');

        $data['quotations'] = $model->getAll();

        $this->view(
            'supplier-quotations/index',
            $data
        );
    }


    /*
    |--------------------------------------------------------------------------
    | CREATE QUOTATION
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        AuthHelper::can('purchase_orders.create');

        $supplierModel = $this->model('Supplier');
        $model = $this->model('SupplierQuotation');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            try {

                $supplierId =
                    (int)($_POST['supplier_id'] ?? 0);

                if ($supplierId <= 0) {
                    throw new Exception(
                        'Please select a supplier.'
                    );
                }

                if (
                    empty($_POST['quotation_date'])
                ) {
                    throw new Exception(
                        'Quotation date is required.'
                    );
                }

                $id = $model->create([

                    'quotation_number' =>
                        $model->nextNumber(),

                    'supplier_id' =>
                        $supplierId,

                    'supplier_reference' =>
                        trim(
                            $_POST['supplier_reference'] ?? ''
                        ),

                    'quotation_date' =>
                        $_POST['quotation_date'],

                    'valid_until' =>
                        $_POST['valid_until'] ?? null,

                    'notes' =>
                        trim(
                            $_POST['notes'] ?? ''
                        )

                ]);

                header(
                    'Location: ' .
                    URLROOT .
                    '/supplierquotations/details/' .
                    $id
                );

                exit;

            } catch (Throwable $e) {

                FlashHelper::error(
                    $e->getMessage()
                );

                header(
                    'Location: ' .
                    URLROOT .
                    '/supplierquotations/create'
                );

                exit;
            }
        }

        $data['suppliers'] =
            $supplierModel->getAll();

        $this->view(
            'supplier-quotations/create',
            $data
        );
    }


    /*
    |--------------------------------------------------------------------------
    | DETAILS
    |--------------------------------------------------------------------------
    */

public function details($id)
{
    AuthHelper::can('purchase_orders.view');

    $model =
        $this->model('SupplierQuotation');

    $quotation =
        $model->getById($id);

    if (!$quotation) {

        header(
            'Location: ' .
            URLROOT .
            '/supplierquotations'
        );

        exit;
    }

    $inventoryModel =
        $this->model('Inventory');

    $unitModel =
        $this->model('Unit');

    $data['quotation'] =
        $quotation;

    $data['items'] =
        $model->getItems($id);

    $data['inventory'] =
        $inventoryModel->getAll();

    $data['units'] =
        $unitModel->getAll();

    $this->view(
        'supplier-quotations/details',
        $data
    );
}


    /*
    |--------------------------------------------------------------------------
    | ADD ITEM
    |--------------------------------------------------------------------------
    */

    public function addItem($quotation_id)
    {
        AuthHelper::can('purchase_orders.create');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            header(
                'Location: ' .
                URLROOT .
                '/supplierquotations/details/' .
                $quotation_id
            );

            exit;
        }

        $model =
            $this->model('SupplierQuotation');

        if (!$model->isEditable($quotation_id)) {

            FlashHelper::error(
                'Quotation is locked and cannot be modified.'
            );

            header(
                'Location: ' .
                URLROOT .
                '/supplierquotations/details/' .
                $quotation_id
            );

            exit;
        }

        try {

            $description =
                trim(
                    $_POST['description'] ?? ''
                );

            $quantity =
                (float)($_POST['quantity'] ?? 0);

            $unitPrice =
                (float)($_POST['unit_price'] ?? 0);

            if ($description === '') {
                throw new Exception(
                    'Item description is required.'
                );
            }

            if ($quantity <= 0) {
                throw new Exception(
                    'Quantity must be greater than zero.'
                );
            }

            if ($unitPrice < 0) {
                throw new Exception(
                    'Unit price cannot be negative.'
                );
            }

            $model->addItem([

                'supplier_quotation_id' =>
                    $quotation_id,

                'inventory_id' =>
                    !empty($_POST['inventory_id'])
                    ? (int)$_POST['inventory_id']
                    : null,

                'description' =>
                    $description,

                'specification' =>
                    trim(
                        $_POST['specification'] ?? ''
                    ),

                'unit_id' =>
                    !empty($_POST['unit_id'])
                    ? (int)$_POST['unit_id']
                    : null,

                'quantity' =>
                    $quantity,

                'unit_price' =>
                    $unitPrice,

                'notes' =>
                    trim(
                        $_POST['item_notes'] ?? ''
                    )
            ]);

            FlashHelper::success(
                'Quotation item added successfully.'
            );

        } catch (Throwable $e) {

            FlashHelper::error(
                $e->getMessage()
            );
        }

        header(
            'Location: ' .
            URLROOT .
            '/supplierquotations/details/' .
            $quotation_id
        );

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE ITEM
    |--------------------------------------------------------------------------
    */

    public function deleteItem($id)
    {
        AuthHelper::can('purchase_orders.create');

        $model =
            $this->model('SupplierQuotation');

        $item =
            $model->getItemById($id);

        if (!$item) {

            header(
                'Location: ' .
                URLROOT .
                '/supplierquotations'
            );

            exit;
        }

        if (
            !$model->isEditable(
                $item->supplier_quotation_id
            )
        ) {

            FlashHelper::error(
                'Quotation is locked and cannot be modified.'
            );

            header(
                'Location: ' .
                URLROOT .
                '/supplierquotations/details/' .
                $item->supplier_quotation_id
            );

            exit;
        }

        $model->deleteItem($id);

        header(
            'Location: ' .
            URLROOT .
            '/supplierquotations/details/' .
            $item->supplier_quotation_id
        );

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | ACCEPT
    |--------------------------------------------------------------------------
    */

    public function accept($id)
    {
        AuthHelper::can('purchase_orders.edit');

        $model =
            $this->model('SupplierQuotation');

        $quotation =
            $model->getById($id);

        if (!$quotation) {

            FlashHelper::error(
                'Quotation not found.'
            );

            header(
                'Location: ' .
                URLROOT .
                '/supplierquotations'
            );

            exit;
        }

        if ($quotation->status !== 'DRAFT') {

            FlashHelper::error(
                'Only draft quotations can be accepted.'
            );

            header(
                'Location: ' .
                URLROOT .
                '/supplierquotations/details/' .
                $id
            );

            exit;
        }

        $items =
            $model->getItems($id);

        if (empty($items)) {

            FlashHelper::error(
                'Please add at least one item before accepting the quotation.'
            );

            header(
                'Location: ' .
                URLROOT .
                '/supplierquotations/details/' .
                $id
            );

            exit;
        }

        $model->accept($id);

        FlashHelper::success(
            'Supplier quotation accepted successfully.'
        );

        header(
            'Location: ' .
            URLROOT .
            '/supplierquotations/details/' .
            $id
        );

        exit;
    }


    /*
    |--------------------------------------------------------------------------
    | CANCEL
    |--------------------------------------------------------------------------
    */

    public function cancel($id)
    {
        AuthHelper::can('purchase_orders.edit');

        $model =
            $this->model('SupplierQuotation');

        $quotation =
            $model->getById($id);

        if (!$quotation) {

            FlashHelper::error(
                'Quotation not found.'
            );

            header(
                'Location: ' .
                URLROOT .
                '/supplierquotations'
            );

            exit;
        }

        $model->cancel($id);

        FlashHelper::success(
            'Quotation cancelled.'
        );

        header(
            'Location: ' .
            URLROOT .
            '/supplierquotations'
        );

        exit;
    }
}
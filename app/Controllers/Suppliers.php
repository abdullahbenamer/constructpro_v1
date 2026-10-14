<?php

class Suppliers extends Controller
{
    public function index()
    {

        AuthHelper::can('suppliers.view');
        $model = $this->model('Supplier');

        $data['suppliers'] = $model->getAll();

        $this->view('suppliers/index', $data);
    }


    public function create()
    {
        AuthHelper::can('suppliers.create');

        $model = $this->model('Supplier');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'company_name'   => trim($_POST['company_name'] ?? ''),
                'contact_person' => trim($_POST['contact_person'] ?? ''),
                'phone'          => trim($_POST['phone'] ?? ''),
                'email'          => strtolower(trim($_POST['email'] ?? '')),
                'address'        => trim($_POST['address'] ?? ''),
                'notes'          => trim($_POST['notes'] ?? '')
            ];

            // Required fields
            $hasError = false;
            if ($data['company_name'] === '') {
                FlashHelper::error(__('company_name_required'));
                $hasError = true;
            } elseif ($data['contact_person'] === '') {
                FlashHelper::error(__('contact_person_required'));
                $hasError = true;
            } elseif ($data['phone'] === '') {
                FlashHelper::error(__('phone_required'));
                $hasError = true;
            } elseif (
                $data['email'] !== '' &&
                !filter_var($data['email'], FILTER_VALIDATE_EMAIL)
            ) {
                FlashHelper::error(__('email_invalid'));
                $hasError = true;
            } elseif (
                $model->existsDuplicate('company_name', $data['company_name'])
            ) {
                FlashHelper::error(__('supplier_company_name_duplicate'));
                $hasError = true;
            } elseif (
                $model->existsDuplicate('phone', $data['phone'])
            ) {
                FlashHelper::error(__('supplier_phone_duplicate'));
                $hasError = true;
            } elseif (
                $data['email'] !== '' &&
                $model->existsDuplicate('email', $data['email'])
            ) {
                FlashHelper::error(__('supplier_email_duplicate'));
                $hasError = true;
            } else {
                try {
                    $result = $model->create($data);

                    if ($result) {
                        FlashHelper::success(
                            __('supplier_created_successfully')
                        );
                    } else {
                        FlashHelper::error(__('unable_to_create_supplier'));
                        $hasError = true;
                    }
                } catch (PDOException $e) {
                    if ($e->getCode() === '23000') {
                        FlashHelper::error(
                            __('supplier_duplicate_or_constraint_error')
                        );
                        $hasError = true;
                    } else {
                        error_log($e->getMessage());
                        FlashHelper::error(__('unable_to_create_supplier'));
                        $hasError = true;
                    }
                }
            }

            if ($hasError) {
                header('Location: ' . URLROOT . '/suppliers/create');
                exit;
            }

            header('Location: ' . URLROOT . '/suppliers');
            exit;
        }

        $this->view('suppliers/create');
    }

    public function edit($id)
    {
        AuthHelper::can('suppliers.edit');

        $model = $this->model('Supplier');
        $supplier = $model->getById($id);

        if (!$supplier) {
            FlashHelper::error(__('supplier_not_found'));
            header('Location: ' . URLROOT . '/suppliers');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'company_name'   => trim($_POST['company_name'] ?? ''),
                'contact_person' => trim($_POST['contact_person'] ?? ''),
                'phone'          => trim($_POST['phone'] ?? ''),
                'email'          => strtolower(trim($_POST['email'] ?? '')),
                'address'        => trim($_POST['address'] ?? ''),
                'notes'          => trim($_POST['notes'] ?? '')
            ];

            // Required fields
            if ($data['company_name'] === '') {
                FlashHelper::error(__('company_name_required'));
            } elseif ($data['contact_person'] === '') {
                FlashHelper::error(__('contact_person_required'));
            } elseif ($data['phone'] === '') {
                FlashHelper::error(__('phone_required'));
            } elseif (
                $data['email'] !== '' &&
                !filter_var($data['email'], FILTER_VALIDATE_EMAIL)
            ) {
                FlashHelper::error(__('email_invalid'));
            } elseif (
                $model->existsDuplicate(
                    'company_name',
                    $data['company_name'],
                    (int) $id
                )
            ) {
                FlashHelper::error(__('supplier_company_name_duplicate'));
            } elseif (
                $model->existsDuplicate(
                    'phone',
                    $data['phone'],
                    (int) $id
                )
            ) {
                FlashHelper::error(__('supplier_phone_duplicate'));
            } elseif (
                $data['email'] !== '' &&
                $model->existsDuplicate(
                    'email',
                    $data['email'],
                    (int) $id
                )
            ) {
                FlashHelper::error(__('supplier_email_duplicate'));
            } else {
                try {
                    $result = $model->update($id, $data);

                    if ($result !== false) {
                        FlashHelper::success(
                            __('supplier_updated_successfully')
                        );
                    } else {
                        FlashHelper::error(__('unable_to_update_supplier'));
                    }
                } catch (PDOException $e) {
                    if ($e->getCode() === '23000') {
                        FlashHelper::error(
                            __('supplier_duplicate_or_constraint_error')
                        );
                    } else {
                        error_log($e->getMessage());
                        FlashHelper::error(__('unable_to_update_supplier'));
                    }
                }
            }

            header('Location: ' . URLROOT . '/suppliers');
            exit;
        }

        $data = ['supplier' => $supplier];
        $this->view('suppliers/edit', $data);
    }


    public function delete($id)
    {
        AuthHelper::can('suppliers.delete');

        $model = $this->model('Supplier');

        try {
            $result = $model->delete($id);

            if (!$result) {
                FlashHelper::error(__('supplier_not_found'));
            } else {
                FlashHelper::success(__('supplier_deleted_successfully'));
            }
        } catch (PDOException $e) {
            if ($e->getCode() === '23000') {
                FlashHelper::error(__('supplier_cannot_be_deleted'));
            } else {
                error_log($e->getMessage());
                FlashHelper::error(__('unable_to_delete_supplier'));
            }
        }

        header('Location: ' . URLROOT . '/suppliers');
        exit;
    }

    public function details($id)
    {
        AuthHelper::can('suppliers.view');

        $model = $this->model('Supplier');

        $supplier = $model->getById($id);

        if (!$supplier) {
            header('Location: ' . URLROOT . '/suppliers');
            exit;
        }

        $purchase_orders = $model->getPurchaseOrders($id);

        $total_purchases = $this->model('PurchaseOrder')
            ->sumBySupplier($id);

        $ledgerModel = $this->model('SupplierLedger');
        $ledger = $ledgerModel->getStatement($id);

        $total_goods_received = 0;

        foreach ($ledger as $row) {
            if ($row->type === 'GRN') {
                $total_goods_received += (float)$row->debit;
            }
        }

        $total_paid = $model->getTotalPaid($id);

        $data['supplier'] = $supplier;
        $data['purchase_orders'] = $purchase_orders;
        $data['total_purchases'] = $total_purchases;
        $data['total_goods_received'] = $total_goods_received;
        $data['total_paid'] = $total_paid;

        $this->view('suppliers/details', $data);
    }

    public function info($supplier_id)
    {
        AuthHelper::can('suppliers.view');

        $supplierModel = $this->model('Supplier');
        $paymentModel  = $this->model('SupplierPaymentModel');
        $poModel       = $this->model('PurchaseOrder');
        $ledgerModel   = $this->model('SupplierLedger');

        $data['supplier'] = $supplierModel->getById($supplier_id);

        if (!$data['supplier']) {
            header("Location: " . URLROOT . "/suppliers");
            exit;
        }

        /*
    |--------------------------------------------------------------------------
    | DATA SOURCES
    |--------------------------------------------------------------------------
    */
        $purchase_orders = $poModel->getBySupplier($supplier_id);
        $ledger          = $ledgerModel->getStatement($supplier_id);

        /*
    |--------------------------------------------------------------------------
    | SUMMARY (VIEW COMPATIBLE + ERP SAFE)
    |--------------------------------------------------------------------------
    */
        $ordered_value = 0;
        foreach ($purchase_orders as $po) {
            $ordered_value += (float)$po->total_amount;
        }

        $received_value = 0;
        foreach ($ledger as $row) {
            if ($row->type === 'GRN') {
                $received_value += (float)$row->debit;
            }
        }

        $paid_amount = 0;
        foreach ($ledger as $row) {
            if ($row->type === 'PAYMENT') {
                $paid_amount += (float)$row->credit;
            }
        }

        $balance = 0;
        foreach ($ledger as $row) {
            $balance += ((float)$row->debit - (float)$row->credit);
        }

        $data['summary'] = [
            'po_count'       => count($purchase_orders),
            'ordered_value'  => $ordered_value,
            'received_value' => $received_value,
            'paid_amount'    => $paid_amount,
            'balance'        => $balance
        ];

        /*
    |--------------------------------------------------------------------------
    | UI DATA
    |--------------------------------------------------------------------------
    */
        $data['ledger'] = $ledger;
        $data['payments'] = $paymentModel->getBySupplier($supplier_id);
        $data['purchase_orders'] = $purchase_orders;

        $this->view('suppliers/supplier_info', $data);
    }

    public function ledger($supplier_id)
    {
        AuthHelper::can('suppliers.ledger');

        $supplierModel = $this->model('Supplier');
        $ledgerModel   = $this->model('SupplierLedger');

        $supplier =
            $supplierModel->getById($supplier_id);

        if (!$supplier) {

            header(
                'Location: ' .
                    URLROOT .
                    '/suppliers'
            );

            exit;
        }

        /*
    |--------------------------------------------------------------------------
    | GET SUPPLIER LEDGER
    |--------------------------------------------------------------------------
    */

        $ledger =
            $ledgerModel->getStatement(
                $supplier_id
            );

        /*
    |--------------------------------------------------------------------------
    | SUMMARY
    |--------------------------------------------------------------------------
    */

        $totalDebit  = 0;
        $totalCredit = 0;

        foreach ($ledger as $row) {

            $totalDebit +=
                (float)$row->debit;

            $totalCredit +=
                (float)$row->credit;
        }

        /*
    |--------------------------------------------------------------------------
    | FINAL BALANCE
    |--------------------------------------------------------------------------
    */

        $balance =
            $totalDebit -
            $totalCredit;

        /*
    |--------------------------------------------------------------------------
    | VIEW DATA
    |--------------------------------------------------------------------------
    */

        $data = [

            'supplier'     => $supplier,

            'ledger'       => $ledger,

            'total_debit'  => $totalDebit,

            'total_credit' => $totalCredit,

            'balance'      => $balance

        ];

        /*
    |--------------------------------------------------------------------------
    | PRINTABLE REPORT
    |--------------------------------------------------------------------------
    */

        $this->view(
            'suppliers/ledger_report',
            $data,
            false
        );
    }
}

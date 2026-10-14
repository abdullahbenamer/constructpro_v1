<?php
// Remove CrudController require - use direct methods
class Customers extends Controller
{
    public function index()
    {
        AuthHelper::can('customers.view');

        $model = $this->model('Customer');
        $data['customers'] = $model->getCustomers('active');
        $data['title'] = 'Customers';
        $this->view('customers/index', $data);
    }

    // CREATE (inherited from CrudController but direct)
    public function create()
    {
        AuthHelper::can('customers.create');

        if ($_POST) {
            $model = $this->model('Customer');

            try {
                if ($model->create($_POST)) {
                    FlashHelper::success(__('customer_created_successfully'));
                    header('Location: ' . URLROOT . '/customers');
                    exit;
                }
            } catch (\PDOException $e) {

                if (
                    $e->getCode() === '23000' &&
                    isset($e->errorInfo[1]) &&
                    (int) $e->errorInfo[1] === 1062
                ) {
                    $errorMessage = $e->getMessage();

                    if (strpos($errorMessage, 'uq_customers_email') !== false) {
                        FlashHelper::error(__('customer_email_already_exists'));
                    } elseif (strpos($errorMessage, 'uq_customers_phone') !== false) {
                        FlashHelper::error(__('customer_phone_already_exists'));
                    } elseif (strpos($errorMessage, 'uq_customers_company') !== false) {
                        FlashHelper::error(__('customer_company_already_exists'));
                    } else {
                        error_log('Customer duplicate-entry error: ' . $errorMessage);
                        FlashHelper::error(__('customer_creation_failed'));
                    }

                    header('Location: ' . URLROOT . '/customers/create');
                    exit;
                }

                error_log('Customer creation failed: ' . $e->getMessage());

                FlashHelper::error(__('customer_creation_failed'));
                header('Location: ' . URLROOT . '/customers/create');
                exit;
            }
        }

        $this->view('customers/create');
    }


    // EDIT
    public function edit($id)
    {
        AuthHelper::can('customers.edit');

        $model = $this->model('Customer');

        if ($_POST) {
            if ($model->update($id, $_POST)) {
                FlashHelper::success(__('customer_updated_successfully'));
                header('Location: ' . URLROOT . '/customers');
                exit;
            }
        }

        $item = $model->getById($id);

        if (!$item) {
            header('Location: ' . URLROOT . '/customers');
            exit;
        }

        $data['customer'] = $item;
        $this->view('customers/edit', $data);
    }

    //  delete a Customer
    public function delete($id)
    {
        AuthHelper::can('customers.delete');

        $model = $this->model('Customer');

        try {

            if ($model->delete($id)) {
                FlashHelper::success(__('customer_deleted_successfully'));
            } else {
                FlashHelper::error(__('customer_not_found'));
                header('Location: ' . URLROOT . '/customers');
                exit;
            }
        } catch (PDOException $e) {

            // MySQL foreign key violation
            if ($e->getCode() == '23000') {

                FlashHelper::error(__('customer_cannot_be_deleted'));
                header('Location: ' . URLROOT . '/customers');
                exit;
            } else {

                FlashHelper::error(__('unable_to_delete_customer'));
            }
        }

        header('Location: ' . URLROOT . '/customers');
        exit;
    }

    public function info($id)
    {
        AuthHelper::can('customers.view');
        $model = $this->model('Customer');

        $customer = $model->getById($id);

        if (!$customer) {
            FlashHelper::error(__('customer_not_found'));
            header('Location: ' . URLROOT . '/customers');
            exit;
        }

        $data['customer'] = $customer;

        $this->view('customers/customer_info', $data);
    }

    public function details($id)
    {
        AuthHelper::can('customers.view');
        $customerModel = $this->model('CustomerModel');

        $customer = $customerModel->getCustomerById($id);
        $projects = $customerModel->getCustomerProjects($id);

        if (!$customer) {
            header("Location: " . URLROOT . "/customers");
            exit;
        }

        $data = [
            'customer' => $customer,
            'projects' => $projects
        ];

        $this->view('customers/details', $data);
    }
}

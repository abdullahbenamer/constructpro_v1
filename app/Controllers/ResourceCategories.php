<?php
class ResourceCategories extends Controller
{
    /**
     * LIST RESOURCE CATEGORIES
     */
    public function index()
    {
        AuthHelper::can('resource_categories.view');

        $model = $this->model('ResourceCategory');
        $data = [
            'categories' => $model->getAll()
        ];
        $this->view(
            'resource-categories/index',
            $data
        );
    }

    /**
     * CREATE PAGE
     */
    public function create()
    {
        AuthHelper::can('resource_categories.create');

        $this->view(
            'resource-categories/create'
        );
    }


    public function store()
    {
        AuthHelper::can('resource_categories.create');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . URLROOT . '/ResourceCategories');
            exit;
        }

        $model = $this->model('ResourceCategory');

        $data = [
            'category_code'   => trim($_POST['category_code'] ?? ''),
            'category_name'   => trim($_POST['category_name'] ?? ''),
            'category_name_a' => trim($_POST['category_name_a'] ?? ''),
            'description'     => trim($_POST['description'] ?? ''),
            'status'          => trim($_POST['status'] ?? 'Active')
        ];

        if ($data['category_name'] === '') {
            FlashHelper::error(__('resource_category_name_required'));
            header('Location: ' . URLROOT . '/ResourceCategories/create');
            exit;
        }

        if ($data['category_code'] === '') {
            FlashHelper::error(__('resource_category_code_required'));
            header('Location: ' . URLROOT . '/ResourceCategories/create');
            exit;
        }

        try {
            $result = $model->create($data);

            if (!empty($result['success'])) {
                FlashHelper::success($result['message']);
                header('Location: ' . URLROOT . '/ResourceCategories');
                exit;
            }

            FlashHelper::error(
                $result['message'] ?? __('resource_category_create_failed')
            );

            header('Location: ' . URLROOT . '/ResourceCategories/create');
            exit;
        } catch (\PDOException $e) {
            if (
                $e->getCode() === '23000' &&
                isset($e->errorInfo[1]) &&
                (int) $e->errorInfo[1] === 1062
            ) {
                $errorMessage = $e->getMessage();

                if (strpos($errorMessage, 'uq_resource_categories_name_a') !== false) {
                    FlashHelper::error(__('resource_category_name_a_duplicate'));
                } elseif (strpos($errorMessage, 'category_code') !== false) {
                    FlashHelper::error(__('resource_category_code_duplicate'));
                } elseif (strpos($errorMessage, 'category_name') !== false) {
                    FlashHelper::error(__('resource_category_name_duplicate'));
                } else {
                    FlashHelper::error(__('resource_category_duplicate_or_constraint_error'));
                }

                header('Location: ' . URLROOT . '/ResourceCategories/create');
                exit;
            }

            error_log('Resource category creation failed: ' . $e->getMessage());

            FlashHelper::error(__('resource_category_create_failed'));
            header('Location: ' . URLROOT . '/ResourceCategories/create');
            exit;
        }
    }


    /**
     * EDIT PAGE
     */
    public function edit($id)
    {

        AuthHelper::can('resource_categories.edit');

        $model = $this->model('ResourceCategory');

        $data = [

            'category' => $model->getById($id)

        ];

        $this->view(
            'resource-categories/edit',
            $data
        );
    }

    /**
     * UPDATE CATEGORY
     */

public function update($id)
{
    AuthHelper::can('resource_categories.edit');

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: ' . URLROOT . '/ResourceCategories');
        exit;
    }

    $model = $this->model('ResourceCategory');

    $category = $model->getById($id);

    if (!$category) {
        FlashHelper::error(__('resource_category_not_found'));
        header('Location: ' . URLROOT . '/ResourceCategories');
        exit;
    }

    $data = [
        'category_code'   => trim($_POST['category_code'] ?? ''),
        'category_name'   => trim($_POST['category_name'] ?? ''),
        'category_name_a' => trim($_POST['category_name_a'] ?? ''),
        'description'     => trim($_POST['description'] ?? ''),
        'status'          => trim($_POST['status'] ?? 'Active')
    ];

    if ($data['category_name'] === '') {
        FlashHelper::error(__('resource_category_name_required'));
        header('Location: ' . URLROOT . '/ResourceCategories/edit/' . (int) $id);
        exit;
    }

    if ($data['category_code'] === '') {
        FlashHelper::error(__('resource_category_code_required'));
        header('Location: ' . URLROOT . '/ResourceCategories/edit/' . (int) $id);
        exit;
    }

    try {
        $result = $model->update($id, $data);

        if (!empty($result['success'])) {
            FlashHelper::success($result['message']);
            header('Location: ' . URLROOT . '/ResourceCategories');
            exit;
        }

        FlashHelper::error(
            $result['message'] ?? __('resource_category_update_failed')
        );

        header('Location: ' . URLROOT . '/ResourceCategories/edit/' . (int) $id);
        exit;

    } catch (\PDOException $e) {
        if (
            $e->getCode() === '23000' &&
            isset($e->errorInfo[1]) &&
            (int) $e->errorInfo[1] === 1062
        ) {
            $errorMessage = $e->getMessage();

            if (strpos($errorMessage, 'uq_resource_categories_name_a') !== false) {
                FlashHelper::error(__('resource_category_name_a_duplicate'));
            } elseif (strpos($errorMessage, 'category_code') !== false) {
                FlashHelper::error(__('resource_category_code_duplicate'));
            } elseif (strpos($errorMessage, 'category_name') !== false) {
                FlashHelper::error(__('resource_category_name_duplicate'));
            } else {
                error_log('Resource category duplicate update: ' . $errorMessage);
                FlashHelper::error(
                    __('resource_category_duplicate_or_constraint_error')
                );
            }

            header('Location: ' . URLROOT . '/ResourceCategories/edit/' . (int) $id);
            exit;
        }

        error_log('Resource category update failed: ' . $e->getMessage());

        FlashHelper::error(__('resource_category_update_failed'));
        header('Location: ' . URLROOT . '/ResourceCategories/edit/' . (int) $id);
        exit;
    }
}


    /**
     * DELETE CATEGORY
     */
    public function delete($id)
    {
        AuthHelper::can('resource_categories.delete');

        $model = $this->model('ResourceCategory');

        $result = $model->delete($id);

        if (!$result['success']) {

            FlashHelper::error($result['message']);

            header(
                'Location: ' . URLROOT . '/ResourceCategories'
            );

            exit;
        }

        $_SESSION['success'] = $result['message'];

        header(
            'Location: ' . URLROOT . '/ResourceCategories'
        );

        exit;
    }
}

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

    /**
     * STORE CATEGORY
     */
    public function store()
    {
        AuthHelper::can('resource_categories.create');

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            header(
                'Location: ' . URLROOT . '/ResourceCategories'
            );

            exit;

        }

        $model = $this->model('ResourceCategory');

        $data = [

            'category_code'   => trim($_POST['category_code']),

            'category_name'   => trim($_POST['category_name']),

            'category_name_a' => trim($_POST['category_name_a']),

            'description'     => trim($_POST['description']),

            'status'          => $_POST['status']

        ];

        $model->create($data);

        header(
            'Location: ' . URLROOT . '/ResourceCategories'
        );

        exit;

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

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            header(
                'Location: ' . URLROOT . '/ResourceCategories'
            );

            exit;

        }

        $model = $this->model('ResourceCategory');

        $data = [

            'category_code'   => trim($_POST['category_code']),

            'category_name'   => trim($_POST['category_name']),

            'category_name_a' => trim($_POST['category_name_a']),

            'description'     => trim($_POST['description']),

            'status'          => $_POST['status']

        ];

        $model->update($id,$data);



        header(
            'Location: ' . URLROOT . '/ResourceCategories'
        );

        exit;

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
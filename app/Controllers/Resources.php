<?php

class Resources extends Controller
{


    /**
     * LIST RESOURCES
     */
    public function index()
    {

     AuthHelper::can('resources.view');


        $model = $this->model('Resource');


        $data = [

            'resources' => $model->getAll()

        ];


        $this->view(
            'resources/index',
            $data
        );

    }





    /**
     * CREATE PAGE
     */
    public function create()
    {

      AuthHelper::can('resources.create');


        $categoryModel = $this->model('ResourceCategory');

        $unitModel = $this->model('UnitModel');



        $data = [

            'categories' => $categoryModel->getAll(),

            'units'      => $unitModel->getAll()

        ];



        $this->view(
            'resources/create',
            $data
        );

    }


    /**
     * STORE RESOURCE
     */
    public function store()
    {

    AuthHelper::can('resources.create');


        if ($_SERVER['REQUEST_METHOD'] != 'POST') {


            header(
                'Location: ' . URLROOT . '/Resources'
            );

            exit;

        }

        $model = $this->model('Resource');

        $data = [

            'resource_code' => trim($_POST['resource_code']),

            'resource_name' => trim($_POST['resource_name']),

            'resource_name_a' => trim($_POST['resource_name_a']),


            'category_id' => $_POST['category_id'],


            'resource_type' => $_POST['resource_type'],


            'unit_id' => $_POST['unit_id'],


            'description' => trim($_POST['description']),


            'status' => $_POST['status']

        ];



        $model->create($data);



        header(
            'Location: ' . URLROOT . '/Resources'
        );

        exit;

    }

    /**
     * EDIT PAGE
     */
    public function edit($id)
    {

       AuthHelper::can('resources.edit');

        $model = $this->model('ResourceModel');

        $categoryModel = $this->model('ResourceCategory');

        $unitModel = $this->model('UnitModel');

        $data = [

            'resource' => $model->getById($id),

            'categories' => $categoryModel->getAll(),

            'units' => $unitModel->getAll()

        ];

        $this->view(
            'resources/edit',
            $data
        );

    }

    /**
     * UPDATE RESOURCE
     */
    public function update($id)
    {

 AuthHelper::can('resources.edit');

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            header(
                'Location: ' . URLROOT . '/Resources'
            );

            exit;

        }

        $model = $this->model('ResourceModel');

        $data = [

            'resource_code' => trim($_POST['resource_code']),

            'resource_name' => trim($_POST['resource_name']),

            'resource_name_a' => trim($_POST['resource_name_a']),

            'category_id' => $_POST['category_id'],

            'resource_type' => $_POST['resource_type'],

            'unit_id' => $_POST['unit_id'],

            'description' => trim($_POST['description']),
            'status' => $_POST['status']

        ];

        $model->update($id,$data);

        header(
            'Location: ' . URLROOT . '/Resources'
        );

        exit;

    }
/**
 * DELETE RESOURCE
 */
public function delete($id)
{
    AuthHelper::can('resources.delete');

    $model = $this->model('ResourceModel');

    $result = $model->delete($id);

    if (!$result['success']) {

      FlashHelper::error($result['message']);

        header(
            'Location: ' . URLROOT . '/Resources'
        );

        exit;
    }

    $_SESSION['success'] = $result['message'];

    header(
        'Location: ' . URLROOT . '/Resources'
    );

    exit;
}


}
<?php

class Units extends Controller
{

    /**
     * LIST
     */
    public function index()
    {

        AuthHelper::can('units.view');

        $model = $this->model('UnitModel');

        $data = [

            'units' => $model->getAll()

        ];

        $this->view('units/index', $data);

    }



    /**
     * CREATE PAGE
     */
    public function create()
    {

    AuthHelper::can('units.create');

        $this->view('units/create');

    }



    /**
     * STORE
     */
    public function store()
    {

        AuthHelper::can('units.create');

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            header('Location: ' . URLROOT . '/Units');
            exit;

        }

        $model = $this->model('UnitModel');

        $data = [

            'unit_code'   => trim($_POST['unit_code']),
            'unit_name'   => trim($_POST['unit_name']),
            'unit_name_a' => trim($_POST['unit_name_a']),
            'description' => trim($_POST['description']),
            'status'      => $_POST['status']

        ];

        $model->create($data);

        header('Location: ' . URLROOT . '/Units');
        exit;

    }



    /**
     * EDIT PAGE
     */
    public function edit($id)
    {

        AuthHelper::can('units.edit');

        $model = $this->model('UnitModel');

        $data = [

            'unit' => $model->getById($id)

        ];

        $this->view('units/edit', $data);

    }



    /**
     * UPDATE
     */
    public function update($id)
    {

       AuthHelper::can('units.edit');

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            header('Location: ' . URLROOT . '/Units');
            exit;

        }

        $model = $this->model('UnitModel');

        $data = [

            'unit_code'   => trim($_POST['unit_code']),
            'unit_name'   => trim($_POST['unit_name']),
            'unit_name_a' => trim($_POST['unit_name_a']),
            'description' => trim($_POST['description']),
            'status'      => $_POST['status']

        ];

        $model->update($id, $data);

        header('Location: ' . URLROOT . '/Units');
        exit;

    }



  /**
 * DELETE
 */
public function delete($id)
{
   AuthHelper::can('units.delete');

    $model = $this->model('Unit');

    $result = $model->delete($id);

    if (!$result['success']) {

      FlashHelper::error($result['message']);

        header('Location: ' . URLROOT . '/Units');
        exit;
    }

    $_SESSION['success'] = $result['message'];

    header('Location: ' . URLROOT . '/Units');
    exit;
}

}
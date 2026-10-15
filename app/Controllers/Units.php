<?php

class Units extends Controller
{

    /**
     * LIST
     */
    public function index()
    {

        AuthHelper::can('units.view');

        $model = $this->model('Unit');

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

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: ' . URLROOT . '/Units');
        exit;
    }

    $model = $this->model('Unit');

    $data = [
        'unit_code'  => trim($_POST['unit_code'] ?? ''),
        'unit_name'  => trim($_POST['unit_name'] ?? ''),
        'unit_name_a' => trim($_POST['unit_name_a'] ?? ''),
        'description' => trim($_POST['description'] ?? ''),
        'status' => $_POST['status'] ?? 'ACTIVE'
    ];

    $result = $model->create($data);

    if (!$result['success']) {
        FlashHelper::error($result['message']);
        header('Location: ' . URLROOT . '/Units/create');
        exit;
    }

    FlashHelper::success($result['message']);
    header('Location: ' . URLROOT . '/Units');
    exit;
}



    /**
     * EDIT PAGE
     */
    
public function edit($id)
{
    AuthHelper::can('units.edit');

    $model = $this->model('Unit');
    $unit = $model->getById((int) $id);

    if (!$unit) {
        FlashHelper::error(__('unit_not_found'));
        header('Location: ' . URLROOT . '/Units');
        exit;
    }

    $this->view('units/edit', ['unit' => $unit]);
}


/**
 * UPDATE
 */

public function update($id)
{
    AuthHelper::can('units.edit');

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: ' . URLROOT . '/Units');
        exit;
    }

    $id = (int) $id;
    $model = $this->model('Unit');

    $unit = $model->getById($id);

    if (!$unit) {
        FlashHelper::error(__('unit_not_found'));
        header('Location: ' . URLROOT . '/Units');
        exit;
    }

    $data = [
        'unit_code'   => trim($_POST['unit_code'] ?? ''),
        'unit_name'   => trim($_POST['unit_name'] ?? ''),
        'unit_name_a' => trim($_POST['unit_name_a'] ?? ''),
        'description' => trim($_POST['description'] ?? ''),
        'status'      => $_POST['status'] ?? 'ACTIVE'
    ];

    $result = $model->update($id, $data);

    if (!$result['success']) {
        FlashHelper::error($result['message']);
        header('Location: ' . URLROOT . '/Units/edit/' . $id);
        exit;
    }

    FlashHelper::success($result['message']);
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

    FlashHelper::success($result['message']);

    header('Location: ' . URLROOT . '/Units');
    exit;
}

}
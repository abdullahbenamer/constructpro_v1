<?php

class ResourceRequisitions extends Controller
{
    /*
    |-------------------------
    | List
    |------------------------
    */
    public function index()
    {
        AuthHelper::can('projects.view');

        $model = $this->model('ResourceRequisition');

        $data['requisitions'] = $model->getAll();

        $this->view('resource-requisitions/index', $data);
    }

    /*
    |----------------------------------------------
    | Create
    |-----------------------------------------
    */
    public function create()
    {
        AuthHelper::can('projects.create');

        $model = $this->model('ResourceRequisition');
        $projectModel = $this->model('Project');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $model->create([

                'req_number'     => $model->nextNumber(),
                'project_id'     => $_POST['project_id'],
                'request_date'   => $_POST['request_date'],
                'required_date'  => $_POST['required_date'],
                'priority'       => $_POST['priority'],
                'remarks'        => trim($_POST['remarks'])

            ]);

            header('Location: ' . URLROOT . '/resourcerequisitions/details/' . $id);
            exit;
        }

        $data['projects'] = $projectModel->getAll();

        $data['next_number'] = $model->nextNumber();

        $this->view('resource-requisitions/create', $data);
    }

    /*
    |------------------------------------------------------
    | Edit
    |--------------------------------------------------
    */
    public function edit($id)
    {
        AuthHelper::can('projects.create');

        $model = $this->model('ResourceRequisition');
        $projectModel = $this->model('Project');

        $requisition = $model->getById($id);

        if (!$requisition) {

            header('Location: ' . URLROOT . '/resourcerequisitions');
            exit;
        }

        // Only Draft can be edited
        if ($requisition->status !== 'DRAFT') {

            $_SESSION['error'] = 'Only Draft requisitions can be edited.';

            header('Location: ' . URLROOT . '/resourcerequisitions/details/' . $id);
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $model->update($id, [

                'project_id'     => $_POST['project_id'],
                'request_date'   => $_POST['request_date'],
                'required_date'  => $_POST['required_date'],
                'priority'       => $_POST['priority'],
                'remarks'        => trim($_POST['remarks'])

            ]);

            header('Location: ' . URLROOT . '/resourcerequisitions/details/' . $id);
            exit;
        }

        $data['requisition'] = $requisition;

        $data['projects'] = $projectModel->getAll();

        $this->view('resource-requisitions/edit', $data);
    }


    public function update($id)
{
    AuthHelper::can('projects.create');

    $model = $this->model('ResourceRequisition');

    $requisition = $model->getById($id);

    if (!$requisition) {

        header('Location: ' . URLROOT . '/ResourceRequisitions');
        exit;
    }

    if ($requisition->status != 'DRAFT') {

        $_SESSION['error'] = 'Only Draft requisitions can be edited.';

        header('Location: ' . URLROOT . '/ResourceRequisitions/details/' . $id);
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $model->update($id, [

            'project_id'    => $_POST['project_id'],
            'request_date'  => $_POST['request_date'],
            'required_date' => $_POST['required_date'],
            'priority'      => $_POST['priority'],
            'remarks'       => trim($_POST['remarks'])

        ]);

    }

    header('Location: ' . URLROOT . '/ResourceRequisitions/details/' . $id);
    exit;
}

    /*
    |-----------------------------------
    | Details
    |-----------------------------
    */
 public function details($id)
{
    AuthHelper::can('projects.view');

    $model = $this->model('ResourceRequisition');
    $itemModel = $this->model('ResourceRequisitionItem');

    $requisition = $model->getById($id);

    if (!$requisition) {

        header('Location: ' . URLROOT . '/resourcerequisitions');
        exit;
    }

    $items = $itemModel->getByRequisition($id);
    $history = $model->getApprovalHistory($id);

    $data = [
    'requisition' => $requisition,
    'items'       => $items,
    'history'     => $history
];

    $this->view('resource-requisitions/details', $data);
}


/**
 * SUBMIT REQUISITION
 */

public function submit($id)
{

    AuthHelper::can('projects.view');

    $model = $this->model('ResourceRequisition');

    $requisition = $model->getById($id);

    if (!$requisition) {

        header('Location: ' . URLROOT . '/ResourceRequisitions');
        exit;

    }

    // Only Draft documents may be submitted
    if ($requisition->status != 'DRAFT') {

        header(
            'Location: ' .
            URLROOT .
            '/ResourceRequisitions/details/' .
            $id
        );

        exit;

    }

    // Prevent empty requisitions from submitting
    $itemModel = $this->model('ResourceRequisitionItem');

    $items = $itemModel->getByRequisition($id);

    if (count($items) == 0) {

        $_SESSION['error'] =
            'Please add at least one item before submitting.';

        header(
            'Location: ' .
            URLROOT .
            '/ResourceRequisitions/details/' .
            $id
        );

        exit;

    }

  $model->submit(
    $id,
    $_SESSION['user_id']
);

    $_SESSION['success'] =
        'Resource Requisition submitted successfully.';

    header(
        'Location: ' .
        URLROOT .
        '/ResourceRequisitions/details/' .
        $id
    );

    exit;

}
    /*
    |----------------------------------------
    | Delete
    |---------------------------------------
    */
    public function delete($id)
    {
        AuthHelper::can('projects.delete');

        $model = $this->model('ResourceRequisition');

        $requisition = $model->getById($id);

        if (!$requisition) {

            header('Location: ' . URLROOT . '/resourcerequisitions');
            exit;
        }

        // Protect submitted documents
        if ($requisition->status !== 'DRAFT') {

            $_SESSION['error'] = 'Only Draft requisitions can be deleted.';

            header('Location: ' . URLROOT . '/resourcerequisitions/details/' . $id);
            exit;
        }

        $model->delete($id);

        header('Location: ' . URLROOT . '/resourcerequisitions');
        exit;
    }

public function approve($id)
{
    AuthHelper::can('resource_requisitions.approve');

    $model = $this->model('ResourceRequisition');

    $requisition = $model->getById($id);

    if (!$requisition) {

        header(
            'Location: ' . URLROOT . '/ResourceRequisitions'
        );

        exit;
    }

    if ($requisition->status !== 'SUBMITTED') {

        $_SESSION['error'] =
            'Only submitted requisitions can be approved or rejected.';

        header(
            'Location: ' .
            URLROOT .
            '/ResourceRequisitions/details/' .
            $id
        );

        exit;
    }

    $data = [
        'requisition' => $requisition
    ];

    $this->view(
        'resource-requisitions/approve',
        $data
    );
}

public function reject($id)
{
    AuthHelper::can('resource_requisitions.approve');

    $model = $this->model('ResourceRequisition');

    $model->reject(
        $id,
        $_SESSION['user_id']
    );


    $_SESSION['success'] =
        'Requisition rejected.';


    header(
        'Location: ' .
        URLROOT .
        '/ResourceRequisitions/details/' .
        $id
    );

    exit;
}

/**
 * PROCESS APPROVAL DECISION
 */
public function processApproval($id)
{
    AuthHelper::can('resource_requisitions.approve');

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

        header(
            'Location: ' .
            URLROOT .
            '/ResourceRequisitions/details/' .
            $id
        );

        exit;
    }

    $model = $this->model('ResourceRequisition');

    $requisition = $model->getById($id);

    if (!$requisition) {

        header(
            'Location: ' .
            URLROOT .
            '/ResourceRequisitions'
        );

        exit;
    }

    /*
    |--------------------------------------------------------------------------
    | VALIDATE STATUS
    |--------------------------------------------------------------------------
    */

    if ($requisition->status !== 'SUBMITTED') {

        $_SESSION['error'] =
            'Only submitted requisitions can be approved or rejected.';

        header(
            'Location: ' .
            URLROOT .
            '/ResourceRequisitions/details/' .
            $id
        );

        exit;
    }

    /*
    |--------------------------------------------------------------------------
    | VALIDATE ACTION
    |--------------------------------------------------------------------------
    */

    $action = $_POST['action'] ?? '';

    if (!in_array($action, ['APPROVE', 'REJECT'])) {

        $_SESSION['error'] =
            'Invalid approval action.';

        header(
            'Location: ' .
            URLROOT .
            '/ResourceRequisitions/approve/' .
            $id
        );

        exit;
    }

    /*
    |--------------------------------------------------------------------------
    | REMARKS
    |--------------------------------------------------------------------------
    */

    $remarks = trim($_POST['remarks'] ?? '');

    /*
    |--------------------------------------------------------------------------
    | PROCESS DECISION
    |--------------------------------------------------------------------------
    */

    if ($action === 'APPROVE') {

        $model->approve(
            $id,
            $_SESSION['user_id'],
            $remarks
        );

        $_SESSION['success'] =
            'Resource requisition approved successfully.';

    } else {

        $model->reject(
            $id,
            $_SESSION['user_id'],
            $remarks
        );

        $_SESSION['success'] =
            'Resource requisition rejected.';

    }

    /*
    |--------------------------------------------------------------------------
    | REDIRECT
    |--------------------------------------------------------------------------
    */

    header(
        'Location: ' .
        URLROOT .
        '/ResourceRequisitions/details/' .
        $id
    );

    exit;
}

}

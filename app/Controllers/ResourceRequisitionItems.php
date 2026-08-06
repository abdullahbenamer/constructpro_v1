<?php

class ResourceRequisitionItems extends Controller
{

    private $itemModel;


    public function __construct()
    {
        $this->itemModel = $this->model('ResourceRequisitionItem');
    }

    /**
     * Ensure the parent requisition is still editable
     */
    private function validateDraftRequisition($requisition_id)
    {
        $reqModel = $this->model('ResourceRequisition');

        $requisition = $reqModel->getById($requisition_id);

        if (!$requisition || $requisition->status != 'DRAFT') {

            header(
                'Location: ' .
                    URLROOT .
                    '/ResourceRequisitions/details/' .
                    $requisition_id
            );

            exit;
        }

        return $requisition;
    }

    /**
     * CREATE ITEM PAGE
     */
    public function create($requisition_id)
    {
        AuthHelper::can('projects.view');

        $this->validateDraftRequisition($requisition_id);

        $resourceModel = $this->model('Resource');
        $inventoryModel = $this->model('Inventory');

        $data = [

            'requisition_id' => $requisition_id,

            'resources' => $resourceModel->getNonMaterialResources(),

            'inventory' => $inventoryModel->getAll()

        ];

        $this->view('resource-requisition-items/create', $data);
    }

    /**
     * STORE ITEM
     */
public function store()
{
    AuthHelper::can('projects.view');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $this->validateDraftRequisition($_POST['requisition_id']);

        $data = [

            'requisition_id' => $_POST['requisition_id'],

            'resource_source' => $_POST['resource_source'],

            'resource_id'     => $_POST['resource_id'],

            'description'     => $_POST['description'],

            'quantity'        => $_POST['quantity'],

            'uom'             => $_POST['uom'],

            'remarks'         => $_POST['remarks']

        ];

        $itemModel = $this->model('ResourceRequisitionItem');

        if ($itemModel->create($data)) {

            header(
                'Location: ' .
                URLROOT .
                '/ResourceRequisitions/details/' .
                $data['requisition_id']
            );

            exit;
        }
    }
}

    public function edit($id)
    {

        AuthHelper::can('projects.view');


        $item = $this->itemModel->getById($id);


        if (!$item) {

            header(
                'Location: ' .
                    URLROOT .
                    '/ResourceRequisitions'
            );

            exit;
        }


        $this->validateDraftRequisition(
            $item->requisition_id
        );



        $resourceModel = $this->model('Resource');


        $data = [

            'item' => $item,

            'resources' => $resourceModel->getAll()

        ];



        $this->view(
            'resource-requisition-items/edit',
            $data
        );
    }

    /**
     * Update Item
     */
    public function update($id)
    {

        AuthHelper::can('projects.view');


        if ($_SERVER['REQUEST_METHOD'] != 'POST') {

            header(
                'Location: ' .
                    URLROOT .
                    '/ResourceRequisitions'
            );

            exit;
        }



        $item = $this->itemModel->getById($id);



        if (!$item) {

            header(
                'Location: ' .
                    URLROOT .
                    '/ResourceRequisitions'
            );

            exit;
        }



        $this->validateDraftRequisition(
            $item->requisition_id
        );



        $data = [

            'resource_id' => $_POST['resource_id'],

            'description' => $_POST['description'],

            'quantity' => $_POST['quantity'],

            'uom' => $_POST['uom'],

            'remarks' => $_POST['remarks']

        ];



        $this->itemModel->update(
            $id,
            $data
        );



        header(
            'Location: ' .
                URLROOT .
                '/ResourceRequisitions/details/' .
                $item->requisition_id
        );

        exit;
    }

    /**
     * Delete Item
     */
    /**
     * Delete Item
     */
    public function delete($id)
    {

        AuthHelper::can('projects.view');


        $item = $this->itemModel->getById($id);


        if (!$item) {

            header(
                'Location: ' .
                    URLROOT .
                    '/ResourceRequisitions'
            );

            exit;
        }



        $this->validateDraftRequisition(
            $item->requisition_id
        );



        $this->itemModel->delete($id);



        header(
            'Location: ' .
                URLROOT .
                '/ResourceRequisitions/details/' .
                $item->requisition_id
        );

        exit;
    }
}

<?php

class ResourceRequisitionFulfillments extends Controller
{
    private $fulfillmentModel;


    public function __construct()
    {
        $this->fulfillmentModel =
            $this->model(
                'ResourceRequisitionFulfillment'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | AJAX: GET AVAILABLE STOCK
    |--------------------------------------------------------------------------
    */
    public function getStockAvailability()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            header('Content-Type: application/json');

            echo json_encode([
                'quantity' => 0
            ]);

            exit;
        }


        $inventory_id =
            (int) ($_POST['inventory_id'] ?? 0);


        $location_id =
            (int) ($_POST['location_id'] ?? 0);


        $stock = null;


        if (
            $inventory_id > 0
            &&
            $location_id > 0
        ) {

            $stock =
                $this->fulfillmentModel
                ->getLocationStock(
                    $inventory_id,
                    $location_id
                );
        }


        header('Content-Type: application/json');


        echo json_encode([

            'quantity' =>
            $stock
                ? (float) $stock->quantity
                : 0,

            'inventory_name' =>
            $stock->inventory_name
                ?? null,

            'sku' =>
            $stock->sku
                ?? null,

            'uom' =>
            $stock->base_unit
                ?? null,

            'location_name' =>
            $stock->location_name
                ?? null

        ]);


        exit;
    }

    /*
    |------------------------------------------------------------------
    | INDEX
    | LIST FULFILLMENTS FOR A REQUISITION
    |------------------------------------------------------------------
    */

    public function index($requisition_id)
    {
        AuthHelper::can('projects.view');


        /*
        |--------------------------------------------------------------
        | GET REQUISITION
        |--------------------------------------------------------------
        */

        $requisition =
            $this->fulfillmentModel
            ->getRequisition($requisition_id);


        if (!$requisition) {

            $_SESSION['error'] =
                'Resource requisition not found.';


            header(
                'Location: ' .
                    URLROOT .
                    '/ResourceRequisitions'
            );

            exit;
        }


        /*
        |--------------------------------------------------------------
        | GET FULFILLMENT HISTORY
        |--------------------------------------------------------------
        */

        $fulfillments =
            $this->fulfillmentModel
            ->getByRequisition($requisition_id);


        $data = [

            'requisition' => $requisition,

            'fulfillments' => $fulfillments

        ];


        $this->view(

            'resource-requisition-fulfillments/index',

            $data

        );
    }


    /*
    |------------------------------------------------------------------
    | CREATE
    |------------------------------------------------------------------
    */

    public function create($requisition_id)
    {
        AuthHelper::can('projects.view');


        /*
        |--------------------------------------------------------------
        | GET REQUISITION
        |--------------------------------------------------------------
        */

        $requisition =
            $this->fulfillmentModel
            ->getRequisition($requisition_id);


        if (!$requisition) {

            $_SESSION['error'] =
                'Resource requisition not found.';


            header(
                'Location: ' .
                    URLROOT .
                    '/ResourceRequisitions'
            );

            exit;
        }


        /*
        |--------------------------------------------------------------
        | ONLY APPROVED / PARTIAL REQUISITIONS
        |--------------------------------------------------------------
        */

        if (

            $requisition->status !== 'APPROVED'

            &&

            $requisition->status !== 'PARTIAL'

        ) {

            $_SESSION['error'] =
                'Only approved or partially fulfilled requisitions can be fulfilled.';


            header(

                'Location: ' .

                    URLROOT .

                    '/ResourceRequisitions/details/' .

                    $requisition_id

            );

            exit;
        }


        /*
        |--------------------------------------------------------------
        | GET FULFILLABLE MATERIAL ITEMS
        |
        | Current model handles INVENTORY items only.
        |--------------------------------------------------------------
        */

        $items =
            $this->fulfillmentModel
            ->getFulfillableItems($requisition_id);


        /*
        |--------------------------------------------------------------
        | CHECK IF THERE ARE REMAINING ITEMS
        |--------------------------------------------------------------
        */

        if (empty($items)) {

            $_SESSION['error'] =
                'There are no remaining material items to fulfill.';


            header(

                'Location: ' .

                    URLROOT .

                    '/ResourceRequisitions/details/' .

                    $requisition_id

            );

            exit;
        }


        /*
        |--------------------------------------------------------------
        | GET INVENTORY LOCATIONS
        |--------------------------------------------------------------
        */

        $items =
            $this->fulfillmentModel
            ->getFulfillableItems(
                $requisition_id
            );

        foreach ($items as $item) {

            $item->locations =
                $this->fulfillmentModel
                ->getItemLocations(
                    $item->resource_id
                );
        }


        /*
        |--------------------------------------------------------------
        | LOAD VIEW
        |--------------------------------------------------------------
        */
        $fulfillment_number = '';

        $data = [

            'requisition' => $requisition,

            'items' => $items,

            'fulfillment_number' => $fulfillment_number

        ];


        $this->view(

            'resource-requisition-fulfillments/create',

            $data

        );
    }


    /*
    |------------------------------------------------------------------
    | STORE
    |------------------------------------------------------------------
    */

    public function store()
    {
        AuthHelper::can('projects.view');


        /*
        |--------------------------------------------------------------
        | ONLY POST
        |--------------------------------------------------------------
        */

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

            header(

                'Location: ' .

                    URLROOT .

                    '/ResourceRequisitions'

            );

            exit;
        }


        /*
        |--------------------------------------------------------------
        | REQUISITION ID
        |--------------------------------------------------------------
        */

        $requisition_id =
            (int) ($_POST['requisition_id'] ?? 0);


        if ($requisition_id <= 0) {

            $_SESSION['error'] =
                'Invalid requisition.';


            header(

                'Location: ' .

                    URLROOT .

                    '/ResourceRequisitions'

            );

            exit;
        }


        /*
        |--------------------------------------------------------------
        | GET REQUISITION
        |--------------------------------------------------------------
        */

        $requisition =
            $this->fulfillmentModel
            ->getRequisition($requisition_id);


        if (!$requisition) {

            $_SESSION['error'] =
                'Resource requisition not found.';


            header(

                'Location: ' .

                    URLROOT .

                    '/ResourceRequisitions'

            );

            exit;
        }


        /*
        |--------------------------------------------------------------
        | VALIDATE STATUS
        |--------------------------------------------------------------
        */

        if (

            $requisition->status !== 'APPROVED'

            &&

            $requisition->status !== 'PARTIAL'

        ) {

            $_SESSION['error'] =
                'This requisition is not available for fulfillment.';


            header(

                'Location: ' .

                    URLROOT .

                    '/ResourceRequisitions/details/' .

                    $requisition_id

            );

            exit;
        }


        /*
        |--------------------------------------------------------------
        | GET POSTED ITEMS
        |
        | Expected structure:
        |
        | items[REQUISITION_ITEM_ID][quantity]
        | items[REQUISITION_ITEM_ID][location_id]
        |
        |--------------------------------------------------------------
        */

        $postedItems =
            $_POST['items'] ?? [];


        if (empty($postedItems)) {

            $_SESSION['error'] =
                'Please enter at least one fulfillment quantity.';


            header(

                'Location: ' .

                    URLROOT .

                    '/ResourceRequisitionFulfillments/create/' .

                    $requisition_id

            );

            exit;
        }


        /*
        |--------------------------------------------------------------
        | PREPARE ITEMS
        |--------------------------------------------------------------
        */

        $items = [];


        foreach ($postedItems as $item_id => $item) {

            $quantity =
                (float) ($item['quantity'] ?? 0);


            /*
            |----------------------------------------------------------
            | SKIP ZERO QUANTITY
            |----------------------------------------------------------
            */

            if ($quantity <= 0) {

                continue;
            }


            /*
            |----------------------------------------------------------
            | LOCATION REQUIRED FOR INVENTORY MATERIAL
            |----------------------------------------------------------
            */

            $location_id =
                (int) ($item['location_id'] ?? 0);


            if ($location_id <= 0) {

                $_SESSION['error'] =
                    'Please select an inventory location for every fulfilled item.';


                header(

                    'Location: ' .

                        URLROOT .

                        '/ResourceRequisitionFulfillments/create/' .

                        $requisition_id

                );

                exit;
            }


            $items[] = [

                'requisition_item_id' =>

                (int) $item_id,

                'quantity' =>

                $quantity,

                'location_id' =>

                $location_id

            ];
        }


        /*
        |--------------------------------------------------------------
        | NOTHING TO FULFILL
        |--------------------------------------------------------------
        */

        if (empty($items)) {

            $_SESSION['error'] =
                'Please enter a quantity greater than zero.';


            header(

                'Location: ' .

                    URLROOT .

                    '/ResourceRequisitionFulfillments/create/' .

                    $requisition_id

            );

            exit;
        }

        // Before building or submitting $data, generate 'fulfillment_no':

        $fulfillment_no =
            'RR-FUL-' .
            date('YmdHis') .
            '-' .
            random_int(100, 999);

        /*
        |--------------------------------------------------------------
        | PREPARE FULFILLMENT DATA
        |--------------------------------------------------------------
        */

        $data = [

    'requisition_id' =>
        $requisition_id,

    'fulfillment_no' =>
        $fulfillment_no,

    'fulfillment_date' =>
        $_POST['fulfillment_date']
        ?? date('Y-m-d H:i:s'),

    'fulfilled_by' =>
        $_SESSION['user_id'],

    'remarks' =>
        trim($_POST['remarks'] ?? ''),

    'items' =>
        $items

];

        /*
        |--------------------------------------------------------------
        | CREATE FULFILLMENT
        |
        | MODEL MUST HANDLE EVERYTHING INSIDE A TRANSACTION
        |--------------------------------------------------------------
        */
        try {

            $fulfillment_id =
                $this->fulfillmentModel
                ->createFulfillment($data);


            if (
                empty($fulfillment_id)
                ||
                (int) $fulfillment_id <= 0
            ) {

                throw new Exception(
                    'Fulfillment was created but no fulfillment ID was returned.'
                );
            }


            $_SESSION['success'] =
                'Resource requisition fulfilled successfully.';


            header(
                'Location: ' .
                    URLROOT .
                    '/ResourceRequisitionFulfillments/details/' .
                    (int) $fulfillment_id
            );

            exit;
        } catch (Throwable $e) {

            $_SESSION['error'] =
                $e->getMessage();


            header(
                'Location: ' .
                    URLROOT .
                    '/ResourceRequisitionFulfillments/create/' .
                    $requisition_id
            );

            exit;
        }
    }


    /*
    |------------------------------------------------------------------
    | DETAILS
    |------------------------------------------------------------------
    */

    public function details($fulfillment_id)
    {
        AuthHelper::can('projects.view');


        /*
        |--------------------------------------------------------------
        | GET FULFILLMENT HEADER
        |--------------------------------------------------------------
        */

        $fulfillment =
            $this->fulfillmentModel
            ->getFulfillmentById($fulfillment_id);


        if (!$fulfillment) {

            $_SESSION['error'] =
                'Fulfillment record not found.';


            header(

                'Location: ' .

                    URLROOT .

                    '/ResourceRequisitions'

            );

            exit;
        }


        /*
        |--------------------------------------------------------------
        | GET FULFILLMENT ITEMS
        |--------------------------------------------------------------
        */

        $items =
            $this->fulfillmentModel
            ->getFulfillmentItems($fulfillment_id);


        $data = [

            'fulfillment' => $fulfillment,

            'items' => $items

        ];


        $this->view(

            'resource-requisition-fulfillments/details',

            $data

        );
    }
}

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
        AuthHelper::can('resource_requisitions.edit');

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
        AuthHelper::can('resource_requisitions.edit');

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header(
                'Location: ' .
                    URLROOT .
                    '/ResourceRequisitions'
            );
            exit;
        }

        $requisitionId = (int)($_POST['requisition_id'] ?? 0);

        $this->validateDraftRequisition($requisitionId);

        $resourceSource = $_POST['resource_source'] ?? '';

        /*
    |-----------------------------------------------------------
    | DETERMINE RESOURCE ID
    |-----------------------------------------------------------
    */

        if ($resourceSource === 'INVENTORY') {

            $resourceId =
                (int)($_POST['inventory_id'] ?? 0);

            if ($resourceId <= 0) {
                FlashHelper::error(__('please_select_material_item'));

                header(
                    'Location: ' .
                        URLROOT .
                        '/ResourceRequisitionItems/create/' .
                        $requisitionId
                );

                exit;
            }
        } elseif ($resourceSource === 'RESOURCE') {

            $resourceId =
                (int)($_POST['non_inventory_resource'] ?? 0);

            if ($resourceId <= 0) {
                FlashHelper::error(__('please_select_resource'));

                header(
                    'Location: ' .
                        URLROOT .
                        '/ResourceRequisitionItems/create/' .
                        $requisitionId
                );

                exit;
            }
        } else {

            FlashHelper::error(__('invalid_resource_source'));

            header(
                'Location: ' .
                    URLROOT .
                    '/ResourceRequisitionItems/create/' .
                    $requisitionId
            );

            exit;
        }


        /*
|--------------------------------------------------------------------------
| VALIDATE QUANTITY
|--------------------------------------------------------------------------
*/
        $quantity = (float)($_POST['quantity'] ?? 0);

        if ($quantity <= 0) {

            FlashHelper::error(
                __('quantity_must_be_greater_than_zero')
            );

            header(
                'Location: ' .
                    URLROOT .
                    '/ResourceRequisitionItems/create/' .
                    $requisitionId
            );

            exit;
        }


        /*
|--------------------------------------------------------------------------
| FRACTION RULE
|--------------------------------------------------------------------------
*/

        if ($resourceSource === 'RESOURCE') {

            /*
    | Non-material resources NEVER allow fractions.
    */

            if (floor($quantity) != $quantity) {

                FlashHelper::error(
                    __('quantity_must_be_whole_number')
                );

                header(
                    'Location: ' .
                        URLROOT .
                        '/ResourceRequisitionItems/create/' .
                        $requisitionId
                );

                exit;
            }
        } elseif ($resourceSource === 'INVENTORY') {

            /*
    | Material:
    | Check inventory.allow_fraction.
    */

            $inventoryModel =
                $this->model('Inventory');

            $inventory =
                $inventoryModel->getById($resourceId);


            if (!$inventory) {

                FlashHelper::error(
                    __('inventory_item_not_found')
                );

                header(
                    'Location: ' .
                        URLROOT .
                        '/ResourceRequisitionItems/create/' .
                        $requisitionId
                );

                exit;
            }


            /*
    | Material does NOT allow fractions.
    */

            if (
                (int)$inventory->allow_fraction !== 1 &&
                floor($quantity) != $quantity
            ) {

                FlashHelper::error(
                    __('fractional_quantity_not_allowed')
                );

                header(
                    'Location: ' .
                        URLROOT .
                        '/ResourceRequisitionItems/create/' .
                        $requisitionId
                );

                exit;
            }
        }


        /*
|--------------------------------------------------------------------------
| COST TYPE validation 
|--------------------------------------------------------------------------
*/

        $costType = $_POST['cost_type'] ?? null;

        /*
|--------------------------------------------------------------------------
| MATERIAL ITEMS ARE ALWAYS MATERIALS
|--------------------------------------------------------------------------
*/

        if ($resourceSource === 'INVENTORY') {

            $costType = 'MATERIALS';
        }

        /*
|--------------------------------------------------------------------------
| NON-MATERIAL ITEMS REQUIRE COST TYPE
|--------------------------------------------------------------------------
*/

        if (
            $resourceSource === 'RESOURCE' &&
            empty($costType)
        ) {

            FlashHelper::error(
                __('please_select_cost_type')
            );

            header(
                'Location: ' .
                    URLROOT .
                    '/ResourceRequisitionItems/create/' .
                    $requisitionId
            );

            exit;
        }

        /*
    |-----------------------------------------------------------
    | CREATE ITEM
    |-----------------------------------------------------------
    */

        /*
|--------------------------------------------------------------------------
| VALIDATE COST TYPE
|--------------------------------------------------------------------------
*/

        $costType = $_POST['cost_type'] ?? null;

        /*
|--------------------------------------------------------------------------
| MATERIAL ITEMS ARE ALWAYS MATERIALS
|--------------------------------------------------------------------------
*/

        if ($resourceSource === 'INVENTORY') {

            $costType = 'MATERIALS';
        }

        /*
|--------------------------------------------------------------------------
| NON-MATERIAL ITEMS REQUIRE COST TYPE
|--------------------------------------------------------------------------
*/

        if (
            $resourceSource === 'RESOURCE' &&
            empty($costType)
        ) {

            FlashHelper::error(
                __('please_select_cost_type')
            );

            header(
                'Location: ' .
                    URLROOT .
                    '/ResourceRequisitionItems/create/' .
                    $requisitionId
            );

            exit;
        }

        $data = [

            'requisition_id' =>
            $requisitionId,

            'resource_source' =>
            $resourceSource,

            'resource_id' =>
            $resourceId,

            'description' =>
            trim($_POST['description'] ?? ''),

            'quantity' =>
            $quantity,

            'uom' =>
            trim($_POST['uom'] ?? ''),

            'remarks' =>
            trim($_POST['remarks'] ?? ''),

            'cost_type' =>
            $costType

        ];

        $itemModel =
            $this->model('ResourceRequisitionItem');

        if ($itemModel->create($data)) {

            FlashHelper::success(
                __('resource_requisition_item_added_successfully')
            );

            header(
                'Location: ' .
                    URLROOT .
                    '/ResourceRequisitions/details/' .
                    $requisitionId
            );

            exit;
        }
        FlashHelper::error(__('unable_to_create_requisition_item'));

        header(
            'Location: ' .
                URLROOT .
                '/ResourceRequisitionItems/create/' .
                $requisitionId
        );

        exit;
    }

    public function edit($id)
    {
        AuthHelper::can('resource_requisitions.edit');

        $item = $this->itemModel->getById($id);

        if (!$item) {

            header(
                'Location: ' .
                    URLROOT .
                    '/ResourceRequisitions'
            );

            exit;
        }

        /*
    |--------------------------------------------------------------------------
    | PARENT REQUISITION MUST STILL BE DRAFT
    |--------------------------------------------------------------------------
    */

        $this->validateDraftRequisition(
            $item->requisition_id
        );


        /*
    |--------------------------------------------------------------------------
    | LOAD BOTH RESOURCE TYPES
    |--------------------------------------------------------------------------
    */

        $resourceModel = $this->model('Resource');
        $inventoryModel = $this->model('Inventory');


        $data = [

            'item' => $item,

            /*
        | Non-material resources
        */
            'resources' =>
            $resourceModel->getNonMaterialResources(),

            /*
        | Material inventory
        */
            'inventory' =>
            $inventoryModel->getAll()

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

        AuthHelper::can('resource_requisitions.edit');


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


        /*
|--------------------------------------------------------------------------
| QUANTITY
|--------------------------------------------------------------------------
*/

        $quantity = (float)($_POST['quantity'] ?? 0);

        if ($quantity <= 0) {

            FlashHelper::error(
                __('quantity_must_be_greater_than_zero')
            );

            header(
                'Location: ' .
                    URLROOT .
                    '/ResourceRequisitionItems/edit/' .
                    $id
            );

            exit;
        }

        /*
|--------------------------------------------------------------------------
| RESOURCE / NON-MATERIAL
| Fractions are never allowed
|--------------------------------------------------------------------------
*/

        if (
            $item->resource_source === 'RESOURCE' &&
            floor($quantity) != $quantity
        ) {

            FlashHelper::error(
                __('quantity_must_be_whole_number')
            );

            header(
                'Location: ' .
                    URLROOT .
                    '/ResourceRequisitionItems/edit/' .
                    $id
            );

            exit;
        }

        /*
|--------------------------------------------------------------------------
| INVENTORY / MATERIAL
| Fractions allowed only when allow_fraction = 1
|--------------------------------------------------------------------------
*/

        if (
            $item->resource_source === 'INVENTORY' &&
            (int)($item->allow_fraction ?? 0) !== 1 &&
            floor($quantity) != $quantity
        ) {

            FlashHelper::error(
                __('fractional_quantity_not_allowed')
            );
            header(
                'Location: ' .
                    URLROOT .
                    '/ResourceRequisitionItems/edit/' .
                    $id
            );

            exit;
        }

        /*
|-----------------------------------------------
| COST TYPE
|-----------------------------------------------
*/

        $costType = $_POST['cost_type'] ?? null;

        /*
|-----------------------------------------------
| MATERIAL ITEMS ARE ALWAYS MATERIALS
|-----------------------------------------------
*/
        if ($item->resource_source === 'INVENTORY') {

            $costType = 'MATERIALS';
        }

        $data = [
            'description' => $_POST['description'],

            'quantity' => $quantity,

            'remarks' => $_POST['remarks'],

            'cost_type' => $costType

        ];

        $result = $this->itemModel->update(
            $id,
            $data
        );

        if ($result) {

            FlashHelper::success(
                __('resource_requisition_item_updated_successfully')
            );
        } else {

            FlashHelper::error(
                __('unable_to_update_resource_requisition_item')
            );
        }

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
    public function delete($id)
    {

        AuthHelper::can('resource_requisitions.edit');


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

        $result = $this->itemModel->delete($id);

        if ($result) {

            FlashHelper::success(
                __('resource_requisition_item_deleted_successfully')
            );
        } else {

            FlashHelper::error(
                __('unable_to_delete_resource_requisition_item')
            );
        }

        header(
            'Location: ' .
                URLROOT .
                '/ResourceRequisitions/details/' .
                $item->requisition_id
        );

        exit;
    }
}

?>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        const quantity = document.getElementById('quantity');

        if (!quantity) {
            return;
        }

        const resourceSource =
            <?= json_encode($data['item']->resource_source) ?>;

        const allowFraction =
            <?= $data['item']->resource_source === 'INVENTORY'
                ? (int)($data['item']->allow_fraction ?? 0)
                : 0 ?>;

        /*
        |--------------------------------------------------------------------------
        | QUANTITY RULE
        |--------------------------------------------------------------------------
        */

        if (
            resourceSource === 'INVENTORY' &&
            allowFraction === 1
        ) {

            quantity.step = '0.01';
            quantity.min = '0.01';

        } else {

            quantity.step = '1';
            quantity.min = '1';
        }


        /*
        |--------------------------------------------------------------------------
        | CLIENT-SIDE VALIDATION
        |--------------------------------------------------------------------------
        */

        const form = quantity.closest('form');

        if (!form) {
            return;
        }

        form.addEventListener('submit', function(event) {

            const value = parseFloat(quantity.value);

            /*
            | Quantity must be greater than zero
            */

            if (
                !Number.isFinite(value) ||
                value <= 0
            ) {

                event.preventDefault();

                alert(
                    <?= json_encode(__('quantity_must_be_greater_than_zero')) ?>
                );

                quantity.focus();

                return;
            }


            /*
            | Whole number required
            */

            if (
                quantity.step === '1' &&
                !Number.isInteger(value)
            ) {

                event.preventDefault();

                alert(
                    <?= json_encode(__('quantity_must_be_whole_number')) ?>
                );

                quantity.focus();

                return;
            }

        });

    });
</script>
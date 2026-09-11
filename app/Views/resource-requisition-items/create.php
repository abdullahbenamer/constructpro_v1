<div class="container-fluid mt-4">

    <!-- PAGE HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>
            <h4 class="mb-0">
                <i class="fas fa-plus-circle"></i>
                <?= __('add_resource_requisition_item') ?>
            </h4>

            <small class="text-muted">
                <?= __('add_new_item_to_requisition') ?>
            </small>
        </div>

        <a href="<?= URLROOT ?>/ResourceRequisitions/details/<?= $data['requisition_id']; ?>"
            class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>
            <?= __('back_to_requisition') ?>

        </a>

    </div>


    <div class="card shadow-sm">

        <div class="card-header">

            <strong>
                <i class="fas fa-box"></i>
                <?= __('item_details') ?>
            </strong>

        </div>


        <div class="card-body">

            <form
                action="<?= URLROOT ?>/ResourceRequisitionItems/store"
                method="POST">

                <!-- REQUISITION -->
                <input
                    type="hidden"
                    name="requisition_id"
                    value="<?= $data['requisition_id']; ?>">

                <input
                    type="hidden"
                    name="resource_source"
                    id="resource_source">

                <input
                    type="hidden"
                    name="inventory_id"
                    id="inventory_id">

                <input
                    type="hidden"
                    name="non_inventory_resource"
                    id="non_inventory_resource">

                <div class="row">

                    <!-- RESOURCE TYPE -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            <?= __('select_resource_type') ?>
                        </label>

                        <select
                            id="resourceType"
                            class="form-select">

                            <option value="INVENTORY">
                                <?= __('material') ?>
                            </option>

                            <option value="RESOURCE">
                                <?= __('non_material') ?>
                            </option>

                        </select>


                        <!-- MATERIAL ITEMS -->
                        <div class="mb-3" id="inventoryBlock">

                            <label class="form-label">
                                <?= __('material_item') ?>
                            </label>

                            <select
                                id="inventorySelect"
                                class="form-select">

                                <option value="">
                                    <?= __('select_material') ?>
                                </option>

                                <?php foreach ($data['inventory'] as $item): ?>

                                    <option
                                        value="<?= (int)$item->id ?>"
                                        data-source="INVENTORY"
                                        data-unit="<?= htmlspecialchars($item->base_unit) ?>"
                                        data-description="<?= htmlspecialchars($item->name) ?>">

                                        <!-- <?//= htmlspecialchars($item->sku) ?> - -->
                                        <?= htmlspecialchars($item->name) ?>

                                        (<?= __('available') ?>:
                                        <?= number_format((float)$item->available_qty, 2) ?>
                                        )

                                    </option>

                                <?php endforeach; ?>

                            </select>

                            <small class="text-danger">
                                <?= __('search_by_sku_or_material_name') ?>
                            </small>

                        </div>


                        <!-- NON MATERIAL ITEMS -->
                        <div class="mb-3" id="resourceBlock">

                            <label class="form-label">
                                <?= __('resource') ?>
                            </label>

                            <select
                                id="resourceSelect"
                                class="form-select">

                                <option value="">
                                    <?= __('select_resource') ?>
                                </option>

                                <?php foreach ($data['resources'] as $resource): ?>

                                    <option
                                        value="<?= (int)$resource->id ?>"
                                        data-source="RESOURCE"
                                        data-unit="<?= htmlspecialchars($resource->unit_name) ?>"
                                        data-description="<?= htmlspecialchars($resource->resource_name) ?>">

                                        <?= htmlspecialchars($resource->resource_code) ?>
                                        -
                                        <?= htmlspecialchars($resource->resource_name) ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                            <small class="text-muted">
                                <?= __('search_by_resource_code_or_name') ?>
                            </small>

                        </div>

                    </div>


                    <!-- DESCRIPTION -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            <?= __('description') ?>
                        </label>

                        <input
                            type="text"
                            name="description"
                            id="description"
                            class="form-control"
                            readonly>

                    </div>

                </div>


                <div class="row">

                    <!-- QUANTITY -->
                    <div class="col-md-2 mb-3">

                        <label class="form-label">
                            <?= __('requested_quantity') ?>
                        </label>

                        <input
                            type="number"
                            class="form-control"
                            name="quantity"
                            step="0.01"
                            min="0.01"
                            value="1"
                            required>

                    </div>


                    <!-- UOM -->
                    <div class="col-md-2 mb-3">

                        <label class="form-label">
                            <?= __('uom') ?>
                        </label>

                        <input
                            type="text"
                            name="uom"
                            id="uom"
                            class="form-control"
                            readonly>

                    </div>

                </div>


                <!-- REMARKS -->
                <div class="mb-3">

                    <label class="form-label">
                        <?= __('remarks') ?>
                    </label>

                    <textarea
                        name="remarks"
                        class="form-control"
                        rows="4"></textarea>

                </div>


                <div class="text-end">

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="fas fa-save"></i>
                        <?= __('save_item') ?>

                    </button>


                    <a
                        href="<?= URLROOT ?>/ResourceRequisitions/details/<?= $data['requisition_id']; ?>"
                        class="btn btn-secondary">

                        <?= __('cancel') ?>

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>


<style>
    /* Select2 search box placeholder */
    .select2-container--open .select2-search__field::placeholder {
        color: #dc3545 !important;
        opacity: 1 !important;
    }

    .select2-container--open .select2-search__field::-webkit-input-placeholder {
        color: #dc3545 !important;
        opacity: 1 !important;
    }

    .select2-container--open .select2-search__field::-moz-placeholder {
        color: #dc3545 !important;
        opacity: 1 !important;
    }

    .select2-container--open .select2-search__field:-ms-input-placeholder {
        color: #dc3545 !important;
        opacity: 1 !important;
    }
</style>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        /*
        |--------------------------------------------------------------------------
        | ELEMENTS
        |--------------------------------------------------------------------------
        */

        const type = document.getElementById('resourceType');

        const inventoryBlock =
            document.getElementById('inventoryBlock');

        const resourceBlock =
            document.getElementById('resourceBlock');

        const inventorySelect =
            document.getElementById('inventorySelect');

        const resourceSelect =
            document.getElementById('resourceSelect');

        const resourceSource =
            document.getElementById('resource_source');

        const inventoryId =
            document.getElementById('inventory_id');

        const nonInventoryResource =
            document.getElementById('non_inventory_resource');

        const description =
            document.getElementById('description');

        const uom =
            document.getElementById('uom');


        /*
        |--------------------------------------------------------------------------
        | SAFETY CHECK
        |--------------------------------------------------------------------------
        */

        if (!type) {
            console.error('resourceType not found.');
            return;
        }

        if (!inventorySelect) {
            console.error('inventorySelect not found.');
            return;
        }

        if (!resourceSelect) {
            console.error('resourceSelect not found.');
            return;
        }


        /*
        |--------------------------------------------------------------------------
        | INITIALIZE SELECT2 IF AVAILABLE
        |--------------------------------------------------------------------------
        */

        if (
            typeof window.jQuery !== 'undefined' &&
            typeof jQuery.fn.select2 === 'function'
        ) {

            $('#inventorySelect').select2({

                width: '100%',

                placeholder: <?= json_encode(__('search_by_sku_or_material_name_placeholder')) ?>,

                allowClear: true,

                minimumResultsForSearch: 0

            });


            $('#resourceSelect').select2({

                width: '100%',

                placeholder: <?= json_encode(__('search_resource_placeholder')) ?>,

                allowClear: true,

                minimumResultsForSearch: 0

            });


            /*
            | Search placeholder - MATERIAL
            */

            $('#inventorySelect').on(
                'select2:open',
                function() {

                    setTimeout(function() {

                        const field =
                            document.querySelector(
                                '.select2-container--open .select2-search__field'
                            );

                        if (field) {

                            field.placeholder =
                                <?= json_encode(__('search_by_sku_or_material_name_dots')) ?>;

                            field.style.color = 'red';

                        }

                    }, 10);

                }
            );


            /*
            | Search placeholder - RESOURCE
            */

            $('#resourceSelect').on(
                'select2:open',
                function() {

                    setTimeout(function() {

                        const field =
                            document.querySelector(
                                '.select2-container--open .select2-search__field'
                            );

                        if (field) {

                            field.placeholder =
                                <?= json_encode(__('search_resource_dots')) ?>;

                            field.style.color = 'red';

                        }

                    }, 10);

                }
            );

        }


        /*
        |--------------------------------------------------------------------------
        | CLEAR DETAILS
        |--------------------------------------------------------------------------
        */

        function clearDetails() {

            description.value = '';

            uom.value = '';

        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE MATERIAL
        |--------------------------------------------------------------------------
        */

        function updateInventory() {

            const selectedId =
                inventorySelect.value;

            resourceSource.value = 'INVENTORY';

            inventoryId.value =
                selectedId || '';

            nonInventoryResource.value = '';

            if (!selectedId) {

                description.value = '';
                uom.value = '';

                return;
            }

            const option =
                inventorySelect.options[
                    inventorySelect.selectedIndex
                ];

            if (!option) {
                return;
            }

            description.value =
                option.getAttribute('data-description') || '';

            uom.value =
                option.getAttribute('data-unit') || '';
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE NON-MATERIAL RESOURCE
        |--------------------------------------------------------------------------
        */

        function updateResource() {

            const selectedId =
                resourceSelect.value;

            resourceSource.value = 'RESOURCE';

            nonInventoryResource.value =
                selectedId || '';

            inventoryId.value = '';

            if (!selectedId) {

                description.value = '';
                uom.value = '';

                return;
            }

            const option =
                resourceSelect.options[
                    resourceSelect.selectedIndex
                ];

            if (!option) {
                return;
            }

            description.value =
                option.getAttribute('data-description') || '';

            uom.value =
                option.getAttribute('data-unit') || '';
        }


        /*
        |--------------------------------------------------------------------------
        | CLEAR MATERIAL
        |--------------------------------------------------------------------------
        */

        function clearInventory() {

            inventorySelect.value = '';

            inventoryId.value = '';

        }


        /*
        |--------------------------------------------------------------------------
        | CLEAR NON-MATERIAL
        |--------------------------------------------------------------------------
        */

        function clearResource() {

            resourceSelect.value = '';

            nonInventoryResource.value = '';

        }


        /*
        |--------------------------------------------------------------------------
        | SHOW MATERIAL
        |--------------------------------------------------------------------------
        */

        function showMaterial() {

            inventoryBlock.hidden = false;

            resourceBlock.hidden = true;

            clearResource();

            resourceSource.value =
                'INVENTORY';

            updateInventory();

        }


        /*
        |--------------------------------------------------------------------------
        | SHOW NON-MATERIAL
        |--------------------------------------------------------------------------
        */

        function showResource() {

            inventoryBlock.hidden = true;

            resourceBlock.hidden = false;

            clearInventory();

            resourceSource.value =
                'RESOURCE';

            updateResource();

        }


        /*
        |--------------------------------------------------------------------------
        | RESOURCE TYPE CHANGE
        |--------------------------------------------------------------------------
        */

        type.addEventListener(
            'change',
            function() {

                if (
                    type.value === 'INVENTORY'
                ) {

                    showMaterial();

                } else {

                    showResource();

                }

            }
        );


        /*
        |--------------------------------------------------------------------------
        | MATERIAL SELECT2 CHANGE
        |--------------------------------------------------------------------------
        */

        $('#inventorySelect').on('change', function() {

            if (type.value === 'INVENTORY') {

                updateInventory();

            }

        });


        /*
        |--------------------------------------------------------------------------
        | NON-MATERIAL SELECT2 CHANGE
        |--------------------------------------------------------------------------
        */

        $('#resourceSelect').on('change', function() {

            if (type.value === 'RESOURCE') {

                updateResource();

            }

        });


        /*
        |--------------------------------------------------------------------------
        | FORM SUBMIT
        |--------------------------------------------------------------------------
        */

        const form =
            inventorySelect.closest('form');


        if (form) {

            form.addEventListener(
                'submit',
                function(event) {

                    /*
                    |--------------------------------------------------------------
                    | MATERIAL
                    |--------------------------------------------------------------
                    */

                    if (
                        type.value === 'INVENTORY'
                    ) {

                        const selectedId =
                            inventorySelect.value;


                        if (!selectedId) {

                            event.preventDefault();

                            alert(
                                <?= json_encode(__('please_select_material_item')) ?>
                            );

                            if (
                                typeof window.jQuery !== 'undefined' &&
                                typeof jQuery.fn.select2 === 'function'
                            ) {

                                $('#inventorySelect')
                                    .select2('open');

                            } else {

                                inventorySelect.focus();

                            }

                            return;

                        }


                        /*
                        | Force correct POST values
                        */

                        resourceSource.value =
                            'INVENTORY';

                        inventoryId.value =
                            selectedId;

                        nonInventoryResource.value =
                            '';

                        updateInventory();

                    }


                    /*
                    |--------------------------------------------------------------
                    | NON-MATERIAL
                    |--------------------------------------------------------------
                    */
                    else {

                        const selectedId =
                            resourceSelect.value;


                        if (!selectedId) {

                            event.preventDefault();

                            alert(
                                <?= json_encode(__('please_select_non_material_resource')) ?>
                            );

                            if (
                                typeof window.jQuery !== 'undefined' &&
                                typeof jQuery.fn.select2 === 'function'
                            ) {

                                $('#resourceSelect')
                                    .select2('open');

                            } else {

                                resourceSelect.focus();

                            }

                            return;

                        }


                        /*
                        | Force correct POST values
                        */

                        resourceSource.value =
                            'RESOURCE';

                        nonInventoryResource.value =
                            selectedId;

                        inventoryId.value =
                            '';

                        updateResource();

                    }

                }
            );

        }

        /*
        |--------------------------------------------------------------------------
        | Resource Type INITIAL STATE
        |--------------------------------------------------------------------------
        */

        if (type.value === 'INVENTORY') {
            showMaterial();
        } else {
            showResource();
        }

    });
</script>
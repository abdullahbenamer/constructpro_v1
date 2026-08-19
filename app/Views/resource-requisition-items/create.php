<div class="container-fluid mt-4">

    <!-- PAGE HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>
            <h4 class="mb-0">
                <i class="fas fa-plus-circle"></i>
                Add Resource Requisition Item
            </h4>

            <small class="text-muted">
                Add a new item to this requisition
            </small>
        </div>

        <a href="<?= URLROOT ?>/ResourceRequisitions/details/<?= $data['requisition_id']; ?>"
            class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>
            Back to Requisition

        </a>

    </div>


    <div class="card shadow-sm">

        <div class="card-header">

            <strong>
                <i class="fas fa-box"></i>
                Item Details
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

                <!-- ACTUAL VALUES STORED IN DATABASE -->
                <input type="hidden" name="resource_source" id="resource_source">

                <input type="hidden" name="inventory_id" id="inventory_id">

                <input type="hidden" name="resource_id" id="resource_id">


                <div class="row">

                    <!-- RESOURCE TYPE -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Select Resource Type
                        </label>

                        <select
                            id="resourceType"
                            class="form-select">

                            <option value="INVENTORY">
                                MATERIAL
                            </option>

                            <option value="RESOURCE">
                                NON MATERIAL
                            </option>

                        </select>


                        <!-- MATERIAL ITEMS -->
                        <div
                            class="mb-3 mt-3"
                            id="inventoryBlock">

                            <label class="form-label">

                                Material Item

                                <span class="text-danger">*</span>

                            </label>


                            <select
                                id="inventorySelect"
                                class="form-select">

                                <option value="">
                                    -- Select Material --
                                </option>


                                <?php foreach ($data['inventory'] as $item): ?>

                                    <option
                                        value="<?= (int)$item->id ?>"
                                        data-source="INVENTORY"
                                        data-unit="<?= htmlspecialchars($item->base_unit ?? '') ?>"
                                        data-description="<?= htmlspecialchars($item->name ?? '') ?>">

                                        <?= htmlspecialchars($item->sku ?? '') ?>
                                        -
                                        <?= htmlspecialchars($item->name ?? '') ?>

                                        (Available:
                                        <?= number_format((float)($item->available_qty ?? 0), 2) ?>
                                        )

                                    </option>

                                <?php endforeach; ?>

                            </select>


                            <small class="text-danger">

                                Search by SKU or material name.

                            </small>

                        </div>


                        <!-- NON MATERIAL ITEMS -->
                        <div
                            class="mb-3 mt-3"
                            id="resourceBlock">

                            <label class="form-label">

                                Resource

                                <span class="text-danger">*</span>

                            </label>


                            <select
                                id="resourceSelect"
                                class="form-select">

                                <option value="">
                                    -- Select Resource --
                                </option>


                                <?php foreach ($data['resources'] as $resource): ?>

                                    <option
                                        value="<?= (int)$resource->id ?>"
                                        data-source="RESOURCE"
                                        data-unit="<?= htmlspecialchars($resource->unit_name ?? '') ?>"
                                        data-description="<?= htmlspecialchars($resource->resource_name ?? '') ?>">

                                        <?= htmlspecialchars($resource->resource_code ?? '') ?>
                                        -
                                        <?= htmlspecialchars($resource->resource_name ?? '') ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>


                            <small class="text-muted mt-1 d-block">

                                Search by resource code or name.

                            </small>

                        </div>

                    </div>


                    <!-- DESCRIPTION -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            Description
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
                            Requested Quantity
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
                            UOM
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
                        Remarks
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
                        Save Item

                    </button>


                    <a
                        href="<?= URLROOT ?>/ResourceRequisitions/details/<?= $data['requisition_id']; ?>"
                        class="btn btn-secondary">

                        Cancel

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

        const type =
            document.getElementById('resourceType');

        const inventoryBlock =
            document.getElementById('inventoryBlock');

        const resourceBlock =
            document.getElementById('resourceBlock');

        const inventorySelect =
            document.getElementById('inventorySelect');

        const resourceSelect =
            document.getElementById('resourceSelect');

        const hiddenSource =
            document.getElementById('resource_source');

        const description =
            document.getElementById('description');

        const uom =
            document.getElementById('uom');


        /*
        |--------------------------------------------------------------------------
        | INITIALIZE SELECT2
        |--------------------------------------------------------------------------
        */

        /*
        |--------------------------------------------------------------------------
        | INITIALIZE INVENTORY SELECT2
        |--------------------------------------------------------------------------
        */

        $('#inventorySelect').select2({

            width: '100%',

            placeholder: '-- Select Material --',

            allowClear: true,

            minimumResultsForSearch: 0

        });


        /*
        |--------------------------------------------------------------------------
        | INVENTORY SEARCH PLACEHOLDER
        |--------------------------------------------------------------------------
        */

        $('#inventorySelect').on('select2:open', function() {

            setTimeout(function() {

                $('.select2-container--open .select2-search__field')
                    .attr('placeholder', 'Search Material...');

            }, 0);

        });


        /*
        |--------------------------------------------------------------------------
        | INITIALIZE RESOURCE SELECT2
        |--------------------------------------------------------------------------
        */

        $('#resourceSelect').select2({

            width: '100%',

            placeholder: '-- Select Resource --',

            allowClear: true,

            minimumResultsForSearch: 0

        });


        /*
        |--------------------------------------------------------------------------
        | RESOURCE SEARCH PLACEHOLDER
        |--------------------------------------------------------------------------
        */

        $('#resourceSelect').on('select2:open', function() {

            setTimeout(function() {

                $('.select2-container--open .select2-search__field')
                    .attr('placeholder', 'Search Resource...');

            }, 0);

        });


        /*
        |--------------------------------------------------------------------------
        | CLEAR ITEM DETAILS
        |--------------------------------------------------------------------------
        */

        function clearItemDetails() {

            document.getElementById('inventory_id').value = '';

            document.getElementById('resource_id').value = '';

            description.value = '';

            uom.value = '';

        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE INVENTORY
        |--------------------------------------------------------------------------
        */

        function updateInventory() {

            let option =
                inventorySelect.options[
                    inventorySelect.selectedIndex
                ];

            hiddenSource.value = 'INVENTORY';

            document.getElementById('inventory_id').value =
                inventorySelect.value;

            document.getElementById('resource_id').value = '';

            description.value =
                option.dataset.description || '';

            uom.value =
                option.dataset.unit || '';
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE NON-MATERIAL RESOURCE
        |--------------------------------------------------------------------------
        */

        function updateResource() {

            let option =
                resourceSelect.options[
                    resourceSelect.selectedIndex
                ];

            hiddenSource.value = 'RESOURCE';

            document.getElementById('resource_id').value =
                resourceSelect.value;

            document.getElementById('inventory_id').value = '';

            description.value =
                option.dataset.description || '';

            uom.value =
                option.dataset.unit || '';
        }


        /*
        |--------------------------------------------------------------------------
        | RESOURCE TYPE SWITCH
        |--------------------------------------------------------------------------
        */

        function toggleResourceType() {

            if (type.value === 'INVENTORY') {

                /*
                |------------------------------------------------------------------
                | SHOW MATERIAL
                |------------------------------------------------------------------
                */

                inventoryBlock.style.display = '';

                resourceBlock.style.display = 'none';


                hiddenSource.value = 'INVENTORY';


                /*
                | Clear non-material selection
                */

                $('#resourceSelect')
                    .val(null)
                    .trigger('change');


                /*
                | Update current material
                */

                updateInventory();

            } else {

                /*
                |------------------------------------------------------------------
                | SHOW NON-MATERIAL RESOURCE
                |------------------------------------------------------------------
                */

                inventoryBlock.style.display = 'none';

                resourceBlock.style.display = '';


                hiddenSource.value = 'RESOURCE';


                /*
                | Clear material selection
                */

                $('#inventorySelect')
                    .val(null)
                    .trigger('change');


                /*
                | Update current resource
                */

                updateResource();

            }

        }


        /*
        |--------------------------------------------------------------------------
        | EVENTS
        |--------------------------------------------------------------------------
        */

        type.addEventListener(
            'change',
            toggleResourceType
        );


        $('#inventorySelect').on(
            'change',
            updateInventory
        );


        $('#resourceSelect').on(
            'change',
            updateResource
        );


        /*
        |--------------------------------------------------------------------------
        | INITIAL STATE
        |--------------------------------------------------------------------------
        */

        toggleResourceType();

    });
</script>
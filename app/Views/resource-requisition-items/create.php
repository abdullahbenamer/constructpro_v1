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

            <form action="<?= URLROOT ?>/ResourceRequisitionItems/store" method="POST">

                <input type="hidden" name="requisition_id" value="<?= $data['requisition_id']; ?>">
                <input type="hidden" name="resource_source" id="resource_source">
                <input type="hidden" name="resource_id" id="resource_id">


                <div class="row">

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

                        <!-- Material items -->
                        <div class="mb-3" id="inventoryBlock">

                            <label class="form-label">
                                Material Item
                            </label>

                            <select name="inventory_id"
                                id="inventorySelect"
                                class="form-select">

                                <option value="">
                                    -- Select Material --
                                </option>


                                <?php foreach ($data['inventory'] as $item): ?>

                                    <option value="<?= $item->id ?>"
                                        data-source="INVENTORY"
                                        data-unit="<?= $item->base_unit ?>"
                                        data-description="<?= htmlspecialchars($item->name) ?>">

                                        <?= $item->sku ?>
                                        -
                                        <?= $item->name ?>

                                        (Available:
                                        <?= $item->available_qty ?>
                                        )

                                    </option>

                                <?php endforeach; ?>


                            </select>

                        </div>

                        <!-- Non Material items -->
                        <div class="mb-3" id="resourceBlock">

                            <label class="form-label">
                                Resource
                            </label>

                            <select name="non_inventory_resource"
                                id="resourceSelect"
                                class="form-select">

                                <option value="">
                                    -- Select Resource --
                                </option>

                                <?php foreach ($data['resources'] as $resource): ?>

                                    <option value="<?= $resource->id ?>"
                                        data-source="RESOURCE"
                                        data-unit="<?= $resource->unit_name ?>"
                                        data-description="<?= htmlspecialchars($resource->resource_name) ?>">

                                        <?= $resource->resource_code ?>
                                        -
                                        <?= $resource->resource_name ?>

                                    </option>

                                <?php endforeach; ?>

                            </select>

                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Description

                        </label>

                        <input type="text"
                            name="description"
                            id="description"
                            class="form-control"
                            readonly>
                    </div>

                    <div class="col-md-2 mb-3">

                        <label class="form-label">

                            Requested Quantity

                        </label>

                        <input type="number"
                            class="form-control"
                            name="quantity"
                            step="0.01"
                            min="0.01"
                            value="1"
                            required>

                    </div>

                    <div class="col-md-2 mb-3">

                        <label class="form-label">

                            UOM

                        </label>

                        <input type="text"
                            name="uom"
                            id="uom"
                            class="form-control"
                            readonly>

                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Remarks</label>
                    <textarea name="remarks"
                        class="form-control"
                        rows="4"></textarea>
                </div>

                <div class="text-end">

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        Save Item
                    </button>

                    <a href="<?= URLROOT ?>/ResourceRequisitions/details/<?= $data['requisition_id']; ?>"
                        class="btn btn-secondary">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {


        const type = document.getElementById('resourceType');

        const inventoryBlock = document.getElementById('inventoryBlock');
        const resourceBlock = document.getElementById('resourceBlock');

        const inventorySelect = document.getElementById('inventorySelect');
        const resourceSelect = document.getElementById('resourceSelect');

        const hiddenSource = document.getElementById('resource_source');
        const hiddenId = document.getElementById('resource_id');

        const description = document.getElementById('description');
        const uom = document.getElementById('uom');



        function toggleResourceType() {


            if (type.value === 'INVENTORY') {


                inventoryBlock.style.display = '';
                resourceBlock.style.display = 'none';


                hiddenSource.value = 'INVENTORY';


                resourceSelect.value = '';

                updateInventory();


            } else {


                inventoryBlock.style.display = 'none';
                resourceBlock.style.display = '';


                hiddenSource.value = 'RESOURCE';

                inventorySelect.value = '';
                updateResource();
            }
        }

        function updateInventory() {

            let option = inventorySelect.options[inventorySelect.selectedIndex];

            hiddenId.value = inventorySelect.value;

            description.value =
                option.dataset.description || '';

            uom.value =
                option.dataset.unit || '';

        }

        function updateResource() {
            let option = resourceSelect.options[resourceSelect.selectedIndex];

            hiddenId.value = resourceSelect.value;

            description.value =
                option.dataset.description || '';

            uom.value =
                option.dataset.unit || '';

        }

        type.addEventListener(
            'change',
            toggleResourceType
        );


        inventorySelect.addEventListener(
            'change',
            updateInventory
        );


        resourceSelect.addEventListener(
            'change',
            updateResource
        );



        toggleResourceType();


    });
</script>
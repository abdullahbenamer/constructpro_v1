<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3>
            <?= __('create_purchase_order') ?>
        </h3>

    </div>


    <form method="POST"
          action="<?= URLROOT ?>/PurchaseOrders/create">

<!-- SUPPLIER -->
<div class="mb-3">

    <label class="form-label">
        <?= __('supplier') ?>
        <span class="text-danger">*</span>
    </label>

    <select name="supplier_id"
            class="form-select"
            required>

        <option value="">
            <?= __('select_supplier') ?>
        </option>

        <?php foreach ($suppliers as $supplier): ?>

            <option value="<?= (int)$supplier->id ?>">

                <?= htmlspecialchars(
                    $supplier->company_name ?? ''
                ) ?>

            </option>

        <?php endforeach; ?>

    </select>

</div>


        <!-- DELIVERY METHOD -->
        <div class="mb-3">

            <label class="form-label">
                <?= __('delivery_method') ?>
                <span class="text-danger">*</span>
            </label>

            <select name="delivery_method"
                    id="deliveryMethod"
                    class="form-select"
                    required>

                <option value="WAREHOUSE">
                    <?= __('warehouse') ?>
                </option>

                <option value="DIRECT_TO_PROJECT_SITE">
                    <?= __('direct_to_project_site') ?>
                </option>

            </select>

        </div>


        <!-- WAREHOUSE -->
        <div class="mb-3"
             id="warehouseDestination">

            <label class="form-label">
                <?= __('delivery_warehouse') ?>
                <span class="text-danger">*</span>
            </label>

            <select name="target_warehouse_id"
                    id="warehouseSelect"
                    class="form-select">

                <option value="">
                    <?= __('select_warehouse') ?>
                </option>

                <?php foreach ($warehouses as $warehouse): ?>

                    <option value="<?= (int)$warehouse->id ?>">

                        <?= htmlspecialchars(
                            $warehouse->code
                        ) ?>

                        -
                        <?= htmlspecialchars(
                            $warehouse->name
                        ) ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>


        <!-- PROJECT -->
        <div class="mb-3 d-none"
             id="projectDestination">

            <label class="form-label">
                <?= __('project') ?>
                <span class="text-danger">*</span>
            </label>

            <select name="project_id"
                    id="projectSelect"
                    class="form-select">

                <option value="">
                    <?= __('select_project') ?>
                </option>

                <?php foreach ($projects as $project): ?>

                    <option value="<?= (int)$project->id ?>">

                        <?= htmlspecialchars(
                            $project->project_code
                        ) ?>

                        -
                        <?= htmlspecialchars(
                            $project->title
                        ) ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>


        <!-- ORDER DATE -->
        <div class="mb-3">

            <label class="form-label">
                <?= __('order_date') ?>
            </label>

            <input type="date"
                   name="order_date"
                   class="form-control"
                   value="<?= date('Y-m-d') ?>">

        </div>


        <!-- EXPECTED DATE -->
        <div class="mb-3">

            <label class="form-label">
                <?= __('expected_date') ?>
            </label>

            <input type="date"
                   name="expected_date"
                   class="form-control">

        </div>


        <!-- NOTES -->
        <div class="mb-3">

            <label class="form-label">
                <?= __('notes') ?>
            </label>

            <textarea name="notes"
                      class="form-control"
                      rows="4"></textarea>

        </div>


        <!-- ACTIONS -->
        <div class="d-flex justify-content-between">

            <a href="<?= URLROOT ?>/PurchaseOrders"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>

                <?= __('cancel') ?>

            </a>

            <button type="submit"
                    class="btn btn-primary">

                <i class="fas fa-save"></i>

                <?= __('create_purchase_order') ?>

            </button>

        </div>

    </form>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const deliveryMethod =
        document.getElementById('deliveryMethod');

    const warehouseDestination =
        document.getElementById('warehouseDestination');

    const projectDestination =
        document.getElementById('projectDestination');

    const warehouseSelect =
        document.getElementById('warehouseSelect');

    const projectSelect =
        document.getElementById('projectSelect');


    function updateDestinationFields() {

        if (deliveryMethod.value === 'WAREHOUSE') {

            warehouseDestination.classList.remove('d-none');
            projectDestination.classList.add('d-none');

            warehouseSelect.required = true;
            projectSelect.required = false;

            projectSelect.value = '';

        } else {

            warehouseDestination.classList.add('d-none');
            projectDestination.classList.remove('d-none');

            warehouseSelect.required = false;
            projectSelect.required = true;

            warehouseSelect.value = '';
        }
    }


    deliveryMethod.addEventListener(
        'change',
        updateDestinationFields
    );


    updateDestinationFields();

});

</script>
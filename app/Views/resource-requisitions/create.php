<h2 class="mb-4">
    <i class="fas fa-clipboard-list text-primary"></i>
    <?= __('new_resource_requisition') ?>
</h2>

<div class="card shadow-sm">

    <div class="card-header bg-primary text-white">

        <strong><?= __('create_resource_requisition') ?></strong>

    </div>

    <div class="card-body">

        <form method="POST">

            <div class="row">

                <!-- Requisition Number -->
                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        <?= __('requisition_no') ?>
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        value="<?= htmlspecialchars($next_number) ?>"
                        readonly>

                </div>

                <!-- Request Date -->
                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        <?= __('request_date') ?>
                        <span class="text-danger">*</span>
                    </label>

                    <input
                        type="date"
                        name="request_date"
                        class="form-control"
                        value="<?= date('Y-m-d') ?>"
                        required>

                </div>

                <!-- Required Date -->
                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        <?= __('required_date') ?>
                        <span class="text-danger">*</span>
                    </label>

                    <input
                        type="date"
                        name="required_date"
                        class="form-control"
                        min="<?= date('Y-m-d') ?>"
                        required>

                </div>

            </div>

            <div class="row">

                <!-- Project -->
                <div class="col-md-8 mb-3">

                    <label class="form-label">
                        <?= __('project') ?>
                        <span class="text-danger">*</span>
                    </label>

                    <select
                        name="project_id"
                        class="form-select"
                        required>

                        <option value="">
                            <?= __('select_project') ?>
                        </option>

                        <?php foreach ($projects as $project): ?>

                            <option value="<?= $project->id ?>">

                                <?= htmlspecialchars($project->title) ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

                <!-- Priority -->
                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        <?= __('priority') ?>
                    </label>

                    <select
                        name="priority"
                        class="form-select">

                        <option value="LOW">
                            <?= __('low') ?>
                        </option>

                        <option value="MEDIUM" selected>
                            <?= __('medium') ?>
                        </option>

                        <option value="HIGH">
                            <?= __('high') ?>
                        </option>

                    </select>

                </div>

                <div class="row">

                    <!-- DELIVERY METHOD -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label">
                            <?= __('delivery_method') ?>
                            <span class="text-danger">*</span>
                        </label>

                        <select
                            name="delivery_method"
                            id="delivery_method"
                            class="form-select"
                            required>

                            <option value="WAREHOUSE" selected>
                                <?= __('warehouse') ?>
                            </option>

                            <option value="DIRECT_TO_PROJECT_SITE">
                                <?= __('direct_to_project_site') ?>
                            </option>

                        </select>

                    </div>

                    <!-- TARGET WAREHOUSE -->
                    <div class="col-md-6 mb-3" id="targetWarehouseGroup">

                        <label class="form-label">
                            <?= __('target_warehouse') ?>
                            <span class="text-danger">*</span>
                        </label>

                        <select
                            name="target_warehouse_id"
                            id="target_warehouse_id"
                            class="form-select">

                            <option value="">
                                <?= __('select_warehouse') ?>
                            </option>

                            <?php foreach ($locations as $location): ?>

                                <option value="<?= $location->id ?>">

                                    <?= htmlspecialchars($location->code) ?>
                                    -
                                    <?= htmlspecialchars($location->name) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                </div>

                <div
                    id="projectSiteInfo"
                    class="alert alert-info d-none">

                    <i class="fas fa-truck"></i>

                    <?= __('direct_project_site_delivery_info') ?>

                </div>

            </div>

            <!-- Remarks -->

            <div class="mb-3">

                <label class="form-label">

                    <?= __('remarks') ?>

                </label>

                <textarea
                    name="remarks"
                    rows="4"
                    class="form-control"
                    placeholder="<?= __('remarks_placeholder') ?>"></textarea>

            </div>

            <hr>

            <div class="d-flex justify-content-between">

                <a
                    href="<?= URLROOT ?>/resourcerequisitions"
                    class="btn btn-secondary">

                    <i class="fas fa-arrow-left"></i>

                    <?= __('back') ?>

                </a>

                <button
                    type="submit"
                    class="btn btn-primary">

                    <i class="fas fa-save"></i>

                    <?= __('save_draft') ?>

                </button>

            </div>

        </form>

    </div>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const deliveryMethod =
        document.getElementById('delivery_method');

    const warehouseGroup =
        document.getElementById('targetWarehouseGroup');

    const warehouse =
        document.getElementById('target_warehouse_id');

    const projectSiteInfo =
        document.getElementById('projectSiteInfo');

    function updateDeliveryFields() {

        if (deliveryMethod.value === 'WAREHOUSE') {

            warehouseGroup.classList.remove('d-none');

            warehouse.required = true;

            projectSiteInfo.classList.add('d-none');

        } else {

            warehouseGroup.classList.add('d-none');

            warehouse.required = false;

            warehouse.value = '';

            projectSiteInfo.classList.remove('d-none');
        }
    }

    deliveryMethod.addEventListener(
        'change',
        updateDeliveryFields
    );

    updateDeliveryFields();

});

</script>
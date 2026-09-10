<div class="container-fluid mt-4">


    <!-- PAGE HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-3">


        <div>

            <h4 class="mb-0">

                <i class="fas fa-edit"></i>
                <?= __('edit_resource_requisition') ?>

            </h4>


            <small class="text-muted">

                <?= __('update_requisition_header_information') ?>

            </small>

        </div>



        <a href="<?= URLROOT ?>/ResourceRequisitions"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>
            <?= __('back') ?>

        </a>


    </div>




    <!-- FORM CARD -->

    <div class="card shadow-sm">


        <div class="card-header bg-white">

            <strong>

                <i class="fas fa-info-circle"></i>
                <?= __('requisition_header') ?>

            </strong>

        </div>




        <div class="card-body">


            <form method="POST"
            action="<?= URLROOT ?>/ResourceRequisitions/update/<?= $data['requisition']->id ?>">



                <div class="row">


                    <!-- REQUISITION NUMBER -->

                    <div class="col-md-4 mb-3">


                        <label class="form-label">

                            <?= __('requisition_no') ?>

                        </label>


                        <input type="text"
                               class="form-control"
                               value="<?= $data['requisition']->requisition_no ?>"
                               readonly>


                    </div>




                    <!-- STATUS -->

                    <div class="col-md-4 mb-3">


                        <label class="form-label">

                            <?= __('status') ?>

                        </label>


                        <input type="text"
                               class="form-control"
                               value="<?= $data['requisition']->status ?>"
                               readonly>


                    </div>


                    <!-- PRIORITY -->
                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            <?= __('priority') ?>
                        </label>

                        <select name="priority" class="form-select">

                            <option value="LOW"
                                <?= ($data['requisition']->priority == 'LOW') ? 'selected' : '' ?>>
                                <?= __('low') ?>
                            </option>

                            <option value="MEDIUM"
                                <?= ($data['requisition']->priority == 'MEDIUM') ? 'selected' : '' ?>>
                                <?= __('medium') ?>
                            </option>

                            <option value="HIGH"
                                <?= ($data['requisition']->priority == 'HIGH') ? 'selected' : '' ?>>
                                <?= __('high') ?>
                            </option>

                        </select>

                    </div>


                </div>





                <div class="row">



                    <!-- PROJECT -->

                    <div class="col-md-6 mb-3">


                        <label class="form-label">

                            <?= __('project') ?>

                        </label>


                        <select name="project_id"
                                class="form-select"
                                required>



                            <?php foreach ($data['projects'] as $project): ?>


                                <option value="<?= $project->id ?>"
                                    
                                    <?= ($project->id == $data['requisition']->project_id) ? 'selected' : '' ?>
                                    
                                >

                                    <?= $project->title ?>
                                       

                                </option>


                            <?php endforeach; ?>


                        </select>


                    </div>





                    <!-- REQUEST DATE -->

                    <div class="col-md-3 mb-3">


                        <label class="form-label">

                            <?= __('request_date') ?>

                        </label>


                        <input type="date"
                               name="request_date"
                               class="form-control"
                               value="<?= $data['requisition']->request_date ?>"
                               required>


                    </div>





                    <!-- REQUIRED DATE -->

                    <div class="col-md-3 mb-3">


                        <label class="form-label">

                            <?= __('required_date') ?>

                        </label>


                        <input type="date"
                               name="required_date"
                               class="form-control"
                               value="<?= $data['requisition']->required_date ?>"
                               required>


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

                                <option value="WAREHOUSE"
                                    <?= ($data['requisition']->delivery_method == 'WAREHOUSE') ? 'selected' : '' ?>>
                                    <?= __('warehouse') ?>
                                </option>

                                <option value="DIRECT_TO_PROJECT_SITE"
                                    <?= ($data['requisition']->delivery_method == 'DIRECT_TO_PROJECT_SITE') ? 'selected' : '' ?>>
                                    <?= __('direct_to_project_site') ?>
                                </option>

                            </select>

                        </div>


                        <!-- TARGET WAREHOUSE -->
                        <div
                            class="col-md-6 mb-3"
                            id="targetWarehouseGroup">

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

                                <?php foreach ($data['locations'] as $location): ?>

                                    <option
                                        value="<?= $location->id ?>"
                                        <?= ($location->id == $data['requisition']->target_warehouse_id) ? 'selected' : '' ?>>

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





                <!-- REMARKS -->


                <div class="mb-3">


                    <label class="form-label">

                        <?= __('remarks') ?>

                    </label>


                    <textarea name="remarks"
                              class="form-control"
                              rows="4"><?= $data['requisition']->remarks ?></textarea>


                </div>





                <div class="text-end">


                    <button type="submit"
                            class="btn btn-primary">


                        <i class="fas fa-save"></i>

                        <?= __('update_requisition') ?>


                    </button>


                </div>



            </form>



        </div>


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
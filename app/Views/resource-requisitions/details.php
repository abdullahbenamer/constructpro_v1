<div class="container-fluid mt-4">


    <!-- PAGE HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-3">


        <div>

            <h4 class="mb-0">

                <i class="fas fa-file-alt"></i>
                <?= __('resource_requisition_details') ?>

            </h4>


            <small class="text-muted">

                <?= __('view_requisition_header_information') ?>

            </small>


        </div>




        <div>
            <?php if (
                $data['requisition']->status == 'DRAFT'
                &&
                !empty($data['items'])
            ): ?>

                <a href="<?= URLROOT ?>/ResourceRequisitions/submit/<?= $data['requisition']->id ?>"
                    class="btn btn-success"
                    onclick="return confirm(<?= json_encode(__('submit_requisition_confirm')) ?>)">

                    <i class="fas fa-paper-plane"></i>
                    <?= __('submit_requisition') ?>

                </a>

            <?php endif; ?>

            <!-- APPROVE / REJECT -->

            <?php if (
                $data['requisition']->status == 'SUBMITTED'
                &&
                AuthHelper::canView('resource_requisitions.approve')
            ): ?>

                <a href="<?= URLROOT ?>/ResourceRequisitions/approve/<?= $data['requisition']->id ?>"
                    class="btn btn-success">
                    <i class="fas fa-check-circle"></i>
                    <?= __('approval_decision') ?>
                </a>

            <?php endif; ?>

            <?php if ($data['requisition']->status == 'DRAFT'): ?>

                <a href="<?= URLROOT ?>/ResourceRequisitions/edit/<?= $data['requisition']->id ?>"
                    class="btn btn-warning">

                    <i class="fas fa-edit"></i>
                    <?= __('edit') ?>

                </a>

            <?php endif; ?>


            <a href="<?= URLROOT ?>/ResourceRequisitions"
                class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>
                <?= __('back_to_resource_requisitions') ?>

            </a>


        </div>


    </div>


    <!-- HEADER INFORMATION CARD -->


    <div class="card shadow-sm">


        <div class="card-header bg-white">


            <strong>

                <i class="fas fa-info-circle"></i>
                <?= __('header_information') ?>

            </strong>


        </div>




        <div class="card-body">


            <div class="row">


                <!-- REQUISITION NUMBER -->

                <div class="col-md-4 mb-3">


                    <label class="text-muted">

                        <?= __('requisition_no') ?>

                    </label>


                    <div class="fw-bold">

                        <?= $data['requisition']->requisition_no ?>

                    </div>

                </div>

                <!-- PROJECT -->

                <div class="col-md-4 mb-3">


                    <label class="text-muted">

                        <?= __('project') ?>

                    </label>


                    <div class="fw-bold">

                        <?= $data['requisition']->project_name ?? '-' ?>

                    </div>

                </div>

                <!-- STATUS -->

                <div class="col-md-4 mb-3">

                    <label class="text-muted">

                        <?= __('status') ?>

                    </label>

                    <div>
                        <span class="badge bg-success">

                            <?= $data['requisition']->status ?>

                        </span>

                    </div>

                </div>

            </div>

            <div class="row">

                <!-- REQUEST DATE -->
                <div class="col-md-3 mb-3">

                    <label class="text-muted">
                        <?= __('request_date') ?>
                    </label>

                    <div>
                        <?= htmlspecialchars($data['requisition']->request_date ?? '-') ?>
                    </div>

                </div>


                <!-- REQUIRED DATE -->
                <div class="col-md-3 mb-3">

                    <label class="text-muted">
                        <?= __('required_date') ?>
                    </label>

                    <div>
                        <?= htmlspecialchars($data['requisition']->required_date ?? '-') ?>
                    </div>

                </div>


                <!-- PRIORITY -->
                <div class="col-md-3 mb-3">

                    <label class="text-muted">
                        <?= __('priority') ?>
                    </label>

                    <div>

                        <?php if ($data['requisition']->priority == 'HIGH'): ?>

                            <span class="badge bg-danger">
                                <?= __('high') ?>
                            </span>

                        <?php elseif ($data['requisition']->priority == 'MEDIUM'): ?>

                            <span class="badge bg-warning text-dark">
                                <?= __('medium') ?>
                            </span>

                        <?php else: ?>

                            <span class="badge bg-secondary">
                                <?= __('low') ?>
                            </span>

                        <?php endif; ?>

                    </div>

                </div>


                <!-- DELIVERY METHOD -->
                <div class="col-md-3 mb-3">

                    <label class="text-muted">
                        <?= __('delivery_method') ?>
                    </label>

                    <div>

                        <?php if ($data['requisition']->delivery_method === 'WAREHOUSE'): ?>

                            <span class="badge bg-primary">
                                <i class="fas fa-warehouse"></i>
                                <?= __('warehouse') ?>
                            </span>

                        <?php elseif ($data['requisition']->delivery_method === 'DIRECT_TO_PROJECT_SITE'): ?>

                            <span class="badge bg-info text-dark">
                                <i class="fas fa-truck"></i>
                                <?= __('direct_to_project_site') ?>
                            </span>

                        <?php else: ?>

                            <span class="text-muted">
                                -
                            </span>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

            <!-- Target warehouse -->
            <div class="row">

                <!-- TARGET WAREHOUSE -->
                <div class="col-md-6 mb-3">

                    <label class="text-muted">
                        <?= __('target_warehouse') ?>
                    </label>

                    <div class="fw-semibold">

                        <?php if (
                            $data['requisition']->delivery_method === 'WAREHOUSE'
                            && !empty($data['requisition']->target_warehouse_name)
                        ): ?>

                            <i class="fas fa-warehouse text-primary"></i>

                            <?= htmlspecialchars(
                                $data['requisition']->target_warehouse_name
                            ) ?>

                        <?php elseif (
                            $data['requisition']->delivery_method === 'DIRECT_TO_PROJECT_SITE'
                        ): ?>

                            <span class="text-info">
                                <i class="fas fa-map-marker-alt"></i>
                                <?= __('project_site') ?>
                            </span>

                        <?php else: ?>

                            <span class="text-muted">
                                -
                            </span>

                        <?php endif; ?>

                    </div>

                </div>


                <!-- DESTINATION NOTE -->
                <div class="col-md-6 mb-3">

                    <label class="text-muted">
                        <?= __('destination') ?>
                    </label>

                    <div>

                        <?php if (
                            $data['requisition']->delivery_method === 'WAREHOUSE'
                        ): ?>

                            <span class="text-muted">
                                <?= __('goods_planned_selected_warehouse') ?>
                            </span>

                        <?php elseif (
                            $data['requisition']->delivery_method === 'DIRECT_TO_PROJECT_SITE'
                        ): ?>

                            <span class="text-muted">
                                <?= __('goods_planned_project_site') ?>
                            </span>

                        <?php else: ?>

                            <span class="text-muted">
                                <?= __('not_specified') ?>
                            </span>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

            <!-- REMARKS -->
            <div class="row">
                <div class="col-md-12 mb-3">

                    <label class="text-muted">
                        <?= __('remarks') ?>
                    </label>


                    <div class="border rounded p-3 bg-light">

                        <?= nl2br($data['requisition']->remarks) ?>

                    </div>

                </div>
            </div>

            <div class="row">

                <!-- REQUESTED BY -->

                <div class="col-md-4 mb-3">

                    <label class="text-muted">

                        <?= __('requested_by') ?>

                    </label>

                    <div>

                        <?php if (!empty($data['requisition']->requested_by)): ?>

                            <a href="<?= URLROOT ?>/users/details/<?= $data['requisition']->requested_by ?>" class="link-primary text-decoration-none fw-semibold">
                                <?= htmlspecialchars($data['requisition']->requested_by_name ?? '-') ?>
                            </a>

                        <?php else: ?>

                            <?= __('n_a') ?>

                        <?php endif; ?>

                    </div>

                    <br>

                    <?= __('submitted_by') ?>:

                    <div>

                        <?php if (!empty($data['requisition']->submitted_by)): ?>

                            <a href="<?= URLROOT ?>/users/details/<?= $data['requisition']->submitted_by ?>"
                                class="link-primary text-decoration-none">

                                <?= htmlspecialchars($data['requisition']->submitted_by_name ?? '-') ?>

                            </a>

                        <?php else: ?>

                            <span class="text-muted">
                                <?= __('not_submitted') ?>
                            </span>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <br>


<!-- FULFILLMENT ACTIONS -->

<?php if (
    $data['requisition']->status === 'APPROVED'
    ||
    $data['requisition']->status === 'PARTIAL'
): ?>

    <div class="d-flex gap-2 mb-3">

        <?php if (!empty($data['hasMaterialItems'])): ?>

            <a
                href="<?= URLROOT ?>/ResourceRequisitionFulfillments/create/<?= $data['requisition']->id ?>"
                class="btn btn-success"
            >
                <i class="fas fa-boxes"></i>
                <?= __('fulfill_materials') ?>
            </a>

        <?php endif; ?>

        <a
            href="<?= URLROOT ?>/requisitionpurchaseorders/create/<?= $data['requisition']->id ?>"
            class="btn btn-primary">

            <i class="fas fa-shopping-cart"></i>
            <?= __('create_po_for_materials') ?>

        </a>


        <?php if (!empty($data['hasResourceItems'])): ?>

            <a
                href="<?= URLROOT ?>/ResourceRequisitionFulfillments/createResource/<?= $data['requisition']->id ?>"
                class="btn btn-primary"
            >
                <i class="fas fa-tools"></i>
                <?= __('fulfill_resources') ?>
            </a>

        <?php endif; ?>

    </div>

<?php endif; ?>

    <!-- REQUISITION ITEMS -->

    <div class="card shadow-sm mt-4">

        <div class="card-header d-flex justify-content-between align-items-center">

            <strong>
                <i class="fas fa-list"></i>
                <?= __('requisition_items') ?>
            </strong>


            <?php if ($data['requisition']->status == 'DRAFT'): ?>

                <a href="<?= URLROOT ?>/ResourceRequisitionItems/create/<?= $data['requisition']->id ?>"
                    class="btn btn-primary">

                    <i class="fas fa-plus"></i>
                    <?= __('add_item') ?>

                </a>

            <?php endif; ?>


        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped align-middle">

                    <thead>

                        <tr>

                            <th width="60">#</th>

                            <th><?= __('resource') ?></th>

                            <th width="120"><?= __('requested') ?></th>

                            <th width="150"><?= __('available') ?></th>

                            <th width="120"><?= __('unit') ?></th>

                            <th><?= __('remarks') ?></th>

                            <th width="140"><?= __('actions') ?></th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if (!empty($data['items'])): ?>

                            <?php $i = 1; ?>

                            <?php foreach ($data['items'] as $item): ?>

                                <tr>

                                    <td><?= $i++ ?></td>


                                    <td>


                                        <strong>

                                            <?= $item->resource_code ?? '-' ?>

                                        </strong>


                                        <br>


                                        <?= $item->resource_name ?? $item->description ?>


                                        <br>
                                        <small class="text-muted">
                                            <?= __('category') ?>:
                                            <?= $item->category_name ?? '-' ?>
                                        </small>
                                    </td>

                                    <td>
                                        <?= number_format((float)$item->quantity, 2) ?>
                                    </td>

                                    <td>

                                        <?php if ($item->resource_source === 'INVENTORY'): ?>

                                            <?php
                                            $available = (float)($item->available_qty ?? 0);
                                            $requested = (float)$item->quantity;
                                            ?>

                                            <?php if ($available >= $requested): ?>

                                                <span class="fw-bold text-success">
                                                    <?= __('available') ?>: <?= number_format($available, 2) ?>
                                                </span>

                                            <?php elseif ($available > 0): ?>

                                                <span class="fw-bold text-danger">
                                                    <?= __('available') ?>: <?= number_format($available, 2) ?>
                                                </span>

                                            <?php else: ?>

                                                <span class="fw-bold text-danger">
                                                    <?= __('out_of_stock') ?>
                                                </span>

                                            <?php endif; ?>

                                        <?php else: ?>

                                            <span class="text-muted">
                                                <?= __('n_a') ?>
                                            </span>

                                        <?php endif; ?>

                                    </td>

                                    <td>
                                        <?= htmlspecialchars($item->uom ?? '-') ?>
                                    </td>

                                    <td><?= $item->remarks ?></td>

                                    <td>

                                        <?php if ($data['requisition']->status == 'DRAFT'): ?>

                                            <a href="<?= URLROOT ?>/ResourceRequisitionItems/edit/<?= $item->id ?>"
                                                class="btn btn-sm btn-warning">

                                                <!-- <i class="fas fa-edit"></i> -->
                                                <?= __('edit') ?>

                                            </a>

                                            <a href="<?= URLROOT ?>/ResourceRequisitionItems/delete/<?= $item->id ?>"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm(<?= json_encode(__('delete_item_confirm')) ?>);">

                                                <!-- <i class="fas fa-trash"></i> -->
                                                <?= __('delete') ?>

                                            </a>

                                        <?php else: ?>

                                            <span class="text-muted">
                                                <?= __('locked') ?>
                                            </span>

                                        <?php endif; ?>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>

                                <td colspan="7" class="text-center text-muted">

                                    <?= __('no_requisition_items_added') ?>

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    <!-- //////////////////////// -->


    <div class="card shadow-sm mt-4">

        <div class="card-header">

            <strong>
                <i class="fas fa-check-circle"></i>
                <?= __('approval_history') ?>
            </strong>

        </div>

        <div class="card-body text-muted">

            <?= __('approval_workflow_future_milestone') ?>

        </div>

    </div>

    <div class="card shadow-sm mt-4">

        <div class="card-header">

            <strong>
                <i class="fas fa-paperclip"></i>
                <?= __('attachments') ?>
            </strong>

        </div>

        <div class="card-body text-muted">

            <?= __('attachment_management_future_milestone') ?>

        </div>

    </div>

    <div class="card shadow-sm mt-4 mb-4">

        <div class="card-header">

            <strong>
                <i class="fas fa-comments"></i>
                <?= __('comments') ?>
            </strong>

        </div>

        <div class="card-body text-muted">

            <?= __('comments_future_milestone') ?>

        </div>

    </div>


</div>
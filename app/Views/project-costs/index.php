<!-- =========================================================
     PROJECT WORKSPACE HEADER
========================================================= -->

<div class="card shadow-sm mb-3">

    <div class="card-body">

        <!-- PROJECT IDENTITY -->
        <div class="d-flex flex-wrap justify-content-between align-items-start mb-3">

            <div>
                <div class="text-muted small">
                    <?= __('project') ?>
                </div>

                <h3 class="mb-1 text-uppercase">
                    <?= htmlspecialchars($project->title) ?>
                </h3>

                <div>
                    <span class="badge bg-primary fs-6">
                        <?= htmlspecialchars($project->project_code ?? 'N/A') ?>
                    </span>

                    <span class="badge bg-secondary fs-6">
                        <?= htmlspecialchars(
                            [
                                'Construction' => __('construction'),
                                'Maintenance'  => __('maintenance'),
                                'Inspection'   => __('inspection'),
                                'Consultancy'  => __('consultancy'),
                                'Other'        => __('other')
                            ][$project->project_type ?? ''] ?? ($project->project_type ?? 'N/A')
                        ) ?>
                    </span>

                    <?php
                    $statusColors = [
                        'planning'    => 'secondary',
                        'in_progress' => 'warning',
                        'testing'     => 'info',
                        'completed'   => 'success',
                        'cancelled'   => 'danger'
                    ];

                    $statusColor =
                        $statusColors[$project->status ?? '']
                        ?? 'secondary';
                    ?>

                    <span class="badge bg-<?= $statusColor ?> fs-6">
                        <?= htmlspecialchars(
                            [
                                'planning'    => __('planning'),
                                'in_progress' => __('in_progress'),
                                'testing'     => __('testing'),
                                'completed'   => __('completed_status'),
                                'cancelled'   => __('cancelled')
                            ][$project->status ?? ''] ?? ($project->status ?? 'N/A')
                        ) ?>
                    </span>
                </div>
            </div>

            <div class="mt-2 mt-md-0">

                    <a href="<?= URLROOT ?>/project-costs/create/<?= $project->id ?>"
                        class="btn btn-primary">
                        <i class="fas fa-plus"></i>
                        <?= __('add_cost') ?>
                    </a>             

                <a href="<?= URLROOT ?>/projects/edit/<?= $project->id ?>"
                    class="btn btn-warning">
                    <i class="fas fa-edit"></i>
                    <?= __('edit_project') ?>
                </a>

                <a href="<?= URLROOT ?>/customers/details/<?= $project->customer_id ?>"
                    class="btn btn-outline-primary">
                    <i class="fas fa-address-card"></i>
                    <?= __('customer_label') ?>
                </a>

            </div>

        </div>


        <!-- PROJECT SPECIFICATIONS -->
        <div class="border rounded p-3 bg-light">

            <h6 class="mb-3">
                <i class="fas fa-info-circle"></i>
                <?= __('project_specifications') ?>
            </h6>

            <div class="row g-3">

                <!-- PROJECT CODE -->
                <div class="col-md-3">
                    <div class="text-muted small">
                        <?= __('project_code') ?>
                    </div>

                    <strong>
                        <?= htmlspecialchars($project->project_code ?? 'N/A') ?>
                    </strong>
                </div>


                <!-- PROJECT TYPE -->
                <div class="col-md-3">
                    <div class="text-muted small">
                        <?= __('project_type') ?>
                    </div>

                    <strong>
                        <?= htmlspecialchars(
                            $project->project_type
                                ? ucfirst($project->project_type)
                                : 'N/A'
                        ) ?>
                    </strong>
                </div>


                <!-- CUSTOMER -->
                <div class="col-md-3">
                    <div class="text-muted small">
                        <?= __('customer_label') ?>
                    </div>

                    <strong>
                        <?= htmlspecialchars($project->customer_name ?? 'N/A') ?>
                    </strong>
                </div>


                <!-- CONTRACT NUMBER -->
                <div class="col-md-3">
                    <div class="text-muted small">
                        <?= __('contract_number') ?>
                    </div>

                    <strong>
                        <?= htmlspecialchars($project->contract_number ?? 'N/A') ?>
                    </strong>
                </div>


                <!-- PROJECT MANAGER -->
                <div class="col-md-3">
                    <div class="text-muted small">
                        <?= __('project_manager') ?>
                    </div>

                    <strong>
                        <?= htmlspecialchars(
                            $project->project_manager_name
                                ?? 'N/A'
                        ) ?>
                    </strong>
                </div>


             <!-- PRIORITY -->
<div class="col-md-3">
    <div class="text-muted small">
        <?= __('priority') ?>
    </div>

    <?php
    $priority = strtolower($project->priority ?? '');

    $priorityLabels = [
        'low'      => __('low'),
        'medium'   => __('medium'),
        'high'     => __('high'),
        'critical' => __('critical'),
    ];

    $priorityClasses = [
        'low'      => 'bg-secondary',
        'medium'   => 'bg-info',
        'high'     => 'bg-warning text-dark',
        'critical' => 'bg-danger',
    ];
    ?>

   <span class="badge fs-6 <?= $priorityClasses[$priority] ?? 'bg-secondary' ?>">
    <?= htmlspecialchars($priorityLabels[$priority] ?? 'N/A') ?>
</span>
</div>


                <!-- START DATE -->
                <div class="col-md-3">
                    <div class="text-muted small">
                        <?= __('start_date') ?>
                    </div>

                    <strong>
                        <?= !empty($project->start_date)
                            ? date('d M Y', strtotime($project->start_date))
                            : 'N/A'
                        ?>
                    </strong>
                </div>


                <!-- DEADLINE -->
                <div class="col-md-3">
                    <div class="text-muted small">
                        <?= __('deadline') ?>
                    </div>

                    <strong>
                        <?= !empty($project->deadline)
                            ? date('d M Y', strtotime($project->deadline))
                            : 'N/A'
                        ?>
                    </strong>
                </div>


                <!-- SITE LOCATION -->
                <div class="col-md-6">
                    <div class="text-muted small">
                        <?= __('site_location') ?>
                    </div>

                    <strong>
                        <?= htmlspecialchars(
                            $project->site_location ?? 'N/A'
                        ) ?>
                    </strong>
                </div>


                <!-- PROJECT WAREHOUSE -->
                <div class="col-md-3">
                    <div class="text-muted small">
                        <?= __('project_warehouse') ?>
                    </div>

                    <strong>
                        <?= htmlspecialchars(
                            $project->project_code ?? 'N/A'
                        ) ?>
                    </strong>
                </div>


                <!-- BUDGET -->
                <div class="col-md-3">
                    <div class="text-muted small">
                        <?= __('project_budget') ?>
                    </div>
                    <strong>
                        <?= number_format((float)($project->budget ?? 0), 2) ?> LYD
                    </strong>
                    <div class="text-muted small mt-3">
                        <?= __('project_costs') ?>
                    </div>
                    <strong>
                        <?= number_format((float)($total_cost ?? 0), 2) ?> LYD
                    </strong>
                </div>

            </div>

            <!-- PROJECT SCOPE -->
            <div class="mt-4">

                <div class="text-muted small mb-2">
                    <?= __('project_scope') ?>
                </div>

                <?php if (!empty($project_scopes)): ?>

                    <?php
                    $scopeLabels = [
                        'Civil' => __('civil'),
                        'Architectural' => __('architectural'),
                        'Structural' => __('structural'),
                        'MEP' => __('mep'),
                        'Finishing' => __('finishing'),
                        'Instrumentation & Control' => __('instrumentation_control'),
                        'Telecommunications' => __('telecommunications'),
                        'Other' => __('other')
                    ];

                    $displayedScopes = [];
                    ?>

                    <?php foreach ($project_scopes as $scope): ?>

                        <?php
                        if (in_array($scope->scope, $displayedScopes, true)) {
                            continue;
                        }

                        $displayedScopes[] = $scope->scope;
                        ?>

                        <span class="badge bg-dark me-1 mb-1">
                            <?= htmlspecialchars(
                                $scopeLabels[$scope->scope] ?? $scope->scope
                            ) ?>
                        </span>

                    <?php endforeach; ?>

                <?php else: ?>

                    <span class="text-muted">
                        <?= __('no_project_scope') ?>
                    </span>

                <?php endif; ?>

            </div>

            <!-- DESCRIPTION -->
            <?php if (!empty($project->description)): ?>

                <div class="mt-4">

                    <div class="text-muted small mb-1">
                        <?= __('description') ?>
                    </div>

                    <div>
                        <?= nl2br(
                            htmlspecialchars($project->description)
                        ) ?>
                    </div>

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>


<!-- =========================================================
     PROJECT NAVIGATION
========================================================= -->

<div class="d-flex flex-wrap gap-2 mb-3">

    <a href="<?= URLROOT ?>/projects"
        class="btn btn-success">
        <i class="fas fa-arrow-left"></i>
        <?= __('projects') ?>
    </a>

    <a href="<?= URLROOT ?>/projects/documents/<?= $project->id ?>"
        class="btn btn-secondary">
        <i class="fas fa-folder-open"></i>
        <?= __('documents') ?>
    </a>

    <a href="<?= URLROOT ?>/projectcosts/finance/<?= $project->id ?>"
        class="btn btn-primary">
        <i class="fas fa-money-check-dollar"></i>
        <?= __('advance_payment') ?>
    </a>

    <a href="<?= URLROOT ?>/projectcosts/ledger/<?= $project->id ?>"
        class="btn btn-secondary">
        <i class="fas fa-book"></i>
        <?= __('finance_ledger') ?>
    </a>

    <a href="<?= URLROOT ?>/projectcosts/financeDashboard/<?= $project->id ?>"
        class="btn btn-info">
        <i class="fas fa-chart-line"></i>
        <?= __('finance_dashboard') ?>
    </a>

</div>


<!-- =========================================================
     PROJECT COSTS TITLE
========================================================= -->

<?php if (!empty($costs)): ?>

    <!-- PROJECT COSTS TABLE -->
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th><?= __('date') ?></th>
                    <th><?= __('cost_type') ?></th>
                    <th><?= __('description') ?></th>
                    <th class="text-end"><?= __('quantity') ?></th>
                    <th class="text-end"><?= __('unit_price') ?></th>
                    <th class="text-end"><?= __('total') ?></th>
                    <th><?= __('actions') ?></th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($costs as $index => $cost): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>

                        <td>
                            <?= !empty($cost->created_at)
                                ? date('d M Y', strtotime($cost->created_at))
                                : 'N/A' ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($cost->cost_type ?? 'N/A') ?>
                        </td>

                        <td>
                            <?= htmlspecialchars($cost->description ?? '') ?>
                        </td>

                        <td class="text-end">
                            <?= number_format((float)($cost->quantity ?? 0), 2) ?>
                        </td>

                        <td class="text-end">
                            <?= number_format((float)($cost->unit_price ?? 0), 2) ?>
                            LYD
                        </td>

                        <td class="text-end fw-bold">
                            <?= number_format((float)($cost->total_cost ?? 0), 2) ?>
                            LYD
                        </td>

                        <td>
                            <a href="<?= URLROOT ?>/project-costs/edit/<?= $cost->id ?>/<?= $project_id ?>"
                                class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                                <?= __('edit') ?>
                            </a>

                            <a href="<?= URLROOT ?>/project-costs/delete/<?= $cost->id ?>"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('<?= __('delete_this_cost') ?>')">
                                <i class="fas fa-trash"></i>
                                <?= __('delete') ?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

            <tfoot>
                <tr class="table-light">
                    <th colspan="6" class="text-end">
                        <?= __('total_project_cost') ?>
                    </th>
                    <th class="text-end">
                        <?= number_format((float)($total_cost ?? 0), 2) ?> LYD
                    </th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>

<?php else: ?>

    <!-- EMPTY PROJECT COSTS STATE -->
    <div class="card border-0 bg-light mb-4">
        <div class="card-body text-center py-5">

            <div class="mb-3">
                <i class="fas fa-coins fa-3x text-muted"></i>
            </div>

            <h5 class="mb-2">
                <?= __('no_project_costs_recorded') ?>
            </h5>

            <p class="text-muted mb-4">
                <?= __('no_costs_yet') ?>
                <?= __('start_first_project_cost') ?>
            </p>

            <a href="<?= URLROOT ?>/project-costs/create/<?= $project->id ?>"
                class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <?= __('add_first_cost') ?>
            </a>

        </div>
    </div>

<?php endif; ?>
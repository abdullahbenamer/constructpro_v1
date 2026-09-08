<?php if (!empty($_SESSION['error'])) : ?>
    <div class="alert alert-danger">
        <?= $_SESSION['error'] ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['success'])) : ?>
    <div class="alert alert-success">
        <?= $_SESSION['success'] ?>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

<div class="d-flex flex-wrap justify-content-between align-items-center mb-3">

    <div>
        <h2 class="mb-0">
            <i class="fas fa-project-diagram"></i>
            (<?= count($projects) ?>)
            <?= $showArchived ? __('archived_projects') : __('active_projects') ?>
        </h2>
    </div>

    <div class="mt-2 mt-md-0">

        <a href="<?= URLROOT ?>/projects"
            class="btn btn-success">
            <?= __('active_projects') ?>
        </a>

        <a href="<?= URLROOT ?>/projects/archived"
            class="btn btn-secondary">
            <?= __('archived_projects') ?>
        </a>

        <?php if (AuthHelper::canView('projects.create')): ?>

            <a href="<?= URLROOT ?>/projects/create"
                class="btn btn-primary">
                <i class="fas fa-plus"></i>
                <?= __('new_project') ?>
            </a>

        <?php endif; ?>




    </div>

</div>

<div class="card shadow-sm">

    <div class="card-body p-2">

        <div class="table-responsive">

            <table class="table table-striped table-hover table-sm align-middle w-100 mb-0">
                <thead>
                    <tr>
                        <th>ID</th>

                        <th><?= __('project') ?></th>

                        <th><?= __('type') ?></th>

                        <th><?= __('location') ?></th>

                        <th><?= __('doc') ?></th>

                        <th>
                            <i class="fas fa-tools"></i>
                            <?= __('work_status') ?>
                        </th>

                        <th><?= __('deadline') ?></th>

                        <th><?= __('budget_lyd') ?></th>

                        <th><?= __('costs_lyd') ?></th>
                        <?php if (empty($showArchived)): ?>
                            <th>
                                <i class="fas fa-coins"></i>
                                <?= __('finance') ?>
                            </th>
                        <?php endif; ?>
                        <?php if (empty($showArchived)): ?>
                            <th>
                                <i class="fas fa-dollar"></i>
                                <?= __('cost_status') ?>
                            </th>
                        <?php endif; ?>
                        <th><?= __('actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($projects)): ?>
                        <tr>
                            <?php
                            $columnCount = empty($showArchived) ? 13 : 11;
                            ?>
                            <td colspan="<?= $columnCount ?>" class="text-center py-5">

                                <i class="fas fa-folder-open fa-3x text-secondary mb-3"></i>

                                <h5 class="mt-3 text-muted">
                                    <?= $showArchived
                                        ? __('no_archived_projects')
                                        : __('no_active_projects_available') ?>
                                </h5>

                                <p class="text-muted mb-3">
                                    <?= $showArchived
                                        ? __('no_archived_projects_currently')
                                        : __('create_first_project') ?>
                                </p>

                                <?php if (empty($showArchived)): ?>
                                    <a href="<?= URLROOT ?>/projects/create" class="btn btn-primary">
                                        <i class="fas fa-plus"></i>

                                    </a>
                                <?php endif; ?>

                            </td>
                        </tr>

                    <?php else: ?>

                        <?php foreach ($projects as $project) :

                            $budget = (float)$project->budget;
                            $cost   = (float)($project->total_cost ?? 0);

                            $ratio = ($budget > 0) ? ($cost / $budget) : 0;

                            if ($cost == 0) {
                                $statusColor = 'secondary';
                                $label = __('not_started');
                            } elseif ($ratio <= 0.8) {
                                $statusColor = 'success';
                                $label = __('healthy');
                            } elseif ($ratio <= 1) {
                                $statusColor = 'warning';
                                $label = __('warning');
                            } else {
                                $statusColor = 'danger';
                                $label = __('over_budget');
                            }

                        ?>
                            <tr>
                                <td><?= $project->id ?></td>
                                <td class="text-nowrap"><?= htmlspecialchars($project->title) ?></td>
                                <!-- <td class="text-nowrap"><? //= htmlspecialchars($project->customer_name ?? 'N/A') 
                                                                ?></td> -->
                                <td class="text-nowrap">
                                    <?= ucfirst($project->project_type ?? '-') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($project->site_location ?? '-') ?>
                                </td>

                                <td>
                                    <a href="<?= URLROOT ?>/projects/documents/<?= $project->id ?>"
                                        class="btn btn-sm btn-dark"
                                        style="white-space: nowrap;">

                                        <i class="fas fa-folder"></i>
                                        <span class="badge bg-light text-dark ms-1">
                                            <?= $project->document_count ?? 0 ?>
                                        </span>

                                    </a>
                                </td>
                                <td>
                                    <?php
                                    $statusLabels = [
                                        'planning'    => __('planning'),
                                        'in_progress' => __('in_progress'),
                                        'testing'     => __('testing'),
                                        'completed'   => __('completed_status'),
                                        'cancelled'   => __('cancelled')
                                    ];
                                    ?>

                                    <span class="badge bg-<?= $badge ?>">
                                        <?= $statusLabels[$project->status] ?? ucwords(str_replace('_', ' ', $project->status)) ?>
                                    </span>
                                </td>
                                <?php
                                $deadline = strtotime($project->deadline);
                                $today    = strtotime(date('Y-m-d'));
                                $daysRemaining = floor(($deadline - $today) / 86400);
                                $formattedDate = date('d M Y', $deadline);
                                ?>
                                <td>
                                    <?php if ($project->status == 'completed'): ?>

    <span class="badge bg-success">
        <span class="deadline-date"><?= $formattedDate ?></span>
        ·
        <?= __('completed') ?>
    </span>

<?php elseif ($daysRemaining < 0): ?>

    <span class="badge bg-danger">
        <span class="deadline-date"><?= $formattedDate ?></span>
        ·
        <span class="deadline-text">
            <?= __('overdue_by') ?>
        </span>
        <span class="deadline-number">
            <?= abs($daysRemaining) ?>
        </span>
        <span class="deadline-text">
            <?= abs($daysRemaining) != 1
                ? __('days')
                : __('day') ?>
        </span>
    </span>

<?php elseif ($daysRemaining == 0): ?>

    <span class="badge bg-danger">
        <span class="deadline-date"><?= $formattedDate ?></span>
        ·
        <span class="deadline-text">
            <?= __('due_today') ?>
        </span>
    </span>

<?php elseif ($daysRemaining <= 3): ?>

    <span class="badge bg-danger">
        <span class="deadline-date"><?= $formattedDate ?></span>
        ·
        <span class="deadline-number">
            <?= $daysRemaining ?>
        </span>
        <span class="deadline-text">
            <?= $daysRemaining != 1
                ? __('days_left')
                : __('day_left') ?>
        </span>
    </span>

<?php elseif ($daysRemaining <= 7): ?>

    <span class="badge bg-warning text-dark">
        <span class="deadline-date"><?= $formattedDate ?></span>
        ·
        <span class="deadline-number">
            <?= $daysRemaining ?>
        </span>
        <span class="deadline-text">
            <?= __('days_left') ?>
        </span>
    </span>

<?php elseif ($daysRemaining <= 14): ?>

    <span class="badge bg-info text-dark">
        <span class="deadline-date"><?= $formattedDate ?></span>
        ·
        <span class="deadline-number">
            <?= $daysRemaining ?>
        </span>
        <span class="deadline-text">
            <?= __('days_left') ?>
        </span>
    </span>

<?php else: ?>

    <span class="badge bg-success">
        <span class="deadline-date"><?= $formattedDate ?></span>
        ·
        <span class="deadline-number">
            <?= $daysRemaining ?>
        </span>
        <span class="deadline-text">
            <?= __('days_left') ?>
        </span>
    </span>

<?php endif; ?>
                                </td>
                                <td class="text-nowrap"><?= number_format($project->budget, 0) ?></td>

                                <td class="text-nowrap"><?= number_format($cost, 0) ?></td>

                                <?php if (empty($showArchived)): ?>
                                    <!-- ✅ Finance columns , Hide for Archived projects-->
                                    <td>
                                        <a href="<?= URLROOT ?>/project-costs/<?= $project->id ?>"
                                            class="btn btn-sm btn-info text-nowrap">
                                            <?= __('details') ?>
                                        </a>
                                    </td>

                                    <td>
                                        <div style="min-width: 6rem;">
                                            <div class="progress" style="height: 0.5rem;">
                                                <div class="progress-bar bg-<?= $statusColor ?>"
                                                    style="width: <?= min(100, $ratio * 100) ?>%">
                                                </div>
                                            </div>
                                            <small class="text-<?= $statusColor ?>">
                                                <?= round($ratio * 100) ?>% (<?= $label ?>)
                                            </small>
                                        </div>
                                    </td>
                                <?php endif; ?>

                                <td class="text-nowrap">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?= URLROOT ?>/projects/edit/<?= $project->id ?>"
                                            class="btn btn-sm btn-warning">
                                            <?= __('edit') ?>
                                        </a>

                                        <?php if (empty($showArchived)): ?>

                                            <a href="<?= URLROOT ?>/projects/archive/<?= $project->id ?>"
                                                class="btn btn-sm btn-secondary"
                                                onclick="return confirm('<?= htmlspecialchars(__('archive_project_confirm'), ENT_QUOTES) ?>')">
                                                <?= __('archive') ?>
                                            </a>

                                        <?php endif; ?>

                                        <?php if (!empty($showArchived)): ?>

                                            <a href="<?= URLROOT ?>/projects/restore/<?= $project->id ?>"
                                                class="btn btn-sm btn-success"
                                                onclick="return confirm('<?= htmlspecialchars(__('restore_project_confirm'), ENT_QUOTES) ?>')">
                                                <?= __('restore') ?>
                                            </a>

                                        <?php endif; ?>

                                        <?php if ($_SESSION['role_id'] == 1): ?>

                                            <a href="<?= URLROOT ?>/projects/delete/<?= $project->id ?>"
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('<?= htmlspecialchars(__('delete_project_confirm'), ENT_QUOTES) ?>')">
                                                <?= __('delete') ?>

                                            </a>

                                        <?php endif; ?>

                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    <?php endif; ?>

                </tbody>
            </table>

        </div>

    </div>

</div>
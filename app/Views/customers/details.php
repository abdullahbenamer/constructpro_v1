<h2 class="mb-3">
    <?= __('customer_details') ?>
</h2>

<!-- CUSTOMER INFORMATION -->
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-user-tie me-2"></i>
        <?= __('customer_information') ?>
    </div>

    <div class="card-body">

        <div class="row g-4">

            <!-- NAME -->
            <div class="col-md-4">
                <div class="text-muted small">
                    <?= __('name') ?>
                </div>

                <strong>
                    <?= htmlspecialchars($data['customer']->name ?? 'N/A') ?>
                </strong>
            </div>

            <!-- COMPANY -->
            <div class="col-md-4">
                <div class="text-muted small">
                    <?= __('company') ?>
                </div>

                <strong>
                    <?= htmlspecialchars($data['customer']->company ?? 'N/A') ?>
                </strong>
            </div>

            <!-- STATUS -->
            <div class="col-md-4">
                <div class="text-muted small">
                    <?= __('status') ?>
                </div>

                <?php
                $status = strtolower($data['customer']->status ?? '');

                $statusClass = [
                    'active'   => 'success',
                    'inactive' => 'secondary'
                ][$status] ?? 'secondary';
                ?>

                <span class="badge bg-<?= $statusClass ?>">
                    <?= htmlspecialchars(
                        $status === 'active'
                            ? __('active')
                            : ($status === 'inactive'
                                ? __('inactive')
                                : ($data['customer']->status ?? 'N/A'))
                    ) ?>
                </span>
            </div>

            <!-- EMAIL -->
            <div class="col-md-4">
                <div class="text-muted small">
                    <?= __('email') ?>
                </div>

                <?php if (!empty($data['customer']->email)): ?>
                    <a href="mailto:<?= htmlspecialchars($data['customer']->email) ?>">
                        <?= htmlspecialchars($data['customer']->email) ?>
                    </a>
                <?php else: ?>
                    <span class="text-muted">N/A</span>
                <?php endif; ?>
            </div>

            <!-- PHONE -->
            <div class="col-md-4">
                <div class="text-muted small">
                    <?= __('phone') ?>
                </div>

                <?php if (!empty($data['customer']->phone)): ?>
                    <a href="tel:<?= htmlspecialchars($data['customer']->phone) ?>">
                        <?= htmlspecialchars($data['customer']->phone) ?>
                    </a>
                <?php else: ?>
                    <span class="text-muted">N/A</span>
                <?php endif; ?>
            </div>

            <!-- ACCOUNT MANAGER -->
            <div class="col-md-4">
                <div class="text-muted small">
                    <?= __('account_manager') ?>
                </div>

                <?php if (!empty($data['customer']->account_manager_id)): ?>

                    <a
                        href="<?= URLROOT ?>/users/details/<?= (int)$data['customer']->account_manager_id ?>"
                        class="text-decoration-none fw-semibold">

                        <?= htmlspecialchars(
                            $data['customer']->account_manager ?? __('not_assigned')
                        ) ?>

                    </a>

                <?php else: ?>

                    <span class="text-muted">
                        <?= __('not_assigned') ?>
                    </span>

                <?php endif; ?>
            </div>

            <!-- ADDRESS -->
            <div class="col-md-8">
                <div class="text-muted small">
                    <?= __('address') ?>
                </div>

                <strong>
                    <?= !empty($data['customer']->address)
                        ? nl2br(htmlspecialchars($data['customer']->address))
                        : 'N/A'
                    ?>
                </strong>
            </div>

            <!-- CREATED AT -->
            <div class="col-md-4">
                <div class="text-muted small">
                    <?= __('created_at') ?>
                </div>

                <strong>
                    <?= !empty($data['customer']->created_at)
                        ? date('d M Y', strtotime($data['customer']->created_at))
                        : 'N/A'
                    ?>
                </strong>
            </div>

        </div>

    </div>
</div>


<!-- CUSTOMER PROJECTS -->
<div class="card">

    <div class="card-header">
        <i class="fas fa-building me-2"></i>
        <?= __('projects') ?>
    </div>

    <div class="card-body">

        <?php if (!empty($data['projects'])): ?>

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th><?= __('project') ?></th>
                            <th><?= __('status') ?></th>
                            <th><?= __('project_manager') ?></th>
                            <th><?= __('action') ?></th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($data['projects'] as $project): ?>

                            <tr>

                                <!-- PROJECT -->
                                <td>
                                    <a
                                        class="fw-bold text-decoration-none"
                                        href="<?= URLROOT ?>/project-costs/index/<?= $project->id ?>">

                                        <i class="fas fa-building me-1"></i>

                                        <?= strtoupper(
                                            htmlspecialchars($project->title)
                                        ) ?>

                                    </a>
                                </td>

                                <!-- STATUS -->
                                <td>

                                    <?php
                                    $statusLabels = [
                                        'planning'    => __('planning'),
                                        'in_progress' => __('in_progress'),
                                        'testing'     => __('testing'),
                                        'completed'   => __('completed_status'),
                                        'cancelled'   => __('cancelled')
                                    ];

                                    $statusColors = [
                                        'planning'    => 'secondary',
                                        'in_progress' => 'warning',
                                        'testing'     => 'info',
                                        'completed'   => 'success',
                                        'cancelled'   => 'danger'
                                    ];

                                    $projectStatus = strtolower(
                                        $project->status ?? ''
                                    );
                                    ?>

                                    <span class="badge bg-<?= $statusColors[$projectStatus] ?? 'secondary' ?>">

                                        <?= htmlspecialchars(
                                            $statusLabels[$projectStatus]
                                                ?? strtoupper($projectStatus)
                                        ) ?>

                                    </span>

                                </td>

                                <!-- PROJECT MANAGER -->
                                <td>

                                    <?php if (!empty($project->project_manager_id)): ?>

                                        <a
                                            class="text-decoration-none"
                                            href="<?= URLROOT ?>/users/details/<?= (int)$project->project_manager_id ?>">

                                            <?= htmlspecialchars(
                                                $project->project_manager ?? 'N/A'
                                            ) ?>

                                        </a>

                                    <?php else: ?>

                                        <?= __('n_a') ?>

                                    <?php endif; ?>

                                </td>

                                <!-- ACTION -->
                                <td>

                                    <a
                                        class="btn btn-sm btn-info"
                                        href="<?= URLROOT ?>/project-costs/<?= $project->id ?>">

                                        <?= __('details') ?>

                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        <?php else: ?>

            <div class="text-muted text-center py-4">
                <?= __('no_projects_found') ?>
            </div>

        <?php endif; ?>

    </div>

</div>
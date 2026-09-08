<!-- =========================================================
     PROJECT WORKSPACE HEADER
========================================================= -->

<div class="card shadow-sm mb-3">

    <div class="card-body">

        <!-- PROJECT IDENTITY -->
        <div class="d-flex flex-wrap justify-content-between align-items-start mb-3">

            <div>
                <div class="text-muted small">
                    PROJECT
                </div>

                <h3 class="mb-1 text-uppercase">
                    <?= htmlspecialchars($project->title) ?>
                </h3>

                <div>
                    <span class="badge bg-primary fs-6">
                        <?= htmlspecialchars($project->project_code ?? 'N/A') ?>
                    </span>

                    <span class="badge bg-secondary fs-6">
                        <?= htmlspecialchars(ucfirst($project->project_type ?? 'N/A')) ?>
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
                        <?= ucwords(str_replace('_', ' ', $project->status ?? 'N/A')) ?>
                    </span>
                </div>
            </div>

            <div class="mt-2 mt-md-0">

                <a href="<?= URLROOT ?>/projects/edit/<?= $project->id ?>"
                   class="btn btn-warning">
                    <i class="fas fa-edit"></i>
                    Edit Project
                </a>

                <a href="<?= URLROOT ?>/customers/details/<?= $project->customer_id ?>"
                   class="btn btn-outline-primary">
                    <i class="fas fa-address-card"></i>
                    Customer
                </a>

            </div>

        </div>


        <!-- PROJECT SPECIFICATIONS -->
        <div class="border rounded p-3 bg-light">

            <h6 class="mb-3">
                <i class="fas fa-info-circle"></i>
                PROJECT SPECIFICATIONS
            </h6>

            <div class="row g-3">

                <!-- PROJECT CODE -->
                <div class="col-md-3">
                    <div class="text-muted small">
                        Project Code
                    </div>

                    <strong>
                        <?= htmlspecialchars($project->project_code ?? 'N/A') ?>
                    </strong>
                </div>


                <!-- PROJECT TYPE -->
                <div class="col-md-3">
                    <div class="text-muted small">
                        Project Type
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
                        Customer
                    </div>

                    <strong>
                        <?= htmlspecialchars($project->customer_name ?? 'N/A') ?>
                    </strong>
                </div>


                <!-- CONTRACT NUMBER -->
                <div class="col-md-3">
                    <div class="text-muted small">
                        Contract Number
                    </div>

                    <strong>
                        <?= htmlspecialchars($project->contract_number ?? 'N/A') ?>
                    </strong>
                </div>


                <!-- PROJECT MANAGER -->
                <div class="col-md-3">
                    <div class="text-muted small">
                        Project Manager
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
                        Priority
                    </div>

                    <strong>
                        <?= htmlspecialchars(
                            ucfirst($project->priority ?? 'N/A')
                        ) ?>
                    </strong>
                </div>


                <!-- START DATE -->
                <div class="col-md-3">
                    <div class="text-muted small">
                        Start Date
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
                        Deadline
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
                        Site Location
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
                        Project Warehouse
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
                        Project Budget
                    </div>

                    <strong>
                        <?= number_format(
                            (float)($project->budget ?? 0),
                            2
                        ) ?>
                        LYD
                    </strong>
                </div>

            </div>


            <!-- PROJECT SCOPE -->
            <div class="mt-4">

                <div class="text-muted small mb-2">
                    Project Scope
                </div>

                <?php if (!empty($project_scopes)): ?>

                    <?php foreach ($project_scopes as $scope): ?>

                        <span class="badge bg-dark me-1 mb-1">
                            <?= htmlspecialchars($scope->scope) ?>
                        </span>

                    <?php endforeach; ?>

                <?php else: ?>

                    <span class="text-muted">
                        No project scope specified.
                    </span>

                <?php endif; ?>

            </div>


            <!-- DESCRIPTION -->
            <?php if (!empty($project->description)): ?>

                <div class="mt-4">

                    <div class="text-muted small mb-1">
                        Description
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
        Projects
    </a>

    <a href="<?= URLROOT ?>/projects/documents/<?= $project->id ?>"
       class="btn btn-secondary">
        <i class="fas fa-folder-open"></i>
        Documents
    </a>

    <a href="<?= URLROOT ?>/projectcosts/finance/<?= $project->id ?>"
       class="btn btn-primary">
        <i class="fas fa-money-check-dollar"></i>
        Advance Payment
    </a>

    <a href="<?= URLROOT ?>/projectcosts/ledger/<?= $project->id ?>"
       class="btn btn-secondary">
        <i class="fas fa-book"></i>
        Finance Ledger
    </a>

    <a href="<?= URLROOT ?>/projectcosts/financeDashboard/<?= $project->id ?>"
       class="btn btn-info">
        <i class="fas fa-chart-line"></i>
        Finance Dashboard
    </a>

</div>


<!-- =========================================================
     PROJECT COSTS TITLE
========================================================= -->

<div class="d-flex justify-content-between align-items-center mb-3">

    <h3 class="mb-0">
        <i class="fas fa-coins"></i>
        Project Costs
    </h3>

    <a href="<?= URLROOT ?>/project-costs/create/<?= $project->id ?>"
       class="btn btn-primary">
        <i class="fas fa-plus"></i>
        Add Cost
    </a>

</div>
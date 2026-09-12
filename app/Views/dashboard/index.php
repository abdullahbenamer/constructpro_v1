<div class="row mb-4">

    <div class="col-12">

        <h1>
            <i class="fas fa-tachometer-alt text-primary"></i>
      <?= __('dashboard') ?>
        </h1>

        <p class="text-muted">
            <i class="fas fa-city"></i>
         <?= __('construction_professional') ?>
            <i class="fas fa-drafting-compass"></i>
            -
            <?= date('F j, Y') ?>
        </p>

    </div>

</div>


<!-- =========================================================
     STATS CARDS
========================================================= -->

<div class="row mb-4">

    <!-- Active Projects -->
 
<div class="col-xl-3 col-md-6 mb-4">

    <a
        href="<?= URLROOT ?>/projects"
        class="text-decoration-none text-dark"
    >

        <div class="card border-left-primary shadow h-100 py-2">

            <div class="card-body">

                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                         <?= __('active_projects') ?>
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= count($active_projects) ?>
                        </div>

                    </div>

                    <div class="col-auto">

                        <i class="fas fa-project-diagram fa-2x text-gray-300"></i>

                    </div>

                </div>

            </div>

        </div>

    </a>

</div>
    <!-- Low Stock -->

    <div class="col-xl-3 col-md-6 mb-4">
        <a
        href="<?= URLROOT ?>/inventory"
        class="text-decoration-none text-dark"
    >
            <div class="card border-left-warning shadow h-100 py-2">

            <div class="card-body">

                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                          <?= __('low_stock') ?>
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= count($low_stock) ?>
                        </div>

                    </div>

                    <div class="col-auto">

                        <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>

                    </div>

                </div>

            </div>

        </div>
        </a>
    </div>


    <!-- Customers -->

  <div class="col-xl-3 col-md-6 mb-4">

    <a
        href="<?= URLROOT ?>/customers"
        class="text-decoration-none text-dark"
    >

        <div class="card border-left-success shadow h-100 py-2">

            <div class="card-body">

                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                      <?= __('customers') ?>
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= count($customers) ?>
                        </div>

                    </div>

                    <div class="col-auto">

                        <i class="fas fa-users fa-2x text-gray-300"></i>

                    </div>

                </div>

            </div>

        </div>

    </a>

</div>


    <!-- Resource Requisitions -->

<div class="col-xl-3 col-md-6 mb-4">

    <a
        href="<?= URLROOT ?>/ResourceRequisitions"
        class="text-decoration-none text-dark"
    >

        <div class="card border-left-info shadow h-100 py-2">

            <div class="card-body">

                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">

                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                         <?= __('resource_requisitions') ?>
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?= count($resource_requisitions ?? []) ?>
                        </div>

                    </div>

                    <div class="col-auto">

                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>

                    </div>

                </div>

            </div>

        </div>

    </a>

</div>

</div>


<?php
/*
|--------------------------------------------------------------------------
| PORTFOLIO BUDGET CALCULATIONS
|--------------------------------------------------------------------------
*/

$totalBudget =
    (float)($total_portfolio_budget ?? 0);

$totalCosts =
    (float)($total_project_costs ?? 0);

$remainingBudget =
    $totalBudget - $totalCosts;

$usedPercent =
    ($totalBudget > 0)
    ? min(
        100,
        ($totalCosts / $totalBudget) * 100
    )
    : 0;

$remainingPercent =
    max(
        0,
        100 - $usedPercent
    );


/*
|--------------------------------------------------------------------------
| PROGRESS BAR COLOR
|--------------------------------------------------------------------------
*/

$barClass = 'bg-success';

if ($usedPercent >= 90) {

    $barClass = 'bg-danger';

} elseif ($usedPercent >= 70) {

    $barClass = 'bg-warning';

}
?>


<!-- =========================================================
     FINANCIAL / PORTFOLIO CARDS
========================================================= -->

<div class="row mb-4">

    <!-- Portfolio Budget -->

    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card bg-primary text-white shadow h-100">

            <div class="card-body">

                <h5>
                 <?= __('total_portfolio_budget') ?>
                </h5>

                <h2>
                    LYD <?= number_format($totalBudget, 0) ?>
                </h2>

            </div>

        </div>

    </div>


    <!-- Portfolio Project Costs -->

    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card bg-warning text-white shadow h-100">

            <div class="card-body">

                <h5>
             <?= __('total_portfolio_projects_cost') ?>
                </h5>

                <h2 class="mb-3">

                    LYD <?= number_format(
                        $totalCosts,
                        0
                    ) ?>

                </h2>

            </div>

        </div>

    </div>


    <!-- Remaining Budget -->

    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card shadow h-100">

            <div class="card-body">

                <h5 class="mb-3">
         <?= __('remaining_budget') ?>
                </h5>

                <h3 class="mb-3">

                    LYD <?= number_format(
                        $remainingBudget,
                        0
                    ) ?>

                </h3>


                <div
                    class="progress"
                    style="height:22px;"
                >

                    <div
                        class="progress-bar <?= $barClass ?>"
                        role="progressbar"
                        style="width: <?= $usedPercent ?>%;"
                    >

                        <?= number_format(
                            $usedPercent,
                            1
                        ) ?>%

                    </div>

                </div>


                <small class="text-muted">

                    <?= number_format(
                        $remainingPercent,
                        1
                    ) ?>%
           <?= __('budget_remaining') ?>

                </small>

            </div>

        </div>

    </div>


    <!-- Supplier Payables -->

    <div class="col-xl-3 col-md-6 mb-4">

        <div class="card bg-danger text-white shadow h-100">

            <div class="card-body">

                <h5>
                    <?= __('supplier_payables') ?>
                </h5>

                <h2>

                    LYD <?= number_format(
                        $total_supplier_outstanding ?? 0,
                        2
                    ) ?>

                </h2>

                <small>
                   <?= __('total_outstanding') ?>
                </small>

            </div>

        </div>

    </div>

</div>


<!-- =========================================================
     RECENT PROJECTS
========================================================= -->

<div class="row">

    <div class="col-lg-8 mb-4">

        <div class="card shadow mb-4">

            <div class="card-header py-3">

                <h6 class="m-0 font-weight-bold text-primary">
          <?= __('recent_projects') ?>
                </h6>

            </div>


            <div class="card-body">

                <?php if (
                    isset($active_projects) &&
                    count($active_projects) > 0
                ) : ?>


                    <?php foreach (
                        array_slice(
                            $active_projects,
                            0,
                            4
                        )
                        as $project
                    ) : ?>


                        <div
                            class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-2"
                        >

                            <div>

                                <h6 class="mb-1">

                                    <a
                                        href="<?= URLROOT ?>/project-costs/<?= $project->id ?>"
                                        class="text-decoration-none text-dark"
                                    >

                                        <?= strtoupper(
                                            htmlspecialchars(
                                                $project->title
                                            )
                                        ) ?>

                                    </a>

                                </h6>


                                <small class="text-muted">

                              <?= __('customer') ?>

                                    <a
                                        href="<?= URLROOT ?>/customers/details/<?= $project->customer_id ?>"
                                        class="text-decoration-none text-muted"
                                    >
                                        <?= htmlspecialchars(
                                            $project->customer_name
                                        ) ?>
                                    </a>
                                </small>
                            </div>
                            <span
                                class="badge bg-<?=
                                    $project->status == 'in_progress'
                                    ? 'warning'
                                    : (
                                        $project->status == 'testing'
                                        ? 'info'
                                        : 'success'
                                    )
                                ?>"
                            >

                                <?= ucfirst(
                                    $project->status
                                ) ?>

                            </span>

                        </div>


                    <?php endforeach; ?>


                <?php else : ?>

                    <p class="text-muted">
                  <?= __('no_active_projects') ?>
                    </p>

                <?php endif; ?>

            </div>

        </div>

    </div>

</div>
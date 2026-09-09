<h3>
    <?= __('project') ?> -
    <?= htmlspecialchars($project->title) ?>
</h3>

<br>

<h4>
    <?= __('finance_dashboard') ?>
</h4>

<br>

<div class="row g-3">

    <!-- Advances -->
    <div class="col-md-3">

        <div class="card bg-success text-white">

            <div class="card-body">

                <h6>
                    <?= __('total_advances') ?>
                </h6>

                <h3>
                    <?= number_format($summary['advances'], 2) ?>
                </h3>

            </div>

        </div>

    </div>


    <!-- Costs -->
    <div class="col-md-3">

        <div class="card bg-danger text-white">

            <div class="card-body">

                <h6>
                    <?= __('total_costs') ?>
                </h6>

                <h3>
                    <?= number_format($summary['costs'], 2) ?>
                </h3>

            </div>

        </div>

    </div>


    <!-- Balance -->
    <div class="col-md-3">

        <div class="card bg-primary text-white">

            <div class="card-body">

                <h6>
                    <?= __('available_balance') ?>
                </h6>

                <h3>
                    <?= number_format($summary['balance'], 2) ?>
                </h3>

            </div>

        </div>

    </div>


    <!-- Budget -->
    <div class="col-md-3">

        <div class="card bg-info text-white">

            <div class="card-body">

                <h6>
                    <?= __('project_budget') ?>
                </h6>

                <h3>
                    <?= number_format($project->budget, 2) ?>
                </h3>

            </div>

        </div>

    </div>

</div>


<!-- --------------------------------- -->

<div class="row mt-3">

    <div class="col-md-6">

        <div class="card">

            <div class="card-body">

                <h6>
                    <?= __('budget_utilization') ?>
                </h6>

                <div class="progress" style="height:25px;">

                    <div
                        class="progress-bar"
                        role="progressbar"
                        style="width: <?= min(100, $summary['budget_used']) ?>%">

                        <?= number_format($summary['budget_used'], 1) ?>%

                    </div>

                </div>

            </div>

        </div>

        <br>

        <div class="card">

            <div class="card-body">

                <h6>
                    <?= __('project_timeline_utilization') ?>
                </h6>

                <div class="progress" style="height:25px;">

                    <div
                        class="progress-bar bg-warning"
                        role="progressbar"
                        style="width: <?= $summary['timeline_used'] ?>%">

                        <?= number_format($summary['timeline_used'], 1) ?>%

                    </div>

                </div>

            </div>

        </div>

    </div>


    <div class="col-md-6">

        <div class="card">

            <div class="card-body">

                <h6>
                    <?= __('remaining_budget') ?>
                </h6>

                <h3>

                    <?= number_format(
                        $summary['budget_remaining'],
                        2
                    ) ?>

                </h3>

            </div>

        </div>

    </div>


    <div class="card mt-3">

        <div class="card-body">

            <h6>
                <?= __('advance_funding_vs_budget') ?>
            </h6>

            <div class="d-flex justify-content-between mb-2">

                <span>

                    <?= __('advances_label') ?>

                    <strong>
                        <?= number_format(
                            $summary['advances'],
                            2
                        ) ?>
                    </strong>

                </span>


                <span>

                    <?= __('budget_label') ?>

                    <strong>
                        <?= number_format(
                            $project->budget,
                            2
                        ) ?>
                    </strong>

                </span>

            </div>


            <div class="progress" style="height:25px;">

                <div
                    class="progress-bar bg-success"
                    role="progressbar"
                    style="width: <?= min(100, $summary['advance_funding']) ?>%;">

                    <?= number_format(
                        $summary['advance_funding'],
                        1
                    ) ?>%

                </div>

            </div>


            <small class="text-muted">

                <?= __('budget_funded_by_advances') ?>

            </small>

        </div>

    </div>

</div>


<br>


<!-- --------------------------- -->

<?php if ($summary['balance'] < 0): ?>

    <br>

    <div class="alert alert-danger">

        <i class="fas fa-triangle-exclamation"></i>

        <?= __('costs_exceeded_advances') ?>

    </div>

<?php endif; ?>


<?php if ($summary['budget_used'] > 90): ?>

    <div class="alert alert-warning">

        <i class="fas fa-exclamation-circle"></i>

        <?= __('budget_over_90_percent') ?>

    </div>

<?php endif; ?>
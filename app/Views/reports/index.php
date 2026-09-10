<div class="row">

    <div class="col-12">

        <h2>
            <i class="fas fa-chart-line"></i>
            <?= __('project_portfolio_dashboard') ?>
        </h2>

    </div>

</div>

<br>


<!-- --------------------------- -->

<div class="row mb-4">

    <div class="col-md-2">

        <div class="card">

            <div class="card-body">

                <h6>
                    <?= __('total_projects') ?>
                </h6>

                <h3>
                    <?= $dashboard->total_projects ?>
                </h3>

            </div>

        </div>

    </div>


    <div class="col-md-2">

        <div class="card">

            <div class="card-body">

                <h6>
                    <?= __('active') ?>
                </h6>

                <h3>
                    <?= $dashboard->active_projects ?>
                </h3>

            </div>

        </div>

    </div>


    <div class="col-md-2">

        <div class="card">

            <div class="card-body">

                <h6>
                    <?= __('completed') ?>
                </h6>

                <h3>
                    <?= $dashboard->completed_projects ?>
                </h3>

            </div>

        </div>

    </div>


    <div class="col-md-2">

        <div class="card bg-warning text-dark">

            <div class="card-body">

                <h6>
                    <?= __('due_soon') ?>
                </h6>

                <h3>
                    <?= $dashboard->due_soon_projects ?>
                </h3>

            </div>

        </div>

    </div>


    <div class="col-md-2">

        <div class="card bg-danger text-white">

            <div class="card-body">

                <h6>
                    <?= __('overdue') ?>
                </h6>

                <h3>
                    <?= $dashboard->overdue_projects ?>
                </h3>

            </div>

        </div>

    </div>

</div>


<div class="row mb-4">

    <div class="col-md-3">

        <div class="card bg-dark text-white">

            <div class="card-body">

                <h6>
                    <?= __('total_budget') ?>
                </h6>

                <h3>
                    <?= number_format(
                        $dashboard->total_budget,
                        2
                    ) ?>
                </h3>

            </div>

        </div>

    </div>


    <div class="col-md-3">

        <div class="card bg-success text-white">

            <div class="card-body">

                <h5>
                    <?= __('total_cash_in_advances') ?>
                </h5>

                <h3>
                    <?= number_format(
                        $global_advances,
                        2
                    ) ?>
                </h3>

            </div>

        </div>

    </div>


    <div class="col-md-3">

        <div class="card bg-danger text-white">

            <div class="card-body">

                <h5>
                    <?= __('total_cash_out_costs') ?>
                </h5>

                <h3>
                    <?= number_format(
                        $global_costs,
                        2
                    ) ?>
                </h3>

            </div>

        </div>

    </div>


    <div class="col-md-3">

        <div class="card bg-primary text-white">

            <div class="card-body">

                <h5>
                    <?= __('net_position') ?>
                </h5>

                <h3>
                    <?= number_format(
                        $global_balance,
                        2
                    ) ?>
                </h3>

            </div>

        </div>

    </div>

</div>


<!-- --------------------------------- -->

<div class="row mb-4">

    <div class="col-12">

        <h4>
            <?= __('cost_vs_budget_analysis') ?>
        </h4>

        <div class="table-responsive">

            <table class="table table-striped">

                <thead>

                    <tr>

                        <th>
                            <?= __('project_id') ?>
                        </th>

                        <th>
                            <?= __('project') ?>
                        </th>

                        <th>
                            <?= __('budget') ?>
                        </th>

                        <th>
                            <?= __('actual_cost') ?>
                        </th>

                        <th>
                            <?= __('variance') ?>
                        </th>

                        <th>
                            <?= __('status') ?>
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($cost_vs_budget as $report): ?>

                        <tr class="<?= $report->variance < 0
                            ? 'table-danger'
                            : 'table-success' ?>">

                            <td>

                                <?= "Prj-" . $report->id ?>

                            </td>

                            <td>

                                <a href="<?= URLROOT ?>/project-costs/financeDashboard/<?= $report->id ?>"
                                   class="text-decoration-none fw-bold">

                                    <?= htmlspecialchars(
                                        $report->title
                                    ) ?>

                                </a>

                            </td>

                            <td>
                                $<?= number_format(
                                    $report->budget,
                                    2
                                ) ?>
                            </td>

                            <td>
                                $<?= number_format(
                                    $report->actual_cost,
                                    2
                                ) ?>
                            </td>

                            <td>

                                <strong>

                                    <?= $report->variance < 0
                                        ? '-'
                                        : '' ?>$

                                    <?= number_format(
                                        abs($report->variance),
                                        2
                                    ) ?>

                                </strong>

                            </td>

                            <td>

                                <span class="badge bg-<?= $report->variance >= 0
                                    ? 'success'
                                    : 'danger' ?>">

                                    <?= $report->variance >= 0
                                        ? __('under_budget')
                                        : __('over_budget') ?>

                                </span>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>
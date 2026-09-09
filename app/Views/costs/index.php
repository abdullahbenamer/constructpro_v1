<div class="row">

    <div class="col-12">

        <h2>
            <i class="fas fa-coins"></i>
            <?= __('all_project_costs') ?>
        </h2>


        <div class="card">

            <div class="card-body">

                <h4>
                    <?= __('total_costs') ?>:
                    $<?= number_format($total_costs, 2) ?>
                </h4>

            </div>

        </div>


        <div class="table-responsive mt-3">

            <table class="table table-striped">

                <thead>

                    <tr>

                        <th>
                            <?= __('proj_id') ?>
                        </th>

                        <th>
                            <?= __('project') ?>
                        </th>

                        <th>
                            <?= __('type') ?>
                        </th>

                        <th>
                            <?= __('description') ?>
                        </th>

                        <th>
                            <?= __('qty') ?>
                        </th>

                        <th>
                            <?= __('unit_price') ?>
                        </th>

                        <th>
                            <?= __('total') ?>
                        </th>

                        <th>
                            <?= __('date') ?>
                        </th>

                    </tr>

                </thead>


                <tbody>

                    <?php foreach ($recent_costs as $cost) : ?>

                        <tr>

                            <td>

                                Prj-<?= htmlspecialchars(
                                    $cost->project_id
                                ) ?>

                                <a
                                    class="btn btn-sm btn-info"
                                    href="<?= URLROOT ?>/project-costs/<?= $cost->project_id ?>">

                                    <?= __('cost_details') ?>

                                </a>

                            </td>


                            <td>

                                <a
                                    href="<?= URLROOT ?>/projects/<?= $cost->project_id ?>">

                                    <?= htmlspecialchars(
                                        $cost->project_title
                                    ) ?>

                                </a>

                            </td>


                            <td>

                                <?php

                                $costTypeLabels = [
                                    'materials'     => __('materials'),
                                    'labor'         => __('labor'),
                                    'transport'     => __('transport'),
                                    'subcontract'   => __('subcontract'),
                                    'miscellaneous' => __('miscellaneous')
                                ];

                                ?>

                                <span class="badge bg-info">

                                    <?= htmlspecialchars(
                                        $costTypeLabels[$cost->cost_type]
                                            ?? ucfirst($cost->cost_type)
                                    ) ?>

                                </span>

                            </td>


                            <td>

                                <?= htmlspecialchars(
                                    $cost->item_name
                                        ?? $cost->description
                                ) ?>

                            </td>


                            <td>
                                <?= $cost->quantity ?>
                            </td>


                            <td>

                                $<?= number_format(
                                    $cost->unit_price,
                                    2
                                ) ?>

                            </td>


                            <td>

                                <strong>

                                    $<?= number_format(
                                        $cost->quantity *
                                        $cost->unit_price,
                                        2
                                    ) ?>

                                </strong>

                            </td>


                            <td>

                                <?= date(
                                    'Y-m-d',
                                    strtotime($cost->created_at)
                                ) ?>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>
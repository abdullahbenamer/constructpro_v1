<h2>
    <?= __('customer_details') ?>
</h2>


<div class="card p-3 mb-3">

    <h4>
        <?= htmlspecialchars($data['customer']->company) ?>
    </h4>


    <p>

        <strong>
            <?= __('account_manager') ?>:
        </strong>

        <?= htmlspecialchars(
            $data['customer']->account_manager
                ?? __('not_assigned')
        ) ?>

    </p>

</div>


<h4>
    <?= __('projects') ?>
</h4>


<table class="table table-bordered">

    <thead>

        <tr>

            <th>
                <?= __('project') ?>
            </th>

            <th>
                <?= __('status') ?>
            </th>

            <th>
                <?= __('project_manager') ?>
            </th>

            <th>
                <?= __('action') ?>
            </th>

        </tr>

    </thead>


    <tbody>

        <?php foreach ($data['projects'] as $project): ?>

            <tr>

                <td>

                    <a
                        class="fw-bold text-decoration-none"
                        href="<?= URLROOT ?>/project-costs/index/<?= $project->id ?>">

                        <i class="fas fa-building"></i> -

                        <?= strtoupper(
                            htmlspecialchars($project->title)
                        ) ?>

                    </a>

                </td>


                <td>

                    <?php

                    $statusLabels = [

                        'planning' =>
                            __('planning'),

                        'in_progress' =>
                            __('in_progress'),

                        'testing' =>
                            __('testing'),

                        'completed' =>
                            __('completed_status'),

                        'cancelled' =>
                            __('cancelled')

                    ];

                    ?>

                    <span class="badge bg-info">

                        <?= htmlspecialchars(
                            $statusLabels[$project->status]
                                ?? strtoupper($project->status)
                        ) ?>

                    </span>

                </td>


                <td>

                    <?php if (
                        !empty($project->project_manager_id)
                    ): ?>

                        <a
                            class="text-decoration-none"
                            href="<?= URLROOT ?>/users/details/<?= $project->project_manager_id ?>">

                            <?= htmlspecialchars(
                                $project->project_manager
                            ) ?>

                        </a>

                    <?php else: ?>

                        <?= __('n_a') ?>

                    <?php endif; ?>

                </td>


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
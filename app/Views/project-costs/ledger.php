<h3>
    <?= __('project') ?>:
    <?= $project->title ?>
</h3>

<br>

<h4>
    <?= __('project_ledger') ?>
</h4>

<a
    href="<?= URLROOT ?>/project-costs/ledgerReport/<?= $project->id ?>"
    target="_blank"
    class="btn btn-dark">

    <i class="fas fa-print"></i>

    <?= __('print_ledger') ?>

</a>


<table class="table table-striped">

    <thead>

        <tr>

            <!-- <th>ID</th> -->

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
                <?= __('debit') ?>
            </th>

            <th>
                <?= __('credit') ?>
            </th>

            <th>
                <?= __('balance') ?>
            </th>

            <th>
                <?= __('date') ?>
            </th>

        </tr>

    </thead>


    <tbody>

        <?php

        $balance = 0;

        foreach ($ledger as $row):

            $balance += $row->credit;
            $balance -= $row->debit;

        ?>

            <tr>

                <!-- <td><?//= $row->id ?></td> -->

                <td>

                    <?php if ($row->entry_type === 'advance'): ?>

                        <span class="badge bg-success">
                            <?= __('advance') ?>
                        </span>

                    <?php else: ?>

                        <span class="badge bg-danger">
                            <?= __('cost') ?>
                        </span>

                    <?php endif; ?>

                </td>


                <td>
                    <?= htmlspecialchars($row->description) ?>
                </td>


                <td>
                    <?= $row->quantity
                        ? number_format($row->quantity, 2)
                        : '-' ?>
                </td>


                <td>
                    <?= number_format($row->debit, 2) ?>
                </td>


                <td>
                    <?= number_format($row->credit, 2) ?>
                </td>


                <td class="<?= $row->balance_after < 0
                    ? 'text-danger fw-bold'
                    : 'text-success fw-bold' ?>">

                    <?= number_format(
                        $row->balance_after,
                        2
                    ) ?>

                </td>


                <td>
                    <?= date(
                        'Y-m-d',
                        strtotime($row->created_at)
                    ); ?>
                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>
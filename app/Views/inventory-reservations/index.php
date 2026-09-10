<h2>
    <?= __('inventory_reservations') ?>
</h2>

<a href="<?= URLROOT ?>/inventoryreservations/create"
   class="btn btn-primary mb-3">

    <?= __('new_reservation') ?>

</a>

<table class="table table-striped">

    <thead>

        <tr>

            <th><?= __('date') ?></th>
            <th><?= __('item') ?></th>
            <th><?= __('sku') ?></th>
            <th><?= __('project_site') ?></th>
            <th><?= __('required_date') ?></th>
            <th><?= __('qty') ?></th>
            <th><?= __('ordered_by') ?></th>
            <th><?= __('status') ?></th>
            <th><?= __('actions') ?></th>

        </tr>

    </thead>

    <tbody>

<?php if (!empty($reservations)): ?>

    <?php foreach ($reservations as $r): ?>

        <tr>

            <td>
                <?= $r->created_at ?>
            </td>

            <td>
                <?= htmlspecialchars($r->item_name) ?>
            </td>

            <td>
                <?= htmlspecialchars($r->sku) ?>
            </td>

            <td>
                <?= htmlspecialchars(
                    $r->project_name ?? '-'
                ) ?>
            </td>

            <?php

                $required =
                    strtotime($r->required_by_date);

                $today =
                    strtotime(date('Y-m-d'));

            ?>

            <td>

                <?php if (
                    $r->status == 'ACTIVE' &&
                    $required < $today
                ): ?>

                    <span class="badge bg-danger">

                        <?= date(
                            'd M Y',
                            $required
                        ) ?>

                    </span>

                <?php elseif (
                    $r->status == 'ACTIVE' &&
                    $required == $today
                ): ?>

                    <span class="badge bg-warning text-dark">

                        <?= __('today') ?>

                    </span>

                <?php else: ?>

                    <span class="badge bg-success">

                        <?= date(
                            'd M Y',
                            $required
                        ) ?>

                    </span>

                <?php endif; ?>

            </td>

            <td>
                <?= $r->quantity ?>
            </td>

            <td>

                <a href="<?= URLROOT ?>/users/details/<?= $r->created_by ?>">

                    <i class="fas fa-user text-primary"></i>

                    <?= htmlspecialchars(
                        $r->created_by_name ?? '-'
                    ) ?>

                </a>

            </td>

            <td>

                <?php if ($r->status == 'ACTIVE'): ?>

                    <span class="badge bg-warning">
                        <?= __('active') ?>
                    </span>

                <?php elseif ($r->status == 'FULFILLED'): ?>

                    <span class="badge bg-success">
                        <?= __('fulfilled') ?>
                    </span>

                <?php else: ?>

                    <span class="badge bg-danger">
                        <?= __('cancelled') ?>
                    </span>

                <?php endif; ?>

            </td>

            <td>

                <?php if ($r->status == 'ACTIVE'): ?>

                    <a href="<?= URLROOT ?>/inventoryreservations/edit/<?= $r->id ?>"
                       class="btn btn-primary btn-sm">

                        <?= __('edit') ?>

                    </a>

                    <a href="<?= URLROOT ?>/inventoryreservations/fulfill/<?= $r->id ?>"
                       class="btn btn-success btn-sm">

                        <?= __('fulfill') ?>

                    </a>

                    <a href="<?= URLROOT ?>/inventoryreservations/cancel/<?= $r->id ?>"
                       class="btn btn-warning btn-sm">

                        <?= __('cancel') ?>

                    </a>

                    <a href="<?= URLROOT ?>/inventoryreservations/delete/<?= $r->id ?>"
                       class="btn btn-outline-danger btn-sm"
                       onclick="return confirm('<?= __('delete_reservation_confirm') ?>')">

                        <?= __('delete') ?>

                    </a>

                <?php endif; ?>

            </td>

        </tr>

    <?php endforeach; ?>

<?php else: ?>

    <tr>

        <td colspan="9"
            class="text-center py-5">

            <i class="fas fa-box-open fa-3x text-muted mb-3"></i>

            <h5 class="text-muted">

                <?= __('no_inventory_reservations_found') ?>

            </h5>

            <p class="text-muted mb-3">

                <?= __('no_inventory_reservations_currently') ?>

            </p>

            <a href="<?= URLROOT ?>/inventoryreservations/create"
               class="btn btn-primary">

                <i class="fas fa-plus"></i>

                <?= __('create_first_reservation') ?>

            </a>

        </td>

    </tr>

<?php endif; ?>

    </tbody>

</table>
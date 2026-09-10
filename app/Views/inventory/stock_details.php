<h2 class="mb-4">

    <i class="fas fa-boxes"></i>

    <?= __('global_stock_details') ?>

</h2>

<!-- ITEM INFORMATION -->

<div class="card mb-4">

    <div class="card-header">

        <strong>
            <?= htmlspecialchars($item->name) ?>
        </strong>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-4">

                <strong><?= __('sku') ?>:</strong>

                <?= htmlspecialchars($item->sku) ?>

            </div>

            <div class="col-md-4">

                <strong><?= __('category') ?>:</strong>

                <?= htmlspecialchars(
                    $item->category ?? '-'
                ) ?>

            </div>

            <div class="col-md-4">

                <strong><?= __('base_unit') ?>:</strong>

                <?= htmlspecialchars(
                    $item->base_unit ?? 'unit'
                ) ?>

            </div>

        </div>

    </div>

</div>

<!-- STOCK SUMMARY -->

<div class="row mb-4">

    <div class="col-md-3 mb-3">

        <div class="card text-center h-100">

            <div class="card-body">

                <small class="text-muted">
                    <?= __('system_quantity') ?>
                </small>

                <h3 class="mt-2">
                    <?= number_format($system_qty, 2) ?>
                </h3>

                <small>
                    <?= htmlspecialchars($item->base_unit) ?>
                </small>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-3">

        <div class="card text-center h-100">

            <div class="card-body">

                <small class="text-muted">
                    <?= __('location_physical_total') ?>
                </small>

                <h3 class="mt-2">
                    <?= number_format($location_total, 2) ?>
                </h3>

                <small>
                    <?= htmlspecialchars($item->base_unit) ?>
                </small>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-3">

        <div class="card text-center h-100">

            <div class="card-body">

                <small class="text-muted">
                    <?= __('active_reserved') ?>
                </small>

                <h3 class="mt-2 text-warning">
                    <?= number_format($reserved_qty, 2) ?>
                </h3>

                <small>
                    <?= htmlspecialchars($item->base_unit) ?>
                </small>

            </div>

        </div>

    </div>

    <div class="col-md-3 mb-3">

        <div class="card text-center h-100">

            <div class="card-body">

                <small class="text-muted">
                    <?= __('total_available') ?>
                </small>

                <h3 class="mt-2 text-success">
                    <?= number_format($available_qty, 2) ?>
                </h3>

                <small>
                    <?= htmlspecialchars($item->base_unit) ?>
                </small>

            </div>

        </div>

    </div>

</div>

<!-- STOCK MATCH STATUS -->

<?php

$difference =
    $system_qty -
    $location_total;

?>

<?php if (abs($difference) < 0.01): ?>

    <div class="alert alert-success">

        <i class="fas fa-check-circle"></i>

        <strong>
            <?= __('stock_matched') ?>
        </strong>

        <?= __('stock_quantity_matches_locations') ?>

    </div>

<?php else: ?>

    <div class="alert alert-danger">

        <i class="fas fa-exclamation-triangle"></i>

        <strong>
            <?= __('stock_mismatch_detected') ?>
        </strong>

        <?= __('difference') ?>:

        <?= number_format(abs($difference), 2) ?>

        <?= htmlspecialchars($item->base_unit) ?>

    </div>

<?php endif; ?>

<!-- LOCATION BREAKDOWN -->

<div class="card">

    <div class="card-header">

        <strong>

            <i class="fas fa-warehouse"></i>

            <?= __('location_stock_distribution') ?>

        </strong>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-striped mb-0">

                <thead>

                    <tr>

                        <th><?= __('location') ?></th>

                        <th class="text-end">
                            <?= __('physical_qty') ?>
                        </th>

                        <th class="text-end">
                            <?= __('reserved_qty') ?>
                        </th>

                        <th class="text-end">
                            <?= __('available_qty') ?>
                        </th>

                        <th>
                            <?= __('status') ?>
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php if (empty($locations)): ?>

                        <tr>

                            <td colspan="5"
                                class="text-center text-muted py-4">

                                <?= __('no_location_stock_found') ?>

                            </td>

                        </tr>

                    <?php else: ?>

                        <?php foreach ($locations as $location): ?>

                            <?php

                            $physical =
                                (float)$location->physical_qty;

                            $reserved =
                                (float)$location->reserved_qty;

                            $available =
                                (float)$location->available_qty;

                            ?>

                            <tr>

                                <td>

                                    <strong>

                                        <?= htmlspecialchars(
                                            $location->location_code
                                        ) ?>

                                    </strong>

                                    <?php if (!empty($location->location_name)): ?>

                                        <br>

                                        <small class="text-muted">

                                            <?= htmlspecialchars(
                                                $location->location_name
                                            ) ?>

                                        </small>

                                    <?php endif; ?>

                                </td>

                                <td class="text-end">

                                    <?= number_format(
                                        $physical,
                                        2
                                    ) ?>

                                </td>

                                <td class="text-end text-warning">

                                    <?= number_format(
                                        $reserved,
                                        2
                                    ) ?>

                                </td>

                                <td class="text-end text-success">

                                    <?= number_format(
                                        $available,
                                        2
                                    ) ?>

                                </td>

                                <td>

                                    <?php if ($physical <= 0): ?>

                                        <span class="badge bg-danger">
                                            <?= __('out_of_stock') ?>
                                        </span>

                                    <?php elseif ($available <= 0): ?>

                                        <span class="badge bg-warning text-dark">
                                            <?= __('fully_reserved') ?>
                                        </span>

                                    <?php elseif ($reserved > 0): ?>

                                        <span class="badge bg-info">
                                            <?= __('partially_reserved') ?>
                                        </span>

                                    <?php else: ?>

                                        <span class="badge bg-success">
                                            <?= __('available') ?>
                                        </span>

                                    <?php endif; ?>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </tbody>

                <tfoot>

                    <tr class="table-dark">

                        <th>
                            <?= __('total') ?>
                        </th>

                        <th class="text-end">

                            <?= number_format(
                                $location_total,
                                2
                            ) ?>

                        </th>

                        <th class="text-end">

                            <?= number_format(
                                $reserved_qty,
                                2
                            ) ?>

                        </th>

                        <th class="text-end">

                            <?= number_format(
                                $available_qty,
                                2
                            ) ?>

                        </th>

                        <th></th>

                    </tr>

                </tfoot>

            </table>

        </div>

    </div>

</div>

<!-- ACTIONS -->

<div class="mt-4">

    <a href="<?= URLROOT ?>/inventory"
       class="btn btn-secondary">

        <i class="fas fa-arrow-left"></i>

        <?= __('back_to_inventory') ?>

    </a>

    <a href="<?= URLROOT ?>/inventory/details/<?= $item->id ?>"
       class="btn btn-outline-primary">

        <i class="fas fa-history"></i>

        <?= __('item_details_history') ?>

    </a>

</div>
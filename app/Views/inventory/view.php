<h2>

    <i class="fas fa-box"></i>

    <?= __('inventory_details') ?>

</h2>

<a href="<?= URLROOT ?>/inventory"
   class="btn btn-secondary mb-3">

    <?= __('back') ?>

</a>

<!-- ITEM INFO -->

<div class="card mb-4">

    <div class="card-body">

        <h3>
            <?= htmlspecialchars($item->name) ?>
        </h3>

        <div class="row">

            <div class="col-md-3">

                <strong><?= __('sku') ?>:</strong><br>

                <?= htmlspecialchars($item->sku) ?>

            </div>

            <div class="col-md-3">

                <strong><?= __('category') ?>:</strong><br>

                <?= htmlspecialchars($item->category) ?>

            </div>

            <div class="col-md-3">

                <strong><?= __('current_stock') ?>:</strong><br>

                <span class="badge bg-primary">

                    <?= $item->quantity ?>
                    <?= $item->base_unit ?>

                </span>

            </div>

            <div class="col-md-3">

                <strong><?= __('total_value') ?>:</strong><br>

                LYD

                <?= number_format(
                    $item->quantity *
                    $item->cost_price,
                    2
                ) ?>

            </div>

        </div>

    </div>

</div>

<!-- MOVEMENTS -->

<div class="card mb-4">

    <div class="card-header">

        <strong>
            <?= __('stock_movements') ?>
        </strong>

    </div>

    <div class="card-body">

        <table class="table table-striped">

            <thead>

                <tr>

                    <th><?= __('date') ?></th>
                    <th><?= __('type') ?></th>
                    <th><?= __('qty') ?></th>
                    <th><?= __('balance') ?></th>
                    <th><?= __('supplier') ?></th>
                    <th><?= __('reference') ?></th>
                    <th><?= __('notes') ?></th>

                </tr>

            </thead>

            <tbody>

                <?php foreach ($movements as $m) : ?>

                    <tr>

                        <td>
                            <?= $m->created_at ?>
                        </td>

                        <td>

                            <?php if ($m->type == 'IN') : ?>

                                <span class="badge bg-success">
                                    <?= __('in') ?>
                                </span>

                            <?php elseif ($m->type == 'OUT') : ?>

                                <span class="badge bg-danger">
                                    <?= __('out') ?>
                                </span>

                            <?php else : ?>

                                <span class="badge bg-warning">
                                    <?= __('adjustment') ?>
                                </span>

                            <?php endif; ?>

                        </td>

                        <td>
                            <?= $m->quantity ?>
                        </td>

                        <td>
                            <?= $m->balance_after ?>
                        </td>

                        <td>
                            <?= htmlspecialchars(
                                $m->supplier_name ?? '-'
                            ) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars(
                                $m->reference ?? '-'
                            ) ?>
                        </td>

                        <td>
                            <?= htmlspecialchars(
                                $m->notes ?? '-'
                            ) ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<!-- PROJECT USAGE -->

<div class="card">

    <div class="card-header">

        <strong>
            <?= __('project_usage') ?>
        </strong>

    </div>

    <div class="card-body">

        <table class="table table-striped">

            <thead>

                <tr>

                    <th><?= __('project') ?></th>
                    <th><?= __('quantity') ?></th>
                    <th><?= __('unit_cost') ?></th>
                    <th><?= __('total') ?></th>
                    <th><?= __('date') ?></th>

                </tr>

            </thead>

            <tbody>

                <?php foreach ($projectUsage as $u) : ?>

                    <tr>

                        <td>
                            <?= htmlspecialchars(
                                $u->project_title
                            ) ?>
                        </td>

                        <td>
                            <?= $u->quantity ?>
                        </td>

                        <td>
                            LYD
                            <?= number_format(
                                $u->unit_price,
                                2
                            ) ?>
                        </td>

                        <td>

                            LYD

                            <?= number_format(
                                $u->quantity *
                                $u->unit_price,
                                2
                            ) ?>

                        </td>

                        <td>
                            <?= $u->created_at ?>
                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>
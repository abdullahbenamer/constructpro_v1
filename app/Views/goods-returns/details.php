<h2>
    <i class="fas fa-undo"></i>
    <?= __('goods_return_details') ?>
</h2>

<div class="card mb-4">

    <div class="card-header">
        <strong>
            <?= __('return_information') ?>
        </strong>
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-4 mb-3">

                <strong><?= __('return_number') ?></strong>

                <div>
                    <?= htmlspecialchars(
                        $return->return_number
                    ) ?>
                </div>

            </div>

            <div class="col-md-4 mb-3">

                <strong><?= __('supplier') ?></strong>

                <div>
                    <?= htmlspecialchars(
                        $return->supplier_name
                    ) ?>
                </div>

            </div>

            <div class="col-md-4 mb-3">

                <strong><?= __('return_date') ?></strong>

                <div>
                    <?= htmlspecialchars(
                        $return->return_date
                    ) ?>
                </div>

            </div>

            <div class="col-md-4 mb-3">

                <strong><?= __('grn') ?></strong>

                <div>
                    <?= htmlspecialchars(
                        $return->grn_number
                    ) ?>
                </div>

            </div>

            <div class="col-md-4 mb-3">

                <strong><?= __('purchase_order') ?></strong>

                <div>
                    <?= htmlspecialchars(
                        $return->po_number
                    ) ?>
                </div>

            </div>

            <div class="col-md-4 mb-3">

                <strong><?= __('total_amount') ?></strong>

                <div class="fw-bold">
                    <?= number_format(
                        (float)$return->total_amount,
                        2
                    ) ?>
                </div>

            </div>

            <div class="col-md-6 mb-3">

                <strong><?= __('reason') ?></strong>

                <div>
                    <?= htmlspecialchars(
                        $return->reason ?? ''
                    ) ?>
                </div>

            </div>

            <div class="col-md-6 mb-3">

                <strong><?= __('notes') ?></strong>

                <div>
                    <?= nl2br(
                        htmlspecialchars(
                            $return->notes ?? ''
                        )
                    ) ?>
                </div>

            </div>

        </div>

    </div>

</div>


<div class="card">

    <div class="card-header">
        <strong>
            <?= __('returned_items') ?>
        </strong>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>

                        <th>#</th>
                        <th><?= __('item') ?></th>
                        <th><?= __('sku') ?></th>
                        <th><?= __('original_grn_location') ?></th>
                        <th><?= __('returned_from') ?></th>
                        <th><?= __('quantity') ?></th>
                        <th><?= __('unit_cost') ?></th>
                        <th><?= __('total') ?></th>

                    </tr>

                </thead>

                <tbody>

                <?php if (empty($items)): ?>

                    <tr>

                        <td colspan="8"
                            class="text-center text-muted">

                            <?= __('no_returned_items_found') ?>

                        </td>

                    </tr>

                <?php else: ?>

                    <?php foreach ($items as $item): ?>

                        <tr>

                            <td>
                                <?= $item->id ?>
                            </td>

                            <td>
                                <?= htmlspecialchars(
                                    $item->name
                                ) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars(
                                    $item->sku ?? ''
                                ) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars(
                                    $item->original_location_name ?? 'N/A'
                                ) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars(
                                    $item->return_location_name ?? 'N/A'
                                ) ?>
                            </td>

                            <td>
                                <?= number_format(
                                    (float)$item->quantity,
                                    2
                                ) ?>
                                <?= htmlspecialchars(
                                    $item->base_unit ?? ''
                                ) ?>
                            </td>

                            <td>
                                <?= number_format(
                                    (float)$item->unit_cost,
                                    2
                                ) ?>
                            </td>

                            <td>
                                <?= number_format(
                                    (float)$item->total_cost,
                                    2
                                ) ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>


<div class="mt-3">

    <a href="<?= URLROOT ?>/goodsreturns"
       class="btn btn-secondary">

        <i class="fas fa-arrow-left"></i>
        <?= __('back_to_goods_returns') ?>

    </a>

</div>
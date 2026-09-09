<h2><?= __('purchase_orders') ?></h2>

<a href="<?= URLROOT ?>/purchaseorders/create"
   class="btn btn-primary mb-3">

    <?= __('create_purchase_order') ?>

</a>


<table class="table table-bordered">

    <thead>

        <tr>

            <th><?= __('po_number') ?></th>

            <th><?= __('supplier') ?></th>

            <th><?= __('status') ?></th>

            <th><?= __('total') ?></th>

            <th><?= __('date') ?></th>

            <th><?= __('actions') ?></th>

        </tr>

    </thead>


    <tbody>

        <?php foreach ($orders as $po): ?>

            <tr>

                <td>
                    <?= $po->po_number ?>
                </td>


                <td>

                    <a
                        href="<?= URLROOT ?>/suppliers/info/<?= $po->supplier_id ?>"
                        target="_blank"
                        class="fw-bold text-decoration-none">

                        <i class="fas fa-truck"></i>

                        <?= htmlspecialchars($po->supplier_name) ?>

                    </a>

                </td>


                <td>
                    <?= $po->status ?>
                </td>


                <td>
                    <?= number_format($po->total_amount, 2) ?>
                </td>


                <td>
                    <?= date(
                        'Y-m-d',
                        strtotime($po->created_at)
                    ) ?>
                </td>


                <td>

                    <a
                        href="<?= URLROOT ?>/purchaseorders/details/<?= $po->id ?>"
                        class="btn btn-sm btn-info">

                        <?= __('open') ?>

                    </a>


                    <a
                        href="<?= URLROOT ?>/purchaseorders/itemsPage/<?= $po->id ?>"
                        class="btn btn-sm btn-primary">

                        <?= __('items') ?>

                    </a>


                    <?php if (
                        $po->status === 'draft' &&
                        (int)$po->item_count > 0
                    ): ?>

                        <a
                            href="<?= URLROOT ?>/purchaseorders/approve/<?= $po->id ?>"
                            class="btn btn-sm btn-success"
                            onclick="return confirm('<?= htmlspecialchars(
                                __('approve_purchase_order_confirm'),
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>')">

                            <?= __('approve') ?>

                        </a>

                    <?php endif; ?>


                    <?php if (
                        in_array(
                            $po->status,
                            ['draft', 'approved', 'partial'],
                            true
                        )
                    ): ?>

                        <a
                            href="<?= URLROOT ?>/purchaseorders/cancel/<?= $po->id ?>"
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('<?= htmlspecialchars(
                                __('cancel_purchase_order_confirm'),
                                ENT_QUOTES,
                                'UTF-8'
                            ) ?>')">

                            <?= __('cancel') ?>

                        </a>

                    <?php endif; ?>

                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>
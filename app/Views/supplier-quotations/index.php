<h2>
    <?= __('supplier_quotations') ?>
</h2>

<a href="<?= URLROOT ?>/supplierquotations/create"
    class="btn btn-primary mb-3">

    <i class="fas fa-plus"></i>
    <?= __('new_supplier_quotation') ?>

</a>

<table class="table table-bordered table-striped">

    <thead>
        <tr>
            <th><?= __('quotation_number') ?></th>
            <th><?= __('supplier') ?></th>
            <th><?= __('supplier_reference') ?></th>
            <th><?= __('procurement_reference') ?></th>
            <th><?= __('date') ?></th>
            <th><?= __('valid_until') ?></th>
            <th><?= __('items') ?></th>
            <th><?= __('delivery') ?></th>
            <th><?= __('status') ?></th>
            <th width="250"><?= __('actions') ?></th>
        </tr>
    </thead>

    <tbody>

        <?php if (!empty($quotations)): ?>

            <?php foreach ($quotations as $quotation): ?>

                <tr>

                    <td>
                        <?= htmlspecialchars(
                            $quotation->quotation_number
                        ) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars(
                            $quotation->supplier_name
                        ) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars(
                            $quotation->supplier_reference ?? ''
                        ) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars(
                            $quotation->procurement_reference ?? '-'
                        ) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars(
                            $quotation->quotation_date
                        ) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars(
                            $quotation->valid_until ?? '-'
                        ) ?>
                    </td>

                    <td>
                        <?= (int)$quotation->item_count ?>
                    </td>

                    <td>

                        <?php if (
                            !empty($quotation->required_delivery_date)
                            &&
                            !empty($quotation->promised_delivery_date)
                        ): ?>

                            <?php if (
                                $quotation->promised_delivery_date
                                <= $quotation->required_delivery_date
                            ): ?>

                                <span class="badge bg-success">
                                    <?= __('can_meet_date') ?>
                                </span>

                            <?php else: ?>

                                <span class="badge bg-danger">
                                    <?= __('late') ?>
                                </span>

                            <?php endif; ?>

                        <?php else: ?>

                            <span class="text-muted">
                                <?= __('not_specified') ?>
                            </span>

                        <?php endif; ?>

                    </td>

                    <td>

                        <?php if ($quotation->status === 'DRAFT'): ?>

                            <span class="badge bg-secondary">
                                <?= __('draft') ?>
                            </span>

                        <?php elseif ($quotation->status === 'ACCEPTED'): ?>

                            <span class="badge bg-success">
                                <?= __('accepted') ?>
                            </span>

                        <?php else: ?>

                            <span class="badge bg-danger">
                                <?= __('cancelled') ?>
                            </span>

                        <?php endif; ?>

                    </td>

                    <td>

                        <a href="<?= URLROOT ?>/supplierquotations/details/<?= $quotation->id ?>"
                            class="btn btn-sm btn-info">

                            <i class="fas fa-folder-open"></i>
                            <?= __('open') ?>

                        </a>

                        <?php if ($quotation->status === 'DRAFT'): ?>

                            <a href="<?= URLROOT ?>/supplierquotations/accept/<?= $quotation->id ?>"
                                class="btn btn-sm btn-success"
                                onclick="return confirm(<?= json_encode(__('accept_supplier_quotation_confirm')) ?>)">

                                <?= __('accept') ?>

                            </a>

                            <a href="<?= URLROOT ?>/supplierquotations/cancel/<?= $quotation->id ?>"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm(<?= json_encode(__('cancel_quotation_confirm')) ?>)">

                                <?= __('cancel') ?>

                            </a>

                        <?php endif; ?>

                        <?php if (
                            !empty($quotation->procurement_reference)
                        ): ?>

                            <a
                                href="<?= URLROOT ?>/supplierquotations/compare/<?= urlencode($quotation->procurement_reference) ?>"
                                class="btn btn-sm btn-outline-primary"
                                title="<?= htmlspecialchars(__('compare_quotations_for_procurement'), ENT_QUOTES) ?>">

                                <i class="fas fa-balance-scale"></i>
                                <?= __('compare') ?>

                            </a>

                        <?php endif; ?>

                    </td>

                </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>
                <td colspan="10"
                    class="text-center text-muted py-5">

                    <?= __('no_supplier_quotations_found') ?>

                </td>
            </tr>

        <?php endif; ?>

    </tbody>

</table>
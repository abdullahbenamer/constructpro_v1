<h2>
    <i class="fas fa-balance-scale"></i>
    <?= __('supplier_quotation_comparison') ?>
</h2>

<div class="card mb-4">

    <div class="card-body">

        <strong><?= __('procurement_reference') ?>:</strong>

        <span class="badge bg-primary fs-6">

            <?= htmlspecialchars(
                $procurement_reference
            ) ?>

        </span>

    </div>

</div>


<?php if (!empty($comparison)): ?>

    <?php foreach ($comparison as $entry): ?>

        <?php
            $quotation = $entry['quotation'];
            $items     = $entry['items'];

            $grandTotal = 0;

            foreach ($items as $item) {

                $grandTotal +=
                    (float)$item->quantity *
                    (float)$item->unit_price;
            }
        ?>

        <div class="card mb-4">

            <div class="card-header">

                <div class="row align-items-center">

                    <div class="col-md-4">

                        <strong>
                            <?= htmlspecialchars(
                                $quotation->supplier_name
                            ) ?>
                        </strong>

                    </div>

                    <div class="col-md-3">

                        <?= __('quote') ?>:

                        <?= htmlspecialchars(
                            $quotation->supplier_reference
                            ?? '-'
                        ) ?>

                    </div>

                    <div class="col-md-2">

                        <strong>
                            <?= __('total') ?>:
                        </strong>

                        <?= number_format(
                            $grandTotal,
                            2
                        ) ?>

                    </div>

                    <div class="col-md-3 text-end">

                        <?php if (
                            $quotation->status === 'ACCEPTED'
                        ): ?>

                            <span class="badge bg-success">
                                <?= __('accepted') ?>
                            </span>

                        <?php elseif (
                            $quotation->status === 'CANCELLED'
                        ): ?>

                            <span class="badge bg-danger">
                                <?= __('cancelled') ?>
                            </span>

                        <?php else: ?>

                            <span class="badge bg-secondary">
                                <?= __('draft') ?>
                            </span>

                        <?php endif; ?>

                    </div>

                </div>

            </div>


            <div class="card-body">

                <div class="row mb-3">

                    <div class="col-md-4">

                        <strong>
                            <?= __('quotation_date') ?>
                        </strong><br>

                        <?= htmlspecialchars(
                            $quotation->quotation_date
                        ) ?>

                    </div>

                    <div class="col-md-4">

                        <strong>
                            <?= __('required_delivery') ?>
                        </strong><br>

                        <?= htmlspecialchars(
                            $quotation->required_delivery_date
                            ?? '-'
                        ) ?>

                    </div>

                    <div class="col-md-4">

                        <strong>
                            <?= __('supplier_promised_delivery') ?>
                        </strong><br>

                        <?php
                            $required =
                                $quotation->required_delivery_date;

                            $promised =
                                $quotation->promised_delivery_date;
                        ?>

                        <?php if (
                            $required &&
                            $promised
                        ): ?>

                            <?= htmlspecialchars(
                                $promised
                            ) ?>

                            <?php if (
                                $promised <= $required
                            ): ?>

                                <span class="badge bg-success">
                                    <?= __('can_meet') ?>
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

                    </div>

                </div>


                <div class="table-responsive">

                    <table class="table table-sm table-bordered">

                        <thead class="table-light">

                            <tr>

                                <th>
                                    <?= __('item') ?>
                                </th>

                                <th>
                                    <?= __('specification') ?>
                                </th>

                                <th>
                                    <?= __('uom') ?>
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
                                    <?= __('quality') ?>
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php if (!empty($items)): ?>

                                <?php foreach ($items as $item): ?>

                                    <?php
                                        $total =
                                            (float)$item->quantity *
                                            (float)$item->unit_price;
                                    ?>

                                    <tr>

                                        <td>

                                            <?php if (
                                                !empty(
                                                    $item->inventory_id
                                                )
                                            ): ?>

                                                <?= htmlspecialchars(
                                                    $item->inventory_name
                                                ) ?>

                                            <?php else: ?>

                                                <?= htmlspecialchars(
                                                    $item->description
                                                ) ?>

                                                <span
                                                    class="badge bg-warning text-dark">

                                                    <?= __('new_item') ?>

                                                </span>

                                            <?php endif; ?>

                                        </td>

                                        <td>

                                            <?= nl2br(
                                                htmlspecialchars(
                                                    $item->specification
                                                    ?? ''
                                                )
                                            ) ?>

                                        </td>

                                        <td>

                                            <?= htmlspecialchars(
                                                $item->unit_code
                                                ?? '-'
                                            ) ?>

                                        </td>

                                        <td>

                                            <?= number_format(
                                                $item->quantity,
                                                2
                                            ) ?>

                                        </td>

                                        <td>

                                            <?= number_format(
                                                $item->unit_price,
                                                2
                                            ) ?>

                                        </td>

                                        <td>

                                            <?= number_format(
                                                $total,
                                                2
                                            ) ?>

                                        </td>

                                        <td>

                                            <?php
                                                $quality =
                                                    $item->quality_status;
                                            ?>

                                            <?php if (
                                                $quality === 'MEETS'
                                            ): ?>

                                                <span
                                                    class="badge bg-success">

                                                    <?= __('meets') ?>

                                                </span>

                                            <?php elseif (
                                                $quality === 'PARTIAL'
                                            ): ?>

                                                <span
                                                    class="badge bg-warning text-dark">

                                                    <?= __('partial') ?>

                                                </span>

                                            <?php elseif (
                                                $quality === 'DOES_NOT_MEET'
                                            ): ?>

                                                <span
                                                    class="badge bg-danger">

                                                    <?= __('does_not_meet') ?>

                                                </span>

                                            <?php else: ?>

                                                <span
                                                    class="text-muted">

                                                    —

                                                </span>

                                            <?php endif; ?>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            <?php else: ?>

                                <tr>

                                    <td
                                        colspan="7"
                                        class="text-center text-muted">

                                        <?= __('no_quotation_items') ?>

                                    </td>

                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>


                <?php if (
                    !empty(
                        $quotation->evaluation_notes
                    )
                ): ?>

                    <div class="alert alert-light border mt-3">

                        <strong>
                            <?= __('procurement_evaluation') ?>:
                        </strong>

                        <br>

                        <?= nl2br(
                            htmlspecialchars(
                                $quotation->evaluation_notes
                            )
                        ) ?>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    <?php endforeach; ?>

<?php endif; ?>


<div class="mt-3">

    <a
        href="<?= URLROOT ?>/supplierquotations"
        class="btn btn-secondary">

        <i class="fas fa-arrow-left"></i>
        <?= __('back') ?>

    </a>

</div>
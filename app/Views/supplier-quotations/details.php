<h2>
    <i class="fas fa-file-invoice-dollar"></i>
    <?= __('supplier_quotation') ?>
</h2>


<div class="card mb-4">

    <div class="card-body">

        <div class="row">

            <div class="col-md-6">

                <p>
                    <strong><?= __('quotation_number_label') ?></strong>
                    <?= htmlspecialchars(
                        $quotation->quotation_number
                    ) ?>
                </p>

                <p>
                    <strong><?= __('supplier_label') ?></strong>
                    <?= htmlspecialchars(
                        $quotation->supplier_name
                    ) ?>
                </p>

                <p>
                    <strong><?= __('supplier_reference_label') ?></strong>
                    <?= htmlspecialchars(
                        $quotation->supplier_reference ?? '-'
                    ) ?>
                </p>

                <p>
                    <strong><?= __('procurement_reference_label') ?></strong>
                    <?= htmlspecialchars(
                        $quotation->procurement_reference ?? '-'
                    ) ?>
                </p>

                <p>
                    <strong><?= __('required_delivery_label') ?></strong>
                    <?= htmlspecialchars(
                        $quotation->required_delivery_date ?? '-'
                    ) ?>
                </p>

                <p>
                    <strong><?= __('supplier_promised_delivery_label') ?></strong>
                    <?= htmlspecialchars(
                        $quotation->promised_delivery_date ?? '-'
                    ) ?>
                </p>

            </div>


            <div class="col-md-6">

                <p>
                    <strong><?= __('quotation_date_label') ?></strong>
                    <?= htmlspecialchars(
                        $quotation->quotation_date
                    ) ?>
                </p>

                <p>
                    <strong><?= __('valid_until_label') ?></strong>
                    <?= htmlspecialchars(
                        $quotation->valid_until ?? '-'
                    ) ?>
                </p>

                <p>
                    <strong><?= __('status') ?>:</strong>

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

                </p>

            </div>

        </div>


        <?php if (!empty($quotation->notes)): ?>

            <hr>

            <strong><?= __('notes') ?>:</strong><br>

            <?= nl2br(
                htmlspecialchars($quotation->notes)
            ) ?>

        <?php endif; ?>


        <?php if (!empty($quotation->evaluation_notes)): ?>

            <hr>

            <strong>
                <?= __('procurement_evaluation_notes') ?>:
            </strong>

            <br>

            <?= nl2br(
                htmlspecialchars(
                    $quotation->evaluation_notes
                )
            ) ?>

        <?php endif; ?>

    </div>

</div>


<?php if ($quotation->status === 'DRAFT'): ?>

<div class="card mb-4">

    <div class="card-body">

        <h5>
            <?= __('add_quotation_item') ?>
        </h5>

        <form method="POST"
              action="<?= URLROOT ?>/supplierquotations/addItem/<?= $quotation->id ?>">

            <div class="row">

                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        <?= __('existing_inventory_item') ?>
                    </label>

                    <select name="inventory_id"
                            class="form-select">

                        <option value="">
                            <?= __('new_not_yet_in_inventory') ?>
                        </option>

                        <?php foreach ($inventory ?? [] as $item): ?>

                            <option value="<?= $item->id ?>">

                                <?= htmlspecialchars(
                                    $item->name
                                ) ?>

                                -

                                <?= htmlspecialchars(
                                    $item->sku
                                ) ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>


                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        <?= __('description') ?> *
                    </label>

                    <input type="text"
                           name="description"
                           class="form-control"
                           required>

                </div>


                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        <?= __('uom') ?>
                    </label>

                    <select name="unit_id"
                            class="form-select">

                        <option value="">
                            <?= __('select_uom') ?>
                        </option>

                        <?php foreach ($units ?? [] as $unit): ?>

                            <option value="<?= $unit->id ?>">

                                <?= htmlspecialchars(
                                    $unit->unit_code
                                ) ?>

                                -

                                <?= htmlspecialchars(
                                    $unit->unit_name
                                ) ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>

            </div>


            <div class="mb-3">

                <label class="form-label">
                    <?= __('specification') ?>
                </label>

                <textarea name="specification"
                          class="form-control"
                          rows="3"
                          placeholder="<?= __('supplier_specification_placeholder') ?>"></textarea>

            </div>


            <div class="row">

                <div class="col-md-3 mb-3">

                    <label class="form-label">
                        <?= __('quantity') ?>
                    </label>

                    <input type="number"
                           name="quantity"
                           class="form-control"
                           step="0.01"
                           min="0.01"
                           required>

                </div>


                <div class="col-md-3 mb-3">

                    <label class="form-label">
                        <?= __('unit_price') ?>
                    </label>

                    <input type="number"
                           name="unit_price"
                           class="form-control"
                           step="0.01"
                           min="0"
                           required>

                </div>


                <div class="row">

                    <div class="col-md-4 mb-3">

                        <label class="form-label">
                            <?= __('quality_specification_assessment') ?>
                        </label>

                        <select name="quality_status"
                                class="form-select">

                            <option value="">
                                <?= __('not_evaluated') ?>
                            </option>

                            <option value="MEETS">
                                <?= __('meets_specification') ?>
                            </option>

                            <option value="PARTIAL">
                                <?= __('partially_meets') ?>
                            </option>

                            <option value="DOES_NOT_MEET">
                                <?= __('does_not_meet_specification') ?>
                            </option>

                        </select>

                    </div>


                    <div class="col-md-8 mb-3">

                        <label class="form-label">
                            <?= __('quality_evaluation_notes') ?>
                        </label>

                        <input type="text"
                               name="quality_notes"
                               class="form-control"
                               placeholder="<?= __('quality_notes_placeholder') ?>">

                    </div>

                </div>


                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        <?= __('notes') ?>
                    </label>

                    <input type="text"
                           name="item_notes"
                           class="form-control">

                </div>

            </div>


            <button class="btn btn-success">

                <i class="fas fa-plus"></i>
                <?= __('add_item') ?>

            </button>

        </form>

    </div>

</div>

<?php endif; ?>


<h4>
    <?= __('quotation_items') ?>
</h4>


<table class="table table-bordered table-striped">

    <thead>

        <tr>

            <th>#</th>
            <th><?= __('item') ?></th>
            <th><?= __('specification') ?></th>
            <th><?= __('uom') ?></th>
            <th><?= __('qty') ?></th>
            <th><?= __('quality') ?></th>
            <th><?= __('unit_price') ?></th>
            <th><?= __('total') ?></th>

            <?php if ($quotation->status === 'DRAFT'): ?>
                <th><?= __('actions') ?></th>
            <?php endif; ?>

        </tr>

    </thead>


    <tbody>

        <?php $grandTotal = 0; ?>

        <?php if (!empty($items)): ?>

            <?php foreach ($items as $item): ?>

                <?php
                    $total =
                        (float)$item->quantity *
                        (float)$item->unit_price;

                    $grandTotal += $total;
                ?>

                <tr>

                    <td>
                        <?= $item->id ?>
                    </td>

                    <td>

                        <?php if (!empty($item->inventory_id)): ?>

                            <?= htmlspecialchars(
                                $item->inventory_name
                            ) ?>

                        <?php else: ?>

                            <?= htmlspecialchars(
                                $item->description
                            ) ?>

                            <span class="badge bg-warning text-dark">
                                <?= __('new_item') ?>
                            </span>

                        <?php endif; ?>

                    </td>

                    <td>
                        <?= nl2br(
                            htmlspecialchars(
                                $item->specification ?? ''
                            )
                        ) ?>
                    </td>

                    <td>

                        <?= htmlspecialchars(
                            $item->unit_code ?? '-'
                        ) ?>

                    </td>

                    <td>
                        <?= number_format(
                            $item->quantity,
                            2
                        ) ?>
                    </td>

                    <td>

                        <?php if ($item->quality_status === 'MEETS'): ?>

                            <span class="badge bg-success">
                                <?= __('meets') ?>
                            </span>

                        <?php elseif ($item->quality_status === 'PARTIAL'): ?>

                            <span class="badge bg-warning text-dark">
                                <?= __('partial') ?>
                            </span>

                        <?php elseif ($item->quality_status === 'DOES_NOT_MEET'): ?>

                            <span class="badge bg-danger">
                                <?= __('does_not_meet') ?>
                            </span>

                        <?php else: ?>

                            <span class="text-muted">
                                <?= __('not_evaluated') ?>
                            </span>

                        <?php endif; ?>


                        <?php if (!empty($item->quality_notes)): ?>

                            <div class="small text-muted mt-1">

                                <?= htmlspecialchars(
                                    $item->quality_notes
                                ) ?>

                            </div>

                        <?php endif; ?>

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


                    <?php if ($quotation->status === 'DRAFT'): ?>

                        <td>

                            <a href="<?= URLROOT ?>/supplierquotations/deleteItem/<?= $item->id ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm(<?= json_encode(__('delete_quotation_item_confirm')) ?>)">

                                <?= __('delete') ?>

                            </a>

                        </td>

                    <?php endif; ?>

                </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>

                <td colspan="8"
                    class="text-center text-muted">

                    <?= __('no_items_added_yet') ?>

                </td>

            </tr>

        <?php endif; ?>

    </tbody>


    <tfoot>

        <tr>

            <th colspan="6"
                class="text-end">

                <?= __('grand_total') ?>

            </th>

            <th>

                <?= number_format(
                    $grandTotal,
                    2
                ) ?>

            </th>

            <?php if ($quotation->status === 'DRAFT'): ?>
                <th></th>
            <?php endif; ?>

        </tr>

    </tfoot>

</table>


<div class="mt-3">

    <a href="<?= URLROOT ?>/supplierquotations"
       class="btn btn-secondary">

        <?= __('back') ?>

    </a>


    <?php if ($quotation->status === 'DRAFT'): ?>

        <a href="<?= URLROOT ?>/supplierquotations/accept/<?= $quotation->id ?>"
           class="btn btn-success"
           onclick="return confirm(<?= json_encode(__('accept_supplier_quotation_confirm')) ?>)">

            <?= __('accept_quotation') ?>

        </a>


        <a href="<?= URLROOT ?>/supplierquotations/cancel/<?= $quotation->id ?>"
           class="btn btn-danger"
           onclick="return confirm(<?= json_encode(__('cancel_quotation_confirm')) ?>)">

            <?= __('cancel') ?>

        </a>


    <?php elseif ($quotation->status === 'ACCEPTED'): ?>

        <span class="badge bg-success fs-6">
            <?= __('accepted') ?>
        </span>


        <?php if (empty($quotation->purchase_order_id)): ?>

            <a
                href="<?= URLROOT ?>/supplierquotations/createPO/<?= $quotation->id ?>"
                class="btn btn-primary ms-2"
                onclick="return confirm(<?= json_encode(__('create_po_from_accepted_quotation_confirm')) ?>)">

                <i class="fas fa-file-invoice"></i>
                <?= __('create_po') ?>

            </a>


        <?php else: ?>

            <a
                href="<?= URLROOT ?>/purchaseorders/details/<?= $quotation->purchase_order_id ?>"
                class="btn btn-info ms-2">

                <i class="fas fa-file-invoice"></i>
                <?= __('view_po') ?>

            </a>

        <?php endif; ?>

    <?php endif; ?>

</div>
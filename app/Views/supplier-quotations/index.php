<h2>
    Supplier Quotations
</h2>

<a href="<?= URLROOT ?>/supplierquotations/create"
   class="btn btn-primary mb-3">

    <i class="fas fa-plus"></i>
    New Supplier Quotation

</a>

<table class="table table-bordered table-striped">

    <thead>
        <tr>
            <th>Quotation #</th>
            <th>Supplier</th>
            <th>Supplier Ref.</th>
            <th>Date</th>
            <th>Valid Until</th>
            <th>Items</th>
            <th>Status</th>
            <th width="250">Actions</th>
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

                        <?php if ($quotation->status === 'DRAFT'): ?>

                            <span class="badge bg-secondary">
                                DRAFT
                            </span>

                        <?php elseif ($quotation->status === 'ACCEPTED'): ?>

                            <span class="badge bg-success">
                                ACCEPTED
                            </span>

                        <?php else: ?>

                            <span class="badge bg-danger">
                                CANCELLED
                            </span>

                        <?php endif; ?>

                    </td>

                    <td>

                        <a href="<?= URLROOT ?>/supplierquotations/details/<?= $quotation->id ?>"
                           class="btn btn-sm btn-info">

                            <i class="fas fa-folder-open"></i>
                            Open

                        </a>

                        <?php if ($quotation->status === 'DRAFT'): ?>

                            <a href="<?= URLROOT ?>/supplierquotations/accept/<?= $quotation->id ?>"
                               class="btn btn-sm btn-success"
                               onclick="return confirm('Accept this supplier quotation?')">

                                Accept

                            </a>

                            <a href="<?= URLROOT ?>/supplierquotations/cancel/<?= $quotation->id ?>"
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Cancel this quotation?')">

                                Cancel

                            </a>

                        <?php endif; ?>

                    </td>

                </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>
                <td colspan="8"
                    class="text-center text-muted py-5">

                    No supplier quotations found.

                </td>
            </tr>

        <?php endif; ?>

    </tbody>

</table>
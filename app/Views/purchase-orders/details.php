<h2>
    Purchase Order Details
</h2>

<div class="card mb-4">

    <div class="card-body">

        <div class="row">

            <div class="col-md-6">

                <p>
                    <strong>PO Number:</strong>
                    <?= htmlspecialchars($po->po_number) ?>
                </p>

                <p>
                    <strong>Supplier:</strong>
                    <?= htmlspecialchars($po->supplier_name) ?>
                </p>

                <p>
                    <strong>Status:</strong>

                    <?php if ($po->status === 'draft'): ?>

                        <span class="badge bg-secondary">
                            Draft
                        </span>

                    <?php elseif ($po->status === 'approved'): ?>

                        <span class="badge bg-success">
                            Approved
                        </span>

                    <?php elseif ($po->status === 'partially_received'): ?>

                        <span class="badge bg-warning text-dark">
                            Partially Received
                        </span>

                    <?php elseif ($po->status === 'received'): ?>

                        <span class="badge bg-primary">
                            Received
                        </span>

                    <?php else: ?>

                        <span class="badge bg-dark">
                            <?= htmlspecialchars($po->status) ?>
                        </span>

                    <?php endif; ?>
                </p>

            </div>

            <div class="col-md-6">

                <p>
                    <strong>Order Date:</strong>
                  <?= $po->order_date ?>
                </p>

                <p>
                    <strong>Expected Date:</strong>
                    <span class="bg-primary text-white px-2 py-1 rounded">
    <?= $po->expected_date ?>
</span>
                </p>

                <p>
                    <strong>Created:</strong>
                    <?= $po->created_at ?>
                </p>

            </div>

        </div>

        <?php if (!empty($po->notes)): ?>

            <hr>

            <p>
                <strong>Notes:</strong><br>
                <?= nl2br(htmlspecialchars($po->notes)) ?>
            </p>

        <?php endif; ?>

    </div>

</div>

<div class="mb-3">

    <a href="<?= URLROOT ?>/purchaseorders"
        class="btn btn-secondary">

        Back

    </a>

    <a href="<?= URLROOT ?>/purchaseorders/itemsPage/<?= $po->id ?>"
        class="btn btn-primary">

        Manage Items

    </a>

    <?php if ($po->status === 'draft'): ?>

        <a href="<?= URLROOT ?>/purchaseorders/approve/<?= $po->id ?>"
            class="btn btn-success"
            onclick="return confirm('Approve this Purchase Order?')">

            Approve Purchase Order

        </a>

    <?php endif; ?>

</div>

<h4>
    Purchase Order Items
</h4>

<table class="table table-striped">

    <thead class="table-light">

        <tr>

            <th>Item</th>
            <th>SKU</th>
            <th width="120">Qty</th>
            <th width="150">Unit Cost</th>
            <th width="150">Total</th>

        </tr>

    </thead>

    <tbody>

        <?php if (!empty($items)): ?>

            <?php foreach ($items as $item): ?>

                <tr>

                    <td>
                        <?= htmlspecialchars($item->name) ?>
                    </td>
                     <td>
                        <?= htmlspecialchars($item->sku) ?>
                    </td>

                    <td>
                        <?= number_format($item->quantity, 2) ?>
                    </td>

                    <td>
                        <?= number_format($item->unit_cost, 2) ?>
                    </td>

                    <td>

                        <?= number_format(
                            $item->quantity * $item->unit_cost,
                            2
                        ) ?>

                    </td>

                </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>

                <td colspan="4" class="text-center text-muted">

                    No items added yet

                </td>

            </tr>

        <?php endif; ?>

    </tbody>

    <tfoot>

        <tr>

            <th colspan="3" class="text-end">
                Grand Total
            </th>

            <th>

                <?= number_format($po->total_amount, 2) ?>

            </th>

        </tr>

    </tfoot>

</table>
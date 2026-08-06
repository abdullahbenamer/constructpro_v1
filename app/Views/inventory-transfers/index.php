<h2>
    Inventory Transfers
</h2>

<a href="<?= URLROOT ?>/inventorytransfers/create"
   class="btn btn-primary mb-3">

    New Transfer

</a>

<table class="table table-striped">

    <thead>

        <tr>

            <th>Date</th>
            <th>Item</th>
                <th>SKU</th>
            <th>From</th>
            <th>To</th>
            <th>Qty</th>
            <th>Reference</th>
            <th>Actions</th>

        </tr>

    </thead>

   <tbody>

<?php if (!empty($transfers)): ?>

    <?php foreach ($transfers as $t): ?>

        <tr>

            <td><?= $t->created_at ?></td>

            <td><?= htmlspecialchars($t->item_name) ?></td>

            <td><?= htmlspecialchars($t->item_sku) ?></td>

            <td><?= htmlspecialchars($t->from_code) ?></td>

            <td><?= htmlspecialchars($t->to_code) ?></td>

            <td><?= $t->quantity ?></td>

            <td><?= htmlspecialchars($t->reference) ?></td>
            <td>

    <a href="<?= URLROOT ?>/inventorytransfers/view/<?= $t->id ?>"
       class="btn btn-sm btn-info">
        View
    </a>

<?php if ($t->reversed_at): ?>

    <span class="badge bg-danger">
        REVERSED
    </span>

<?php else: ?>

    <a href="<?= URLROOT ?>/inventorytransfers/reverse/<?= $t->id ?>"
       class="btn btn-warning btn-sm"
       onclick="return confirm('Reverse this transfer? This will move the stock back to the original warehouse.')">

        <i class="fas fa-undo"></i>
        Reverse

    </a>

<?php endif; ?>

</td>

        </tr>

    <?php endforeach; ?>

<?php else: ?>

    <tr>
        <td colspan="8" class="text-center py-5">

            <i class="fas fa-exchange-alt fa-3x text-muted mb-3"></i>

            <h5 class="text-muted">
                No Inventory Transfers Found
            </h5>

            <p class="text-muted mb-3">
                There are currently no inventory transfer records.
            </p>

            <a href="<?= URLROOT ?>/inventorytransfers/create"
               class="btn btn-primary">
                <i class="fas fa-plus"></i>
                Create First Transfer
            </a>

        </td>
    </tr>

<?php endif; ?>

</tbody>

</table>
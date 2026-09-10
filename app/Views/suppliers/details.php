<h2>
    <?= htmlspecialchars($supplier->company_name) ?>
</h2>

<div class="card mb-4">

    <div class="card-body">

        <p>
            <strong><?= __('contact') ?>:</strong>
            <?= htmlspecialchars($supplier->contact_person) ?>
        </p>

        <p>
            <strong><?= __('phone') ?>:</strong>
            <?= htmlspecialchars($supplier->phone) ?>
        </p>

        <p>
            <strong><?= __('email') ?>:</strong>
            <?= htmlspecialchars($supplier->email) ?>
        </p>

        <p>
            <strong><?= __('address') ?>:</strong>
            <?= htmlspecialchars($supplier->address) ?>
        </p>

        <p>
            <strong><?= __('total_purchases') ?>:</strong>

            <?= number_format($total_purchases ?? 0, 2) ?>
        </p>

    </div>

</div>

<h4><?= __('purchase_orders') ?></h4>

<table class="table table-bordered">

    <thead>
        <tr>
            <th><?= __('po_number') ?></th>
            <th><?= __('status') ?></th>
            <th><?= __('total') ?></th>
            <th><?= __('date') ?></th>
        </tr>
    </thead>

    <tbody>

        <?php foreach ($purchase_orders as $po): ?>

            <tr>

                <td>
                    <?= htmlspecialchars($po->po_number) ?>
                </td>

                <td>
                    <?= htmlspecialchars($po->status) ?>
                </td>

                <td>
                    <?= number_format($po->total_amount, 2) ?>
                </td>

                <td>
                    <?= $po->created_at ?>
                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>
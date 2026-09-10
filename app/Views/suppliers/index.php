<h2>
    <i class="fas fa-truck"></i>
    <?= __('suppliers') ?>
</h2>

<a href="<?= URLROOT ?>/suppliers/create"
   class="btn btn-primary mb-3">

    <i class="fas fa-plus"></i>
    <?= __('add_supplier') ?>

</a>

<table class="table table-striped">

    <thead>

        <tr>
            <th><?= __('id') ?></th>
            <th><?= __('company') ?></th>
            <th><?= __('contact') ?></th>
            <th><?= __('phone') ?></th>
            <th><?= __('email') ?></th>
            <th width="220"><?= __('actions') ?></th>
        </tr>

    </thead>

    <tbody>

<?php if (!empty($suppliers)): ?>

    <?php foreach ($suppliers as $supplier): ?>

        <tr>

            <td><?= $supplier->id ?></td>

            <td>

                <a href="<?= URLROOT ?>/suppliers/info/<?= $supplier->id ?>"
                   class="fw-bold text-decoration-none">

                    <i class="fas fa-truck"></i>

                    <?= htmlspecialchars($supplier->company_name) ?>

                </a>

            </td>

            <td>
                <?= htmlspecialchars($supplier->contact_person ?? '-') ?>
            </td>

            <td>
                <?= htmlspecialchars($supplier->phone ?? '-') ?>
            </td>

            <td>
                <?= htmlspecialchars($supplier->email ?? '-') ?>
            </td>

            <td>

                <a href="<?= URLROOT ?>/suppliers/info/<?= $supplier->id ?>"
                   class="btn btn-sm btn-info">

                    <?= __('view_profile') ?>

                </a>

                <a href="<?= URLROOT ?>/suppliers/edit/<?= $supplier->id ?>"
                   class="btn btn-sm btn-warning">

                    <?= __('edit') ?>

                </a>

                <a href="<?= URLROOT ?>/suppliers/delete/<?= $supplier->id ?>"
                   class="btn btn-sm btn-danger"
                   onclick="return confirm(<?= json_encode(__('delete_supplier_confirm')) ?>)">

                    <?= __('delete') ?>

                </a>

            </td>

        </tr>

    <?php endforeach; ?>

<?php else: ?>

    <tr>

        <td colspan="6" class="text-center py-5">

            <i class="fas fa-truck-loading fa-3x text-secondary mb-3"></i>

            <h5 class="mt-3">

                <?= __('no_suppliers_added_yet') ?>

            </h5>

            <p class="text-muted mb-3">

                <?= __('create_first_supplier_description') ?>

            </p>

            <a href="<?= URLROOT ?>/suppliers/create"
               class="btn btn-primary">

                <i class="fas fa-plus"></i>

                <?= __('add_first_supplier') ?>

            </a>

        </td>

    </tr>

<?php endif; ?>

</tbody>

</table>
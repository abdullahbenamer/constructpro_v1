<h3><?= __('permissions') ?></h3>

<form method="POST">

    <input
        type="text"
        name="name"
        placeholder="<?= __('permission_name') ?>"
        class="form-control mb-2">

    <button class="btn btn-primary">
        <?= __('add_permission') ?>
    </button>

</form>


<ul class="list-group mt-3">

<?php foreach ($permissions as $perm): ?>

    <li class="list-group-item d-flex justify-content-between align-items-center">

        <?= $perm->name ?>

        <div>

            <a
                href="<?= URLROOT ?>/admin/editPermission/<?= $perm->id ?>"
                class="btn btn-sm btn-warning">

                <?= __('edit') ?>

            </a>


            <a
                href="<?= URLROOT ?>/admin/deletePermission/<?= $perm->id ?>"
                class="btn btn-sm btn-danger"

                onclick="return confirm(<?= json_encode(__('delete_permission_confirm')) ?>)">

                <?= __('delete') ?>

            </a>

        </div>

    </li>

<?php endforeach; ?>

</ul>
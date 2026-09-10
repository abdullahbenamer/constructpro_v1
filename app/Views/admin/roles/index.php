<ul class="list-group mt-3">

<?php foreach ($roles as $role): ?>

<li class="list-group-item d-flex justify-content-between align-items-center">


    <div>

        <strong>
            <?= $role->name ?>
        </strong>


        <span class="badge bg-secondary ms-2">

            <?= count($role->permissions ?? []) ?>

            <?= __('permissions') ?>

        </span>


        <br>


        <small class="text-muted">

            <?= !empty($role->permissions)

                ? implode(
                    ', ',
                    array_slice(
                        $role->permissions,
                        0,
                        3
                    )
                )

                : __('no_permissions') ?>

        </small>

    </div>


    <div>


        <a
            href="<?= URLROOT ?>/admin/assignPermissions/<?= $role->id ?>"
            class="btn btn-sm btn-info">

            <?= __('permissions') ?>

        </a>


        <a
            href="<?= URLROOT ?>/admin/editRole/<?= $role->id ?>"
            class="btn btn-sm btn-warning">

            <?= __('edit') ?>

        </a>


        <a
            href="<?= URLROOT ?>/admin/deleteRole/<?= $role->id ?>"
            class="btn btn-sm btn-danger"

            onclick="return confirm(<?= json_encode(__('delete_role_confirm')) ?>)">

            <?= __('delete') ?>

        </a>

    </div>


</li>

<?php endforeach; ?>

</ul>
<h2><?= __('roles_management') ?></h2>

<div class="card mt-3 mb-4">
    <div class="card-body">

        <form method="POST" action="<?= URLROOT ?>/admin/roles">

            <div class="row align-items-end">

                <div class="col-md-8">

                    <label for="name" class="form-label">
                        <?= __('role_name') ?>
                    </label>

                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="form-control"
                        maxlength="50"
                        required
                    >

                </div>

                <div class="col-md-4">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        <?= __('create_role') ?>
                    </button>

                </div>

            </div>

        </form>

    </div>
</div>

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
<h2><?= __('admin_panel') ?></h2>


<div class="row">


    <div class="col-md-4">

        <a
            href="<?= URLROOT ?>/admin/users"
            class="btn btn-primary w-100 mb-3">

            <i class="fas fa-users"></i>

            <?= __('manage_users') ?>

        </a>

    </div>


    <div class="col-md-4">

        <a
            href="<?= URLROOT ?>/admin/roles"
            class="btn btn-warning w-100 mb-3">

            <i class="fas fa-user-tag"></i>

            <?= __('manage_roles') ?>

        </a>

    </div>


    <div class="col-md-4">

        <a
            href="<?= URLROOT ?>/admin/permissions"
            class="btn btn-success w-100 mb-3">

            <i class="fas fa-key"></i>

            <?= __('manage_permissions') ?>

        </a>

    </div>


    <div class="col-md-4">

        <a
            href="<?= URLROOT ?>/admin/settings"
            class="btn btn-dark w-100 mb-3">

            <i class="fas fa-cog"></i>

            <?= __('system_settings') ?>

        </a>

    </div>

</div>
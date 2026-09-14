<h2><?= __('admin_panel') ?></h2>


<div class="row">


    <div class="col-md-3">

        <a
            href="<?= URLROOT ?>/admin/users"
            class="btn btn-primary w-100 mb-3">

            <i class="fas fa-users"></i>
    <br>
            <?= __('manage_users') ?>

        </a>

    </div>


    <div class="col-md-3">

        <a
            href="<?= URLROOT ?>/admin/roles"
            class="btn btn-warning w-100 mb-3">

            <i class="fas fa-user-tag"></i>
    <br>
            <?= __('manage_roles') ?>

        </a>

    </div>


    <div class="col-md-3">

        <a
            href="<?= URLROOT ?>/admin/permissions"
            class="btn btn-success w-100 mb-3">

            <i class="fas fa-key"></i>
    <br>
            <?= __('manage_permissions') ?>

        </a>

    </div>


    <div class="col-md-3">

        <a
            href="<?= URLROOT ?>/admin/settings"
            class="btn btn-info w-100 mb-3">

            <i class="fas fa-cog"></i>
    <br>
            <?= __('system_settings') ?>

        </a>

    </div>

    <div class="col-md-3">

    <a href="<?= URLROOT ?>/Units"  class="btn btn-secondary w-100 mb-3">
    <i class="fas fa-ruler"></i>
        <br>
    <?= __('units') ?>
</a>
    </div>







  <div class="col-md-3">

    <a href="<?= URLROOT ?>/ResourceCategories"
       class="btn btn-primary w-100 mb-3">

        <i class="fas fa-layer-group"></i>
    <br>
        <?= __('resource_categories') ?>

    </a>

</div>

<div class="col-md-3">

    <a href="<?= URLROOT ?>/resources"
       class="btn btn-danger w-100 mb-3">

        <i class="fas fa-toolbox"></i> 
        <br>
        <?= __('resources') ?>
    </a>

</div>

</div>
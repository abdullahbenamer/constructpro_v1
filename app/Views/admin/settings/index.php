<h2>

    <i class="fas fa-cog"></i>

    <?= __('system_settings') ?>

</h2>


<form
    method="POST"
    enctype="multipart/form-data"
    action="<?= URLROOT ?>/admin/saveSettings">


    <div class="mb-3">

        <label>
            <?= __('company_name') ?>
        </label>

        <input
            type="text"
            name="company_name"
            value="<?= $settings->company_name ?? '' ?>"
            class="form-control">

    </div>


    <div class="mb-3">

        <label>
            <?= __('address') ?>
        </label>

        <input
            type="text"
            name="address"
            value="<?= $settings->address ?? '' ?>"
            class="form-control">

    </div>


    <div class="mb-3">

        <label>
            <?= __('contacts') ?>
        </label>

        <input
            type="text"
            name="contacts"
            value="<?= $settings->contacts ?? '' ?>"
            class="form-control">

    </div>


    <div class="mb-3">

        <label>
            <?= __('company_logo') ?>
        </label>


        <?php if (!empty($settings->logo)): ?>

            <br>

            <img
                src="<?= URLROOT ?>/<?= $settings->logo ?>"
                style="height:60px;margin-bottom:10px;">

        <?php endif; ?>


        <input
            type="file"
            name="logo"
            class="form-control">

    </div>


    <button class="btn btn-primary">

        <?= __('save_settings') ?>

    </button>


</form>
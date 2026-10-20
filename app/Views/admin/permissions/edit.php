<h3><?= __('edit_permission') ?></h3>

<form method="POST">

    <div class="mb-2">
        <label for="permission_name" class="form-label">
            <?= __('permission_name') ?>
        </label>

        <input
            type="text"
            id="permission_name"
            name="name"
            class="form-control mb-2"
            maxlength="100"
            value="<?= htmlspecialchars($permission->name, ENT_QUOTES, 'UTF-8') ?>"
            required>
    </div>

    <div class="mb-2">
        <label for="permission_description" class="form-label">
            <?= __('permission_description') ?> (EN)
        </label>

        <textarea
            id="permission_description"
            name="description"
            class="form-control mb-2"
            rows="3"
            maxlength="1000"
            dir="ltr"><?= htmlspecialchars($permission->description ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
    </div>

    <div class="mb-3">
        <label for="permission_description_a" class="form-label">
            <?= __('permission_description_ar') ?>
        </label>

        <textarea
            id="permission_description_a"
            name="description_a"
            class="form-control mb-2"
            rows="3"
            maxlength="1000"
            dir="rtl"><?= htmlspecialchars($permission->description_a ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
    </div>

    <button type="submit" class="btn btn-success">
        <?= __('update') ?>
    </button>

    <a href="<?= URLROOT ?>/admin/permissions" class="btn btn-secondary">
        <?= __('back') ?>
    </a>

</form>
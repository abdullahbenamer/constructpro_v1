<h3><?= __('create_user') ?></h3>

<form method="POST" enctype="multipart/form-data">

    <div class="row g-3">

        <div class="col-md-6">
            <label class="form-label"><?= __('full_name') ?></label>
            <input type="text"
                   name="full_name"
                   class="form-control"
                   required>
        </div>

        <div class="col-md-6">
            <label class="form-label"><?= __('user_name') ?></label>
            <input type="text"
                   name="user_name"
                   class="form-control"
                   required>
        </div>

        <div class="col-md-6">
            <label class="form-label"><?= __('email') ?></label>
            <input type="email"
                   name="email"
                   class="form-control"
                   required>
        </div>

        <div class="col-md-6">
            <label class="form-label"><?= __('mobile') ?></label>
            <input type="text"
                   name="mobile"
                   class="form-control"
                   required>
        </div>

        <div class="col-md-6">
            <label class="form-label"><?= __('password') ?></label>
            <input type="password"
                   name="password"
                   class="form-control"
                   required>
        </div>

        <div class="col-md-6">
            <label class="form-label"><?= __('role') ?></label>

            <select name="role_id"
                    class="form-select"
                    required>

                <option value="">
                    <?= __('select_role') ?>
                </option>

                <?php foreach ($roles as $role): ?>

                    <option value="<?= $role->id ?>">
                        <?= htmlspecialchars($role->name) ?>
                    </option>

                <?php endforeach; ?>

            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label"><?= __('photo') ?></label>

            <input type="file"
                   name="photo"
                   class="form-control"
                   accept=".jpg,.jpeg,.png,.webp">
        </div>

    </div>

    <div class="mt-4">

        <button type="submit"
                class="btn btn-success">
            <?= __('create') ?>
        </button>

        <a href="<?= URLROOT ?>/admin/users"
           class="btn btn-secondary">
            <?= __('cancel') ?>
        </a>

    </div>

</form>
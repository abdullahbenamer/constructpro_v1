<h3><?= __('edit_user') ?></h3>

<form method="POST" enctype="multipart/form-data">

    <div class="row g-3">

        <div class="col-md-6">
            <label class="form-label"><?= __('full_name') ?></label>
            <input type="text"
                   name="full_name"
                   class="form-control"
                   value="<?= htmlspecialchars($user->full_name) ?>"
                   required>
        </div>

        <div class="col-md-6">
            <label class="form-label"><?= __('user_name') ?></label>
            <input type="text"
                   name="user_name"
                   class="form-control"
                   value="<?= htmlspecialchars($user->user_name) ?>"
                   required>
        </div>

        <div class="col-md-6">
            <label class="form-label"><?= __('email') ?></label>
            <input type="email"
                   name="email"
                   class="form-control"
                   value="<?= htmlspecialchars($user->email) ?>"
                   required>
        </div>

        <div class="col-md-6">
            <label class="form-label"><?= __('mobile') ?></label>
            <input type="text"
                   name="mobile"
                   class="form-control"
                   value="<?= htmlspecialchars($user->mobile) ?>"
                   required>
        </div>

        <div class="col-md-6">
            <label class="form-label">
                <?= __('password_leave_blank_to_keep_current') ?>
            </label>

            <input type="password"
                   name="password"
                   class="form-control">
        </div>

        <div class="col-md-6">
            <label class="form-label"><?= __('role') ?></label>

            <select name="role_id"
                    class="form-select"
                    required>

                <?php foreach ($roles as $role): ?>

                    <option value="<?= $role->id ?>"
                        <?= $user->role_id == $role->id ? 'selected' : '' ?>>
                        <?= htmlspecialchars($role->name) ?>
                    </option>

                <?php endforeach; ?>

            </select>
        </div>

        <div class="col-md-6">
            <label class="form-label"><?= __('photo') ?></label>

            <?php if (!empty($user->photo)): ?>
                <div class="mb-2">
                    <img src="<?= URLROOT . '/' . htmlspecialchars($user->photo) ?>"
                         alt="<?= __('photo') ?>"
                         style="width:80px;height:80px;object-fit:cover;border-radius:50%;">
                </div>
            <?php endif; ?>

            <input type="file"
                   name="photo"
                   class="form-control"
                   accept=".jpg,.jpeg,.png,.webp">
        </div>

    </div>

    <div class="mt-4">

        <button type="submit"
                class="btn btn-success">
            <?= __('update_user') ?>
        </button>

        <a href="<?= URLROOT ?>/admin/users"
           class="btn btn-secondary">
            <?= __('cancel') ?>
        </a>

    </div>

</form>
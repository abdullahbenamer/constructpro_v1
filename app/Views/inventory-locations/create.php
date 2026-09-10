<h2><?= __('add_inventory_location') ?></h2>

<?php if (isset($error)): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">

        <?= htmlspecialchars($error) ?>

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="<?= __('close') ?>">
        </button>

    </div>
<?php endif; ?>

<form method="POST">

    <!-- Code -->
    <div class="mb-3">

        <label>
            <?= __('code') ?>
        </label>

        <input type="text"
               name="code"
               class="form-control"
               value="<?= htmlspecialchars($_POST['code'] ?? '') ?>"
               required>

    </div>

    <!-- Name -->
    <div class="mb-3">

        <label>
            <?= __('warehouse_name') ?>
        </label>

        <input type="text"
               name="name"
               class="form-control"
               value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
               required>

    </div>

    <!-- Address -->
    <div class="mb-3">

        <label>
            <?= __('address_location') ?>
        </label>

        <textarea name="address"
                  class="form-control"
                  rows="2"><?= htmlspecialchars($_POST['address'] ?? '') ?></textarea>

    </div>

    <!-- Storekeeper -->
    <div class="mb-3">

        <label>
            <?= __('responsible_storekeeper') ?>
        </label>

        <select name="storekeeper_id"
                class="form-select">

            <option value="">
                <?= __('select_storekeeper') ?>
            </option>

            <?php foreach ($storekeepers as $user): ?>

                <option value="<?= $user->id ?>"
                    <?= (($_POST['storekeeper_id'] ?? '') == $user->id) ? 'selected' : '' ?>>

                    <?= htmlspecialchars($user->full_name) ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <!-- Warehouse Team -->
    <div class="mb-3">

        <label class="form-label">
            <?= __('authorized_users') ?>
        </label>

        <select
            name="user_locations[]"
            class="form-select"
            multiple
            size="8">

            <?php foreach ($users as $user): ?>

                <option value="<?= $user->id ?>">

                    <?= htmlspecialchars($user->full_name) ?>

                </option>

            <?php endforeach; ?>

        </select>

        <small class="text-muted">

            <?= __('hold_ctrl_multiple_users') ?>

            <?= __('authorized_users_access_location') ?>

        </small>

    </div>

    <!-- Mobile -->
    <div class="mb-3">

        <label>
            <?= __('mobile_number') ?>
        </label>

        <input type="text"
               name="mobile"
               class="form-control"
               value="<?= htmlspecialchars($_POST['mobile'] ?? '') ?>">

    </div>

    <!-- Notes -->
    <div class="mb-3">

        <label>
            <?= __('notes') ?>
        </label>

        <textarea name="notes"
                  class="form-control"><?= htmlspecialchars($_POST['notes'] ?? '') ?></textarea>

    </div>

    <button class="btn btn-success">
        <?= __('save_warehouse') ?>
    </button>

</form>
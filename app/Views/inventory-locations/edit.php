<h2><?= __('edit_update_inventory_location') ?></h2>

<?php if (isset($error)): ?>

    <div class="alert alert-danger alert-dismissible fade show"
         role="alert">

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
               value="<?= htmlspecialchars($_POST['code'] ?? $location->code) ?>"
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
               value="<?= htmlspecialchars($_POST['name'] ?? $location->name) ?>"
               required>

    </div>

    <!-- Address -->
    <div class="mb-3">

        <label>
            <?= __('address_location') ?>
        </label>

        <textarea name="address"
                  class="form-control"
                  rows="2"><?= htmlspecialchars($_POST['address'] ?? $location->address) ?></textarea>

    </div>

    <!-- Responsible Storekeeper -->
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

                <?php
                    $selectedStorekeeper =
                        $_POST['storekeeper_id']
                        ?? $location->storekeeper_id;
                ?>

                <option value="<?= $user->id ?>"
                    <?= ($selectedStorekeeper == $user->id) ? 'selected' : '' ?>>

                    <?= htmlspecialchars($user->full_name) ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <?php
        $assignedUsers =
            $_POST['user_locations']
            ?? $assignedUsers
            ?? [];
    ?>

    <!-- Warehouse Team -->
    <div class="mb-3">

        <label class="form-label">
            <?= __('warehouse_team') ?>
        </label>

        <select
            name="user_locations[]"
            class="form-select"
            multiple
            size="8">

            <?php foreach ($users as $user): ?>

                <option value="<?= $user->id ?>"
                    <?= in_array($user->id, $assignedUsers) ? 'selected' : '' ?>>

                    <?= htmlspecialchars($user->full_name) ?>

                </option>

            <?php endforeach; ?>

        </select>

        <small class="text-muted">

            <?= __('hold_ctrl_authorized_users') ?>

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
               value="<?= htmlspecialchars($_POST['mobile'] ?? $location->mobile) ?>">

    </div>

    <!-- Notes -->
    <div class="mb-3">

        <label>
            <?= __('notes') ?>
        </label>

        <textarea name="notes"
                  class="form-control"><?= htmlspecialchars($_POST['notes'] ?? $location->notes) ?></textarea>

    </div>

    <button class="btn btn-primary">

        <?= __('update_location') ?>

    </button>

    <a href="<?= URLROOT ?>/inventorylocations"
       class="btn btn-secondary">

        <?= __('cancel') ?>

    </a>

</form>
<?php if (isset($customer) && $customer): ?>

<h2>
    <i class="fas fa-user-edit"></i>
    <?= __('edit_customer') ?> #<?= $customer->id ?>
</h2>


<form method="POST">

    <!-- NAME -->
    <div class="mb-3">

        <label class="form-label">
            <?= __('contact_name') ?> *
        </label>

        <input
            type="text"
            name="name"
            value="<?= htmlspecialchars($customer->name ?? '') ?>"
            class="form-control"
            required>

    </div>


    <!-- COMPANY -->
    <div class="mb-3">

        <label class="form-label">
            <?= __('company') ?>
        </label>

        <input
            type="text"
            name="company"
            value="<?= htmlspecialchars($customer->company ?? '') ?>"
            class="form-control">

    </div>


    <!-- EMAIL -->
    <div class="mb-3">

        <label class="form-label">
            <?= __('email') ?>
        </label>

        <input
            type="email"
            name="email"
            value="<?= htmlspecialchars($customer->email ?? '') ?>"
            class="form-control">

    </div>


    <!-- PHONE -->
    <div class="mb-3">

        <label class="form-label">
            <?= __('phone') ?>
        </label>

        <input
            type="text"
            name="phone"
            value="<?= htmlspecialchars($customer->phone ?? '') ?>"
            class="form-control">

    </div>


    <!-- ADDRESS -->
    <div class="mb-3">

        <label class="form-label">
            <?= __('address') ?>
        </label>

        <textarea
            name="address"
            class="form-control"
            rows="3"><?= htmlspecialchars($customer->address ?? '') ?></textarea>

    </div>


    <!-- STATUS -->
    <div class="mb-3">

        <label class="form-label">
            <?= __('status') ?>
        </label>

        <select
            name="status"
            class="form-select">

            <option
                value="active"
                <?= ($customer->status ?? '') == 'active' ? 'selected' : '' ?>>

                <?= __('active') ?>

            </option>

            <option
                value="inactive"
                <?= ($customer->status ?? '') == 'inactive' ? 'selected' : '' ?>>

                <?= __('inactive') ?>

            </option>

        </select>

    </div>


    <!-- CREATED AT (READ-ONLY) -->
    <div class="mb-3">

        <label class="form-label">
            <?= __('created_at') ?>
        </label>

        <input
            type="text"
            value="<?= htmlspecialchars($customer->created_at ?? '') ?>"
            class="form-control"
            readonly>

    </div>


    <!-- ACTIONS -->

    <button
        type="submit"
        class="btn btn-success">

        <i class="fas fa-save"></i>

        <?= __('update_customer') ?>

    </button>


    <a
        href="<?= URLROOT ?>/customers"
        class="btn btn-secondary">

        <?= __('cancel') ?>

    </a>

</form>


<?php else: ?>

<div class="alert alert-danger">

    <h4>
        <?= __('customer_not_found') ?>
    </h4>

    <p>
        <?= __('customer_record_missing') ?>
    </p>

    <a
        href="<?= URLROOT ?>/customers"
        class="btn btn-primary">

        <?= __('back_to_customers') ?>

    </a>

</div>

<?php endif; ?>
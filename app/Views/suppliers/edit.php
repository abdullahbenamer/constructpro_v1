<h2><?= __('edit_supplier') ?></h2>

<form method="POST">

    <div class="mb-3">
        <label><?= __('company_name') ?></label>

        <input type="text"
               name="company_name"
               class="form-control"
               value="<?= htmlspecialchars($supplier->company_name) ?>"
               required>
    </div>

    <div class="mb-3">
        <label><?= __('contact_person') ?></label>

        <input type="text"
               name="contact_person"
               class="form-control"
               value="<?= htmlspecialchars($supplier->contact_person) ?>">
    </div>

    <div class="mb-3">
        <label><?= __('phone') ?></label>

        <input type="text"
               name="phone"
               class="form-control"
               value="<?= htmlspecialchars($supplier->phone) ?>">
    </div>

    <div class="mb-3">
        <label><?= __('email') ?></label>

        <input type="email"
               name="email"
               class="form-control"
               value="<?= htmlspecialchars($supplier->email) ?>">
    </div>

    <div class="mb-3">
        <label><?= __('address') ?></label>

        <textarea name="address"
                  class="form-control"><?= htmlspecialchars($supplier->address) ?></textarea>
    </div>

    <div class="mb-3">
        <label><?= __('notes') ?></label>

        <textarea name="notes"
                  class="form-control"><?= htmlspecialchars($supplier->notes) ?></textarea>
    </div>

    <button class="btn btn-success">
        <?= __('update_supplier') ?>
    </button>

</form>
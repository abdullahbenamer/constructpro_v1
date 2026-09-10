<h2>
    <?= __('create_supplier_quotation') ?>
</h2>

<form method="POST">

    <div class="row">

        <div class="col-md-4 mb-3">

            <label class="form-label">
                <?= __('supplier_required') ?>
            </label>

            <select name="supplier_id"
                    class="form-select"
                    required>

                <option value="">
                    <?= __('select_supplier') ?>
                </option>

                <?php foreach ($suppliers as $supplier): ?>

                    <option value="<?= $supplier->id ?>">

                        <?= htmlspecialchars(
                            $supplier->company_name
                        ) ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>

        <div class="col-md-4 mb-3">

            <label class="form-label">
                <?= __('supplier_quotation_no') ?>
            </label>

            <input type="text"
                   name="supplier_reference"
                   class="form-control">

        </div>

        <div class="col-md-4 mb-3">

            <label class="form-label">
                <?= __('procurement_reference') ?>
            </label>

            <input type="text"
                   name="procurement_reference"
                   class="form-control"
                   placeholder="<?= __('procurement_reference_placeholder') ?>">

            <small class="text-muted">
                <?= __('procurement_reference_help') ?>
            </small>

        </div>

    </div>


    <div class="row">

        <div class="col-md-4 mb-3">

            <label class="form-label">
                <?= __('quotation_date_required') ?>
            </label>

            <input type="date"
                   name="quotation_date"
                   class="form-control"
                   value="<?= date('Y-m-d') ?>"
                   required>

        </div>

        <div class="col-md-4 mb-3">

            <label class="form-label">
                <?= __('valid_until') ?>
            </label>

            <input type="date"
                   name="valid_until"
                   class="form-control">

        </div>

        <div class="col-md-4 mb-3">

            <label class="form-label">
                <?= __('required_delivery_date') ?>
            </label>

            <input type="date"
                   name="required_delivery_date"
                   class="form-control">

        </div>

    </div>


    <div class="row">

        <div class="col-md-4 mb-3">

            <label class="form-label">
                <?= __('supplier_promised_delivery_date') ?>
            </label>

            <input type="date"
                   name="promised_delivery_date"
                   class="form-control">

        </div>

    </div>


    <div class="mb-3">

        <label class="form-label">
            <?= __('procurement_evaluation_notes') ?>
        </label>

        <textarea name="evaluation_notes"
                  class="form-control"
                  rows="3"
                  placeholder="<?= __('procurement_evaluation_notes_placeholder') ?>"></textarea>

    </div>


    <div class="mb-3">

        <label class="form-label">
            <?= __('notes') ?>
        </label>

        <textarea name="notes"
                  class="form-control"
                  rows="3"></textarea>

    </div>


    <button class="btn btn-success">

        <i class="fas fa-save"></i>
        <?= __('create_quotation') ?>

    </button>

    <a href="<?= URLROOT ?>/supplierquotations"
       class="btn btn-secondary">

        <?= __('cancel') ?>

    </a>

</form>
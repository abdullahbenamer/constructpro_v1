<h2><?= __('create_purchase_order') ?></h2>

<form method="POST">

    <div class="mb-3">

        <label>
            <?= __('supplier') ?>
        </label>

        <select
            name="supplier_id"
            class="form-select"
            required>

            <option value="">
                <?= __('select_supplier') ?>
            </option>

            <?php foreach ($suppliers as $supplier): ?>

                <option value="<?= $supplier->id ?>">

                    <?= htmlspecialchars($supplier->company_name) ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>


    <div class="mb-3">

        <label>
            <?= __('order_date') ?>
        </label>

        <input
            type="date"
            name="order_date"
            class="form-control"
            required>

    </div>


    <div class="mb-3">

        <label>
            <?= __('expected_date') ?>
        </label>

        <input
            type="date"
            name="expected_date"
            class="form-control">

    </div>


    <div class="mb-3">

        <label>
            <?= __('notes') ?>
        </label>

        <textarea
            name="notes"
            class="form-control"></textarea>

    </div>


    <button class="btn btn-success">

        <?= __('create_purchase_order') ?>

    </button>

</form>
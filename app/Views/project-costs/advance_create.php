<h3><?= __('add_project_advance') ?></h3>

<h5>
    <?= __('project') ?>:
    <?= htmlspecialchars($project->title) ?>
</h5>

<form method="POST">

    <div class="mb-2">

        <label>
            <?= __('amount') ?>
        </label>

        <input
            type="number"
            step="0.01"
            name="amount"
            class="form-control"
            required>

    </div>


    <div class="mb-2">

        <label>
            <?= __('payment_method') ?>
        </label>

        <select
            name="payment_method"
            class="form-control">

            <option value="Cash">
                <?= __('cash') ?>
            </option>

            <option value="Bank Transfer">
                <?= __('bank_transfer') ?>
            </option>

            <option value="Cheque">
                <?= __('cheque') ?>
            </option>

        </select>

    </div>


    <div class="mb-2">

        <label>
            <?= __('reference') ?>
        </label>

        <input
            type="text"
            name="reference"
            class="form-control">

    </div>


    <div class="mb-2">

        <label>
            <?= __('date') ?>
        </label>

        <input
            type="date"
            name="advance_date"
            class="form-control"
            value="<?= date('Y-m-d') ?>">

    </div>


    <div class="mb-2">

        <label>
            <?= __('notes') ?>
        </label>

        <textarea
            name="notes"
            class="form-control"></textarea>

    </div>


    <button class="btn btn-success">

        <?= __('save_advance') ?>

    </button>

</form>
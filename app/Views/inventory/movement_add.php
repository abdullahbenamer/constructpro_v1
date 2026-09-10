<h3>
    <?= __('add_stock_movement') ?>
</h3>

<form method="POST">

    <input type="hidden"
           name="inventory_id"
           value="<?= $inventory_id ?>">

    <div class="mb-3">

        <label>
            <?= __('type') ?>
        </label>

        <select name="type"
                class="form-select">

            <option value="IN">
                <?= __('stock_in') ?>
            </option>

            <option value="OUT">
                <?= __('stock_out') ?>
            </option>

            <option value="ADJUSTMENT">
                <?= __('adjustment') ?>
            </option>

        </select>

    </div>

    <div class="mb-3">

        <label>
            <?= __('location') ?>
        </label>

        <select name="location_id"
                class="form-select"
                required>

            <option value="">
                <?= __('select_stock_location') ?>
            </option>

            <?php foreach ($locations as $location) : ?>

                <option value="<?= $location->id ?>">

                    <?= htmlspecialchars($location->code) ?>
                    -
                    <?= htmlspecialchars($location->name) ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="mb-3">

        <label>
            <?= __('quantity') ?>
        </label>

        <input type="number"
               name="quantity"
               class="form-control"
               step="0.01"
               min="0.01"
               required>

    </div>

    <div class="mb-3">

        <label>
            <?= __('reference') ?>
        </label>

        <input type="text"
               name="reference"
               class="form-control">

    </div>

    <div class="mb-3">

        <label>
            <?= __('notes') ?>
        </label>

        <textarea name="notes"
                  class="form-control"></textarea>

    </div>

    <button class="btn btn-success">

        <?= __('save') ?>

    </button>

</form>
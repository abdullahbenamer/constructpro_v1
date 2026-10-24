<h2>
    <?= __('edit_inventory_reservation') ?>
</h2>

<form method="POST">

    <div class="mb-3">

        <label>
            <?= __('inventory_item') ?>
        </label>


        <div class="form-control bg-light">
            <?= htmlspecialchars($reservation->inventory_name ?? '') ?>
        </div>

    </div>


    <div class="mb-3">
        <label for="uom" class="form-label">
            <?= __('unit_of_measure') ?>
        </label>

        <input
            type="text"
            id="uom"
            class="form-control"
            value="<?= htmlspecialchars(
                        (strtolower(substr($_SESSION['language'] ?? 'en', 0, 2)) === 'ar')
                            ? ($reservation->unit_name_a ?? '')
                            : ($reservation->unit_name ?? ''),
                        ENT_QUOTES,
                        'UTF-8'
                    ) ?>"
            readonly>
    </div>

    <div class="mb-3">

        <label>
            <?= __('location') ?>
        </label>


        <div class="form-control bg-light">
            <?= htmlspecialchars($reservation->location_name ?? '') ?>
        </div>

    </div>

    <div class="mb-3">

        <label>
            <?= __('project') ?>
        </label>

        <div class="form-control bg-light">
            <?= htmlspecialchars($reservation->project_title ?? '') ?>
        </div>
    </div>



    <?php
    $allowFraction = (int) ($reservation->allow_fraction ?? 0) === 1;
    ?>

    <div class="mb-3">
        <label for="quantity" class="form-label">
            <?= __('quantity') ?>
        </label>

        <input
            type="number"
            id="quantity"
            name="quantity"
            value="<?= htmlspecialchars((string) $reservation->quantity, ENT_QUOTES, 'UTF-8') ?>"
            step="<?= $allowFraction ? '0.01' : '1' ?>"
            min="<?= $allowFraction ? '0.01' : '1' ?>"
            class="form-control"
            required>
    </div>

<!-- Inventory Stock Summary -->
<?php if (!empty($stockSummary)) : ?>

    <?php
    $physicalQty = (float) $stockSummary->physical_quantity;
    $reservedByOthers = (float) $stockSummary->reserved_by_others;
    $currentQty = (float) $stockSummary->current_quantity;

    $maxEditableQty = max(
        0,
        (float) $stockSummary->max_editable_quantity
    );
    ?>

    <div class="alert alert-info py-2 px-3 mb-3"
         style="max-width: 400px;">

        <div>
            <strong><?= __('physical_stock') ?>:</strong>
            <?= number_format($physicalQty, 2) ?>
        </div>

        <div>
            <strong><?= __('reserved_by_others') ?>:</strong>
            <?= number_format($reservedByOthers, 2) ?>
        </div>

        <div>
            <strong><?= __('current_reserved_quantity') ?>:</strong>
            <?= number_format($currentQty, 2) ?>
        </div>

        <hr class="my-2">

        <div>
            <strong><?= __('maximum_editable_quantity') ?>:</strong>
            <span class="fw-bold text-success">
                <?= number_format($maxEditableQty, 2) ?>
            </span>
        </div>

    </div>

<?php else : ?>

    <div class="alert alert-warning py-2 px-3 mb-3"
         style="max-width: 400px;">
        <?= __('stock_summary_unavailable') ?>
    </div>

<?php endif; ?>
<!-- End Inventory Stock Summary -->

    <div class="mb-3">
        <label for="required_by_date" class="form-label">
            <?= __('required_by_date') ?>
        </label>
        <input
            type="date"
            id="required_by_date"
            name="required_by_date"
            value="<?= htmlspecialchars($reservation->required_by_date ?? '') ?>"
            class="form-control">
    </div>
    <div class="mb-3">
        <label>
            <?= __('reference') ?>
        </label>
        <input type="text"
            name="reference"
            value="<?= htmlspecialchars($reservation->reference) ?>"
            class="form-control">
    </div>
    <div class="mb-3">

        <label>
            <?= __('notes') ?>
        </label>

        <textarea name="notes"
            class="form-control"><?= htmlspecialchars($reservation->notes) ?></textarea>
    </div>
    <button class="btn btn-primary">
        <?= __('save_update') ?>
    </button>
</form>

<!-- <script>
    const inventorySelect =
        document.getElementById('inventory_id');

    const uomInput =
        document.getElementById('uom');

    function updateUOM() {

        const option =
            inventorySelect.options[
                inventorySelect.selectedIndex
            ];

        if (!option || !inventorySelect.value) {

            uomInput.value = '';

            return;
        }

        const currentLanguage =
            document.documentElement.lang.toLowerCase();

        if (currentLanguage === 'ar') {

            uomInput.value =
                option.dataset.uomAr || '';

        } else {

            uomInput.value =
                option.dataset.uomEn || '';
        }
    }

// address the Qty Allow and Not Allow Fraction 
const quantityInput = document.getElementById('quantity');

function updateQuantityRules() {
    const option =
        inventorySelect.options[inventorySelect.selectedIndex];

    const allowFraction =
        option?.dataset.allowFraction === '1';

    quantityInput.step = allowFraction ? '0.01' : '1';
    quantityInput.min = allowFraction ? '0.01' : '1';

    quantityInput.setCustomValidity('');
}

inventorySelect.addEventListener('change', updateQuantityRules);

// Apply rules to the initially selected item.
updateQuantityRules();

quantityInput.addEventListener('input', function () {
    const option =
        inventorySelect.options[inventorySelect.selectedIndex];

    const allowFraction =
        option?.dataset.allowFraction === '1';

    if (
        !allowFraction &&
        this.value !== '' &&
        !Number.isInteger(Number(this.value))
    ) {
        this.setCustomValidity(
            '<? //= htmlspecialchars(__('quantity_must_be_whole_number'), ENT_QUOTES, 'UTF-8') 
                ?>'
        );
    } else {
        this.setCustomValidity('');
    }
});




    inventorySelect.addEventListener(
        'change',
        updateUOM
    );

    // Display UOM for the initially selected item
    updateUOM();
</script> -->
<h2 class="mb-4">
    <i class="fas fa-sliders-h"></i>
    <?= __('stock_adjustment') ?>
</h2>

<div id="jsNotification"></div>

<form method="POST" id="adjustmentForm">

    <!-- ITEM -->

    <div class="mb-3">

        <label class="form-label">
            <?= __('inventory_item') ?>
            <span class="text-danger">*</span>
        </label>

        <select
            name="inventory_id"
            id="inventory_id"
            class="form-select"
            required>

            <option value="">
                <?= __('select_inventory_item') ?>
            </option>

            <?php foreach ($inventory as $item): ?>

                <option
                    value="<?= (int)$item->id ?>"
                    <?= (
                        (int)$item->id ===
                        (int)($selected_inventory_id ?? 0)
                    ) ? 'selected' : '' ?>>

                    <?= htmlspecialchars($item->name) ?>

                    <?php if (!empty($item->sku)): ?>
                        — <?= htmlspecialchars($item->sku) ?>
                    <?php endif; ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>


    <!-- LOCATION -->

    <div class="mb-3">

        <label class="form-label">

            <?= __('location') ?>

            <span class="text-danger">*</span>

        </label>

        <select
            name="location_id"
            id="location_id"
            class="form-select"
            required>

            <option value="">
                <?= __('select_location') ?>
            </option>

            <?php foreach ($locations as $location): ?>

                <option value="<?= (int)$location->id ?>">

                    <?= htmlspecialchars($location->code) ?>
                    -
                    <?= htmlspecialchars($location->name) ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>


    <!-- CURRENT STOCK INFO -->

    <div
        id="stockInfo"
        class="alert alert-info d-none"
        style="max-width: 500px;">

        <div>
            <?= __('physical_stock') ?>:
            <strong id="physicalQty">0.00</strong>
        </div>

        <div>
            <?= __('reserved') ?>:
            <strong id="reservedQty">0.00</strong>
        </div>

        <div>
            <?= __('available_for_adjustment') ?>:
            <strong id="availableQty">0.00</strong>
        </div>

    </div>


    <!-- ADJUSTMENT TYPE -->

    <div class="mb-3">

        <label class="form-label">

            <?= __('adjustment_type') ?>

            <span class="text-danger">*</span>

        </label>

        <select
            name="adjustment_type"
            id="adjustment_type"
            class="form-select"
            required>

            <option value="">
                <?= __('select_adjustment_type') ?>
            </option>

            <option value="INCREASE">
                <?= __('increase_stock') ?>
            </option>

            <option value="DECREASE">
                <?= __('decrease_stock') ?>
            </option>

        </select>

    </div>


    <!-- QUANTITY -->

    <div
        class="mb-3"
        style="max-width: 400px;">

        <label class="form-label">

            <?= __('quantity') ?>

            <span class="text-danger">*</span>

        </label>

        <input
            type="number"
            name="quantity"
            id="quantity"
            class="form-control"
            step="0.01"
            min="0.01"
            required>

        <small
            id="quantityHelp"
            class="text-muted">
        </small>

    </div>


    <!-- NEW BALANCE -->

    <div
        id="balancePreview"
        class="alert alert-secondary d-none"
        style="max-width: 500px;">

        <?= __('new_physical_balance') ?>:

        <strong id="newBalance">
            0.00
        </strong>

        <span id="baseUnit"></span>

    </div>


    <!-- REASON -->

    <div class="mb-3">

        <label class="form-label">

            <?= __('reason') ?>

            <span class="text-danger">*</span>

        </label>

        <select
            name="reason"
            id="reason"
            class="form-select"
            required>

            <option value="">
                <?= __('select_reason') ?>
            </option>

            <option value="DAMAGED">
                <?= __('damaged') ?>
            </option>

            <option value="BROKEN">
                <?= __('broken') ?>
            </option>

            <option value="LOST">
                <?= __('lost') ?>
            </option>

            <option value="FOUND">
                <?= __('found') ?>
            </option>

            <option value="PHYSICAL_COUNT_CORRECTION">
                <?= __('physical_count_correction') ?>
            </option>

            <option value="EXPIRED">
                <?= __('expired') ?>
            </option>

            <option value="OTHER">
                <?= __('other') ?>
            </option>

        </select>

    </div>


    <!-- NOTES -->

    <div class="mb-3">

        <label class="form-label">
            <?= __('notes') ?>
        </label>

        <textarea
            name="notes"
            id="notes"
            class="form-control"
            rows="3"
            placeholder="<?= __('additional_explanation') ?>"></textarea>

    </div>


    <!-- ACTIONS -->

    <button
        type="submit"
        id="submitBtn"
        class="btn btn-primary">

        <i class="fas fa-sliders-h"></i>
        <?= __('post_adjustment') ?>

    </button>

    <a
        href="<?= URLROOT ?>/inventory"
        class="btn btn-secondary">

        <?= __('cancel') ?>

    </a>

</form>


<script>
document.addEventListener('DOMContentLoaded', function() {

    const inventorySelect =
        document.getElementById('inventory_id');

    const locationSelect =
        document.getElementById('location_id');

    const adjustmentType =
        document.getElementById('adjustment_type');

    const quantityInput =
        document.getElementById('quantity');

    const stockInfo =
        document.getElementById('stockInfo');

    const physicalQty =
        document.getElementById('physicalQty');

    const reservedQty =
        document.getElementById('reservedQty');

    const availableQty =
        document.getElementById('availableQty');

    const quantityHelp =
        document.getElementById('quantityHelp');

    const balancePreview =
        document.getElementById('balancePreview');

    const newBalance =
        document.getElementById('newBalance');

    const submitBtn =
        document.getElementById('submitBtn');

    let currentPhysical = 0;
    let currentReserved = 0;
    let currentAvailable = 0;


    function resetStockInfo() {

        currentPhysical = 0;
        currentReserved = 0;
        currentAvailable = 0;

        stockInfo.classList.add('d-none');

        balancePreview.classList.add('d-none');

        quantityInput.removeAttribute('max');

        quantityInput.value = '';

        quantityHelp.textContent = '';

    }


    function loadStock() {

        const inventoryId =
            inventorySelect.value;

        const locationId =
            locationSelect.value;

        if (!inventoryId || !locationId) {

            resetStockInfo();

            return;
        }


        fetch(
            '<?= URLROOT ?>/stockadjustments/getLocationStock', {
                method: 'POST',

                headers: {
                    'Content-Type':
                        'application/x-www-form-urlencoded'
                },

                body:
                    'inventory_id=' +
                    encodeURIComponent(inventoryId) +
                    '&location_id=' +
                    encodeURIComponent(locationId)
            }
        )

        .then(response => response.json())

        .then(data => {

            currentPhysical =
                parseFloat(data.physical_qty || 0);

            currentReserved =
                parseFloat(data.reserved_qty || 0);

            currentAvailable =
                parseFloat(data.available_qty || 0);


            physicalQty.textContent =
                currentPhysical.toFixed(2);

            reservedQty.textContent =
                currentReserved.toFixed(2);

            availableQty.textContent =
                currentAvailable.toFixed(2);


            stockInfo.classList.remove('d-none');


            if (
                adjustmentType.value === 'DECREASE'
            ) {

                quantityInput.max =
                    currentAvailable;

                quantityHelp.textContent =
                    '<?= __('maximum_decrease') ?>: ' +
                    currentAvailable.toFixed(2);

            } else {

                quantityInput.removeAttribute('max');

                quantityHelp.textContent =
                    '<?= __('increase_not_limited_by_stock') ?>';

            }

            updatePreview();

        })

        .catch(error => {

            console.error(
                '<?= __('error_loading_stock') ?>:',
                error
            );

            resetStockInfo();

        });

    }


    function updatePreview() {

        if (
            !inventorySelect.value ||
            !locationSelect.value ||
            !adjustmentType.value ||
            !quantityInput.value
        ) {

            balancePreview.classList.add('d-none');

            return;
        }


        const quantity =
            parseFloat(quantityInput.value || 0);


        if (quantity <= 0) {

            balancePreview.classList.add('d-none');

            return;
        }


        let result = currentPhysical;


        if (
            adjustmentType.value === 'INCREASE'
        ) {

            result += quantity;

        } else {

            result -= quantity;

        }


        if (result < 0) {

            balancePreview.classList.add('d-none');

            return;
        }


        newBalance.textContent =
            result.toFixed(2);

        balancePreview.classList.remove('d-none');

    }


    inventorySelect.addEventListener(
        'change',
        loadStock
    );

    locationSelect.addEventListener(
        'change',
        loadStock
    );


    adjustmentType.addEventListener(
        'change',
        function() {

            if (
                this.value === 'DECREASE'
            ) {

                quantityInput.max =
                    currentAvailable;

                quantityHelp.textContent =
                    '<?= __('maximum_decrease') ?>: ' +
                    currentAvailable.toFixed(2);

            } else if (
                this.value === 'INCREASE'
            ) {

                quantityInput.removeAttribute(
                    'max'
                );

                quantityHelp.textContent =
                    '<?= __('increase_not_limited_by_stock') ?>';

            } else {

                quantityInput.removeAttribute(
                    'max'
                );

                quantityHelp.textContent = '';

            }

            updatePreview();

        }
    );


    quantityInput.addEventListener(
        'input',
        updatePreview
    );


    document
        .getElementById('reason')
        .addEventListener(
            'change',
            function() {

                const notes =
                    document.getElementById('notes');

                if (this.value === 'OTHER') {

                    notes.required = true;

                    notes.placeholder =
                        '<?= __('please_explain_reason') ?>';

                } else {

                    notes.required = false;

                    notes.placeholder =
                        '<?= __('additional_explanation') ?>';

                }

            }
        );


    document
        .getElementById('adjustmentForm')
        .addEventListener(
            'submit',
            function(e) {

                if (
                    adjustmentType.value === 'DECREASE' &&
                    (
                        parseFloat(
                            quantityInput.value || 0
                        ) > currentAvailable
                    )
                ) {

                    e.preventDefault();

                    alert(
                        '<?= __('adjustment_quantity_exceeds_available') ?>'
                    );

                    return;
                }

            }
        );


    if (
        inventorySelect.value &&
        locationSelect.value
    ) {

        loadStock();

    }

});
</script>
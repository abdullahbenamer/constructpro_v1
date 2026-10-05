<?php if (!empty($_SESSION['error'])) : ?>

    <div class="alert alert-danger">
        <?= $_SESSION['error'] ?>
    </div>

    <?php unset($_SESSION['error']); ?>

<?php endif; ?>

<h2>
    <?= __('transfer_inventory') ?>
</h2>

<!-- bootstrap error notification container -->
<div id="jsNotification"></div>

<form method="POST">

    <div class="mb-3">

        <label>
            <?= __('scan_enter_sku_barcode') ?>
        </label>

        <input type="text"
            id="skuInput"
            class="form-control"
            placeholder="<?= __('scan_barcode_or_type_sku') ?>">

        <small class="text-muted">
            <?= __('select_manually_below') ?>
        </small>

    </div>


    <div class="mb-3">

        <label>
            <?= __('item') ?>
        </label>

        <select name="inventory_id"
            id="inventorySelect"
            class="form-select"
            required>

            <option value="">
                <?= __('select_item') ?>
            </option>

            <?php foreach ($inventory as $item) : ?>

                <option
                    value="<?= $item->id ?>"
                    data-sku="<?= htmlspecialchars($item->sku) ?>"
                    data-allow-fraction="<?= (int)$item->allow_fraction ?>">

                    <?= htmlspecialchars($item->name) ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>


    <div class="row">

        <div class="col-md-6 mb-3">

            <label>
                <?= __('from_location') ?>
            </label>

            <select name="from_location_id"
                id="fromLocation"
                class="form-select"
                required>

                <option value="">
                    <?= __('select_source') ?>
                </option>

                <?php foreach ($locations as $loc): ?>

                    <option value="<?= $loc->id ?>">

                        <?= htmlspecialchars($loc->code) ?>
                        -
                        <?= htmlspecialchars($loc->name) ?>

                    </option>

                <?php endforeach; ?>

            </select>

            <div
                class="alert alert-info d-none mt-2"
                id="stockInfo">

                <div>
                    <strong><?= __('physical_stock') ?>:</strong>
                    <span id="physicalQty">0.00</span>
                </div>

                <div>
                    <strong><?= __('reserved_stock') ?>:</strong>
                    <span id="reservedQty">0.00</span>
                </div>

                <div>
                    <strong><?= __('available_for_transfer') ?>:</strong>
                    <span
                        id="availableQty"
                        class="fw-bold">
                        0.00
                    </span>
                </div>

            </div>

        </div>


        <div class="col-md-6 mb-3">

            <label>
                <?= __('to_location') ?>
            </label>

            <select name="to_location_id"
                id="toLocation"
                class="form-select"
                required>

                <option value="">
                    <?= __('select_destination') ?>
                </option>

                <?php foreach ($locations as $loc) : ?>

                    <option value="<?= $loc->id ?>">

                        <?= htmlspecialchars($loc->code) ?>
                        -
                        <?= htmlspecialchars($loc->name) ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>

    </div>

    <div class="row">

        <!-- QUANTITY -->

        <div class="col-md-4 mb-3">

            <label class="form-label">
                <?= __('quantity') ?>
            </label>

            <input
                type="number"
                name="quantity"
                id="quantity"
                class="form-control"
                step="1"
                min="1"
                value="1"
                required>

            <!-- QUANTITY RULE -->

            <div id="quantityRule" class="mt-2">

                <small
                    id="quantityRuleFraction"
                    class="text-success">

                    <i class="bi bi-check-circle-fill me-1"></i>

                    <?= __('fractional_quantities_allowed') ?>

                </small>

                <small
                    id="quantityRuleWhole"
                    class="text-muted d-none">

                    <i class="bi bi-info-circle-fill me-1"></i>

                    <?= __('whole_quantities_only') ?>

                </small>

            </div>

        </div>

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


    <button class="btn btn-primary">

        <?= __('transfer') ?>

    </button>

</form>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        const inventorySelect =
            document.getElementById('inventorySelect');

        const fromLocation =
            document.getElementById('fromLocation');

        const skuInput =
            document.getElementById('skuInput');

        const stockInfo =
            document.getElementById('stockInfo');

        const availableQty =
            document.getElementById('availableQty');

        const physicalQty =
            document.getElementById('physicalQty');

        const reservedQty =
            document.getElementById('reservedQty');

        const quantity =
            document.getElementById('quantity');

        const quantityRuleFraction =
            document.getElementById('quantityRuleFraction');

        const quantityRuleWhole =
            document.getElementById('quantityRuleWhole');



        /*
        |--------------------------------------------------------------------------
        | QUANTITY RULES
        |--------------------------------------------------------------------------
        */

        function updateQuantityRules() {

            const selectedId =
                inventorySelect.value;
            const quantityValue = parseFloat(quantity.value);

            /*
            |--------------------------------------------------------------------------
            | NO ITEM SELECTED
            |--------------------------------------------------------------------------
            */

            if (!selectedId) {

                quantity.step = '1';
                quantity.min = '1';

                quantityRuleFraction.classList.add('d-none');
                quantityRuleWhole.classList.remove('d-none');

                return;
            }


            const option =
                inventorySelect.options[
                    inventorySelect.selectedIndex
                ];


            if (!option) {

                quantity.step = '1';
                quantity.min = '1';

                quantityRuleFraction.classList.add('d-none');
                quantityRuleWhole.classList.remove('d-none');

                return;
            }


            /*
            |--------------------------------------------------------------------------
            | INVENTORY FRACTION RULE
            |--------------------------------------------------------------------------
            */

            const allowFraction =
                option.getAttribute('data-allow-fraction') === '1';


            if (allowFraction) {

                quantity.step = '0.01';
                quantity.min = '0.01';

                quantityRuleFraction.classList.remove('d-none');
                quantityRuleWhole.classList.add('d-none');

            } else {

                quantity.step = '1';
                quantity.min = '1';

                quantityRuleFraction.classList.add('d-none');
                quantityRuleWhole.classList.remove('d-none');

            }

        }
        // -----------------------------
        // STOCK BY LOCATION
        // -----------------------------

        function loadStock() {

            const inventory_id =
                inventorySelect.value;

            const location_id =
                fromLocation.value;

            if (!inventory_id || !location_id) {

                stockInfo.classList.add('d-none');
                
                physicalQty.textContent =
                    '0.00';

                reservedQty.textContent =
                    '0.00';

                availableQty.textContent =
                    '0.00';

                return;
            }

            fetch(
                    '<?= URLROOT ?>/inventorytransfers/getLocationStock', {
                        method: 'POST',

                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },

                        body: 'inventory_id=' +
                            inventory_id +
                            '&location_id=' +
                            location_id
                    }
                )

                .then(res => res.json())

                .then(data => {

                    stockInfo.classList.remove('d-none');

                    const physical =
                        parseFloat(data.physical_qty ?? 0);

                    const reserved =
                        parseFloat(data.reserved_qty ?? 0);

                    const available =
                        parseFloat(data.available_qty ?? 0);


                    physicalQty.textContent =
                        physical.toFixed(2);

                    reservedQty.textContent =
                        reserved.toFixed(2);

                    availableQty.textContent =
                        available.toFixed(2);

                    stockInfo.classList.remove(
                        'alert-info',
                        'alert-danger',
                        'alert-warning'
                    );

                    if (available <= 0) {

                        stockInfo.classList.add(
                            'alert-danger'
                        );

                    } else if (available < 10) {

                        stockInfo.classList.add(
                            'alert-warning'
                        );

                    } else {

                        stockInfo.classList.add(
                            'alert-info'
                        );

                    }

                })

                .catch(err => {

                    console.error(
                        '<?= __('stock_load_error') ?>:',
                        err
                    );

                    stockInfo.classList.add(
                        'd-none'
                    );

                });

        }


        // -----------------------------
        // LOAD LOCATIONS FOR ITEM
        // -----------------------------

        function loadLocations(itemId) {

            fetch(
                    '<?= URLROOT ?>/inventorytransfers/getItemLocations', {
                        method: 'POST',

                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },

                        body: 'inventory_id=' +
                            itemId
                    }
                )

                .then(res => res.json())

                .then(locations => {

                    fromLocation.innerHTML =
                        '<option value=""><?= __('select_source') ?></option>';

                    locations.forEach(loc => {

                        fromLocation.innerHTML += `
                    <option value="${loc.location_id}">
                        ${loc.code} - ${loc.name} (${loc.quantity})
                    </option>
                `;

                    });


                    // 👇 auto-select first location (important fix)

                    if (locations.length > 0) {

                        fromLocation.value =
                            locations[0].location_id;

                        loadStock();

                    }

                });

        }


        // -----------------------------
        // SKU SEARCH
        // -----------------------------

        let typingTimer;

        skuInput.addEventListener(
            'input',
            function() {

                clearTimeout(typingTimer);

                const value =
                    this.value.trim();

                if (value.length < 2) {
                    return;
                }


                typingTimer = setTimeout(() => {

                    fetch(
                            '<?= URLROOT ?>/inventorytransfers/getBySku', {
                                method: 'POST',

                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },

                                body: 'value=' +
                                    encodeURIComponent(value)
                            }
                        )

                        .then(res => res.text())

                        .then(text => {

                            try {

                                return JSON.parse(text);

                            } catch (e) {

                                console.error(
                                    "Invalid JSON:",
                                    text
                                );

                                return null;

                            }

                        })

                        .then(item => {

                            if (!item || !item.id) {

                                inventorySelect.value = '';

                                inventorySelect.dispatchEvent(
                                    new Event('change')
                                );

                                return;

                            }

                            inventorySelect.value =
                                item.id;

                            inventorySelect.dispatchEvent(
                                new Event('change')
                            );

                        });

                }, 300);

            }
        );


        // -----------------------------
        // MAIN CHANGE HANDLER
        // -----------------------------

        inventorySelect.addEventListener(
            'change',
            function() {

                loadLocations(
                    this.value
                );

                updateQuantityRules();

                // reset stock display on item change

                stockInfo.classList.add(
                    'd-none'
                );

                availableQty.textContent =
                    0;

                if (
                    this.value &&
                    fromLocation.value
                ) {

                    loadStock();

                }

            }
        );


        // Prevent same source/destination

        const form =
            document.querySelector('form');

        const toLocation =
            document.getElementById('toLocation');

        /*
        |--------------------------------------------------------------------------
        | FORM SUBMIT
        |--------------------------------------------------------------------------
        */

        form.addEventListener(
            'submit',
            function(e) {

                /*
                |--------------------------------------------------------------------------
                | SOURCE AND DESTINATION
                |--------------------------------------------------------------------------
                */

                if (
                    fromLocation.value ===
                    toLocation.value
                ) {

                    e.preventDefault();

                    showNotification(
                        <?= json_encode(
                            __('source_destination_same')
                        ) ?>,
                        'danger'
                    );

                    return;
                }


                /*
                |--------------------------------------------------------------------------
                | QUANTITY
                |--------------------------------------------------------------------------
                */

                const quantityValue =
                    parseFloat(quantity.value);


                /*
                |--------------------------------------------------------------------------
                | QUANTITY MUST BE GREATER THAN ZERO
                |--------------------------------------------------------------------------
                */

                if (
                    !Number.isFinite(quantityValue) ||
                    quantityValue <= 0
                ) {

                    e.preventDefault();

                    showNotification(
                        <?= json_encode(
                            __('quantity_must_be_greater_than_zero')
                        ) ?>,
                        'danger'
                    );

                    quantity.focus();

                    return;
                }


                /*
                |--------------------------------------------------------------------------
                | CHECK SELECTED INVENTORY
                |--------------------------------------------------------------------------
                */

                const selectedOption =
                    inventorySelect.options[
                        inventorySelect.selectedIndex
                    ];


                const allowFraction =
                    selectedOption &&
                    selectedOption.getAttribute(
                        'data-allow-fraction'
                    ) === '1';


                /*
                |--------------------------------------------------------------------------
                | WHOLE NUMBER REQUIRED
                |--------------------------------------------------------------------------
                */

                if (
                    !allowFraction &&
                    !Number.isInteger(quantityValue)
                ) {

                    e.preventDefault();

                    showNotification(
                        <?= json_encode(
                            __('quantity_must_be_whole_number')
                        ) ?>,
                        'danger'
                    );

                    quantity.focus();

                    return;
                }

            }
        );


        fromLocation.addEventListener(
            'change',
            loadStock
        );

    });


    function showNotification(
        message,
        type = 'danger'
    ) {

        const container =
            document.getElementById(
                'jsNotification'
            );

        container.innerHTML = `

        <div class="alert alert-${type} alert-dismissible fade show"
             role="alert">

            ${message}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="<?= __('close') ?>">
            </button>

        </div>

    `;

    }
</script>
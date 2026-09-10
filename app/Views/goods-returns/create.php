<h2>
    <i class="fas fa-undo-alt"></i>
    <?= __('return_goods_to_supplier') ?>
</h2>

<form method="POST">

    <!-- GRN -->
    <div class="mb-3">

        <label class="form-label">
            <?= __('goods_receipt_grn_required') ?>
        </label>

        <select
            name="goods_receipt_id"
            id="grnSelect"
            class="form-select"
            required
        >

            <option value="">
                <?= __('select_goods_receipt') ?>
            </option>

            <?php foreach ($goodsReceipts as $grn): ?>

                <option
                    value="<?= $grn->id ?>"
                    data-supplier-id="<?= $grn->supplier_id ?>"
                    data-supplier-name="<?= htmlspecialchars($grn->company_name) ?>"
                    data-po-id="<?= $grn->purchase_order_id ?>"
                    data-po-number="<?= htmlspecialchars($grn->po_number) ?>"
                >

                    <?= htmlspecialchars($grn->grn_number) ?>
                    -
                    <?= htmlspecialchars($grn->company_name) ?>

                </option>

            <?php endforeach; ?>

        </select>
    </div>


    <!-- GRN INFORMATION -->
    <div
        id="grnInfo"
        class="alert alert-info d-none"
    >

        <strong>GRN:</strong>
        <span id="grnNumber"></span>
        <br>

        <strong><?= __('purchase_order') ?></strong>
        <span id="poNumber"></span>
        <br>

        <strong><?= __('supplier') ?></strong>
        <span id="supplierName"></span>

    </div>


    <!-- GRN ITEM -->
    <div class="mb-3">

        <label class="form-label">
            <?= __('item_required') ?>
        </label>

        <select
            name="goods_receipt_item_id"
            id="grnItemSelect"
            class="form-select"
            required
            disabled
        >

            <option value="">
                <?= __('select_grn_item') ?>
            </option>

        </select>

    </div>


    <!-- ITEM INFORMATION -->
    <div
        id="itemInfo"
        class="alert alert-secondary d-none"
    >

        <strong><?= __('item') ?></strong>
        <span id="itemName"></span>
        <br>

        <strong><?= __('sku') ?></strong>
        <span id="itemSku"></span>
        <br>

        <strong><?= __('original_grn_location') ?></strong>
        <span id="originalLocation"></span>
        <br>

        <strong><?= __('received') ?></strong>
        <span id="receivedQty"></span>
        <br>

        <strong><?= __('already_returned') ?></strong>
        <span id="returnedQty"></span>
        <br>

        <strong><?= __('returnable') ?></strong>
        <span id="returnableQty"></span>

    </div>


    <div class="row">

        <!-- RETURN LOCATION -->
        <div class="col-md-6 mb-3">

            <label class="form-label">
                <?= __('return_from_warehouse_required') ?>
            </label>

            <select
                name="location_id"
                id="locationSelect"
                class="form-select"
                required
                disabled
            >

                <option value="">
                    <?= __('select_warehouse') ?>
                </option>

            </select>

        </div>


        <!-- QUANTITY -->
        <div class="col-md-3 mb-3">

            <label class="form-label">
                <?= __('return_quantity_required') ?>
            </label>

            <input
                type="number"
                name="quantity"
                id="quantity"
                class="form-control"
                min="1"
                step="1"
                required
                disabled
            >

            <div class="form-text">
                <?= __('maximum_returnable_quantity') ?>
                <span id="quantityHelp">0</span>
            </div>

        </div>


        <!-- UNIT COST -->
        <div class="col-md-3 mb-3">

            <label class="form-label">
                <?= __('unit_cost') ?>
            </label>

            <input
                type="number"
                name="unit_cost"
                id="unitCost"
                class="form-control"
                step="0.01"
                readonly
            >

        </div>

    </div>


    <!-- SUPPLIER -->
    <div class="row">

        <div class="col-md-6 mb-3">

            <label class="form-label">
                <?= __('supplier') ?>
            </label>

            <input
                type="text"
                id="supplierDisplay"
                class="form-control"
                readonly
            >

            <input
                type="hidden"
                name="supplier_id"
                id="supplierId"
            >

        </div>


        <!-- RETURN DATE -->
        <div class="col-md-6 mb-3">

            <label class="form-label">
                <?= __('return_date_required') ?>
            </label>

            <input
                type="date"
                name="return_date"
                class="form-control"
                value="<?= date('Y-m-d') ?>"
                required
            >

        </div>

    </div>


    <!-- REASON -->
    <div class="mb-3">

        <label class="form-label">
            <?= __('reason') ?>
        </label>

        <input
            type="text"
            name="reason"
            class="form-control"
            maxlength="255"
            placeholder="<?= __('reason_for_returning_goods') ?>"
        >

    </div>


    <!-- NOTES -->
    <div class="mb-3">

        <label class="form-label">
            <?= __('notes') ?>
        </label>

        <textarea
            name="notes"
            class="form-control"
            rows="3"
        ></textarea>

    </div>


    <!-- ACTIONS -->
    <button
        type="submit"
        id="returnButton"
        class="btn btn-danger"
        disabled
    >

        <i class="fas fa-undo-alt"></i>
        <?= __('return_goods') ?>

    </button>

    <a
        href="<?= URLROOT ?>/goodsreturns"
        class="btn btn-secondary"
    >
        <?= __('cancel') ?>
    </a>

</form>


<script>

const grnSelect =
    document.getElementById('grnSelect');

const grnItemSelect =
    document.getElementById('grnItemSelect');

const locationSelect =
    document.getElementById('locationSelect');

const quantityInput =
    document.getElementById('quantity');

const unitCostInput =
    document.getElementById('unitCost');

const returnButton =
    document.getElementById('returnButton');

const supplierId =
    document.getElementById('supplierId');

const supplierDisplay =
    document.getElementById('supplierDisplay');


let currentItems = [];

let currentItem = null;

let currentLocations = [];


// ======================================================
// SELECT GRN
// ======================================================

grnSelect.addEventListener('change', function () {

    const option =
        this.options[this.selectedIndex];

    currentItems = [];
    currentItem = null;
    currentLocations = [];

    grnItemSelect.innerHTML =
        '<option value=""><?= htmlspecialchars(__('select_grn_item'), ENT_QUOTES) ?></option>';

    grnItemSelect.disabled = true;

    locationSelect.innerHTML =
        '<option value=""><?= htmlspecialchars(__('select_warehouse'), ENT_QUOTES) ?></option>';

    locationSelect.disabled = true;

    quantityInput.value = '';
    quantityInput.disabled = true;

    unitCostInput.value = '';

    returnButton.disabled = true;

    document
        .getElementById('grnInfo')
        .classList.add('d-none');

    document
        .getElementById('itemInfo')
        .classList.add('d-none');


    if (!this.value) {
        return;
    }


    // Supplier information

    supplierId.value =
        option.dataset.supplierId || '';

    supplierDisplay.value =
        option.dataset.supplierName || '';


    document.getElementById('grnNumber').textContent =
        option.textContent.trim();

    document.getElementById('poNumber').textContent =
        option.dataset.poNumber || '';

    document.getElementById('supplierName').textContent =
        option.dataset.supplierName || '';


    document
        .getElementById('grnInfo')
        .classList.remove('d-none');


    // Load GRN items

    fetch(
        '<?= URLROOT ?>/goodsreturns/items/' +
        this.value
    )
    .then(response => {

        if (!response.ok) {
            throw new Error(
                <?= json_encode(__('unable_to_load_grn_items')) ?>
            );
        }

        return response.json();

    })
    .then(data => {

        currentItems = data;

        data.forEach(item => {

            const received =
                parseFloat(item.quantity || 0);

            const returned =
                parseFloat(item.returned_quantity || 0);

            const returnable =
                received - returned;


            /*
            Do not offer completely returned items.
            */

            if (returnable <= 0) {
                return;
            }


            const option =
                document.createElement('option');

            option.value =
                item.id;

            option.textContent =
                item.name +
                ' - <?= htmlspecialchars(__('returnable_label'), ENT_QUOTES) ?> ' +
                returnable;

            grnItemSelect.appendChild(option);

        });

        grnItemSelect.disabled = false;

    })
    .catch(error => {

        alert(error.message);

    });

});


// ======================================================
// SELECT GRN ITEM
// ======================================================

grnItemSelect.addEventListener('change', function () {

    const item =
        currentItems.find(
            x =>
                parseInt(x.id) ===
                parseInt(this.value)
        );

    if (!item) {
        return;
    }

    currentItem = item;


    const received =
        parseFloat(item.quantity || 0);

    const returned =
        parseFloat(item.returned_quantity || 0);

    const returnable =
        received - returned;


    // ----------------------------------------------
    // ITEM INFORMATION
    // ----------------------------------------------

    document.getElementById('itemName').textContent =
        item.name;

    document.getElementById('itemSku').textContent =
        item.sku || 'N/A';


    document.getElementById('originalLocation').textContent =
        item.location_code
        ? item.location_code +
          ' - ' +
          item.location_name
        : <?= json_encode(__('not_recorded')) ?>;


    document.getElementById('receivedQty').textContent =
        received;


    document.getElementById('returnedQty').textContent =
        returned;


    document.getElementById('returnableQty').textContent =
        returnable;


    document
        .getElementById('itemInfo')
        .classList.remove('d-none');


    // ----------------------------------------------
    // UNIT COST
    // ----------------------------------------------

    unitCostInput.value =
        parseFloat(item.unit_cost || 0)
            .toFixed(2);


    // ----------------------------------------------
    // QUANTITY
    // ----------------------------------------------

    quantityInput.disabled = false;

    quantityInput.min = 1;

    quantityInput.max = returnable;

    quantityInput.value = returnable;

    document.getElementById('quantityHelp')
        .textContent = returnable;


    // ----------------------------------------------
    // LOAD CURRENT WAREHOUSE STOCK
    // ----------------------------------------------

    loadLocations(item.inventory_id);

});


// ======================================================
// LOAD AVAILABLE LOCATIONS
// ======================================================

function loadLocations(inventoryId)
{

    locationSelect.innerHTML =
        '<option value=""><?= htmlspecialchars(__('loading_warehouses'), ENT_QUOTES) ?></option>';

    locationSelect.disabled = true;

    fetch(
        '<?= URLROOT ?>/goodsreturns/locations/' +
        inventoryId
    )
    .then(response => {

        if (!response.ok) {
            throw new Error(
                <?= json_encode(__('unable_to_load_warehouse_stock')) ?>
            );
        }

        return response.json();

    })
    .then(data => {

        currentLocations = data;

        locationSelect.innerHTML =
            '<option value=""><?= htmlspecialchars(__('select_warehouse'), ENT_QUOTES) ?></option>';


        data.forEach(location => {

            const qty =
                parseFloat(location.quantity || 0);


            /*
            Only locations containing stock
            are returned by the endpoint.
            */

            if (qty <= 0) {
                return;
            }


            const option =
                document.createElement('option');

            option.value =
                location.location_id;


            option.textContent =
                location.code +
                ' - ' +
                location.name +
                ' — <?= htmlspecialchars(__('available'), ENT_QUOTES) ?> ' +
                qty;


            locationSelect.appendChild(option);

        });


        locationSelect.disabled = false;


        /*
        Automatically select the original GRN
        location if it still has stock.
        */

        if (currentItem.location_id) {

            const original =
                data.find(
                    x =>
                        parseInt(x.location_id) ===
                        parseInt(currentItem.location_id)
                );


            if (
                original &&
                parseFloat(original.quantity) > 0
            ) {

                locationSelect.value =
                    original.location_id;

            }

        }


        validateForm();

    })
    .catch(error => {

        locationSelect.innerHTML =
            '<option value=""><?= htmlspecialchars(__('unable_to_load_warehouses'), ENT_QUOTES) ?></option>';

        alert(error.message);

    });

}


// ======================================================
// QUANTITY VALIDATION
// ======================================================

quantityInput.addEventListener(
    'input',
    validateForm
);

locationSelect.addEventListener(
    'change',
    validateForm
);


function validateForm()
{

    if (!currentItem) {

        returnButton.disabled = true;

        return;
    }


    const quantity =
        parseFloat(quantityInput.value || 0);

    const returnable =
        parseFloat(
            currentItem.quantity || 0
        )
        -
        parseFloat(
            currentItem.returned_quantity || 0
        );


    const selectedLocation =
        currentLocations.find(
            x =>
                parseInt(x.location_id) ===
                parseInt(locationSelect.value)
        );


    const available =
        selectedLocation
            ? parseFloat(selectedLocation.quantity || 0)
            : 0;


    /*
    Quantity cannot exceed either:

    1. Remaining returnable quantity
    2. Physical stock in selected warehouse
    */

    const valid =
        quantity > 0 &&
        quantity <= returnable &&
        quantity <= available;


    returnButton.disabled = !valid;

}

</script>
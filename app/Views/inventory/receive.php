<h2>
    <i class="fas fa-truck-loading"></i>
    <?= __('receive_stock_po') ?>
</h2>

<form method="POST">

    <!-- PO select -->
    <div class="mb-3">
        <label class="form-label">
            <?= __('purchase_order') ?>
        </label>

        <select name="po_id" id="poSelect" class="form-select">

            <option value="">
                <?= __('select_purchase_order') ?>
            </option>

            <?php foreach ($purchaseOrders as $po): ?>

                <option
                    value="<?= $po->id ?>"
                    data-supplier-id="<?= $po->supplier_id ?>"
                    data-supplier-name="<?= htmlspecialchars($po->company_name) ?>">
                    <?= $po->po_number ?>
                    -
                    <?= htmlspecialchars($po->company_name) ?>
                </option>

            <?php endforeach; ?>

        </select>
    </div>

    <div id="poItemInfo" class="alert alert-info d-none">

        <strong><?= __('item') ?></strong>
        <span id="itemName"></span><br>

        <strong><?= __('sku') ?></strong>
        <span id="itemSku"></span><br>

        <strong><?= __('ordered') ?></strong>
        <span id="orderedQty"></span><br>

        <strong><?= __('qty_received') ?></strong>
        <span id="receivedQty"></span><br>

        <strong><?= __('remaining') ?></strong>
        <span id="remainingQty"></span>

    </div>

    <div class="row">

        <!-- BARCODE -->
        <div class="col-md-6 mb-3">

            <label class="form-label">
                <?= __('scan_barcode') ?>
            </label>

            <input
                type="text"
                id="barcodeInput"
                class="form-control"
                placeholder="<?= __('scan_barcode') ?>..."
                autocomplete="off"
                autofocus>

            <audio id="successBeep">
                <source
                    src="<?= URLROOT ?>/assets/beep.mp3"
                    type="audio/mpeg">
            </audio>

        </div>

        <!-- ITEM -->
        <div class="col-md-6 mb-3">

            <label class="form-label">
                <?= __('inventory_item_required') ?>
            </label>

            <input
                type="hidden"
                name="inventory_id"
                id="inventory_id"
                required>

            <!-- select becomes display-only hidden field stores actual ID -->
            <select
                id="poItemSelect"
                class="form-select"
                required
                disabled>

                <option value="">
                    <?= __('select_po_item') ?>
                </option>

            </select>

        </div>

        <!-- Item Location -->
        <div class="mb-3">

            <label class="form-label">
                <?= __('receive_to_location') ?>
            </label>

            <select
                name="location_id"
                class="form-select"
                required>

                <option value="">
                    <?= __('select_location') ?>
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

        <!-- QUANTITY -->
        <div class="col-md-3 mb-3">

            <label class="form-label">
                <?= __('quantity_required') ?>
            </label>

            <!-- prevents decimals qty in UI -->
            <input
                type="number"
                name="quantity"
                class="form-control"
                min="1"
                step="1"
                required>

        </div>

        <!-- UNIT COST -->
        <div class="col-md-3 mb-3">

            <label class="form-label">
                <?= __('unit_cost_required') ?>
            </label>

            <input
                type="number"
                name="unit_cost"
                class="form-control"
                min="0"
                step="0.01"
                required>

        </div>

    </div>

    <div class="row">

        <!-- SUPPLIER -->
        <div class="col-md-6 mb-3">

            <label class="form-label">
                <?= __('supplier') ?>
            </label>

            <input
                type="text"
                id="supplierName"
                class="form-control"
                readonly>

            <input
                type="hidden"
                name="supplier_id"
                id="supplier_id">

        </div>

        <!-- REFERENCE -->
        <div class="col-md-6 mb-3">

            <label class="form-label">
                <?= __('invoice_reference') ?>
            </label>

            <input
                type="text"
                name="reference"
                value="GRN-<?= date('ymd-His') ?>"
                class="form-control"
                required>

        </div>

    </div>

    <!-- NOTES -->
    <div class="mb-3">

        <label class="form-label">
            <?= __('notes') ?>
        </label>

        <textarea
            name="notes"
            class="form-control"
            rows="3"></textarea>

    </div>

    <button class="btn btn-success">

        <i class="fas fa-save"></i>

        <?= __('receive_stock') ?>

    </button>

    <a
        href="<?= URLROOT ?>/inventory"
        class="btn btn-secondary">

        <?= __('cancel') ?>

    </a>

</form>


<script>

    const poSelect = document.getElementById('poSelect');
    const poItemSelect = document.getElementById('poItemSelect');
    const inventoryId = document.getElementById('inventory_id');
    const barcodeInput = document.getElementById('barcodeInput');

    let currentPOItems = [];


    function showPOItem(item) {

        inventoryId.value = item.inventory_id;

        document.querySelector('[name="unit_cost"]').value =
            item.unit_cost;

        const ordered =
            parseFloat(item.quantity);

        const received =
            parseFloat(item.received_quantity || 0);

        const remaining =
            ordered - received;

        document.getElementById('itemName').textContent =
            item.name;

        document.getElementById('itemSku').textContent =
            item.sku || 'N/A';

        document.getElementById('orderedQty').textContent =
            ordered;

        document.getElementById('receivedQty').textContent =
            received;

        document.getElementById('remainingQty').textContent =
            remaining;

        document.getElementById('poItemInfo')
            .classList.remove('d-none');

        document.querySelector('[name="quantity"]')
            .addEventListener('input', function() {

                this.value =
                    Math.floor(this.value);

            });

        document.querySelector('[name="quantity"]').value =
            remaining;

        document.querySelector('[name="quantity"]').max =
            remaining;
    }


    poSelect.addEventListener('change', function() {

        const selected =
            this.options[this.selectedIndex];

        document.getElementById('supplier_id').value =
            selected.dataset.supplierId || '';

        document.getElementById('supplierName').value =
            selected.dataset.supplierName || '';


        currentPOItems = [];

        inventoryId.value = '';

        poItemSelect.innerHTML =
            '<option value=""><?= htmlspecialchars(__('select_po_item'), ENT_QUOTES) ?></option>';

        poItemSelect.disabled = true;

        document.getElementById('poItemInfo')
            .classList.add('d-none');


        if (!this.value) {
            return;
        }


        fetch(
            '<?= URLROOT ?>/purchase-orders/items/' +
            this.value
        )
        .then(r => r.json())
        .then(data => {

            currentPOItems = data;

            data.forEach(item => {

                const remaining =
                    parseFloat(item.quantity) -
                    parseFloat(item.received_quantity || 0);

                const option =
                    document.createElement('option');

                option.value =
                    item.inventory_id;

                option.textContent =
                    item.name +
                    ' - <?= htmlspecialchars(__('remaining'), ENT_QUOTES) ?> ' +
                    remaining;

                poItemSelect.appendChild(option);

            });

            poItemSelect.disabled = false;

        });

    });


    poItemSelect.addEventListener('change', function() {

        const item =
            currentPOItems.find(
                x =>
                    parseInt(x.inventory_id) ===
                    parseInt(this.value)
            );

        if (!item) {
            return;
        }

        showPOItem(item);

    });


    barcodeInput.addEventListener('keydown', function(e) {

        if (e.key !== 'Enter') {
            return;
        }

        e.preventDefault();

        const barcode =
            this.value.trim().toLowerCase();

        if (!barcode) {
            return;
        }

        const item =
            currentPOItems.find(
                x =>
                    x.sku &&
                    x.sku.toLowerCase() === barcode
            );

        if (!item) {

            alert(
                <?= json_encode(__('item_not_in_selected_po')) ?>
            );

            this.value = '';

            return;
        }

        poItemSelect.value =
            item.inventory_id;

        showPOItem(item);

        this.value = '';

    });

</script>
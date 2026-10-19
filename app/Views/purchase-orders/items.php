<h2>
    <?= __('purchase_order_items') ?>
</h2>

<div class="card mb-4">

    <div class="card-body">

        <h5>
            <?= __('po') ?>:
            <?= htmlspecialchars($po->po_number) ?>
        </h5>

        <form method="POST"
            action="<?= URLROOT ?>/purchaseorders/addItem/<?= $po->id ?>">

     <div class="row align-items-stretch">

    <!-- INVENTORY ITEM -->
    <div class="col-md-4 mb-3">
        <label class="form-label">
            <?= __('inventory_item') ?>
        </label>

        <select name="inventory_id"
                id="po_inventory_id"
                class="form-select"
                required>
            <option value="">
                <?= __('select_item') ?>
            </option>

            <?php foreach ($inventory as $item): ?>
               <option
    value="<?= (int) $item->id ?>"
    data-uom-en="<?= htmlspecialchars($item->unit_name ?? '', ENT_QUOTES, 'UTF-8') ?>"
    data-uom-ar="<?= htmlspecialchars($item->unit_name_a ?? '', ENT_QUOTES, 'UTF-8') ?>"
    data-allow-fraction="<?= (int) ($item->allow_fraction ?? 0) ?>">

    <?= htmlspecialchars($item->name, ENT_QUOTES, 'UTF-8') ?>
</option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- UOM -->
    <div class="col-md-2 mb-3">
        <label class="form-label">
            <?= __('unit_of_measure') ?>
        </label>

        <input type="text"
               id="po_uom"
               class="form-control"
               readonly>
    </div>

    <!-- QUANTITY -->
    <div class="col-md-2 mb-3">
        <label class="form-label">
            <?= __('quantity') ?>
        </label>

      <input
    type="number"
    id="po_quantity"
    name="quantity"
    class="form-control"
    min="1"
    step="1"
    required>
    </div>

    <!-- UNIT COST -->
    <div class="col-md-2 mb-3">
        <label class="form-label">
            <?= __('unit_cost') ?>
        </label>

        <input type="number"
               step="0.01"
               min="0"
               name="unit_cost"
               class="form-control"
               required>
    </div>

    <!-- BUTTON -->
    <div class="col-md-2 mb-3 d-flex align-items-end">
        <button type="submit" class="btn btn-success w-100">
            <i class="fas fa-plus"></i>
            <?= __('add_item') ?>
        </button>
    </div>

</div>

        </form>

    </div>

</div>

<table class="table table-bordered table-striped">

    <thead>

        <tr>

            <th>#</th>

            <th><?= __('item') ?></th>

            <th><?= __('sku') ?></th>

            <th><?= __('qty') ?></th>
            
            <th><?= __('unit_name') ?></th>

            <th><?= __('unit_cost') ?></th>

            <th><?= __('total') ?></th>

            <th><?= __('qty_received') ?></th>

            <th width="120"><?= __('actions') ?></th>

        </tr>

    </thead>


    <tbody>

        <?php foreach ($items as $row): ?>

                     <tr>

                <td>
                    <?= $row->id ?>
                </td>

                <td>
                    <?= htmlspecialchars($row->name) ?>
                </td>

                <td>
                    <?= htmlspecialchars($row->sku) ?>
                </td>

                <td>
                    <?= $row->quantity ?>
                </td>

               <td>
    <?php
    $language = strtolower($_SESSION['language'] ?? 'en');

    $unitName = ($language === 'ar')
        ? ($row->unit_name_a ?? $row->unit_name ?? '')
        : ($row->unit_name ?? $row->unit_name_a ?? '');
    ?>

    <?= htmlspecialchars($unitName, ENT_QUOTES, 'UTF-8') ?>
</td>

                <td>
                    <?= number_format(
                        $row->unit_cost,
                        2
                    ) ?>
                </td>

                <td>

                    <?= number_format(
                        $row->quantity * $row->unit_cost,
                        2
                    ) ?>

                </td>

                <td>
                    <?= $row->received_quantity ?>
                </td>

                <td>

                    <a
                        href="<?= URLROOT ?>/purchaseorders/deleteItem/<?= $row->id ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('<?= htmlspecialchars(
                                                        __('delete_item_confirm'),
                                                        ENT_QUOTES,
                                                        'UTF-8'
                                                    ) ?>')">

                        <?= __('delete') ?>

                    </a>

                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>


<a
    href="<?= URLROOT ?>/purchaseorders"
    class="btn btn-secondary">

    <?= __('back') ?>

</a>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const inventorySelect = document.getElementById('po_inventory_id');
    const uomInput = document.getElementById('po_uom');
    const quantityInput = document.getElementById('po_quantity');

    const language = <?= json_encode(
        strtolower($_SESSION['language'] ?? 'en')
    ) ?>;

    function updateItemFields() {
        const option = inventorySelect.options[
            inventorySelect.selectedIndex
        ];

        if (!option || !inventorySelect.value) {
            uomInput.value = '';
            quantityInput.step = '1';
            quantityInput.min = '1';
            quantityInput.setCustomValidity('');
            quantityInput.value = '';
            return;
        }

        // Display the UOM in the current language.
        uomInput.value = language === 'ar'
            ? (option.dataset.uomAr || option.dataset.uomEn || '')
            : (option.dataset.uomEn || option.dataset.uomAr || '');

        // Apply quantity rules from inventory.allow_fraction.
        const allowFraction = option.dataset.allowFraction === '1';

        quantityInput.step = allowFraction ? '0.01' : '1';
        quantityInput.min = allowFraction ? '0.01' : '1';
        quantityInput.setCustomValidity('');

        if (quantityInput.value !== '' &&
            !quantityInput.checkValidity()) {
            quantityInput.reportValidity();
        }
    }

    inventorySelect.addEventListener('change', updateItemFields);
    updateItemFields();
});
</script>

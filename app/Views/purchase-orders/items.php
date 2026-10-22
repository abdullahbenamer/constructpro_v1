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
                <td><?= (int) $row->id ?></td>

                <td>
                    <span class="po-item-name">
                        <?= htmlspecialchars($row->name, ENT_QUOTES, 'UTF-8') ?>
                    </span>

                    <?php if (!empty($isEditable)): ?>
                        <select
                            name="inventory_id"
                            form="edit-po-item-<?= (int) $row->id ?>"
                            class="form-select form-select-sm po-edit-field d-none">
                            <?php foreach ($inventory as $inv): ?>

                                <option
                                    value="<?= (int) $inv->id ?>"
                                    data-sku="<?= htmlspecialchars($inv->sku ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                    data-allow-fraction="<?= (int) ($inv->allow_fraction ?? 0) ?>"
                                    data-uom-en="<?= htmlspecialchars($inv->unit_name ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                    data-uom-ar="<?= htmlspecialchars($inv->unit_name_a ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                    <?= (int) $inv->id === (int) $row->inventory_id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($inv->name, ENT_QUOTES, 'UTF-8') ?>
                                </option>

                            <?php endforeach; ?>
                        </select>
                    <?php endif; ?>
                </td>

                <td><?= htmlspecialchars($row->sku ?? '', ENT_QUOTES, 'UTF-8') ?></td>

                <td>
                    <span class="po-item-quantity">
                        <?= htmlspecialchars((string) $row->quantity, ENT_QUOTES, 'UTF-8') ?>
                    </span>

                    <?php if (!empty($isEditable)): ?>
                        <input
                            type="number"
                            name="quantity"
                            form="edit-po-item-<?= (int) $row->id ?>"
                            class="form-control form-control-sm po-edit-field d-none"
                            value="<?= htmlspecialchars((string) $row->quantity, ENT_QUOTES, 'UTF-8') ?>"
                            min="0.01"
                            step="any"
                            required>
                    <?php endif; ?>
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
                    <span class="po-item-unit-cost">
                        <?= number_format((float) $row->unit_cost, 2) ?>
                    </span>

                    <?php if (!empty($isEditable)): ?>
                        <input
                            type="number"
                            name="unit_cost"
                            form="edit-po-item-<?= (int) $row->id ?>"
                            class="form-control form-control-sm po-edit-field d-none"
                            value="<?= htmlspecialchars((string) $row->unit_cost, ENT_QUOTES, 'UTF-8') ?>"
                            min="0"
                            step="any"
                            required>
                    <?php endif; ?>
                </td>

                <td>
                    <?= number_format((float) $row->quantity * (float) $row->unit_cost, 2) ?>
                </td>

                <td><?= htmlspecialchars((string) $row->received_quantity, ENT_QUOTES, 'UTF-8') ?></td>

                <td>
                    <?php if (!empty($isEditable)): ?>

                        <div class="d-flex align-items-center gap-1 flex-nowrap">

                            <form
                                id="edit-po-item-<?= (int) $row->id ?>"
                                method="POST"
                                action="<?= URLROOT ?>/purchaseorders/updateItem/<?= (int) $row->id ?>"
                                class="po-edit-form m-0">
                                <button
                                    type="button"
                                    class="btn btn-primary btn-sm po-edit-button text-nowrap"
                                    onclick="togglePOItemEdit(<?= (int) $row->id ?>, true)">
                                    <?= __('edit') ?>
                                </button>

                                <div class="po-edit-actions d-none align-items-center gap-1 flex-nowrap">
                                    <button type="submit" class="btn btn-success btn-sm text-nowrap">
                                        <?= __('save') ?>
                                    </button>

                                    <button
                                        type="button"
                                        class="btn btn-secondary btn-sm text-nowrap"
                                        onclick="togglePOItemEdit(<?= (int) $row->id ?>, false)">
                                        <?= __('cancel') ?>
                                    </button>
                                </div>
                            </form>

                            <a
                                href="<?= URLROOT ?>/purchaseorders/deleteItem/<?= (int) $row->id ?>"
                                class="btn btn-danger btn-sm text-nowrap"
                                onclick="return confirm('<?= htmlspecialchars(__('delete_item_confirm'), ENT_QUOTES, 'UTF-8') ?>')">
                                <?= __('delete') ?>
                            </a>

                        </div>

                    <?php else: ?>
                        <span class="text-muted">—</span>
                    <?php endif; ?>
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
    document.addEventListener('DOMContentLoaded', function() {
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
            uomInput.value = language === 'ar' ?
                (option.dataset.uomAr || option.dataset.uomEn || '') :
                (option.dataset.uomEn || option.dataset.uomAr || '');

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

    /* Editing PO item    
    // PHP expressions such as <? //= json_encode(...) 
                                ?> cannot be placed inside an external .js file. 
    // This function is intended for the existing inline <script> in your PHP view. 
    */

    function togglePOItemEdit(id, editing) {
        const form = document.getElementById('edit-po-item-' + id);
        if (!form) return;

        const row = form.closest('tr');
        if (!row) return;

        const itemSelect = row.querySelector('select[name="inventory_id"]');
        const quantityInput = row.querySelector('input[name="quantity"]');

        const skuCell = row.cells[2];
        const unitCell = row.cells[4];

        if (editing) {
            row.dataset.originalSku = skuCell.textContent;
            row.dataset.originalUnit = unitCell.textContent;

            if (itemSelect && quantityInput) {
                itemSelect.onchange = function() {
                    const option = itemSelect.options[itemSelect.selectedIndex];
                    if (!option) return;

                    skuCell.textContent = option.dataset.sku || '';

                    const language = <?= json_encode(strtolower($_SESSION['language'] ?? 'en')) ?>;
                    unitCell.textContent = language === 'ar' ?
                        (option.dataset.uomAr || option.dataset.uomEn || '') :
                        (option.dataset.uomEn || option.dataset.uomAr || '');

                    const allowFraction = option.dataset.allowFraction === '1';
                    quantityInput.step = allowFraction ? '0.01' : '1';
                    quantityInput.min = allowFraction ? '0.01' : '1';

                    if (quantityInput.value !== '' && !quantityInput.checkValidity()) {
                        quantityInput.reportValidity();
                    }
                };
            }
        } else {
            if (row.dataset.originalSku !== undefined) {
                skuCell.textContent = row.dataset.originalSku;
            }

            if (row.dataset.originalUnit !== undefined) {
                unitCell.textContent = row.dataset.originalUnit;
            }

            if (itemSelect) {
                itemSelect.onchange = null;
            }
        }

        row.querySelectorAll('.po-edit-field').forEach(function(field) {
            field.classList.toggle('d-none', !editing);
        });

        row.querySelectorAll(
            '.po-item-name, .po-item-quantity, .po-item-unit-cost'
        ).forEach(function(value) {
            value.classList.toggle('d-none', editing);
        });

        const editButton = form.querySelector('.po-edit-button');
        const editActions = form.querySelector('.po-edit-actions');

        editButton.classList.toggle('d-none', editing);
        editActions.classList.toggle('d-none', !editing);
        editActions.classList.toggle('d-flex', editing);
    }
</script>
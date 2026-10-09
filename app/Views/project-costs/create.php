<?php
$project = $project ?? null;
$project_id = $project_id ?? null;
$inventory = $inventory ?? [];
$locations = $locations ?? [];
$units = $units ?? [];
?>

<div class="card mb-3">
    <h3><?= __('add_cost_to_project') ?></h3>
    <div class="card-body">
        <h4>
            Project #<?= $project->id ?> -
            <?= htmlspecialchars($project->title) ?>
        </h4>
        <p class="mb-0">
            <strong><?= __('customer_label') ?>:</strong> <?= htmlspecialchars($project->customer_name ?? '') ?><br>
            <strong><?= __('status') ?>:</strong>
            <?= htmlspecialchars(
                [
                    'planning'    => __('planning'),
                    'in_progress' => __('in_progress'),
                    'testing'     => __('testing'),
                    'completed'   => __('completed_status'),
                    'cancelled'   => __('cancelled')
                ][$project->status] ?? $project->status
            ) ?><br>
            <strong><?= __('budget') ?>:</strong> $<?= number_format($project->budget ?? 0, 2) ?>
        </p>
    </div>
</div>
<!-- ---------------------------------------- -->
<form method="POST" action="">
    <input type="hidden" name="project_id" value="<?= $project->id ?>">
    <div class="row">

        <div class="col-md-3">
            <label class="form-label"><?= __('cost_type') ?></label>
            <select name="cost_type" id="costType" class="form-select">
                <option value="MATERIALS"><?= __('materials') ?></option>
                <option value="HUMAN_RESOURCES"><?= __('human_resources') ?></option>
                <option value="TRANSPORT"><?= __('transport') ?></option>
                <option value="EQUIPMENT"><?= __('equipment') ?></option>
                <option value="SUBCONTRACT"><?= __('subcontract') ?></option>
                <option value="SITE_EXPENSES"><?= __('site_expenses') ?></option>
                <option value="PROFESSIONAL_SERVICES"><?= __('professional_services') ?></option>
                <option value="PERMITS_FEES"><?= __('permits_fees') ?></option>
                <option value="INSURANCE"><?= __('insurance') ?></option>
                <option value="BANK_CHARGES"><?= __('bank_charges') ?></option>
                <option value="TAXES"><?= __('taxes') ?></option>
                <option value="MISCELLANEOUS"><?= __('miscellaneous') ?></option>
            </select>
        </div>

        <!-- Material Item -->
        <div class="col-md-4" id="inventoryBlock">
            <label class="form-label"><?= __('inventory_item') ?></label>

            <select name="inventory_id" id="inventorySelect" class="form-select" required>
                <option value="">-- <?= __('select_item') ?> --</option>

                <?php foreach ($inventory as $item) : ?>
                    <option
                        value="<?= $item->id ?>"
                        data-cost="<?= $item->cost_price ?>"
                        data-allow-fraction="<?= (int)$item->allow_fraction ?>"
                        data-uom-en="<?= htmlspecialchars($item->unit_name ?? '') ?>"
                        data-uom-ar="<?= htmlspecialchars($item->unit_name_a ?? '') ?>"
                        data-description="<?= htmlspecialchars($item->description ?? '') ?>">

                        <?= $item->name ?>

                        (
                        <?= __('available') ?>:
                        <?= $item->available_qty ?>

                        /

                        <?= __('physical') ?>:
                        <?= $item->quantity ?>
                        )

                    </option>
                <?php endforeach; ?>

            </select>
        </div>

        <!-- UOM -->

<div class="col-md-2" id="uomBlock">

    <label class="form-label">
        <?= __('unit_of_measure') ?>
    </label>

    <!-- MATERIALS: Read-only UOM -->

    <input
        type="text"
        id="uom"
        class="form-control"
        readonly
    >

    <!-- NON-MATERIALS: Select UOM -->

    <select
        name="unit_id"
        id="unitSelect"
        class="form-select"
        style="display: none;"
    >

        <option value="">
            -- <?= __('select_unit_of_measure') ?> --
        </option>

        <?php foreach ($units as $unit): ?>

            <?php if (($unit->status ?? '') === 'ACTIVE'): ?>

                <option
                    value="<?= (int)$unit->id ?>"
                    data-unit-en="<?= htmlspecialchars($unit->unit_name ?? '') ?>"
                    data-unit-ar="<?= htmlspecialchars($unit->unit_name_a ?? '') ?>"
                    data-description="<?= htmlspecialchars($unit->description ?? '') ?>"
                >
                    <?= htmlspecialchars($unit->unit_name ?? '') ?>
                </option>

            <?php endif; ?>

        <?php endforeach; ?>

    </select>

    <!-- UOM MASTER DESCRIPTION -->

    <small
        id="unitDescription"
        class="form-text text-muted"
        style="display: none;"
    ></small>

</div>

        <!-- Item Description -->
        <div class="col-md-5">
            <label class="form-label"><?= __('description') ?></label>
            <input type="text" name="description" class="form-control" required placeholder="<?= __('resource_description_missing') ?>">
        </div>

        <!-- Location -->
        <div class="col-md-4" id="locationBlock">

            <label class="form-label"><?= __('location') ?></label>

            <select name="location_id" id="locationSelect" class="form-select" required>

                <option value="">-- <?= __('select_location') ?> --</option>

                <?php foreach ($locations as $location) : ?>
                    <option value="<?= $location->id ?>">
                        <?= htmlspecialchars($location->code) ?>
                        -
                        <?= htmlspecialchars($location->name) ?>
                    </option>
                <?php endforeach; ?>

            </select>

        </div>

        <!-- Quantity -->
        <div class="col-md-2">
            <label class="form-label"><?= __('quantity') ?></label>
            <input
                type="number"
                name="quantity"
                id="quantity"
                class="form-control"
                value=""
                min="1"
                step="1"
                required>

            <small
                id="qtyRuleFraction"
                class="text-success d-none">
                <?= __('fractional_quantities_allowed') ?>
            </small>

            <small
                id="qtyRuleWhole"
                class="text-muted">
                <?= __('whole_quantities_only') ?>
            </small>

            <small
                id="qtyWarning"
                class="text-danger">
                (<?= __('quantity_warning') ?>)
            </small>
        </div>

        <!-- Unit Price -->
        <div class="col-md-2">
            <label class="form-label" id="priceLabel">
                <?= __('unit_cost') ?> (LYD)
            </label>
            <input type="number" name="unit_price" class="form-control" step="0.01" required placeholder="<?= __('autofill_materials') ?>">
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">
        <i class="fas fa-save"></i> <?= __('add_cost') ?>
    </button>
    <a href="<?= URLROOT ?>/project-costs/<?= $project_id ?>"
        class="btn btn-secondary mt-3">
        <?= __('cancel') ?>
    </a>
</form>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        // ==================================================
        // ELEMENTS
        // ==================================================

        const costType = document.getElementById('costType');

        const inventoryBlock = document.getElementById('inventoryBlock');
        const locationBlock = document.getElementById('locationBlock');

        const inventorySelect = document.getElementById('inventorySelect');
        const locationSelect = document.getElementById('locationSelect');
        const uomInput = document.getElementById('uom');
        const unitSelect = document.getElementById('unitSelect');
        const unitDescription = document.getElementById('unitDescription');

        const descriptionInput = document.querySelector('[name="description"]');
        const quantityInput = document.querySelector('[name="quantity"]');
        const qtyRuleFraction = document.getElementById('qtyRuleFraction');

        const qtyRuleWhole = document.getElementById('qtyRuleWhole');
        const unitPriceInput = document.querySelector('[name="unit_price"]');

        const qtyWarning = document.getElementById('qtyWarning');

        // UOM DESCRIPTION DISPLAY
        unitSelect.addEventListener(
            'change',
            function() {
                const option =
                    unitSelect.options[
                        unitSelect.selectedIndex
                    ];

                if (
                    !option ||
                    !unitSelect.value
                ) {
                    unitDescription.textContent = '';
                    unitDescription.style.display = 'none';
                    return;
                }

                const description =
                    option.dataset.description || '';

                unitDescription.textContent =
                    description;

                unitDescription.style.display =
                    description ? '' : 'none';
            }
        );

// ==================================================
// NON-MATERIAL UOM FILTER
// ==================================================

const allUnits =
    Array.from(unitSelect.options)
        .slice(1)
        .map(function(option) {

            return {
                id: option.value,

                en: option.dataset.unitEn || '',

                ar: option.dataset.unitAr || '',

                description:
                    option.dataset.description || ''
            };

        });


function filterNonMaterialUnits()
{
    const allowedUnits = {

        HUMAN_RESOURCES: [
            'DAY',
            'HOUR',
            'MONTH',
            'SERVICE'
        ],

        TRANSPORT: [
            'TRIP',
            'KILOMETER',
            'DAY',
            'MONTH'
        ],

        EQUIPMENT: [
            'DAY',
            'HOUR',
            'MONTH'
        ],

        SUBCONTRACT: [
            'DAY',
            'WEEK',
            'MONTH',
            'JOB',
            'SERVICE'
        ],

        SITE_EXPENSES: [
            'DAY',
            'ITEM'
        ],

        PROFESSIONAL_SERVICES: [
            'HOUR',
            'DAY',
            'MONTH',
            'SERVICE'
        ],

        PERMITS_FEES: [
            'FEE'
        ],

        INSURANCE: [
            'POLICY',
            'FEE'
        ],

        BANK_CHARGES: [
            'TRANSACTION',
            'FEE'
        ],

        TAXES: [
            'FEE'
        ],

        MISCELLANEOUS: [
            'ITEM',
            'SERVICE'
        ]

    };


    const allowed =
        allowedUnits[costType.value] || [];


    const currentLanguage =
        document.documentElement.lang.toLowerCase();


    // Clear current options

    unitSelect.innerHTML = '';


    // Add placeholder

    const placeholder =
        document.createElement('option');

    placeholder.value = '';

    placeholder.textContent =
        '-- <?= __('select_unit_of_measure') ?> --';

    unitSelect.appendChild(placeholder);


    // Add ONLY allowed units

    allUnits.forEach(function(unit)
    {
        const unitName =
            (unit.en || '')
                .trim()
                .toUpperCase();


        if (!allowed.includes(unitName)) {
            return;
        }


        const option =
            document.createElement('option');


        option.value =
            unit.id;


        option.dataset.unitEn =
            unit.en;


        option.dataset.unitAr =
            unit.ar;


        option.dataset.description =
            unit.description;


        option.textContent =
            currentLanguage === 'ar'
                ? (unit.ar || unit.en)
                : (unit.en || unit.ar);


        unitSelect.appendChild(option);

    });


    // Reset selection

    unitSelect.value = '';


    // Clear description

    unitDescription.textContent = '';

    unitDescription.style.display = 'none';
}

        // ==================================================
        // MATERIAL / NON-MATERIAL MODE
        // ==================================================

        function updateMode() {

            const material = (costType.value === 'MATERIALS');

            inventoryBlock.style.display = material ? '' : 'none';
            locationBlock.style.display = material ? '' : 'none';

            qtyWarning.style.display = material ? '' : 'none';

            inventorySelect.required = material;
            locationSelect.required = material;

            unitPriceInput.readOnly = material;

            if (!material) {

                inventorySelect.value = '';

                locationSelect.innerHTML =
                    '<option value="">-- <?= __('select_location') ?> --</option>';

                descriptionInput.value = '';

                unitPriceInput.value = '';

                uomInput.value = '';

                uomInput.style.display = 'none';

                unitSelect.style.display = '';

                unitSelect.required = true;

                // call the function to filter units based on the selected cost type
                filterNonMaterialUnits();
                

            } else {

                uomInput.style.display = '';

                unitSelect.style.display = 'none';

                unitSelect.value = '';

                unitSelect.required = false;

                autoFillMaterial();

            }
            updateQuantityRules();

        }

        function updateQuantityRules() {

            /*
             * NON-MATERIAL
             * Always whole numbers.
             */
            if (costType.value !== 'MATERIALS') {

                quantityInput.step = '1';
                quantityInput.min = '1';

                qtyRuleFraction.classList.add('d-none');
                qtyRuleWhole.classList.remove('d-none');

                return;
            }

            /*
             * MATERIAL
             */

            const option =
                inventorySelect.options[
                    inventorySelect.selectedIndex
                ];

            if (!option || !inventorySelect.value) {

                quantityInput.step = '1';
                quantityInput.min = '1';

                qtyRuleFraction.classList.add('d-none');
                qtyRuleWhole.classList.remove('d-none');

                return;
            }

            const allowFraction =
                option.getAttribute(
                    'data-allow-fraction'
                ) === '1';

            if (allowFraction) {

                quantityInput.step = '0.01';
                quantityInput.min = '0.01';

                qtyRuleFraction.classList.remove('d-none');
                qtyRuleWhole.classList.add('d-none');

            } else {

                quantityInput.step = '1';
                quantityInput.min = '1';

                qtyRuleFraction.classList.add('d-none');
                qtyRuleWhole.classList.remove('d-none');
            }
        }

        // ==================================================
        // AUTO FILL MATERIAL INFO
        // ==================================================
        function autoFillMaterial() {

            const option =
                inventorySelect.options[inventorySelect.selectedIndex];

            if (!option || !inventorySelect.value) {

                descriptionInput.value = '';
                unitPriceInput.value = '';
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

            descriptionInput.value =
                option.dataset.description || '';

            unitPriceInput.value =
                parseFloat(
                    option.dataset.cost || 0
                ).toFixed(2);
        }

        // ==================================================
        // LOAD LOCATIONS
        // ==================================================

        function loadLocations() {

            const inventoryId = inventorySelect.value;

            if (!inventoryId) {

                locationSelect.innerHTML =
                    '<option value="">-- Select Location --</option>';

                return;

            }

            fetch(
                    '<?= URLROOT ?>/project-costs/getInventoryLocations/' +
                    inventoryId
                )
                .then(r => r.json())
                .then(data => {

                    let html =
                        '<option value="">-- Select Location --</option>';

                    data.forEach(function(location) {

                        html += `
    <option value="${location.location_id}">
        ${location.code}
        - ${location.name}
        (<?= __('qty') ?>: ${location.quantity})
    </option>
`;

                    });

                    locationSelect.innerHTML = html;

                });

        }


        // ==================================================
        // EVENTS
        // ==================================================

        costType.addEventListener('change', updateMode);

        inventorySelect.addEventListener('change', function() {

            autoFillMaterial();

            loadLocations();

            updateQuantityRules();

        });


        // ==================================================
        // INITIAL PAGE
        // ==================================================

        updateMode();

    });
</script>
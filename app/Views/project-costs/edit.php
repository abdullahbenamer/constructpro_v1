<h2>
    <i class="fas fa-edit"></i>
    <?= __('edit_cost_item') ?> #<?= $cost->id ?>
</h2>
<?= __('project') ?>
<div class="text-muted mb-3">
    <i class="fas fa-project-diagram"></i>
    <strong><?= htmlspecialchars($project->project_code) ?>
    -
    <?= htmlspecialchars(strtoupper($project->title)) ?></strong>
</div>
<?php

$selectedInventory = null;

if (
    $cost->cost_type === 'MATERIALS' &&
    !empty($cost->inventory_id)
) {
    foreach ($inventory as $item) {

        if ((int)$item->id === (int)$cost->inventory_id) {
            $selectedInventory = $item;
            break;
        }
    }
}

?>

<div class="alert alert-danger my-3">

    <strong><?= __('note') ?>:</strong>

    <?= __('cost_edit_restriction') ?>

</div>

<form method="POST">

    <input type="hidden"
        name="project_id"
        value="<?= $project_id ?>">

    <input type="hidden"
        name="cost_type"
        value="<?= $cost->cost_type ?>">

    <!-- <input type="hidden"
           name="inventory_id"
           value="<? //= $cost->inventory_id 
                    ?>">

    <input type="hidden"
           name="location_id"
           value="<? //= $cost->location_id 
                    ?>"> -->

    <div class="row">

        <!-- COST TYPE -->
        <div class="col-md-3">

            <label class="form-label">
                <?= __('cost_type') ?>
            </label>

            <?php

            $costTypeLabels = [
                'MATERIALS'              => __('materials'),
                'HUMAN_RESOURCES'        => __('human_resources'),
                'TRANSPORT'              => __('transport'),
                'EQUIPMENT'              => __('equipment'),
                'SUBCONTRACT'            => __('subcontract'),
                'SITE_EXPENSES'          => __('site_expenses'),
                'PROFESSIONAL_SERVICES'  => __('professional_services'),
                'PERMITS_FEES'           => __('permits_fees'),
                'INSURANCE'              => __('insurance'),
                'BANK_CHARGES'           => __('bank_charges'),
                'TAXES'                  => __('taxes'),
                'MISCELLANEOUS'          => __('miscellaneous')
            ];
            ?>

            <span class="badge bg-info">

                <?= htmlspecialchars(
                    $costTypeLabels[$cost->cost_type]
                        ?? ucfirst($cost->cost_type)
                ) ?>

        </div>

        <!-- DESCRIPTION -->
        <div class="col-md-5">

            <label class="form-label">
                <?= __('description') ?>
            </label>

            <input
                type="text"
                name="description"
                value="<?= htmlspecialchars($cost->description ?? '') ?>"
                class="form-control"
                required>

        </div>

        <!-- QTY -->
        <div class="col-md-2">

            <label class="form-label">
                <?= __('quantity') ?>
            </label>

   <input
    type="number"
    name="quantity"
    id="quantity"
    value="<?= $cost->quantity ?>"
    class="form-control"
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

        </div>

        <!-- PRICE -->
        <div class="col-md-2">

            <label class="form-label" id="priceLabel">
                <?= __('unit_cost_dollar') ?>
            </label>

            <?php if ($cost->cost_type === 'MATERIALS'): ?>

                <input
                    type="number"
                    value="<?= $cost->unit_price ?>"
                    class="form-control"
                    step="0.01"
                    readonly>

                <input
                    type="hidden"
                    name="unit_price"
                    value="<?= $cost->unit_price ?>">

            <?php else: ?>

                <input
                    type="number"
                    name="unit_price"
                    value="<?= $cost->unit_price ?>"
                    step="0.01"
                    class="form-control"
                    required>

            <?php endif; ?>

        </div>

    </div>

    <!-- INVENTORY ITEM read-only -->
    <?php if ($cost->cost_type == 'MATERIALS'): ?>

        <div class="col-md-6 mt-2">

            <label class="form-label">
                <?= __('inventory_item') ?>
            </label>

            <select class="form-select" disabled>

                <?php foreach ($inventory as $item): ?>

                    <?php if ($item->id == $cost->inventory_id): ?>

                        <option selected>
                            <?= htmlspecialchars($item->name) ?>
                        </option>

                    <?php endif; ?>

                <?php endforeach; ?>

            </select>

        </div>

    <?php endif; ?>


    <!-- LOCATION for Materials read-only -->
    <?php if ($cost->cost_type == 'materials'): ?>

        <div class="col-md-6 mt-2">

            <label class="form-label">
                <?= __('warehouse_location') ?>
            </label>

            <select class="form-select" disabled>

                <?php foreach ($locations as $location): ?>

                    <?php if ($location->id == $cost->location_id): ?>

                        <option selected>

                            <?= htmlspecialchars($location->code) ?>
                            -
                            <?= htmlspecialchars($location->name) ?>

                        </option>

                    <?php endif; ?>

                <?php endforeach; ?>

            </select>

        </div>

    <?php endif; ?>


    <button type="submit" class="btn btn-success mt-3">

        <i class="fas fa-save"></i>
        <?= __('update_cost') ?>

    </button>

    <a
        href="<?= URLROOT ?>/project-costs/<?= $project_id ?>"
        class="btn btn-secondary mt-3">

        <?= __('cancel') ?>

    </a>

</form>


<!-- JS scripts -->
<script>
 document.addEventListener('DOMContentLoaded', function() {

    const quantity =
        document.getElementById('quantity');

    const qtyRuleFraction =
        document.getElementById('qtyRuleFraction');

    const qtyRuleWhole =
        document.getElementById('qtyRuleWhole');

    const allowFraction =
        <?= (
            $selectedInventory &&
            (int)$selectedInventory->allow_fraction === 1
        ) ? 'true' : 'false' ?>;

    if (allowFraction) {

        quantity.step = '0.01';
        quantity.min = '0.01';

        qtyRuleFraction.classList.remove('d-none');
        qtyRuleWhole.classList.add('d-none');

    } else {

        quantity.step = '1';
        quantity.min = '1';

        qtyRuleFraction.classList.add('d-none');
        qtyRuleWhole.classList.remove('d-none');
    }

});
</script>
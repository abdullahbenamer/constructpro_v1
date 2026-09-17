<?php if (isset($inventory) && $inventory): ?>

<h2>

    <i class="fas fa-edit"></i>

    <?= __('edit_inventory_item') ?> #<?= $inventory->id ?>

</h2>


<form method="POST">

    <input
        type="hidden"
        name="id"
        value="<?= $inventory->id ?>"
    >


    <!-- BASIC INFO -->

    <div class="row">

        <!-- ITEM NAME -->

        <div class="col-md-6">

            <div class="mb-3">

                <label class="form-label">
                    <?= __('item_name') ?> *
                </label>

                <input
                    type="text"
                    name="name"
                    value="<?= htmlspecialchars($inventory->name ?? '') ?>"
                    class="form-control"
                    required
                >

            </div>

        </div>


        <!-- SKU -->

        <div class="col-md-6">

            <div class="mb-3">

                <label class="form-label">
                    <?= __('sku') ?> *
                </label>

                <input
                    type="text"
                    name="sku"
                    value="<?= htmlspecialchars($inventory->sku ?? '') ?>"
                    class="form-control"
                    required
                >

            </div>

        </div>

    </div>


    <!-- BRAND + COUNTRY -->

    <div class="row">

        <!-- BRAND -->

        <div class="col-md-6">

            <div class="mb-3">

                <label class="form-label">
                    <?= __('brand') ?>
                </label>

                <select name="brand_id" class="form-select">

                    <option value="">
                        <?= __('select_brand') ?>
                    </option>

                    <?php if (!empty($data['brands'])): ?>

                        <?php foreach ($data['brands'] as $brand): ?>

                            <option
                                value="<?= $brand->id ?>"
                                <?= (
                                    (string)($inventory->brand_id ?? '') ===
                                    (string)$brand->id
                                ) ? 'selected' : '' ?>
                            >

                                <?= htmlspecialchars($brand->brand_name) ?>

                                <?php if (!empty($brand->country)): ?>
                                    (<?= htmlspecialchars($brand->country) ?>)
                                <?php endif; ?>

                            </option>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </select>

            </div>

        </div>


        <!-- MADE IN COUNTRY -->

        <div class="col-md-6">

            <div class="mb-3">

                <label class="form-label">
                    <?= __('made_in_country') ?>
                </label>

                <select name="country_id" class="form-select">

                    <option value="">
                        <?= __('select_country') ?>
                    </option>

                    <?php if (!empty($data['countries'])): ?>

                        <?php foreach ($data['countries'] as $country): ?>

                            <option
                                value="<?= $country->id ?>"
                                <?= (
                                    (string)($inventory->country_id ?? '') ===
                                    (string)$country->id
                                ) ? 'selected' : '' ?>
                            >

                                <?= htmlspecialchars($country->country_name) ?>

                                <?php if (!empty($country->country_code)): ?>
                                    (<?= htmlspecialchars($country->country_code) ?>)
                                <?php endif; ?>

                            </option>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </select>

            </div>

        </div>

    </div>


    <!-- CATEGORY + MIN STOCK -->

    <div class="row">

        <!-- CATEGORY -->

        <div class="col-md-6">

            <div class="mb-3">

                <label class="form-label">
                    <?= __('category') ?>
                </label>

                <select name="category" class="form-select">

                    <?php
                    $categories = [
                        'CIVIL & STRUCTURAL'    => 'civil_structural',
                        'BUILDING & FINISHING'  => 'building_finishing',
                        'PLUMBING & DRAINAGE'   => 'plumbing_drainage',
                        'HVAC'                  => 'hvac',
                        'ELECTRICAL'            => 'electrical',
                        'FIRE FIGHTING & ALARM' => 'fire_fighting_alarm',
                        'LOW CURRENT'           => 'low_current',
                        'HAND TOOLS'            => 'hand_tools',
                        'EQUIPMENT'             => 'equipment',
                        'SAFETY & PPE'          => 'safety_ppe',
                        'CONSUMABLES'           => 'consumables',
                        'OTHER'                 => 'other'
                    ];

                    foreach ($categories as $value => $translationKey):
                    ?>

                        <option
                            value="<?= htmlspecialchars($value) ?>"
                            <?= (
                                $inventory->category === $value
                            ) ? 'selected' : '' ?>
                        >

                            <?= __($translationKey) ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>

        </div>


        <!-- MINIMUM STOCK -->

        <div class="col-md-6">

            <div class="mb-3">

                <label class="form-label">
                    <?= __('min_stock') ?>
                </label>

                <input
                    type="number"
                    name="min_stock"
                    value="<?= htmlspecialchars($inventory->min_stock ?? 10) ?>"
                    class="form-control"
                    min="0"
                >

            </div>

        </div>

    </div>


    <!-- UNIT CONFIGURATION -->

   <div class="col-md-6">
    <label class="form-label"><?= __('unit') ?></label>

    <select name="unit_id" class="form-select" required>
        <option value=""><?= __('select_unit') ?></option>

        <?php foreach ($units as $unit): ?>
            <option value="<?= $unit->id ?>"
                <?= $inventory->unit_id == $unit->id ? 'selected' : '' ?>>

                <?= htmlspecialchars(
                    Language::get() === 'ar'
                        ? ($unit->unit_name_a ?: $unit->unit_name)
                        : $unit->unit_name
                ) ?>

            </option>
        <?php endforeach; ?>
    </select>
</div>

<div class="col-md-6">
    <label class="form-label"><?= __('allow_fraction') ?></label>

    <div class="form-check mt-2">
        <input
            type="checkbox"
            name="allow_fraction"
            value="1"
            class="form-check-input"
            id="allow_fraction"
            <?= !empty($inventory->allow_fraction) ? 'checked' : '' ?>
        >

        <label class="form-check-label" for="allow_fraction">
            <?= __('allow_fraction_tick') ?>
        </label>
    </div>
</div>


    <!-- ACTIONS -->

    <button
        type="submit"
        class="btn btn-success mt-4"
    >

        <i class="fas fa-save"></i>

        <?= __('update_item') ?>

    </button>


    <a
        href="<?= URLROOT ?>/inventory"
        class="btn btn-secondary mt-4"
    >

        <?= __('cancel') ?>

    </a>

</form>


<?php else: ?>


<div class="alert alert-danger">

    <h4>
        <?= __('item_not_found') ?>
    </h4>

    <a
        href="<?= URLROOT ?>/inventory"
        class="btn btn-primary"
    >

        <?= __('back_to_inventory') ?>

    </a>

</div>


<?php endif; ?>
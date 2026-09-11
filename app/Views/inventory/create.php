<?php if (!empty($_SESSION['error'])) : ?>
    <div class="alert alert-danger">
        <?= $_SESSION['error']; ?>
    </div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>

<?php if (!empty($data['error'])): ?>
    <div class="alert alert-danger">
        <?= $data['error']; ?>
    </div>
<?php endif; ?>

<h2><i class="fas fa-plus"></i> <?= __('add_inventory_item') ?></h2>

<form method="POST">

    <!-- BASIC INFO -->
    <div class="row">
        <div class="col-md-6">
            <label class="form-label"><?= __('item_name') ?> *</label>
            <input type="text" name="name" value="<?= $_SESSION['old']['name'] ?? '' ?>">
        </div>

        <div class="col-md-6">
            <label class="form-label"><?= __('sku') ?> *</label>
            <input type="text" name="sku" value="<?= $_SESSION['old']['sku'] ?? '' ?>">
        </div>
    </div>

    <!-- BRAND name / Make -->
    <div class="row mt-2">
        <div class="col-md-6">
            <label class="form-label"><?= __('brand') ?></label>

            <select name="brand_id" class="form-select">
                <option value=""><?= __('select_brand') ?></option>

                <?php if (!empty($data['brands'])): ?>
                    <?php foreach ($data['brands'] as $brand): ?>
                        <option value="<?= $brand->id ?>"
                            <?= (!empty($_SESSION['old']['brand_id']) && $_SESSION['old']['brand_id'] == $brand->id) ? 'selected' : '' ?>>

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

    <!-- COUNTRY (Made In) -->
    <div class="col-md-6">
        <label class="form-label"><?= __('made_in_country') ?></label>

        <select name="country_id" class="form-select">
            <option value=""><?= __('select_country') ?></option>

            <?php if (!empty($data['countries'])): ?>
                <?php foreach ($data['countries'] as $country): ?>
                    <option value="<?= $country->id ?>"
                        <?= (!empty($_SESSION['old']['country_id']) && $_SESSION['old']['country_id'] == $country->id) ? 'selected' : '' ?>>

                        <?= htmlspecialchars($country->country_name) ?>

                        <?php if (!empty($country->country_code)): ?>
                            (<?= htmlspecialchars($country->country_code) ?>)
                        <?php endif; ?>

                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>

    <?php unset($_SESSION['old']); ?>

    <div class="row mt-2">

       <div class="col-md-4">
    <label class="form-label"><?= __('category') ?></label>

    <select name="category" class="form-select">
        <option value="CIVIL & STRUCTURAL"><?= __('civil_structural') ?></option>
        <option value="BUILDING & FINISHING"><?= __('building_finishing') ?></option>
        <option value="PLUMBING & DRAINAGE"><?= __('plumbing_drainage') ?></option>
        <option value="HVAC"><?= __('hvac') ?></option>
        <option value="ELECTRICAL"><?= __('electrical') ?></option>
        <option value="FIRE FIGHTING & ALARM"><?= __('fire_fighting_alarm') ?></option>
        <option value="LOW CURRENT"><?= __('low_current') ?></option>
        <option value="HAND TOOLS"><?= __('hand_tools') ?></option>
        <option value="EQUIPMENT"><?= __('equipment') ?></option>
        <option value="SAFETY & PPE"><?= __('safety_ppe') ?></option>
        <option value="CONSUMABLES"><?= __('consumables') ?></option>
        <option value="OTHER"><?= __('other') ?></option>
    </select>
</div>

        <div class="col-md-4">
            <label class="form-label"><?= __('quantity') ?></label>
            <input type="number" name="quantity" class="form-control" value="0" min="0">
        </div>

        <!-- LOCATION -->
        <div class="row mt-3">

            <div class="col-md-6">

                <label class="form-label"><?= __('storage_location') ?> *</label>

                <select name="location_id" id="location_id" class="form-select" required>

                    <option value=""><?= __('select_location_option') ?></option>

                    <?php foreach ($data['locations'] as $loc): ?>

                        <option value="<?= $loc->id ?>"
                            <?= ($loc->id == $data['default_location_id']) ? 'selected' : '' ?>>

                            <?= htmlspecialchars($loc->name) ?>

                            <?= ($loc->id == $data['default_location_id']) ? __('default') : '' ?>

                        </option>

                    <?php endforeach; ?>

                </select>

                <div class="form-check mt-2">

                    <input class="form-check-input"
                           type="checkbox"
                           id="confirm_location">

                    <label class="form-check-label">
                        <?= __('confirm_storage_location') ?>
                    </label>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <label class="form-label"><?= __('min_stock') ?></label>

            <input type="number"
                   name="min_stock"
                   class="form-control"
                   value="10"
                   min="0">

        </div>

    </div>

    <!-- COST -->
    <div class="row mt-3">

        <div class="col-md-4">

            <label class="form-label"><?= __('cost_price') ?> *</label>

            <input type="number"
                   name="cost_price"
                   step="0.01"
                   min="0"
                   class="form-control"
                   required>

        </div>

    </div>

    <!-- UNIT SYSTEM -->
    <h5 class="mt-4"><?= __('unit_configuration') ?></h5>

    <div class="row">

        <div class="col-md-3">

            <label class="form-label"><?= __('base_unit') ?></label>

            <select name="base_unit" class="form-select">

                <option value="piece"><?= __('piece') ?></option>
                <option value="meter"><?= __('meter') ?></option>
                <option value="kg"><?= __('kg') ?></option>
                <option value="liter"><?= __('liter') ?></option>

            </select>

        </div>

        <div class="col-md-3">

            <label class="form-label"><?= __('allow_fraction') ?></label><br>

            <input type="checkbox"
                   name="allow_fraction"
                   value="1">

            <small class="text-muted">
                <?= __('example_fraction') ?>
            </small>

        </div>

        <div class="col-md-3">

            <label class="form-label"><?= __('sale_unit') ?></label>

            <input type="text"
                   name="sale_unit"
                   class="form-control"
                   placeholder="<?= __('sale_unit_placeholder') ?>">

        </div>

        <div class="col-md-3">

            <label class="form-label"><?= __('units_per_sale') ?></label>

            <input type="number"
                   name="units_per_sale"
                   class="form-control"
                   value="1"
                   min="1">

        </div>

    </div>

    <!-- PRICING -->
    <h5 class="mt-4"><?= __('selling_prices') ?></h5>

    <div class="row">

        <div class="col-md-6">

            <label class="form-label"><?= __('price_per_base_unit') ?></label>

            <input type="number"
                   name="price_per_base"
                   step="0.01"
                   min="0"
                   class="form-control">

        </div>

        <div class="col-md-6">

            <label class="form-label"><?= __('price_per_sale_unit') ?></label>

            <input type="number"
                   name="price_per_sale"
                   step="0.01"
                   min="0"
                   class="form-control">

        </div>

    </div>

    <button type="submit" class="btn btn-primary mt-4">

        <i class="fas fa-save"></i>
        <?= __('add_item') ?>

    </button>

    <a href="<?= URLROOT ?>/inventory"
       class="btn btn-secondary mt-4">

        <?= __('cancel') ?>

    </a>

</form>

<!-- SELECTION MODAL -->
<div class="modal fade" id="locationConfirmModal" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content p-3">

            <h5><?= __('confirm_storage_location') ?></h5>

            <p>
                <?= __('you_selected') ?>:
                <strong id="selectedLocationText"></strong>
            </p>

            <button type="button"
                    class="btn btn-success"
                    id="confirmBtn">

                <?= __('confirm') ?>

            </button>

            <button type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">

                <?= __('change') ?>

            </button>

        </div>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const locationSelect = document.getElementById('location_id');
    const confirmCheckbox = document.getElementById('confirm_location');
    const modalEl = document.getElementById('locationConfirmModal');

    const modal = new bootstrap.Modal(modalEl);

    confirmCheckbox.addEventListener('change', function () {

        if (locationSelect.value === "") {

            alert("<?= __('select_storage_location_first') ?>");

            this.checked = false;
            return;
        }

        const text =
            locationSelect.options[
                locationSelect.selectedIndex
            ].text;

        document.getElementById(
            'selectedLocationText'
        ).innerText = text;

        modal.show();
    });

    document.getElementById('confirmBtn')
        .addEventListener('click', function () {

            document.getElementById(
                'confirm_location'
            ).dataset.confirmed = "1";

            bootstrap.Modal.getInstance(
                document.getElementById(
                    'locationConfirmModal'
                )
            ).hide();

        });

});
</script>
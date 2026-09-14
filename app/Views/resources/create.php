<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>
            <?= __('new_resource') ?>
        </h2>

        <a href="<?= URLROOT ?>/Resources"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            <?= __('back') ?>

        </a>

    </div>


    <div class="card">

        <div class="card-body">

            <form method="POST"
                  action="<?= URLROOT ?>/Resources/store">


                <div class="row g-3">


                    <!-- RESOURCE CODE -->

                    <div class="col-md-4">

                        <label class="form-label">
                            <?= __('resource_code') ?>
                        </label>

                        <input type="text"
                               name="resource_code"
                               class="form-control"
                               required>

                    </div>


                    <!-- RESOURCE NAME -->

                    <div class="col-md-4">

                        <label class="form-label">
                            <?= __('resource_name') ?>
                        </label>

                        <input type="text"
                               name="resource_name"
                               class="form-control"
                               required>

                    </div>


                    <!-- ARABIC NAME -->

                    <div class="col-md-4">

                        <label class="form-label">
                            <?= __('arabic_name') ?>
                        </label>

                        <input type="text"
                               name="resource_name_a"
                               class="form-control"
                               dir="rtl">

                    </div>


                    <!-- CATEGORY -->

                    <div class="col-md-4">

                        <label class="form-label">
                            <?= __('category') ?>
                        </label>

                        <select name="category_id"
                                class="form-select"
                                required>

                            <option value="">
                                <?= __('select_category') ?>
                            </option>

                            <?php foreach ($categories as $category): ?>

                                <option value="<?= $category->id ?>">

                                    <?= htmlspecialchars($category->category_name) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>


                    <!-- RESOURCE TYPE -->

                    <div class="col-md-4">

                        <label class="form-label">
                            <?= __('resource_type') ?>
                        </label>

                        <select name="resource_type"
                                class="form-select"
                                required>

                            <option value="HUMAN_RESOURCES">
                                <?= __('human_resources') ?>
                            </option>

                            <option value="SERVICE">
                                <?= __('service') ?>
                            </option>

                            <option value="TRANSPORT">
                                <?= __('transport') ?>
                            </option>

                            <option value="EQUIPMENT">
                                <?= __('equipment') ?>
                            </option>

                            <option value="PROFESSIONAL_SERVICES">
                                <?= __('professional_services') ?>
                            </option>

                            <option value="MISCELLANEOUS">
                                <?= __('miscellaneous') ?>
                            </option>

                        </select>

                    </div>


                    <!-- UNIT -->

                    <div class="col-md-4">

                        <label class="form-label">
                            <?= __('unit') ?>
                        </label>

                        <select name="unit_id"
                                class="form-select"
                                required>

                            <option value="">
                                <?= __('select_unit') ?>
                            </option>

                            <?php foreach ($units as $unit): ?>

                                <option value="<?= $unit->id ?>">

                                    <?= htmlspecialchars($unit->unit_name) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>


                    <!-- STATUS -->

                    <div class="col-md-4">

                        <label class="form-label">
                            <?= __('status') ?>
                        </label>

                        <select name="status"
                                class="form-select">

                            <option value="ACTIVE">
                                <?= __('active') ?>
                            </option>

                            <option value="INACTIVE">
                                <?= __('inactive') ?>
                            </option>

                        </select>

                    </div>


                    <!-- DESCRIPTION -->

                    <div class="col-md-8">

                        <label class="form-label">
                            <?= __('description') ?>
                        </label>

                        <textarea name="description"
                                  class="form-control"
                                  rows="3"></textarea>

                    </div>


                </div>


                <div class="mt-4">

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save"></i>

                        <?= __('save_resource') ?>

                    </button>


                    <a href="<?= URLROOT ?>/Resources"
                       class="btn btn-secondary">

                        <?= __('cancel') ?>

                    </a>

                </div>


            </form>

        </div>

    </div>

</div>
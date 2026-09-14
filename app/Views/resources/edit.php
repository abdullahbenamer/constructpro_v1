<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>
            <?= __('edit_resource') ?>
        </h2>

        <a href="<?= URLROOT ?>/Resources"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            <?= __('back') ?>

        </a>

    </div>


    <?php if (!$resource): ?>

        <div class="alert alert-danger">

            <?= __('resource_not_found') ?>

        </div>

    <?php else: ?>


        <div class="card">

            <div class="card-body">

                <form method="POST"
                      action="<?= URLROOT ?>/Resources/update/<?= $resource->id ?>">


                    <div class="row g-3">


                        <!-- RESOURCE CODE -->

                        <div class="col-md-4">

                            <label class="form-label">
                                <?= __('resource_code') ?>
                            </label>

                            <input type="text"
                                   name="resource_code"
                                   class="form-control"
                                   value="<?= htmlspecialchars($resource->resource_code) ?>"
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
                                   value="<?= htmlspecialchars($resource->resource_name) ?>"
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
                                   dir="rtl"
                                   value="<?= htmlspecialchars($resource->resource_name_a ?? '') ?>">

                        </div>


                        <!-- CATEGORY -->

                        <div class="col-md-4">

                            <label class="form-label">
                                <?= __('category') ?>
                            </label>

                            <select name="category_id"
                                    class="form-select"
                                    required>

                                <?php foreach ($categories as $category): ?>

                                    <option value="<?= $category->id ?>"
                                        <?= $resource->category_id == $category->id
                                            ? 'selected'
                                            : '' ?>>

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

                                <option value="HUMAN_RESOURCES"
                                    <?= $resource->resource_type === 'HUMAN_RESOURCES'
                                        ? 'selected'
                                        : '' ?>>

                                    <?= __('human_resources') ?>

                                </option>

                                <option value="SERVICE"
                                    <?= $resource->resource_type === 'SERVICE'
                                        ? 'selected'
                                        : '' ?>>

                                    <?= __('service') ?>

                                </option>

                                <option value="TRANSPORT"
                                    <?= $resource->resource_type === 'TRANSPORT'
                                        ? 'selected'
                                        : '' ?>>

                                    <?= __('transport') ?>

                                </option>

                                <option value="EQUIPMENT"
                                    <?= $resource->resource_type === 'EQUIPMENT'
                                        ? 'selected'
                                        : '' ?>>

                                    <?= __('equipment') ?>

                                </option>

                                <option value="PROFESSIONAL_SERVICES"
                                    <?= $resource->resource_type === 'PROFESSIONAL_SERVICES'
                                        ? 'selected'
                                        : '' ?>>

                                    <?= __('professional_services') ?>

                                </option>

                                <option value="MISCELLANEOUS"
                                    <?= $resource->resource_type === 'MISCELLANEOUS'
                                        ? 'selected'
                                        : '' ?>>

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

                                <?php foreach ($units as $unit): ?>

                                    <option value="<?= $unit->id ?>"
                                        <?= $resource->unit_id == $unit->id
                                            ? 'selected'
                                            : '' ?>>

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

                                <option value="ACTIVE"
                                    <?= $resource->status === 'ACTIVE'
                                        ? 'selected'
                                        : '' ?>>

                                    <?= __('active') ?>

                                </option>

                                <option value="INACTIVE"
                                    <?= $resource->status === 'INACTIVE'
                                        ? 'selected'
                                        : '' ?>>

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
                                      rows="3"><?= htmlspecialchars($resource->description ?? '') ?></textarea>

                        </div>


                    </div>


                    <div class="mt-4">

                        <button type="submit"
                                class="btn btn-primary">

                            <i class="fas fa-save"></i>

                            <?= __('update_resource') ?>

                        </button>


                        <a href="<?= URLROOT ?>/Resources"
                           class="btn btn-secondary">

                            <?= __('cancel') ?>

                        </a>

                    </div>


                </form>

            </div>

        </div>

    <?php endif; ?>

</div>
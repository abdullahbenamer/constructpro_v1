<div class="container-fluid mt-4">


    <!-- PAGE HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-3">


        <div>

            <h4 class="mb-0">

                <i class="fas fa-edit"></i>

                <?= __('edit_resource_category') ?>

            </h4>


            <small class="text-muted">

                <?= __('update_resource_classification') ?>

            </small>


        </div>


        <a href="<?= URLROOT ?>/ResourceCategories"
           class="btn btn-secondary">


            <i class="fas fa-arrow-left"></i>

            <?= __('back') ?>


        </a>


    </div>


    <div class="card shadow-sm">


        <div class="card-body">


            <form method="POST"
                  action="<?= URLROOT ?>/ResourceCategories/update/<?= $data['category']->id ?>">


                <div class="row">


                    <!-- CODE -->

                    <div class="col-md-3 mb-3">


                        <label class="form-label">

                            <?= __('category_code') ?>

                        </label>


                        <input type="text"
                               name="category_code"
                               class="form-control"
                               value="<?= $data['category']->category_code ?>"
                               required>


                    </div>


                    <!-- NAME -->

                    <div class="col-md-5 mb-3">


                        <label class="form-label">

                            <?= __('category_name') ?>

                        </label>


                        <input type="text"
                               name="category_name"
                               class="form-control"
                               value="<?= $data['category']->category_name ?>"
                               required>


                    </div>


                    <!-- ARABIC NAME -->

                    <div class="col-md-4 mb-3">


                        <label class="form-label">

                            <?= __('arabic_name') ?>

                        </label>


                        <input type="text"
                               name="category_name_a"
                               class="form-control"
                               value="<?= $data['category']->category_name_a ?>">


                    </div>


                </div>


                <!-- DESCRIPTION -->


                <div class="mb-3">


                    <label class="form-label">

                        <?= __('description') ?>

                    </label>


                    <textarea name="description"
                              class="form-control"
                              rows="4"><?= $data['category']->description ?></textarea>


                </div>


                <!-- STATUS -->


                <div class="col-md-3 mb-3">


                    <label class="form-label">

                        <?= __('status') ?>

                    </label>


                    <select name="status"
                            class="form-select">


                        <option value="ACTIVE"
                            <?= $data['category']->status == 'ACTIVE' ? 'selected' : '' ?>>

                            <?= __('active') ?>

                        </option>


                        <option value="INACTIVE"
                            <?= $data['category']->status == 'INACTIVE' ? 'selected' : '' ?>>

                            <?= __('inactive') ?>

                        </option>


                    </select>


                </div>


                <hr>


                <button type="submit"
                        class="btn btn-primary">


                    <i class="fas fa-save"></i>

                    <?= __('update_category') ?>


                </button>


                <a href="<?= URLROOT ?>/ResourceCategories"
                   class="btn btn-secondary">


                    <?= __('cancel') ?>


                </a>


            </form>


        </div>


    </div>


</div>
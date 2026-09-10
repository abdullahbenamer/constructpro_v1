<div class="container-fluid mt-4">


    <div class="d-flex justify-content-between align-items-center mb-3">


        <div>

            <h4 class="mb-0">

                <i class="fas fa-plus-circle"></i>

                <?= __('new_resource_category') ?>

            </h4>


            <small class="text-muted">

                <?= __('create_resource_classification') ?>

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
                  action="<?= URLROOT ?>/ResourceCategories/store">


                <div class="row">


                    <div class="col-md-3 mb-3">


                        <label class="form-label">
                            <?= __('category_code') ?>
                        </label>


                        <input type="text"
                               name="category_code"
                               class="form-control"
                               required>


                    </div>


                    <div class="col-md-5 mb-3">


                        <label class="form-label">
                            <?= __('category_name') ?>
                        </label>


                        <input type="text"
                               name="category_name"
                               class="form-control"
                               required>


                    </div>


                    <div class="col-md-4 mb-3">


                        <label class="form-label">
                            <?= __('arabic_name') ?>
                        </label>


                        <input type="text"
                               name="category_name_a"
                               class="form-control">


                    </div>


                </div>


                <div class="mb-3">


                    <label class="form-label">
                        <?= __('description') ?>
                    </label>


                    <textarea name="description"
                              class="form-control"
                              rows="4"></textarea>


                </div>


                <div class="col-md-3 mb-3">


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


                <button class="btn btn-primary">

                    <i class="fas fa-save"></i>

                    <?= __('save_category') ?>

                </button>


            </form>


        </div>


    </div>


</div>
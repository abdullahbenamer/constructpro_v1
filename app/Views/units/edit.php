<div class="container-fluid mt-4">


    <!-- PAGE HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>

            <h4 class="mb-0">

                <i class="fas fa-edit"></i>
                <?= __('edit_unit') ?>

            </h4>


            <small class="text-muted">

                <?= __('update_unit_of_measure') ?>

            </small>

        </div>


        <a href="<?= URLROOT ?>/Units"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            <?= __('back') ?>

        </a>

    </div>


    <div class="card shadow-sm">

        <div class="card-body">


            <form method="POST"
                  action="<?= URLROOT ?>/Units/update/<?= $data['unit']->id ?>">


                <div class="row">


                    <!-- UNIT CODE -->

                    <div class="col-md-3 mb-3">

                        <label class="form-label">

                            <?= __('unit_code') ?>

                        </label>


                        <input type="text"
                               name="unit_code"
                               class="form-control"
                               value="<?= $data['unit']->unit_code ?>"
                               required>

                    </div>


                    <!-- UNIT NAME -->

                    <div class="col-md-5 mb-3">

                        <label class="form-label">

                            <?= __('unit_name') ?>

                        </label>


                        <input type="text"
                               name="unit_name"
                               class="form-control"
                               value="<?= $data['unit']->unit_name ?>"
                               required>

                    </div>


                    <!-- ARABIC NAME -->

                    <div class="col-md-4 mb-3">

                        <label class="form-label">

                            <?= __('arabic_name') ?>

                        </label>


                        <input type="text"
                               name="unit_name_a"
                               class="form-control"
                               value="<?= $data['unit']->unit_name_a ?>">

                    </div>

                </div>


                <!-- DESCRIPTION -->

                <div class="mb-3">

                    <label class="form-label">

                        <?= __('description') ?>

                    </label>


                    <textarea name="description"
                              class="form-control"
                              rows="4"><?= $data['unit']->description ?></textarea>

                </div>


                <!-- STATUS -->

                <div class="row">

                    <div class="col-md-3 mb-3">

                        <label class="form-label">

                            <?= __('status') ?>

                        </label>


                        <select name="status"
                                class="form-select">


                            <option value="ACTIVE"
                                <?= $data['unit']->status == 'ACTIVE' ? 'selected' : '' ?>>

                                <?= __('active') ?>

                            </option>


                            <option value="INACTIVE"
                                <?= $data['unit']->status == 'INACTIVE' ? 'selected' : '' ?>>

                                <?= __('inactive') ?>

                            </option>


                        </select>

                    </div>

                </div>


                <hr>


                <button type="submit"
                        class="btn btn-primary">

                    <i class="fas fa-save"></i>

                    <?= __('update_unit') ?>

                </button>


                <a href="<?= URLROOT ?>/Units"
                   class="btn btn-secondary">

                    <?= __('cancel') ?>

                </a>


            </form>

        </div>

    </div>

</div>
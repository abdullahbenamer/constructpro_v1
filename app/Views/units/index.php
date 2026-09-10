<div class="container-fluid mt-4">


    <!-- PAGE HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>

            <h4 class="mb-0">

                <i class="fas fa-ruler"></i>
                <?= __('units') ?>

            </h4>

            <small class="text-muted">

                <?= __('manage_units_of_measure') ?>

            </small>

        </div>


        <a href="<?= URLROOT ?>/Units/create"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>

            <?= __('new_unit') ?>

        </a>

    </div>


    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th width="80">
                                <?= __('code') ?>
                            </th>

                            <th>
                                <?= __('unit_name') ?>
                            </th>

                            <th>
                                <?= __('arabic_name') ?>
                            </th>

                            <th width="120">
                                <?= __('status') ?>
                            </th>

                            <th width="180">
                                <?= __('actions') ?>
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php if (!empty($data['units'])): ?>

                            <?php foreach ($data['units'] as $unit): ?>

                                <tr>

                                    <td>

                                        <strong>

                                            <?= $unit->unit_code ?>

                                        </strong>

                                    </td>


                                    <td>

                                        <?= $unit->unit_name ?>

                                    </td>


                                    <td>

                                        <?= $unit->unit_name_a ?: '-' ?>

                                    </td>


                                    <td>

                                        <?php if ($unit->status == 'ACTIVE'): ?>

                                            <span class="badge bg-success">

                                                <?= __('active') ?>

                                            </span>

                                        <?php else: ?>

                                            <span class="badge bg-secondary">

                                                <?= __('inactive') ?>

                                            </span>

                                        <?php endif; ?>

                                    </td>


                                    <td>

                                        <a href="<?= URLROOT ?>/Units/edit/<?= $unit->id ?>"
                                           class="btn btn-sm btn-warning">

                                            <i class="fas fa-edit"></i>

                                        </a>


                                        <a href="<?= URLROOT ?>/Units/delete/<?= $unit->id ?>"
                                           class="btn btn-sm btn-danger"

                                           onclick="return confirm(<?= json_encode(__('delete_unit_confirm')) ?>);">

                                            <i class="fas fa-trash"></i>

                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>


                        <?php else: ?>

                            <tr>

                                <td colspan="5"
                                    class="text-center text-muted">

                                    <?= __('no_units_found') ?>

                                </td>

                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>
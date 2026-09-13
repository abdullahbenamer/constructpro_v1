<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="mb-1">
                <?= __('units') ?>
            </h4>

            <div class="text-muted">
                <?= __('manage_units') ?>
            </div>
        </div>

        <a
            href="<?= URLROOT ?>/Units/create"
            class="btn btn-primary"
        >
            <i class="fas fa-plus"></i>
            <?= __('new_unit') ?>
        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th>
                                <?= __('unit_code') ?>
                            </th>

                            <th>
                                <?= __('unit_name') ?>
                            </th>

                            <th>
                                <?= __('arabic_name') ?>
                            </th>

                            <th>
                                <?= __('description') ?>
                            </th>

                            <th>
                                <?= __('status') ?>
                            </th>

                            <th class="text-end">
                                <?= __('actions') ?>
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php if (!empty($units)): ?>

                        <?php foreach ($units as $unit): ?>

                            <tr>

                                <td>
                                    <strong>
                                        <?= htmlspecialchars($unit->unit_code) ?>
                                    </strong>
                                </td>

                                <td>
                                    <?= htmlspecialchars($unit->unit_name) ?>
                                </td>

                                <td dir="rtl">
                                    <?= htmlspecialchars($unit->unit_name_a ?? '-') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($unit->description ?? '-') ?>
                                </td>

                                <td>

                                    <?php if ($unit->status === 'ACTIVE'): ?>

                                        <span class="badge bg-success">
                                            <?= __('active') ?>
                                        </span>

                                    <?php else: ?>

                                        <span class="badge bg-secondary">
                                            <?= __('inactive') ?>
                                        </span>

                                    <?php endif; ?>

                                </td>

                                <td class="text-end text-nowrap">

                                    <a
                                        href="<?= URLROOT ?>/Units/edit/<?= $unit->id ?>"
                                        class="btn btn-sm btn-warning"
                                    >
                                        <i class="fas fa-edit"></i>
                                        <?= __('edit') ?>
                                    </a>

                                    <a
                                        href="<?= URLROOT ?>/Units/delete/<?= $unit->id ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('<?= htmlspecialchars(__('delete_unit_confirm'), ENT_QUOTES) ?>')"
                                    >
                                        <i class="fas fa-trash"></i>
                                        <?= __('delete') ?>
                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td
                                colspan="6"
                                class="text-center text-muted py-4"
                            >
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


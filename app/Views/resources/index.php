<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>
            <?= __('resources') ?>
        </h2>

        <a href="<?= URLROOT ?>/Resources/create"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>

            <?= __('new_resource') ?>

        </a>

    </div>


    <?php if (!empty($_SESSION['success'])): ?>

        <div class="alert alert-success alert-dismissible fade show">

            <?= htmlspecialchars($_SESSION['success']) ?>

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

        <?php unset($_SESSION['success']); ?>

    <?php endif; ?>


    <?php if (!empty($_SESSION['error'])): ?>

        <div class="alert alert-danger alert-dismissible fade show">

            <?= htmlspecialchars($_SESSION['error']) ?>

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"></button>

        </div>

        <?php unset($_SESSION['error']); ?>

    <?php endif; ?>


    <div class="card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th><?= __('code') ?></th>

                            <th><?= __('name') ?></th>

                            <th><?= __('category') ?></th>

                            <th><?= __('type') ?></th>

                            <th><?= __('unit') ?></th>

                            <th><?= __('status') ?></th>

                            <th><?= __('actions') ?></th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php if (!empty($resources)): ?>

                        <?php foreach ($resources as $resource): ?>

                            <?php

                            $typeLabels = [

                                'HUMAN_RESOURCES'       => __('human_resources'),
                                'SERVICE'              => __('service'),
                                'TRANSPORT'            => __('transport'),
                                'EQUIPMENT'            => __('equipment'),
                                'PROFESSIONAL_SERVICES' => __('professional_services'),
                                'MISCELLANEOUS'        => __('miscellaneous')
                            ];

                            $statusLabel =
                                $resource->status === 'ACTIVE'
                                    ? __('active')
                                    : __('inactive');

                            ?>

                            <tr>

                                <td>
                                    <?= htmlspecialchars($resource->resource_code) ?>
                                </td>

                                <td>

                                    <strong>
                                        <?= htmlspecialchars($resource->resource_name) ?>
                                    </strong>

                                    <?php if (!empty($resource->resource_name_a)): ?>

                                        <br>

                                        <small class="text-muted">
                                            <?= htmlspecialchars($resource->resource_name_a) ?>
                                        </small>

                                    <?php endif; ?>

                                </td>

                                <td>
                                    <?= htmlspecialchars($resource->category_name ?? 'N/A') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars(
                                        $typeLabels[$resource->resource_type]
                                        ?? $resource->resource_type
                                    ) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($resource->unit_name ?? 'N/A') ?>
                                </td>

                                <td>

                                    <span class="badge <?= $resource->status === 'ACTIVE'
                                        ? 'bg-success'
                                        : 'bg-secondary' ?>">

                                        <?= $statusLabel ?>

                                    </span>

                                </td>

                                <td>

                                    <a href="<?= URLROOT ?>/Resources/edit/<?= $resource->id ?>"
                                       class="btn btn-sm btn-warning">

                                        <i class="fas fa-edit"></i>

                                        <?= __('edit') ?>

                                    </a>


                                    <a href="<?= URLROOT ?>/Resources/delete/<?= $resource->id ?>"
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('<?= __('delete_resource_confirm') ?>')">

                                        <i class="fas fa-trash"></i>

                                        <?= __('delete') ?>

                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="7"
                                class="text-center text-muted py-4">

                                <?= __('no_resources_found') ?>

                            </td>

                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>
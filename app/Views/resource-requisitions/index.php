<h2 class="mb-4">
    <i class="fas fa-clipboard-list text-primary"></i>
    <?= __('resource_requisitions') ?>
</h2>

<div class="mb-3">

    <a href="<?= URLROOT ?>/resourcerequisitions/create"
        class="btn btn-primary">

        <i class="fas fa-plus"></i>

        <?= __('new_resource_requisition') ?>

    </a>

</div>

<div class="card shadow-sm">

    <div class="card-header bg-primary text-white">

        <strong><?= __('resource_requisition_register') ?></strong>

    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-striped table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th width="140"><?= __('requisition_no_short') ?></th>

                        <th><?= __('project') ?></th>

                        <th width="120"><?= __('request_date') ?></th>

                        <th width="120"><?= __('required_date') ?></th>

                        <th width="120"><?= __('priority') ?></th>

                        <th width="130"><?= __('status') ?></th>

                        <th><?= __('requested_by') ?></th>

                        <th width="180" class="text-center">
                            <?= __('actions') ?>
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php if (!empty($requisitions)): ?>

                        <?php foreach ($requisitions as $req): ?>

                            <?php

                            switch ($req->status) {

                                case 'DRAFT':
                                    $badge = 'secondary';
                                    break;

                                case 'SUBMITTED':
                                    $badge = 'warning';
                                    break;

                                case 'UNDER_REVIEW':
                                    $badge = 'info';
                                    break;

                                case 'APPROVED':
                                    $badge = 'success';
                                    break;

                                case 'PARTIALLY_FULFILLED':
                                    $badge = 'primary';
                                    break;

                                case 'COMPLETED':
                                    $badge = 'dark';
                                    break;

                                case 'REJECTED':
                                    $badge = 'danger';
                                    break;

                                case 'CANCELLED':
                                    $badge = 'danger';
                                    break;

                                default:
                                    $badge = 'secondary';

                            }

                            ?>

                            <tr>

                                <td>

                                    <a href="<?= URLROOT ?>/resourcerequisitions/details/<?= $req->id ?>">

                                        <strong>

                                            <?= htmlspecialchars($req->req_number) ?>

                                        </strong>

                                    </a>

                                </td>

                                <td>

                                    <?= htmlspecialchars($req->project_name ?? '-') ?>

                                </td>

                                <td>

                                    <?= date('d M Y', strtotime($req->request_date)) ?>

                                </td>

                                <td>

                                    <?= !empty($req->required_date)
                                        ? date('d M Y', strtotime($req->required_date))
                                        : '-' ?>

                                </td>

                                <td>

                                    <?php

                                    switch (strtoupper($req->priority)) {

                                        case 'LOW':
                                            $priorityClass = 'bg-success';
                                            break;

                                        case 'NORMAL':
                                            $priorityClass = 'bg-primary';
                                            break;

                                        case 'HIGH':
                                            $priorityClass = 'bg-warning text-dark';
                                            break;

                                        case 'URGENT':
                                            $priorityClass = 'bg-danger';
                                            break;

                                        case 'CRITICAL':
                                            $priorityClass = 'bg-dark';
                                            break;

                                        default:
                                            $priorityClass = 'bg-secondary';
                                    }

                                    ?>

                                    <span class="badge <?= $priorityClass ?>">

                                        <?php
                                        switch (strtoupper($req->priority)) {

                                            case 'LOW':
                                                echo __('low');
                                                break;

                                            case 'NORMAL':
                                                echo __('normal');
                                                break;

                                            case 'HIGH':
                                                echo __('high');
                                                break;

                                            case 'URGENT':
                                                echo __('urgent');
                                                break;

                                            case 'CRITICAL':
                                                echo __('critical');
                                                break;

                                            default:
                                                echo htmlspecialchars($req->priority);
                                        }
                                        ?>

                                    </span>

                                </td>

                                <td>

                                    <span class="badge bg-<?= $badge ?>">

                                        <?php
                                        switch ($req->status) {

                                            case 'DRAFT':
                                                echo __('draft');
                                                break;

                                            case 'SUBMITTED':
                                                echo __('submitted');
                                                break;

                                            case 'UNDER_REVIEW':
                                                echo __('under_review');
                                                break;

                                            case 'APPROVED':
                                                echo __('approved');
                                                break;

                                            case 'PARTIALLY_FULFILLED':
                                                echo __('partially_fulfilled');
                                                break;

                                            case 'COMPLETED':
                                                echo __('completed');
                                                break;

                                            case 'REJECTED':
                                                echo __('rejected');
                                                break;

                                            case 'CANCELLED':
                                                echo __('cancelled');
                                                break;

                                            default:
                                                echo htmlspecialchars($req->status);
                                        }
                                        ?>

                                    </span>

                                </td>

                                <td>

                                    <?= htmlspecialchars($req->requested_by_name) ?>

                                </td>

                                <td class="text-center">

                                    <a href="<?= URLROOT ?>/resourcerequisitions/details/<?= $req->id ?>"
                                        class="btn btn-sm btn-info">

                                        <!-- <i class="fas fa-eye"></i> -->
                                        <?= __('view') ?>

                                    </a>

                                    <?php if ($req->status == 'DRAFT'): ?>

                                        <a href="<?= URLROOT ?>/resourcerequisitions/edit/<?= $req->id ?>"
                                            class="btn btn-sm btn-warning">

                                            <!-- <i class="fas fa-edit"></i> -->
                                            <?= __('edit') ?>

                                        </a>

                                        <a href="<?= URLROOT ?>/resourcerequisitions/delete/<?= $req->id ?>"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm(<?= json_encode(__('delete_requisition_confirm')) ?>);">

                                            <!-- <i class="fas fa-trash"></i> -->
                                            <?= __('delete') ?>

                                        </a>

                                    <?php endif; ?>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="8" class="text-center py-5 text-muted">

                                <i class="fas fa-clipboard-list fa-3x mb-3"></i>

                                <br>

                                <?= __('no_resource_requisitions_found') ?>

                                <br><br>

                                <a href="<?= URLROOT ?>/resourcerequisitions/create"
                                    class="btn btn-primary">

                                    <i class="fas fa-plus"></i>

                                    <?= __('create_first_requisition') ?>

                                </a>

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>
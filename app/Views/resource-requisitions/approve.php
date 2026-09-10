<div class="container-fluid mt-4">

    <!-- PAGE HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>

            <h4 class="mb-0">
                <i class="fas fa-check-circle"></i>
                <?= __('approval_decision') ?>
            </h4>

            <small class="text-muted">
                <?= __('review_approve_reject_requisition') ?>
            </small>

        </div>

        <a href="<?= URLROOT ?>/ResourceRequisitions/details/<?= $data['requisition']->id ?>"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>
            <?= __('back') ?>

        </a>

    </div>


    <!-- REQUISITION SUMMARY -->

    <div class="card shadow-sm mb-4">

        <div class="card-header bg-white">

            <strong>
                <i class="fas fa-file-alt"></i>
                <?= __('requisition_summary') ?>
            </strong>

        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-md-4 mb-3">

                    <label class="text-muted">
                        <?= __('requisition_no') ?>
                    </label>

                    <div class="fw-bold">

                        <?= htmlspecialchars(
                            $data['requisition']->requisition_no
                        ) ?>

                    </div>

                </div>


                <div class="col-md-4 mb-3">

                    <label class="text-muted">
                        <?= __('project') ?>
                    </label>

                    <div class="fw-bold">

                        <?= htmlspecialchars(
                            $data['requisition']->project_name ?? '-'
                        ) ?>

                    </div>

                </div>


                <div class="col-md-4 mb-3">

                    <label class="text-muted">
                        <?= __('priority') ?>
                    </label>

                    <div>

                        <?php if ($data['requisition']->priority === 'HIGH'): ?>

                            <span class="badge bg-danger">
                                <?= __('high') ?>
                            </span>

                        <?php elseif ($data['requisition']->priority === 'MEDIUM'): ?>

                            <span class="badge bg-warning text-dark">
                                <?= __('medium') ?>
                            </span>

                        <?php elseif ($data['requisition']->priority === 'LOW'): ?>

                            <span class="badge bg-secondary">
                                <?= __('low') ?>
                            </span>

                        <?php else: ?>

                            <span class="text-muted">
                                <?= __('not_set') ?>
                            </span>

                        <?php endif; ?>

                    </div>

                </div>

            </div>


            <div class="row">

                <div class="col-md-4">

                    <label class="text-muted">
                        <?= __('requested_by') ?>
                    </label>

                    <div>

                        <?= htmlspecialchars(
                            $data['requisition']->requested_by_name ?? '-'
                        ) ?>

                    </div>

                </div>


                <div class="col-md-4">

                    <label class="text-muted">
                        <?= __('required_date') ?>
                    </label>

                    <div>

                        <?= htmlspecialchars(
                            $data['requisition']->required_date
                        ) ?>

                    </div>

                </div>


                <div class="col-md-4">

                    <label class="text-muted">
                        <?= __('status') ?>
                    </label>

                    <div>

                        <span class="badge bg-primary">

                            <?= htmlspecialchars(
                                $data['requisition']->status
                            ) ?>

                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- APPROVAL FORM -->

    <div class="card shadow-sm">

        <div class="card-header">

            <strong>
                <i class="fas fa-gavel"></i>
                <?= __('approval_decision') ?>
            </strong>

        </div>

        <div class="card-body">

            <form method="POST"
                  action="<?= URLROOT ?>/ResourceRequisitions/processApproval/<?= $data['requisition']->id ?>">

                <!-- APPROVER REMARKS -->

                <div class="mb-4">

                    <label class="form-label">

                        <?= __('approval_remarks') ?>

                    </label>

                    <textarea
                        name="remarks"
                        class="form-control"
                        rows="4"
                        placeholder="<?= __('approval_remarks_placeholder') ?>"></textarea>

                </div>


                <!-- ACTION BUTTONS -->

                <div class="d-flex justify-content-between">

                    <a href="<?= URLROOT ?>/ResourceRequisitions/details/<?= $data['requisition']->id ?>"
                       class="btn btn-secondary">

                        <?= __('cancel') ?>

                    </a>


                    <div>

                        <button
                            type="submit"
                            name="action"
                            value="REJECT"
                            class="btn btn-danger"
                            onclick="return confirm(<?= json_encode(__('reject_requisition_confirm')) ?>);">

                            <i class="fas fa-times-circle"></i>
                            <?= __('reject') ?>

                        </button>


                        <button
                            type="submit"
                            name="action"
                            value="APPROVE"
                            class="btn btn-success"
                            onclick="return confirm(<?= json_encode(__('approve_requisition_confirm')) ?>);">

                            <i class="fas fa-check-circle"></i>
                            <?= __('approve') ?>

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>
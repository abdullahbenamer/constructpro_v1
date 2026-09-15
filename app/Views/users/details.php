<h3><?= __('user_details') ?></h3>

<div class="row g-4">

    <div class="col-md-4 text-center">

        <?php if (!empty($user->photo)): ?>

            <img src="<?= URLROOT . '/' . htmlspecialchars($user->photo) ?>"
                 alt="<?= __('photo') ?>"
                 class="img-thumbnail rounded-circle"
                 style="width:160px;height:160px;object-fit:cover;">

        <?php else: ?>

            <div class="border rounded-circle d-flex align-items-center justify-content-center mx-auto"
                 style="width:160px;height:160px;">
                <i class="bi bi-person fs-1 text-muted"></i>
            </div>

        <?php endif; ?>

        <h4 class="mt-3">
            <?= htmlspecialchars($user->full_name) ?>
        </h4>

        <div class="text-muted">
            <?= htmlspecialchars($user->role_name ?? '-') ?>
        </div>

    </div>

    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <?= __('user_information') ?>
            </div>

            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">
                        <?= __('full_name') ?>
                    </div>
                    <div class="col-md-8">
                        <?= htmlspecialchars($user->full_name) ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">
                        <?= __('user_name') ?>
                    </div>
                    <div class="col-md-8">
                        <?= htmlspecialchars($user->user_name) ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">
                        <?= __('email') ?>
                    </div>
                    <div class="col-md-8">
                        <?= htmlspecialchars($user->email) ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">
                        <?= __('mobile') ?>
                    </div>
                    <div class="col-md-8">
                        <?= htmlspecialchars($user->mobile) ?>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4 fw-bold">
                        <?= __('role') ?>
                    </div>
                    <div class="col-md-8">
                        <?= htmlspecialchars($user->role_name ?? '-') ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4 fw-bold">
                        <?= __('created_at') ?>
                    </div>
                    <div class="col-md-8">
                        <?= htmlspecialchars($user->created_at) ?>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>

<div class="mt-4">
    <a href="<?= URLROOT ?>/admin/editUser/<?= $user->id ?>"
       class="btn btn-warning">
        <?= __('edit') ?>
    </a>

    <a href="<?= URLROOT ?>/admin/users"
       class="btn btn-secondary">
        <?= __('back') ?>
    </a>
</div>
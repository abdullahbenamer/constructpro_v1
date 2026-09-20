<h3><?= __('my_profile') ?></h3>

<div class="row g-4">

    <div class="col-md-4">

        <div class="card">
            <div class="card-body text-center">

                <?php if (!empty($user->photo)): ?>

                    <img
                        src="<?= URLROOT . '/' . htmlspecialchars($user->photo) ?>"
                        alt="<?= __('photo') ?>"
                        class="img-thumbnail rounded-circle"
                        style="width:160px;height:160px;object-fit:cover;">

                <?php else: ?>

                    <div
                        class="border rounded-circle d-flex align-items-center justify-content-center mx-auto"
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
        </div>

    </div>


    <div class="col-md-8">

        <!-- PROFILE -->

        <div class="card mb-4">

            <div class="card-header">
                <?= __('edit_profile') ?>
            </div>

            <div class="card-body">

                <form
                    method="POST"
                    action="<?= URLROOT ?>/users/updateProfile"
                    enctype="multipart/form-data">

                    <div class="mb-3">
                        <label class="form-label">
                            <?= __('full_name') ?>
                        </label>

                        <input
                            type="text"
                            name="full_name"
                            class="form-control"
                            value="<?= htmlspecialchars($user->full_name) ?>"
                            required>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">
                            <?= __('user_name') ?>
                        </label>

                        <input
                            type="text"
                            name="user_name"
                            class="form-control"
                            value="<?= htmlspecialchars($user->user_name) ?>"
                            required>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">
                            <?= __('email') ?>
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="<?= htmlspecialchars($user->email) ?>"
                            required>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">
                            <?= __('mobile') ?>
                        </label>

                        <input
                            type="text"
                            name="mobile"
                            class="form-control"
                            value="<?= htmlspecialchars($user->mobile) ?>">
                    </div>


                    <div class="mb-3">
                        <label class="form-label">
                            <?= __('photo') ?>
                        </label>

                        <input
                            type="file"
                            name="photo"
                            class="form-control"
                            accept=".jpg,.jpeg,.png,.webp">
                    </div>


                    <button
                        type="submit"
                        class="btn btn-primary">

                        <?= __('update_profile') ?>

                    </button>

                </form>

            </div>
        </div>


        <!-- CHANGE PASSWORD -->

        <div class="card">

            <div class="card-header">
                <?= __('change_password') ?>
            </div>

            <div class="card-body">

                <form
                    method="POST"
                    action="<?= URLROOT ?>/users/changePassword">

                    <div class="mb-3">

                        <label class="form-label">
                            <?= __('current_password') ?>
                        </label>

                        <input
                            type="password"
                            name="current_password"
                            class="form-control"
                            required>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            <?= __('new_password') ?>
                        </label>

                        <input
                            type="password"
                            name="new_password"
                            class="form-control"
                            required>

                    </div>


                    <div class="mb-3">

                        <label class="form-label">
                            <?= __('confirm_password') ?>
                        </label>

                        <input
                            type="password"
                            name="confirm_password"
                            class="form-control"
                            required>

                    </div>


                    <button
                        type="submit"
                        class="btn btn-warning">

                        <?= __('change_password') ?>

                    </button>

                </form>

            </div>
        </div>

    </div>

</div>
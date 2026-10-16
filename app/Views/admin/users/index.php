<h3><?= __('users') ?></h3>

<a href="<?= URLROOT ?>/admin/createUser"
    class="btn btn-primary mb-3">

    <?= __('add_user') ?>

</a>

<div class="table-responsive">

    <table class="table table-bordered table-hover align-middle">

        <thead>
            <tr>
                <th><?= __('full_name') ?></th>
                <th><?= __('user_name') ?></th>
                <th><?= __('email') ?></th>
                <th><?= __('mobile') ?></th>
                <th><?= __('role') ?></th>
                <th><?= __('actions') ?></th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($users as $user): ?>

                <tr>

                    <td>
                        <?= htmlspecialchars($user->full_name) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($user->user_name) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($user->email) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($user->mobile) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($user->role_name ?? '-') ?>
                    </td>

                    <td>

                        <a href="<?= URLROOT ?>/admin/editUser/<?= $user->id ?>"
                            class="btn btn-sm btn-warning">
                            <?= __('edit') ?>
                        </a>

                        <?php if ($user->id != $_SESSION['user_id']): ?>

                          
<a href="<?= URLROOT ?>/users/delete/<?= (int) $user->id ?>"
   class="btn btn-sm btn-danger"
   onclick="return confirm('<?= htmlspecialchars(__('delete_user_confirm'), ENT_QUOTES, 'UTF-8') ?>');">
    <i class="fas fa-trash"></i> <?= __('delete') ?>
</a>


                        <?php endif; ?>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>
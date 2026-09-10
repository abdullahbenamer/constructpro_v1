<h3><?= __('users') ?></h3>


<a
    href="<?= URLROOT ?>/admin/createUser"
    class="btn btn-primary mb-2">

    <?= __('add_user') ?>

</a>


<table class="table table-bordered">

    <tr>

        <th><?= __('name') ?></th>

        <th><?= __('email') ?></th>

        <th><?= __('role') ?></th>

        <th><?= __('actions') ?></th>

    </tr>


    <?php foreach ($users as $user) : ?>

        <tr>

            <td>
                <?= $user->name ?>
            </td>

            <td>
                <?= $user->email ?>
            </td>

            <td>
                <?= $user->role_name ?>
            </td>


            <td>

                <a
                    href="<?= URLROOT ?>/admin/editUser/<?= $user->id ?>"
                    class="btn btn-sm btn-warning">

                    <?= __('edit') ?>

                </a>


                <?php
                // HIDE DELETE BUTTON for last admin
                $is_self = ($user->id == $_SESSION['user_id']);
                $is_admin = (strtoupper($user->role_name) === 'ADMIN');
                ?>


                <?php if (!$is_self) : ?>

                    <a
                        href="<?= URLROOT ?>/users/delete/<?= $user->id ?>"
                        class="btn btn-sm btn-danger"

                        onclick="return confirm(<?= json_encode(__('delete_user_confirm')) ?>)">

                        <?= __('delete') ?>

                    </a>

                <?php endif; ?>

            </td>

        </tr>

    <?php endforeach; ?>

</table>
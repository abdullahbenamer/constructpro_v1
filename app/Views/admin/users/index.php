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

                <?php
                $photo = trim((string) ($user->photo ?? ''));

                if ($photo !== '') {
                    $avatar = URLROOT . '/uploads/users/' .
                        rawurlencode(basename($photo));
                } else {
                    $defaultAvatar = match ($user->sex ?? null) {
                        'FEMALE' => 'default_avatar_female.png',
                        'MALE'   => 'default_avatar.png',
                        default  => 'default_avatar.png',
                    };

                    $avatar = URLROOT . '/uploads/users/' . $defaultAvatar;
                }

                $profileUrl = URLROOT . '/users/details/' . (int) $user->id;
                ?>

                <tr>
                    <td>
                        <a href="<?= htmlspecialchars($profileUrl, ENT_QUOTES, 'UTF-8') ?>"
                            class="d-inline-flex align-items-center gap-2 text-decoration-none">

                            <img
                                src="<?= htmlspecialchars($avatar, ENT_QUOTES, 'UTF-8') ?>"
                                alt="<?= htmlspecialchars($user->full_name ?? '', ENT_QUOTES, 'UTF-8') ?>"
                                class="rounded-circle border"
                                width="42"
                                height="42"
                                style="object-fit: cover;"
                                loading="lazy"
                                onerror="this.onerror=null; this.src='<?= htmlspecialchars(URLROOT . '/uploads/users/default-avatar.png', ENT_QUOTES, 'UTF-8') ?>';">

                            <span>
                                <?= htmlspecialchars($user->full_name ?? '') ?>
                            </span>
                        </a>
                    </td>

                    <td>
                        <?= htmlspecialchars($user->user_name ?? '') ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($user->email ?? '') ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($user->mobile ?? '') ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($user->role_name ?? '-') ?>
                    </td>

                    <td>
                        <a href="<?= URLROOT ?>/admin/editUser/<?= (int) $user->id ?>"
                            class="btn btn-sm btn-warning">
                            <?= __('edit') ?>
                        </a>

                        <?php if ((int) $user->id !== (int) $_SESSION['user_id']): ?>
                            <a href="<?= URLROOT ?>/users/delete/<?= (int) $user->id ?>"
                                class="btn btn-sm btn-danger"
                                onclick="return confirm('<?= htmlspecialchars(__('delete_user_confirm'), ENT_QUOTES, 'UTF-8') ?>');">
                                <i class="fas fa-trash"></i>
                                <?= __('delete') ?>
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>

    </table>
</div>
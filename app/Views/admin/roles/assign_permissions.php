<h3><?= __('assign_permissions') ?></h3>

<div class="card mb-4">
    <div class="card-body py-2">
        <h3 class="mb-0">
            <?= __('for') ?>:
            <span class="badge bg-primary ms-2">
                <?= strtoupper(htmlspecialchars($role->name)) ?>
            </span>
        </h3>
    </div>
</div>

<form method="POST">

<?php
$grouped = [];

foreach ($permissions as $perm) {
    $parts = explode('.', $perm->name);
    $group = $parts[0];
    $grouped[$group][] = $perm;
}
?>

<?php foreach ($grouped as $group => $perms): ?>

<?php
$groupTranslationKey = 'permission_group_' . strtolower($group);
?>

<div class="card mb-3">

    <div class="card-header bg-dark text-white
                d-flex justify-content-between align-items-center">

        <strong>
            <?= __($groupTranslationKey) ?>
        </strong>

        <button
            type="button"
            class="btn btn-sm btn-light"
            onclick="toggleGroup('<?= htmlspecialchars($group) ?>')">
            <?= __('select_all') ?>
        </button>

    </div>

    <div class="card-body">

        <div class="row">

        <?php foreach ($perms as $perm): ?>

            <?php
            $permissionTranslationKey = 'permission_' .
                str_replace(['.', '_'], '_', $perm->name);
            ?>

            <div class="col-md-4 mb-3">

                <div class="form-check">

                    <input
                        class="form-check-input permission-checkbox"
                        type="checkbox"
                        id="perm<?= (int)$perm->id ?>"
                        name="permissions[]"
                        value="<?= (int)$perm->id ?>"
                        data-group="<?= htmlspecialchars($group) ?>"
                        <?= in_array($perm->id, $assigned) ? 'checked' : '' ?>>

                    <label
                        class="form-check-label"
                        for="perm<?= (int)$perm->id ?>">

                        <strong>
                            <?= htmlspecialchars(__($permissionTranslationKey)) ?>
                        </strong>

                        <small class="d-block text-muted">
                            <?= htmlspecialchars($perm->name) ?>
                        </small>

                    </label>

                </div>

            </div>

        <?php endforeach; ?>

        </div>

    </div>

</div>

<?php endforeach; ?>

<button
    type="submit"
    class="btn btn-success">

    <?= __('save_permissions') ?>

</button>

</form>

<script>

function toggleGroup(group) {

    const checkboxes = document.querySelectorAll(
        'input[data-group="' + group + '"]'
    );

    const allChecked = Array.from(checkboxes)
        .every(cb => cb.checked);

    checkboxes.forEach(cb => {
        cb.checked = !allChecked;
    });
}

</script>
<h3><?= __('permissions') ?></h3>

<form method="POST" action="<?= URLROOT ?>/admin/permissions">

    <div class="mb-2">
        <label for="permission_name" class="form-label">
            <?= __('permission_name') ?>
        </label>

        <input
            type="text"
            id="permission_name"
            name="name"
            placeholder="<?= __('permission_name') ?>"
            class="form-control"
            maxlength="100"
            required>
    </div>

    <div class="mb-2">
        <label for="permission_description" class="form-label">
            <?= __('permission_description') ?> (EN)
        </label>

        <textarea
            id="permission_description"
            name="description"
            class="form-control"
            rows="2"
            maxlength="1000"
            dir="ltr"></textarea>
    </div>

    <div class="mb-3">
        <label for="permission_description_a" class="form-label">
            <?= __('permission_description_ar') ?>
        </label>

        <textarea
            id="permission_description_a"
            name="description_a"
            class="form-control"
            rows="2"
            maxlength="1000"
            dir="rtl"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">
        <?= __('add_permission') ?>
    </button>

</form>

<ul class="list-group mt-3">

<?php foreach ($permissions as $perm): ?>

    <li class="list-group-item d-flex justify-content-between align-items-center">

        <div>
            <strong><?= htmlspecialchars($perm->name) ?></strong>

       <?php
$currentLanguage = strtolower($_SESSION['language'] ?? 'en');
$isArabic = in_array($currentLanguage, ['ar', 'arabic'], true);

$description = $isArabic
    ? ($perm->description_a ?? '')
    : ($perm->description ?? '');

// Fall back to the other language if the selected one is empty.
if (trim($description) === '') {
    $description = $isArabic
        ? ($perm->description ?? '')
        : ($perm->description_a ?? '');
}
?>

<?php if (trim($description) !== ''): ?>
    <br>
    <small
        class="text-muted d-block"
        dir="<?= $isArabic ? 'rtl' : 'ltr' ?>">
        <?= nl2br(htmlspecialchars($description, ENT_QUOTES, 'UTF-8')) ?>
    </small>
<?php endif; ?>
        </div>

        <div>

            <a
                href="<?= URLROOT ?>/admin/editPermission/<?= $perm->id ?>"
                class="btn btn-sm btn-warning">

                <?= __('edit') ?>

            </a>


            <a
                href="<?= URLROOT ?>/admin/deletePermission/<?= $perm->id ?>"
                class="btn btn-sm btn-danger"
              onclick="return confirm('<?= htmlspecialchars(__('delete_permission_confirm'), ENT_QUOTES, 'UTF-8') ?>');">
                <?= __('delete') ?>

            </a>

        </div>

    </li>

<?php endforeach; ?>

</ul>
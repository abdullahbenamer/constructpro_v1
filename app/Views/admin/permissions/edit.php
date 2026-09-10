<h3><?= __('edit_permission') ?></h3>

<form method="POST">

    <input
        type="text"
        name="name"
        class="form-control mb-2"
        value="<?= htmlspecialchars($permission->name) ?>"
        required>

    <button class="btn btn-success">
        <?= __('update') ?>
    </button>

</form>
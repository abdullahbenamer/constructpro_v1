<h3><?= __('edit_permission') ?></h3>

<form method="POST">

    <input
        type="text"
        name="name"
        class="form-control mb-2"
        value="<?= htmlspecialchars($permission->name) ?>"
        required>

    <textarea
        name="description"
        class="form-control mb-2"
        rows="3"
        placeholder="<?= __('permission_description') ?>"><?= htmlspecialchars($permission->description ?? '') ?></textarea>

    <button class="btn btn-success">
        <?= __('update') ?>
    </button>

</form>
<h3><?= __('edit_role') ?></h3>

<form method="POST">

    <input
        type="text"
        name="name"
        class="form-control mb-2"
        value="<?= htmlspecialchars($role->name) ?>"
        required>


    <button class="btn btn-success">

        <?= __('update') ?>

    </button>

</form>
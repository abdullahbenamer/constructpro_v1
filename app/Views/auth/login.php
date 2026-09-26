<h2><?= __('login') ?></h2>

<?php if (!empty($error)): ?>
    <div class="alert alert-danger">
        <?= $error ?>
    </div>
<?php endif; ?>

<div class="col-md-3">

    <form method="POST">

       <input
    type="text"
    name="login"
    class="form-control"
    placeholder="<?= __('username_or_email') ?>"
    required
>

        <input
            type="password"
            name="password"
            placeholder="<?= __('password') ?>"
            class="form-control mb-2"
            required>

        <button class="btn btn-primary">
            <?= __('login') ?>
        </button>

    </form>

</div>
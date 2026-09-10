<h2>
    <?= __('technician_details') ?>
</h2>

<div class="card">

    <div class="card-body">

        <h4>
            <?= htmlspecialchars($technician->name) ?>
        </h4>

        <p>
            <strong><?= __('email') ?>:</strong>
            <?= htmlspecialchars($technician->email) ?>
        </p>

        <p>
            <strong><?= __('phone') ?>:</strong>
            <?= htmlspecialchars($technician->phone) ?>
        </p>

        <p>
            <strong><?= __('specialty') ?>:</strong>
            <?= htmlspecialchars($technician->specialty) ?>
        </p>

        <p>
            <strong><?= __('status') ?>:</strong>
            <?= htmlspecialchars($technician->status) ?>
        </p>

    </div>

</div>

<a href="<?= URLROOT ?>/services"
   class="btn btn-secondary mt-3">

    <?= __('back') ?>

</a>
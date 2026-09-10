<h2>
    <?= __('employee_details') ?>
</h2>

<div class="card">

    <div class="card-body">

        <h4>
            <?= htmlspecialchars($data['user']->full_name) ?>
        </h4>

        <p>

            <strong><?= __('email') ?>:</strong>

            <?= htmlspecialchars($data['user']->email) ?>

        </p>


        <p>

            <strong><?= __('mobile') ?>:</strong>

            <?= htmlspecialchars($data['user']->mobile) ?>

        </p>


        <p>

            <strong><?= __('role') ?>:</strong>

            <?= htmlspecialchars($data['user']->role_name ?? '-') ?>

        </p>


        <p>

            <strong><?= __('status') ?>:</strong>

            <?= htmlspecialchars($data['user']->status ?? 'Active') ?>

        </p>

    </div>

</div>


<a href="<?= URLROOT ?>/users"
   class="btn btn-secondary mt-3">

    <?= __('back') ?>

</a>
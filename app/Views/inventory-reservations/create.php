<h3>
 Materials Reservation
</h3>
<?php if (isset($_SESSION['user_name'])) : ?>
    <span class="nav-link text-dark">
Reserved by: <i class="fas fa-user-circle"></i> <?= $_SESSION['full_name'] ?>
    </span>
<?php endif; ?>
<br>
<form method="POST">

    <div class="mb-3">

        <label>Inventory Item</label>

        <select name="inventory_id"
            class="form-select"
            required>

            <?php foreach ($inventory as $item): ?>

                <option value="<?= $item->id ?>">

                    <?= htmlspecialchars($item->name) ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="mb-3">

        <label>FromLocation</label>

        <select name="location_id"
            class="form-select">

            <option value="">
                Any Location
            </option>

            <?php foreach ($locations as $loc): ?>

                <option value="<?= $loc->id ?>">

                    <?= htmlspecialchars($loc->code) ?>

                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="mb-3">

        <label>Project</label>

        <select name="project_id"
            class="form-select">

            <option value="">
                No Project
            </option>

            <?php foreach ($projects as $p): ?>

                <option value="<?= $p->id ?>">

                    <?= htmlspecialchars($p->title) ?><!-- project name -->

                </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="col-md-3 mb-3">

    <label class="form-label">

        Required By Date
<span class="text-danger">*</span>
    </label>
    <input type="date" name="required_by_date" class="form-control" min="<?= date('Y-m-d') ?>" required>
</div>

    <div class="mb-3">

        <label>Quantity</label>

        <input type="number"
            step="0.01"
            min="0.01"
            name="quantity"
            class="form-control"
            required>

    </div>

    <div class="mb-3">

        <label>Reference</label>

        <input type="text"
            name="reference"
            class="form-control">

    </div>

    <div class="mb-3">

        <label>Notes</label>

        <textarea name="notes"
            class="form-control"></textarea>

    </div>

    <button class="btn btn-primary">

        Reserve/Request

    </button>

</form>
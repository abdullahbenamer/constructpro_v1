<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4>
            <?= __('new_unit') ?>
        </h4>

        <a
            href="<?= URLROOT ?>/Units/index"
            class="btn btn-secondary"
        >
            <i class="fas fa-arrow-left"></i>
            <?= __('back') ?>
        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <form
                method="POST"
                action="<?= URLROOT ?>/Units/create"
            >

                <div class="row g-3">

                    <div class="col-md-4">

                        <label class="form-label">
                            <?= __('unit_code') ?>
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="unit_code"
                            class="form-control"
                            maxlength="20"
                            required
                            value="<?= htmlspecialchars($unit->unit_code ?? '') ?>"
                        >

                    </div>

                    <div class="col-md-4">

                        <label class="form-label">
                            <?= __('unit_name') ?>
                            <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="unit_name"
                            class="form-control"
                            maxlength="100"
                            required
                            value="<?= htmlspecialchars($unit->unit_name ?? '') ?>"
                        >

                    </div>

                    <div class="col-md-4">

                        <label class="form-label">
                            <?= __('arabic_name') ?>
                        </label>

                        <input
                            type="text"
                            name="unit_name_a"
                            class="form-control"
                            maxlength="100"
                            dir="rtl"
                            value="<?= htmlspecialchars($unit->unit_name_a ?? '') ?>"
                        >

                    </div>

                    <div class="col-md-8">

                        <label class="form-label">
                            <?= __('description') ?>
                        </label>

                        <textarea
                            name="description"
                            class="form-control"
                            rows="3"
                        ><?= htmlspecialchars($unit->description ?? '') ?></textarea>

                    </div>

                    <div class="col-md-4">

                        <label class="form-label">
                            <?= __('status') ?>
                        </label>

                        <select
                            name="status"
                            class="form-select"
                        >

                            <option
                                value="ACTIVE"
                                <?= (($unit->status ?? 'ACTIVE') === 'ACTIVE') ? 'selected' : '' ?>
                            >
                                <?= __('active') ?>
                            </option>

                            <option
                                value="INACTIVE"
                                <?= (($unit->status ?? '') === 'INACTIVE') ? 'selected' : '' ?>
                            >
                                <?= __('inactive') ?>
                            </option>

                        </select>

                    </div>

                </div>

                <div class="mt-4">

                    <button
                        type="submit"
                        class="btn btn-success"
                    >
                        <i class="fas fa-save"></i>
                        <?= __('save_unit') ?>
                    </button>

                    <a
                        href="<?= URLROOT ?>/Units/index"
                        class="btn btn-secondary"
                    >
                        <?= __('cancel') ?>
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>


<h2>

    <i class="fas fa-upload"></i>

    <?= __('upload_project_documents') ?>

</h2>

<hr>

<h5>

    <?= __('project') ?>:

    <strong><?= strtoupper(htmlspecialchars($project->title)) ?></strong>

</h5>

<form method="POST" enctype="multipart/form-data">

    <div class="row">

        <div class="col-md-4">

            <label class="form-label">

                <?= __('category') ?>

            </label>

            <select name="category" id="category" class="form-select" required>

                <option value="">
                    <?= __('select_document_category') ?>
                </option>

                <option value="contract">
                    <?= __('contract') ?>
                </option>

                <option value="drawing">
                    <?= __('drawing') ?>
                </option>

                <option value="quotation">
                    <?= __('quotation') ?>
                </option>

                <option value="invoice">
                    <?= __('invoice') ?>
                </option>

                <option value="receipt">
                    <?= __('receipt') ?>
                </option>

                <option value="purchase_order">
                    <?= __('purchase_order') ?>
                </option>

                <option value="inspection">
                    <?= __('inspection') ?>
                </option>

                <option value="report">
                    <?= __('report') ?>
                </option>

                <option value="photo">
                    <?= __('photo') ?>
                </option>

                <option value="certificate">
                    <?= __('certificate') ?>
                </option>

                <option value="permit">
                    <?= __('permit') ?>
                </option>

                <option value="manual">
                    <?= __('manual') ?>
                </option>

                <option value="other">
                    <?= __('other') ?>
                </option>

            </select>

        </div>

        <div class="col-md-8">

            <label class="form-label">

                <?= __('title') ?>

            </label>

            <input
                type="text"
                name="title"
                id="title"
                class="form-control"
                required>

        </div>

    </div>

    <br>

    <div class="mb-3">

        <label>

            <?= __('description') ?>

        </label>

        <textarea
            name="description"
            class="form-control"
            rows="3"></textarea>

    </div>

    <div class="row">

        <div class="col-md-4">

            <label>

                <?= __('document_date') ?>

                <small class="text-danger">
                    (<?= __('actual_document_date') ?>)
                </small>

            </label>

            <input
                type="date"
                name="document_date"
                class="form-control"
                value="<?= date('Y-m-d') ?>">

        </div>

    </div>

    <br>

    <div class="mb-3">

        <label>

            <?= __('select_files') ?>

            <small>
                (<?= __('multiple_files_note') ?>)
            </small>

        </label>

        <input
            type="file"
            name="documents[]"
            class="form-control"
            multiple
            required>

        <small class="text-muted">

            <?= __('allowed_file_types') ?>

        </small>

    </div>

    <button class="btn btn-success">

        <i class="fas fa-upload"></i>

        <?= __('upload') ?>

    </button>

    <a
        href="<?= URLROOT ?>/projects/documents/<?= $project->id ?>"
        class="btn btn-secondary">

        <?= __('cancel') ?>

    </a>

</form>

<script>
    // Title auto-fill with the selected category prefix
const category = document.getElementById('category');
const title    = document.getElementById('title');

function formatCategory(text)
{
    return text.replace(/_/g, ' ').toUpperCase();
}

category.addEventListener('change', function() {

    const prefix = formatCategory(this.value) + ' - ';

    // only set if user hasn't typed anything yet
    if (title.dataset.userEdited !== "1") {
        title.value = prefix;
    }

});

// detect user manual typing
title.addEventListener('input', function() {
    this.dataset.userEdited = "1";
});
</script>
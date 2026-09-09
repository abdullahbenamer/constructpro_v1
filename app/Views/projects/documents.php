<h4>
    <?= __('project') ?>:
    <strong><?= strtoupper(htmlspecialchars($project->title)) ?></strong>
</h4>

<br>

<h4>
    <i class="fas fa-folder-open"></i>
    <?= __('project_documents') ?>
</h4>

<hr>

<a href="<?= URLROOT ?>/projects/uploadDocument/<?= $project->id ?>"
    class="btn btn-primary mb-3">
    <i class="fas fa-upload"></i>
    <?= __('upload_documents') ?>
</a>

<table class="table table-striped table-hover align-middle">

    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th><?= __('category') ?></th>
            <th><?= __('document') ?></th>
            <th><?= __('type') ?></th>
            <th><?= __('version_date') ?></th>
            <th><?= __('size') ?></th>
            <th><?= __('upload_date') ?></th>
            <th><?= __('actions') ?></th>
        </tr>
    </thead>

    <tbody>

        <?php if (!empty($documents)): ?>

            <?php foreach ($documents as $doc): ?>

                <?php
                $fileUrl = URLROOT . '/uploads/projects/' .
                    $doc->project_id . '/' .
                    $doc->stored_name;
                ?>

                <tr>

                    <td><?= $doc->id ?></td>

                    <td>
                        <span class="badge bg-secondary">
                            <?= ucfirst($doc->category) ?>
                        </span>
                    </td>

                    <td>

                        <?php if (str_starts_with($doc->file_type, 'image/')): ?>

                            <a href="<?= $fileUrl ?>" target="_blank">

                                <img src="<?= $fileUrl ?>"
                                    style="width:70px;height:70px;object-fit:cover;border-radius:6px;">

                                <?= htmlspecialchars($doc->title) ?>

                            </a>

                        <?php elseif ($doc->file_type === 'application/pdf'): ?>

                            <a href="<?= $fileUrl ?>" target="_blank">
                                <i class="fas fa-file-pdf fa-2x text-danger"></i>
                                <br>
                                <?= htmlspecialchars($doc->title) ?>
                            </a>

                        <?php else: ?>

                            <a href="<?= $fileUrl ?>" target="_blank">
                                <i class="fas fa-file fa-2x text-primary"></i>
                                <br>
                                <?= htmlspecialchars($doc->title) ?>
                            </a>

                        <?php endif; ?>

                    </td>

                    <td>
                        <?php

                        $type = match ($doc->file_type) {

                            'application/pdf' =>
                                __('pdf'),

                            'application/msword' =>
                                __('ms_word'),

                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' =>
                                __('word'),

                            'application/vnd.ms-excel' =>
                                __('ms_excel'),

                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' =>
                                __('excel'),

                            'application/vnd.ms-powerpoint' =>
                                __('powerpoint'),

                            'application/vnd.openxmlformats-officedocument.presentationml.presentation' =>
                                __('powerpoint'),

                            'image/jpeg' =>
                                __('jpeg_image'),

                            'image/png' =>
                                __('png_image'),

                            'image/gif' =>
                                __('gif_image'),

                            'image/webp' =>
                                __('webp_image'),

                            'text/plain' =>
                                __('text_file'),

                            'application/zip' =>
                                __('zip_compressed_file'),

                            'application/x-rar-compressed' =>
                                __('rar_compressed_file'),

                            default =>
                                strtoupper(pathinfo(
                                    $doc->original_name,
                                    PATHINFO_EXTENSION
                                ))
                        };

                        echo htmlspecialchars($type);

                        ?>
                    </td>

                    <td>
                        <?= date('Y-m-d', strtotime($doc->document_date)) ?>
                    </td>

                    <td>
                        <?= number_format($doc->file_size / 1024, 1) ?> KB
                    </td>

                    <td>
                        <?= date('Y-m-d', strtotime($doc->uploaded_at)) ?>
                    </td>

                    <td>

                        <a href="<?= $fileUrl ?>"
                            target="_blank"
                            class="btn btn-sm btn-primary">

                            <?= __('view') ?>

                        </a>

                        <a href="<?= $fileUrl ?>"
                            download
                            class="btn btn-sm btn-success">

                            <?= __('download') ?>

                        </a>

                        <a href="<?= URLROOT ?>/projects/deleteDocument/<?= $doc->id ?>"
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('<?= htmlspecialchars(__('delete_document_confirm'), ENT_QUOTES, 'UTF-8') ?>')">

                            <?= __('delete_document') ?>

                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>

                <td colspan="8" class="text-center text-muted py-4">

                    <i class="fas fa-folder-open fa-2x"></i>

                    <br><br>

                    <?= __('no_documents_uploaded') ?>

                </td>

            </tr>

        <?php endif; ?>

    </tbody>

</table>
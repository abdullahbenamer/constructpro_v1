<?php

$projectScopes = [];

foreach ($data['project_scopes'] ?? [] as $row) {
    $projectScopes[] = $row->scope;
}

?>

<h2>
    <i class="fas fa-edit"></i>
    <?= __('edit_project') ?> #<?= $project->id ?>
</h2>

<form method="POST">

    <div class="row">

        <!-- CUSTOMER -->
        <div class="col-md-6">
            <label><?= __('customer_label') ?></label>
            <select name="customer_id" class="form-select" required>
                <?php foreach ($customers as $c): ?>
                    <option value="<?= $c->id ?>"
                        <?= $project->customer_id == $c->id ? 'selected' : '' ?>>
                        <?= htmlspecialchars($c->company) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- PROJECT TYPE -->

        <div class="col-md-4">

            <label><?= __('project_type') ?></label>

            <select name="project_type"
                id="projectType"
                class="form-select"
                required>

                <option value="Construction"
                    <?= ($data['project']->project_type ?? '') === 'Construction' ? 'selected' : '' ?>>
                    <?= __('construction') ?>
                </option>

                <option value="Maintenance"
                    <?= ($data['project']->project_type ?? '') === 'Maintenance' ? 'selected' : '' ?>>
                    <?= __('maintenance') ?>
                </option>

                <option value="Inspection"
                    <?= ($data['project']->project_type ?? '') === 'Inspection' ? 'selected' : '' ?>>
                    <?= __('inspection') ?>
                </option>

                <option value="Consultancy"
                    <?= ($data['project']->project_type ?? '') === 'Consultancy' ? 'selected' : '' ?>>
                    <?= __('consultancy') ?>
                </option>

                <option value="Other"
                    <?= ($data['project']->project_type ?? '') === 'Other' ? 'selected' : '' ?>>
                    <?= __('other') ?>
                </option>

            </select>

        </div>

        <!-- PROJECT SCOPE -->

        <div class="mb-3">
            <label class="form-label"><?= __('project_scope') ?></label>

            <?php
            $projectScopes = [];

            foreach ($data['project_scopes'] ?? [] as $row) {
                $projectScopes[] = $row->scope;
            }

            $scopes = [
                'Civil',
                'Architectural',
                'Structural',
                'MEP',
                'Finishing',
                'Instrumentation & Control',
                'Telecommunications',
                'Other'
            ];
            ?>

            <div class="border rounded p-3 bg-light">
                <div class="row g-2">

                    <?php foreach ($scopes as $scope): ?>

                        <div class="col-md-6">
                            <div class="form-check">

                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="scopes[]"
                                    value="<?= htmlspecialchars($scope) ?>"
                                    id="scope_<?= md5($scope) ?>"
                                    <?= in_array($scope, $projectScopes, true) ? 'checked' : '' ?>>

                                <label
                                    class="form-check-label"
                                    for="scope_<?= md5($scope) ?>">
                                    <?php
                                    $scopeLabels = [
                                        'Civil' => __('civil'),
                                        'Architectural' => __('architectural'),
                                        'Structural' => __('structural'),
                                        'MEP' => __('mep'),
                                        'Finishing' => __('finishing'),
                                        'Instrumentation & Control' => __('instrumentation_control'),
                                        'Telecommunications' => __('telecommunications'),
                                        'Other' => __('other')
                                    ];
                                    ?>

                                    <?= htmlspecialchars($scopeLabels[$scope] ?? $scope) ?>
                                </label>

                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>

            <small class="text-muted">
                <?= __('select_project_scopes') ?>
            </small>
        </div>
    </div>

    <!-- COMMON FIELDS -->
    <div class="mt-3">

        <label><?= __('project_title') ?></label>
        <input type="text" name="title"
            class="form-control"
            value="<?= htmlspecialchars($project->title) ?>">

        <label class="mt-2"><?= __('description') ?></label>
        <textarea name="description" class="form-control">
        <?= htmlspecialchars($project->description) ?>
    </textarea>

    </div>

    <!-- LOCATION / DATES -->
    <div class="row mt-3">

        <div class="col-md-4">
            <label><?= __('site_location') ?></label>
            <input type="text" name="site_location"
                class="form-control"
                value="<?= $project->site_location ?>">
        </div>

        <div class="col-md-4">
            <label><?= __('start_date') ?></label>
            <input type="date" name="start_date"
                class="form-control"
                value="<?= $project->start_date ?>">
        </div>

        <div class="col-md-4">
            <label><?= __('deadline') ?></label>
            <input type="date" name="deadline"
                class="form-control"
                value="<?= $project->deadline ?>">
        </div>

    </div>

    <!-- MANAGEMENT -->
    <div class="row mt-3">

        <div class="col-md-4">

            <label><?= __('project_manager') ?></label>

            <select name="project_manager_id" class="form-select">

                <option value=""><?= __('select_manager') ?></option>

                <?php foreach ($users as $u): ?>

                    <option value="<?= $u->id ?>"
                        <?= $project->project_manager_id == $u->id ? 'selected' : '' ?>>

                        <?= htmlspecialchars($u->full_name) ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>

        <div class="col-md-4">
            <label><?= __('contract_number') ?></label>
            <input type="text" name="contract_number"
                class="form-control"
                value="<?= $project->contract_number ?>">
        </div>

        <div class="mb-3">
            <label class="form-label"><?= __('project_code') ?></label>

            <input
                type="text"
                class="form-control"
                value="<?= htmlspecialchars($data['project']->project_code ?? '') ?>"
                readonly>

            <small class="text-muted">
                <?= __('project_code_cannot_change') ?>
            </small>
        </div>

    </div>

    <!-- PRIORITY / STATUS -->
    <div class="row mt-3">

        <div class="col-md-6">
            <label><?= __('status') ?></label>
            <select name="status" class="form-select">
                <option value="planning" <?= $project->status == 'planning' ? 'selected' : '' ?>>
                    <?= __('planning') ?>
                </option>

                <option value="in_progress" <?= $project->status == 'in_progress' ? 'selected' : '' ?>>
                    <?= __('in_progress') ?>
                </option>

                <option value="completed" <?= $project->status == 'completed' ? 'selected' : '' ?>>
                    <?= __('completed_status') ?>
                </option>
            </select>
        </div>

        <div class="col-md-6">
            <label><?= __('priority') ?></label>
            <select name="priority" class="form-select">
                <option value="low" <?= $project->priority == 'low' ? 'selected' : '' ?>>
                    <?= __('low') ?>
                </option>

                <option value="medium" <?= $project->priority == 'medium' ? 'selected' : '' ?>>
                    <?= __('medium') ?>
                </option>

                <option value="high" <?= $project->priority == 'high' ? 'selected' : '' ?>>
                    <?= __('high') ?>
                </option>

                <option value="critical" <?= $project->priority == 'critical' ? 'selected' : '' ?>>
                    <?= __('critical') ?>
                </option>
            </select>
        </div>

    </div>

    <!-- BUDGET -->
    <div class="mt-3">
   <label><?= __('budget') ?></label>
        <input type="number" step="0.01"
            name="budget"
            class="form-control"
            value="<?= $project->budget ?>">
    </div>

    <!-- BUTTON -->
    <div class="mt-4">
        <button class="btn btn-success">
           <?= __('save_changes') ?>
        </button>

        <a href="<?= URLROOT ?>/projects" class="btn btn-secondary">
           <?= __('cancel') ?>
        </a>
    </div>

</form>
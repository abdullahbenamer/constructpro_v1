<?php
// $customers = $this->model('Customer')->getAll();
$customers = $data['customers'];
echo "<p>Customers loaded: " . count($customers) . "</p>";
?>
<h2>
    <i class="fas fa-plus-circle"></i>
    <?= __('a_new_project') ?>
</h2>
<form method="POST">

    <!-- GENERAL INFO -->

    <div class="row">

        <div class="col-md-6">
            <label><?= __('customers') ?> *</label>
            <select name="customer_id" class="form-select" required>
                <option value=""><?= __('select_customer') ?></option>
                <?php foreach ($customers as $customer): ?>
                    <option value="<?= $customer->id ?>">
                        <?= htmlspecialchars($customer->company) ?> - <?= $customer->name ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-6">
            <label>Project Title *</label>
            <input type="text" name="title" class="form-control" required>
        </div>

    </div>

    <!-- ---------- PROJECT CLASSIFICATION ------------- -->

    <div class="row mt-3">

        <div class="col-md-4">
            <label><?= __('project_type') ?> *</label>

            <select name="project_type"
                id="projectType"
                class="form-select"
                required>

                <option value=""><?= __('select_type') ?></option>

                <option value="Construction"><?= __('construction') ?></option>
                <option value="Maintenance"><?= __('maintenance') ?></option>
                <option value="Inspection"><?= __('inspection') ?></option>
                <option value="Consultancy"><?= __('consultancy') ?></option>
                <option value="Other"><?= __('other') ?></option>

            </select>
        </div>

        <!-- ///////////// -->

        <div class="mb-3">
            <label class="form-label"><?= __('project_scope') ?></label>

            <div class="border rounded p-3 bg-light">
                <div class="row g-2">

                    <?php
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

                    <?php foreach ($scopes as $scope): ?>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="scopes[]"
                                  value="<?= htmlspecialchars($scope) ?>"
                                    id="scope_<?= md5($scope) ?>">

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

                                <?= $scopeLabels[$scope] ?? htmlspecialchars($scope) ?>
                                </label>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>

            <small class="text-muted">
                <?= __('select_one_or_more_project_scopes.') ?>
            </small>
        </div>

        <!-- ///////////// -->

        <div class="mb-3">
           <label class="form-label"><?= __('project_code') ?></label>

            <input
                type="text"
                class="form-control"
             value="<?= __('auto_generated') ?>"
                readonly>

            <small class="text-muted">
               <?= __('project_code_auto_generated') ?>
            </small>
        </div>

        <div class="col-md-2">
<label><?= __('contract_number') ?></label>

            <input type="text"
                name="contract_number"
                class="form-control">

        </div>

    </div>

    <!-- ------Location + Management---------- -->

    <div class="row mt-3">

        <div class="col-md-6">
    <label><?= __('site_location') ?></label>
            <input type="text" name="site_location" class="form-control">
        </div>

        <div class="col-md-6">

     <label><?= __('project_manager') ?></label>

            <select name="project_manager_id" class="form-select">

                <option value="">
    <?= __('select_project_manager') ?>
</option>
                <?php foreach ($data['users'] as $user): ?>

                    <option value="<?= $user->id ?>">

                        <?= htmlspecialchars($user->full_name) ?>

                    </option>

                <?php endforeach; ?>

            </select>

        </div>

    </div>


    <!-- ---------Schedule + Priority------------ -->
    <div class="row mt-3">

        <div class="col-md-4">
  <label><?= __('start_date') ?></label>
            <input type="date" name="start_date" class="form-control">
        </div>

        <div class="col-md-4">
    <label><?= __('deadline') ?> *</label>
            <input type="date" name="deadline" class="form-control" required>
        </div>

        <div class="col-md-4">
          <label><?= __('priority') ?></label>
            <select name="priority" class="form-select">
            <option value="low"><?= __('low') ?></option>
<option value="medium" selected><?= __('medium') ?></option>
<option value="high"><?= __('high') ?></option>
<option value="critical"><?= __('critical') ?></option>
            </select>
        </div>

    </div>
    <!-- ----------Status + Budget-------------- -->

    <div class="row mt-3">

        <div class="col-md-6">
      <label><?= __('status') ?> *</label>
            <select name="status" class="form-select" required>
               <option value="planning"><?= __('planning') ?></option>
<option value="in_progress"><?= __('in_progress') ?></option>
<option value="testing"><?= __('testing') ?></option>
<option value="completed"><?= __('completed_status') ?></option>
<option value="cancelled"><?= __('cancelled') ?></option>
            </select>
        </div>

        <div class="col-md-6">
     <label><?= __('budget_lyd_label') ?></label>
            <input type="number" name="budget" class="form-control" step="0.01">
        </div>

    </div>

    <!-- --------Description --------- -->
    <div class="mt-3">
    <label><?= __('description') ?></label>
        <textarea name="description" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary btn-lg">
       <i class="fas fa-save"></i>
<?= __('create_project') ?>
    </button>
    <a href="<?= URLROOT ?>/projects" class="btn btn-secondary btn-lg"><?= __('cancel') ?></a>
</form>
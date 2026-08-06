<h2>
    <i class="fas fa-edit"></i>
    Edit Project #<?= $project->id ?>
</h2>

<form method="POST">

<div class="row">

    <!-- CUSTOMER -->
    <div class="col-md-6">
        <label>Customer</label>
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
    <div class="col-md-6">
        <label>Project Type</label>
        <select name="project_type" id="projectType" class="form-select" required>
            <?php
            $types = [
                'civil' => 'Civil Engineering',
                'construction' => 'Construction',
                'electrical' => 'Electrical',
                'mechanical' => 'Mechanical',
                'maintenance' => 'Maintenance',
                'inspection' => 'Inspection / NDT'
            ];
            foreach ($types as $key => $label): ?>
                <option value="<?= $key ?>"
                    <?= $project->project_type == $key ? 'selected' : '' ?>>
                    <?= $label ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

</div>

<!-- COMMON FIELDS -->
<div class="mt-3">

    <label>Title</label>
    <input type="text" name="title"
           class="form-control"
           value="<?= htmlspecialchars($project->title) ?>">

    <label class="mt-2">Description</label>
    <textarea name="description" class="form-control">
        <?= htmlspecialchars($project->description) ?>
    </textarea>

</div>

<!-- LOCATION / DATES -->
<div class="row mt-3">

    <div class="col-md-4">
        <label>Site Location</label>
        <input type="text" name="site_location"
               class="form-control"
               value="<?= $project->site_location ?>">
    </div>

    <div class="col-md-4">
        <label>Start Date</label>
        <input type="date" name="start_date"
               class="form-control"
               value="<?= $project->start_date ?>">
    </div>

    <div class="col-md-4">
        <label>Deadline</label>
        <input type="date" name="deadline"
               class="form-control"
               value="<?= $project->deadline ?>">
    </div>

</div>

<!-- MANAGEMENT -->
<div class="row mt-3">

   <div class="col-md-4">

    <label>Project Manager</label>

    <select name="project_manager_id" class="form-select">

        <option value="">-- Select Manager --</option>

        <?php foreach($users as $u): ?>

            <option value="<?= $u->id ?>"
                <?= $project->project_manager_id == $u->id ? 'selected' : '' ?>>

                <?= htmlspecialchars($u->full_name) ?>

            </option>

        <?php endforeach; ?>

    </select>

</div>

    <div class="col-md-4">
        <label>Contract No</label>
        <input type="text" name="contract_number"
               class="form-control"
               value="<?= $project->contract_number ?>">
    </div>

    <div class="col-md-4">
        <label>Project Code</label>
        <input type="text" name="project_code"
               class="form-control"
               value="<?= $project->project_code ?>">
    </div>

</div>

<!-- PRIORITY / STATUS -->
<div class="row mt-3">

    <div class="col-md-6">
        <label>Status</label>
        <select name="status" class="form-select">
            <option value="planning" <?= $project->status=='planning'?'selected':'' ?>>Planning</option>
            <option value="in_progress" <?= $project->status=='in_progress'?'selected':'' ?>>In Progress</option>
            <option value="completed" <?= $project->status=='completed'?'selected':'' ?>>Completed</option>
        </select>
    </div>

    <div class="col-md-6">
        <label>Priority</label>
        <select name="priority" class="form-select">
            <option value="low" <?= $project->priority=='low'?'selected':'' ?>>Low</option>
            <option value="medium" <?= $project->priority=='medium'?'selected':'' ?>>Medium</option>
            <option value="high" <?= $project->priority=='high'?'selected':'' ?>>High</option>
            <option value="critical" <?= $project->priority=='critical'?'selected':'' ?>>Critical</option>
        </select>
    </div>

</div>

<!-- BUDGET -->
<div class="mt-3">
    <label>Budget</label>
    <input type="number" step="0.01"
           name="budget"
           class="form-control"
           value="<?= $project->budget ?>">
</div>

<!-- BUTTON -->
<div class="mt-4">
    <button class="btn btn-success">
        Save Changes
    </button>

    <a href="<?= URLROOT ?>/projects" class="btn btn-secondary">
        Cancel
    </a>
</div>

</form>
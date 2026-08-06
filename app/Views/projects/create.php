<?php 
// $customers = $this->model('Customer')->getAll();
$customers = $data['customers'];
echo "<p>Customers loaded: " . count($customers) . "</p>";
?>
<h2><i class="fas fa-plus-circle"></i> A New Project</h2>
<form method="POST">

    <!-- GENERAL INFO -->

<div class="row">

    <div class="col-md-6">
        <label>Customer *</label>
        <select name="customer_id" class="form-select" required>
            <option value="">Select Customer</option>
            <?php foreach($customers as $customer): ?>
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

<!-- ---------- PROJECT Classification ------------- -->

<div class="row mt-3">

    <div class="col-md-4">
        <label>Project Type *</label>
        <select name="project_type" id="projectType" class="form-select" required>
            <option value="">Select Type</option>
            <option value="construction">Construction</option>
            <option value="civil">Civil Engineering</option>
            <option value="electrical">Electrical</option>
            <option value="mep">MEP</option>
            <option value="maintenance">Maintenance</option>
            <option value="inspection">Inspection</option>
            <option value="consultancy">Consultancy</option>
        </select>
    </div>

    <div class="col-md-4">
        <label>Project Code</label>
        <input type="text" name="project_code" class="form-control">
    </div>

    <div class="col-md-4">
        <label>Contract Number</label>
        <input type="text" name="contract_number" class="form-control">
    </div>

</div>

<!-- ------Location + Management---------- -->

<div class="row mt-3">

    <div class="col-md-6">
        <label>Site Location</label>
        <input type="text" name="site_location" class="form-control">
    </div>

  <div class="col-md-6">

    <label>Project Manager</label>

    <select name="project_manager_id" class="form-select">

        <option value="">
            -- Select Project Manager --
        </option>

        <?php foreach($data['users'] as $user): ?>

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
        <label>Start Date</label>
        <input type="date" name="start_date" class="form-control">
    </div>

    <div class="col-md-4">
        <label>Deadline *</label>
        <input type="date" name="deadline" class="form-control" required>
    </div>

    <div class="col-md-4">
        <label>Priority</label>
        <select name="priority" class="form-select">
            <option value="low">Low</option>
            <option value="medium" selected>Medium</option>
            <option value="high">High</option>
            <option value="critical">Critical</option>
        </select>
    </div>

</div>
<!-- ----------Status + Budget-------------- -->

<div class="row mt-3">

    <div class="col-md-6">
        <label>Status *</label>
        <select name="status" class="form-select" required>
            <option value="planning">Planning</option>
            <option value="in_progress">In Progress</option>
            <option value="testing">Testing</option>
            <option value="completed">Completed</option>
            <option value="cancelled">Cancelled</option>
        </select>
    </div>

    <div class="col-md-6">
        <label>Budget (LYD)</label>
        <input type="number" name="budget" class="form-control" step="0.01">
    </div>

</div>

<!-- --------Description --------- -->
<div class="mt-3">
    <label>Description</label>
    <textarea name="description" class="form-control" rows="3"></textarea>
</div>

      <button type="submit" class="btn btn-primary btn-lg">
        <i class="fas fa-save"></i> Create Project
    </button>
    <a href="<?= URLROOT ?>/projects" class="btn btn-secondary btn-lg">Cancel</a>
</form>

<script>
// Toggle constructions / Elelctrical
const projectType =
    document.getElementById('projectType');

const electricalFields =
    document.getElementById('electricalFields');

const constructionFields =
    document.getElementById('constructionFields');

projectType.addEventListener('change', function() {

    electricalFields.style.display = 'none';
    constructionFields.style.display = 'none';

    if(this.value === 'electrical') {

        electricalFields.style.display = 'block';

    }

    if(
        this.value === 'construction' ||
        this.value === 'civil'
    ) {

        constructionFields.style.display = 'block';

    }

});

</script>
<h2><i class="fas fa-calendar-plus"></i> Schedule New Service</h2>
<form method="POST">
    <div class="row">
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label">Customer</label>
                <select name="customer_id" class="form-select">
                    <option value="">Select Customer</option>
                    <?php foreach($customers as $c): ?>
                    <option value="<?= $c->id ?>"><?= htmlspecialchars($c->company) ?> - <?= $c->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label">Project</label>
                <select name="project_id" class="form-select" required>
                    <option value="">---Select Project or Service---</option>
                    <?php foreach($projects as $p): ?>
                    <option value="<?= $p->id ?>"><?= htmlspecialchars($p->title) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                <label class="form-label">Technician</label>
                <select name="technician_id" class="form-select">
                    <option value="">Assign Later</option>
                    <?php foreach($technicians as $t): ?>
                    <option value="<?= $t->id ?>"><?= htmlspecialchars($t->name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Service Type <span class="text-danger">*</span></label>
                <select name="service_type" class="form-select" required>
                    <option>Annual Maintenance</option>
                    <option>Protection Relay Testing</option>
                    <option>Switchgear Inspection</option>
                    <option>Thermal Imaging</option>
                    <option>Installation Supervision</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Scheduled Date <span class="text-danger">*</span></label>
                <input type="date" name="scheduled_date" class="form-control" required>
            </div>
        </div>
    </div>
    
    <div class="mb-3">
        <label class="form-label">Status <span class="text-danger">*</span></label>
        <select name="status" class="form-select" required>
            <option value="scheduled">Scheduled</option>
            <option value="in_progress">In Progress</option>
            <option value="completed">Completed</option>
            <option value="cancelled">Cancelled</option>
        </select>
    </div>
    
    <div class="mb-3">
        <label class="form-label">Notes</label>
        <textarea name="notes" class="form-control" rows="3" placeholder="Thermal imaging, contact resistance testing..."></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary btn-lg">
        <i class="fas fa-calendar-check"></i> Schedule Service
    </button>
    <a href="<?= URLROOT ?>/services" class="btn btn-secondary btn-lg">Cancel</a>
</form>
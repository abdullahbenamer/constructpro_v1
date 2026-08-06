<?php if (isset($service) && $service) : ?>
    <div class="row">
        <div class="col-12">
            <h2><i class="fas fa-edit"></i> Edit Service #<?= $service->id ?></h2>
            <!-- Your existing form code stays EXACTLY the same -->
            <div class="row">
                <!-- <div class="col-12">
        <h2><i class="fas fa-edit"></i> Edit Service #<? //= $service->id 
                                                        ?></h2> -->
                <form method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Customer</label>
                                <select name="customer_id" class="form-select">
                                    <option value="">Select Customer</option>
                                    <?php foreach ($customers as $c) : ?>
                                        <option value="<?= $c->id ?>" <?= ($service->customer_id == $c->id) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($c->company) ?> - <?= $c->name ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Project</label>
                                <select name="project_id" class="form-select">
                                    <option value="">No Project</option>
                                    <?php foreach ($projects as $p) : ?>
                                        <option value="<?= $p->id ?>" <?= ($service->project_id == $p->id) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($p->title) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Technician</label>
                                <select name="technician_id" class="form-select">
                                    <option value="">Assign Later</option>
                                    <?php foreach ($technicians as $t) : ?>
                                        <option value="<?= $t->id ?>" <?= ($service->technician_id == $t->id) ? 'selected' : '' ?>>
                                            <?= htmlspecialchars($t->name) ?>
                                        </option>
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
                                    <option value="Annual Maintenance" <?= $service->service_type == 'Annual Maintenance' ? 'selected' : '' ?>>Annual Maintenance</option>
                                    <option value="Protection Relay Testing" <?= $service->service_type == 'Protection Relay Testing' ? 'selected' : '' ?>>Protection Relay Testing</option>
                                    <option value="Switchgear Inspection" <?= $service->service_type == 'Switchgear Inspection' ? 'selected' : '' ?>>Switchgear Inspection</option>
                                    <option value="Thermal Imaging" <?= $service->service_type == 'Thermal Imaging' ? 'selected' : '' ?>>Thermal Imaging</option>
                                    <option value="Installation Supervision" <?= $service->service_type == 'Installation Supervision' ? 'selected' : '' ?>>Installation Supervision</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Scheduled Date <span class="text-danger">*</span></label>
                                <input type="date" name="scheduled_date" value="<?= $service->scheduled_date ?>" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-select" required>
                            <option value="scheduled" <?= $service->status == 'scheduled' ? 'selected' : '' ?>>Scheduled</option>
                            <option value="in_progress" <?= $service->status == 'in_progress' ? 'selected' : '' ?>>In Progress</option>
                            <option value="completed" <?= $service->status == 'completed' ? 'selected' : '' ?>>Completed</option>
                            <option value="cancelled" <?= $service->status == 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Notes</label>
                        <textarea name="notes" class="form-control" rows="3"><?= htmlspecialchars($service->notes) ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fas fa-save"></i> Update Service
                    </button>
                    <a href="<?= URLROOT ?>/services" class="btn btn-secondary btn-lg">Cancel</a>
                </form>
            </div>
        </div>
    </div>

<?php else : ?>
    <div class="alert alert-danger">
        <h4>Service Not Found!</h4>
        <p>The service record no longer exists.</p>
        <a href="<?= URLROOT ?>/services" class="btn btn-primary">Back to Services</a>
    </div>
<?php endif; ?>
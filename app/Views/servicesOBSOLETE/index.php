<h2><i class="fas fa-tools"></i> Services & Maintenance (<?= count($services) ?>)</h2>
<a href="<?= URLROOT ?>/services/create" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Schedule Service
</a>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Service Type</th>
                <th>Customer</th>
                <th>Project</th>
                <th>Technician</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service) : ?>
                <tr>
                    <td><?= $service->id ?></td>
                    <td><?= htmlspecialchars($service->service_type) ?></td>
                    <td><?= htmlspecialchars($service->customer_name ?? 'N/A') ?></td>
                    <td><?= $service->project_id ? 'Project #' . $service->project_id : 'N/A' ?></td>
                    <td>

                        <?php if (!empty($service->technician_id)) : ?>

                            <a href="<?= URLROOT ?>/technicians/details/<?= $service->technician_id ?>">

                                <?= htmlspecialchars($service->technician_name ?? 'TBD') ?>

                            </a>

                        <?php else : ?>

                            TBD

                        <?php endif; ?>

                    </td>
                    <td><?= date('M j, Y', strtotime($service->scheduled_date)) ?></td>
                    <td>
                        <span class="badge bg-<?= $service->status == 'scheduled' ? 'warning' : ($service->status == 'in_progress' ? 'info' : 'success') ?>">
                            <?= ucfirst($service->status) ?>
                        </span>
                    </td>
                    <td>
                        <a href="<?= URLROOT ?>/services/edit/<?= $service->id ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= URLROOT ?>/services/delete/<?= $service->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Cancel service?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
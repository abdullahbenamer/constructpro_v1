<h2 class="mb-4">
    <i class="fas fa-building me-2"></i>
    <?= htmlspecialchars($supplier->company_name) ?>
</h2>


<!-- SUPPLIER INFORMATION -->
<div class="card shadow-sm mb-4">

    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-address-card me-2"></i>
            <?= __('supplier_information') ?>
        </h5>
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-6 mb-3">

                <div class="text-muted small">
                    <?= __('contact') ?>
                </div>

                <div class="fw-semibold">
                    <?= htmlspecialchars($supplier->contact_person) ?>
                </div>

            </div>


            <div class="col-md-6 mb-3">

                <div class="text-muted small">
                    <?= __('phone') ?>
                </div>

                <div class="fw-semibold">
                    <?= htmlspecialchars($supplier->phone) ?>
                </div>

            </div>


            <div class="col-md-6 mb-3">

                <div class="text-muted small">
                    <?= __('email') ?>
                </div>

                <div class="fw-semibold">
                    <?= htmlspecialchars($supplier->email) ?>
                </div>

            </div>


            <div class="col-md-6 mb-3">

                <div class="text-muted small">
                    <?= __('address') ?>
                </div>

                <div class="fw-semibold">
                    <?= htmlspecialchars($supplier->address) ?>
                </div>

            </div>

        </div>

    </div>

</div>


<!-- PROCUREMENT SUMMARY -->
<div class="row g-3 mb-4">


    <!-- TOTAL PURCHASE ORDERS -->
    <div class="col-md-4">

        <div class="card h-100 shadow-sm border-primary">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <div class="text-muted small mb-1">
                            <?= __('total_purchase_orders') ?>
                        </div>

                        <h3 class="mb-0 text-primary">
                            <?= number_format($total_purchases ?? 0, 2) ?>
                        </h3>

                    </div>

                    <div class="fs-1 text-primary">
                        <i class="fas fa-file-invoice"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- TOTAL GOODS RECEIVED -->
    <div class="col-md-4">

        <div class="card h-100 shadow-sm border-success">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <div class="text-muted small mb-1">
                            <?= __('total_goods_received') ?>
                        </div>

                        <h3 class="mb-0 text-success">
                            <?= number_format($total_goods_received ?? 0, 2) ?>
                        </h3>

                    </div>

                    <div class="fs-1 text-success">
                        <i class="fas fa-boxes"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- TOTAL PAID -->
    <div class="col-md-4">

        <div class="card h-100 shadow-sm border-warning">

            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center">

                    <div>

                        <div class="text-muted small mb-1">
                            <?= __('total_paid') ?>
                        </div>

                        <h3 class="mb-0 text-warning">
                            <?= number_format($total_paid ?? 0, 2) ?>
                        </h3>

                    </div>

                    <div class="fs-1 text-warning">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- PURCHASE ORDERS -->
<div class="card shadow-sm">

    <div class="card-header d-flex justify-content-between align-items-center">

        <h5 class="mb-0">
            <i class="fas fa-file-invoice me-2"></i>
            <?= __('purchase_orders') ?>
        </h5>

        <span class="badge bg-secondary">
            <?= count($purchase_orders) ?>
        </span>

    </div>


    <div class="card-body p-0">

        <div class="table-responsive">

            <table class="table table-bordered table-striped mb-0">

                <thead>

                    <tr>

                        <th>
                            <?= __('po_number') ?>
                        </th>

                        <th>
                            <?= __('status') ?>
                        </th>

                        <th>
                            <?= __('total') ?>
                        </th>

                        <th>
                            <?= __('date') ?>
                        </th>

                    </tr>

                </thead>


                <tbody>

                    <?php if (!empty($purchase_orders)): ?>

                        <?php foreach ($purchase_orders as $po): ?>

                            <tr>

                                <td class="fw-semibold">
                                    <?= htmlspecialchars($po->po_number) ?>
                                </td>

                                <td>
                                    <span class="badge bg-secondary">
                                        <?= htmlspecialchars($po->status) ?>
                                    </span>
                                </td>

                                <td>
                                    <?= number_format($po->total_amount, 2) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($po->created_at) ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>

                            <td colspan="4" class="text-center text-muted py-4">

                                <i class="fas fa-inbox fa-2x mb-2"></i>

                                <div>
                                    <?= __('no_purchase_orders_found') ?>
                                </div>

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>
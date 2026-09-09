<h2>
    <?= __('purchase_order_details') ?>
</h2>

<div class="card mb-4">

    <div class="card-body">

        <div class="row">

            <div class="col-md-6">

                <p>
                    <strong><?= __('po_number') ?>:</strong>
                    <?= htmlspecialchars($po->po_number) ?>
                </p>

                <p>
                    <strong><?= __('supplier') ?>:</strong>
                    <?= htmlspecialchars($po->supplier_name) ?>
                </p>

                <p>
                    <strong><?= __('status') ?>:</strong>

                    <?php if ($po->status === 'draft'): ?>

                        <span class="badge bg-secondary">
                            <?= __('draft') ?>
                        </span>

                    <?php elseif ($po->status === 'approved'): ?>

                        <span class="badge bg-success">
                            <?= __('approved') ?>
                        </span>

                    <?php elseif ($po->status === 'partially_received'): ?>

                        <span class="badge bg-warning text-dark">
                            <?= __('partially_received') ?>
                        </span>

                    <?php elseif ($po->status === 'received'): ?>

                        <span class="badge bg-primary">
                            <?= __('received') ?>
                        </span>

                    <?php else: ?>

                        <span class="badge bg-dark">
                            <?= htmlspecialchars($po->status) ?>
                        </span>

                    <?php endif; ?>

                </p>

            </div>


            <div class="col-md-6">

                <p>
                    <strong><?= __('order_date') ?>:</strong>
                    <?= $po->order_date ?>
                </p>

                <p>
                    <strong><?= __('expected_date') ?>:</strong>

                    <span class="bg-primary text-white px-2 py-1 rounded">

                        <?= $po->expected_date ?>

                    </span>

                </p>

                <p>
                    <strong><?= __('created') ?>:</strong>
                    <?= $po->created_at ?>
                </p>

            </div>

        </div>


        <?php if (!empty($po->notes)): ?>

            <hr>

            <p>

                <strong><?= __('notes') ?>:</strong><br>

                <?= nl2br(htmlspecialchars($po->notes)) ?>

            </p>

        <?php endif; ?>

    </div>

</div>


<!-- DELIVERY / SHIP TO -->

<div class="card shadow-sm mb-4">

    <div class="card-header bg-white">

        <strong>

            <i class="fas fa-truck"></i>

            <?= __('delivery_ship_to') ?>

        </strong>

    </div>


    <div class="card-body">

        <?php if ($po->delivery_method === 'DIRECT_TO_PROJECT_SITE'): ?>

            <div class="row">

                <!-- PROJECT -->

                <div class="col-md-6 mb-3">

                    <strong>
                        <?= __('project') ?>
                    </strong>

                    <div>

                        <?= htmlspecialchars(
                            $po->project_name ?? '-'
                        ) ?>

                    </div>

                </div>


                <!-- DELIVERY METHOD -->

                <div class="col-md-6 mb-3">

                    <strong>
                        <?= __('delivery_method') ?>
                    </strong>

                    <div>

                        <span class="badge bg-info text-dark">

                            <i class="fas fa-truck"></i>

                            <?= __('direct_to_project_site') ?>

                        </span>

                    </div>

                </div>


                <!-- SITE LOCATION -->

                <div class="col-md-12 mb-3">

                    <strong>
                        <?= __('delivery_location') ?>
                    </strong>

                    <div class="border rounded p-3 bg-light">

                        <?= nl2br(
                            htmlspecialchars(
                                $po->project_site_location ?? '-'
                            )
                        ) ?>

                    </div>

                </div>


                <!-- PROJECT MANAGER -->

                <div class="col-md-6 mb-3">

                    <strong>
                        <?= __('site_contact') ?>
                    </strong>

                    <div>

                        <?= htmlspecialchars(
                            $po->project_manager_name ?? '-'
                        ) ?>

                    </div>

                </div>


                <!-- PM MOBILE -->

                <div class="col-md-6 mb-3">

                    <strong>
                        <?= __('contact_number') ?>
                    </strong>

                    <div>

                        <?= htmlspecialchars(
                            $po->project_manager_mobile ?? '-'
                        ) ?>

                    </div>

                </div>

            </div>


        <?php elseif ($po->delivery_method === 'WAREHOUSE'): ?>

            <div class="row">

                <!-- WAREHOUSE -->

                <div class="col-md-6 mb-3">

                    <strong>
                        <?= __('warehouse') ?>
                    </strong>

                    <div>

                        <?= htmlspecialchars(
                            $po->target_warehouse_code ?? ''
                        ) ?>

                        <?php if (!empty($po->target_warehouse_name)): ?>

                            -

                            <?= htmlspecialchars(
                                $po->target_warehouse_name
                            ) ?>

                        <?php endif; ?>

                    </div>

                </div>


                <!-- DELIVERY METHOD -->

                <div class="col-md-6 mb-3">

                    <strong>
                        <?= __('delivery_method') ?>
                    </strong>

                    <div>

                        <span class="badge bg-primary">

                            <i class="fas fa-warehouse"></i>

                            <?= __('warehouse') ?>

                        </span>

                    </div>

                </div>


                <!-- ADDRESS -->

                <div class="col-md-12 mb-3">

                    <strong>
                        <?= __('delivery_location') ?>
                    </strong>

                    <div class="border rounded p-3 bg-light">

                        <?= nl2br(
                            htmlspecialchars(
                                $po->target_warehouse_address ?? '-'
                            )
                        ) ?>

                    </div>

                </div>


                <!-- WAREHOUSE PHONE -->

                <div class="col-md-6 mb-3">

                    <strong>
                        <?= __('warehouse_contact_number') ?>
                    </strong>

                    <div>

                        <?= htmlspecialchars(
                            $po->target_warehouse_mobile ?? '-'
                        ) ?>

                    </div>

                </div>


                <!-- STOREKEEPER -->

                <div class="col-md-6 mb-3">

                    <strong>
                        <?= __('storekeeper') ?>
                    </strong>

                    <div>

                        <?= htmlspecialchars(
                            $po->storekeeper_name ?? '-'
                        ) ?>

                        <?php if (!empty($po->storekeeper_mobile)): ?>

                            <br>

                            <small class="text-muted">

                                <?= htmlspecialchars(
                                    $po->storekeeper_mobile
                                ) ?>

                            </small>

                        <?php endif; ?>

                    </div>

                </div>

            </div>


        <?php else: ?>

            <div class="text-muted">

                <?= __('delivery_information_not_specified') ?>

            </div>

        <?php endif; ?>

    </div>

</div>


<div class="mb-3">

    <a
        href="<?= URLROOT ?>/purchaseorders"
        class="btn btn-secondary">

        <?= __('back') ?>

    </a>


    <a
        href="<?= URLROOT ?>/purchaseorders/itemsPage/<?= $po->id ?>"
        class="btn btn-primary">

        <?= __('manage_items') ?>

    </a>


    <?php if ($po->status === 'draft' && !empty($items)): ?>

        <a
            href="<?= URLROOT ?>/purchaseorders/approve/<?= $po->id ?>"
            class="btn btn-success"
            onclick="return confirm('<?= htmlspecialchars(
                __('approve_purchase_order_confirm'),
                ENT_QUOTES,
                'UTF-8'
            ) ?>')">

            <?= __('approve_purchase_order') ?>

        </a>

    <?php endif; ?>


    <!-- Print PO -->

    <?php if (
        in_array(
            $po->status,
            ['approved', 'partial', 'received'],
            true
        )
    ): ?>

        <a
            href="<?= URLROOT ?>/purchaseorders/print/<?= $po->id ?>"
            class="btn btn-dark"
            target="_blank">

            <i class="fas fa-print"></i>

            <?= __('print_po') ?>

        </a>

    <?php endif; ?>

</div>


<h4>
    <?= __('purchase_order_items') ?>
</h4>


<table class="table table-striped">

    <thead class="table-light">

        <tr>

            <th>
                <?= __('item') ?>
            </th>

            <th>
                <?= __('sku') ?>
            </th>

            <th width="120">
                <?= __('qty') ?>
            </th>

            <th width="150">
                <?= __('unit_cost') ?>
            </th>

            <th width="150">
                <?= __('total') ?>
            </th>

        </tr>

    </thead>


    <tbody>

        <?php if (!empty($items)): ?>

            <?php foreach ($items as $item): ?>

                <tr>

                    <td>
                        <?= htmlspecialchars($item->name) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($item->sku) ?>
                    </td>

                    <td>
                        <?= number_format(
                            $item->quantity,
                            2
                        ) ?>
                    </td>

                    <td>
                        <?= number_format(
                            $item->unit_cost,
                            2
                        ) ?>
                    </td>

                    <td>

                        <?= number_format(
                            $item->quantity * $item->unit_cost,
                            2
                        ) ?>

                    </td>

                </tr>

            <?php endforeach; ?>

        <?php else: ?>

            <tr>

                <td
                    colspan="5"
                    class="text-center text-muted">

                    <?= __('no_items_added_yet') ?>

                </td>

            </tr>

        <?php endif; ?>

    </tbody>


    <tfoot>

        <tr>

            <th colspan="3" class="text-end">

                <?= __('grand_total') ?>

            </th>

            <th>

                <?= number_format(
                    $po->total_amount,
                    2
                ) ?>

            </th>

        </tr>

    </tfoot>

</table>
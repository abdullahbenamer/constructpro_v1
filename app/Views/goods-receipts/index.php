<?php

/**
 * Goods Receipts (GRN) List
 */
?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="mb-0">
            <?= __('goods_receipts') ?>
        </h2>


        <!-- ---------------------- -->

        <!-- <?php //if (AuthHelper::canView('inventory_movements.create')) : ?>
            <a class="dropdown-item"
                href="<?//= URLROOT ?>/inventory-movements/receive" class="btn btn-primary">
                <i class="fas fa-truck-loading"></i>
                <?//= __('receive_stock_from_po') ?>
            </a>
        <?php //endif; ?> -->

        <!-- ------------------------ -->


        <a
             href="<?= URLROOT ?>/inventory-movements/receive"
            class="btn btn-primary"
        >
                <i class="fas fa-truck-loading"></i>
            <?= __('receive_stock') 
            ?>
        </a>

    </div>


    <div class="card">

        <div class="card-body">

            <?php if (!empty($goodsReceipts)): ?>

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">

                        <thead>

                            <tr>

                                <th>
                                    <?= __('grn_number') ?>
                                </th>

                                <th>
                                    <?= __('receipt_date') ?>
                                </th>

                                <th>
                                    <?= __('po_number') ?>
                                </th>

                                <th>
                                    <?= __('supplier') ?>
                                </th>

                                <th class="text-end">
                                    <?= __('total_amount') ?>
                                </th>

                                <th class="text-center">
                                    <?= __('actions') ?>
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php foreach ($goodsReceipts as $grn): ?>

                                <tr>

                                    <!-- GRN Number -->
                                    <td>
                                        <strong>
                                            <?= htmlspecialchars(
                                                $grn->grn_number ?? '-'
                                            ) ?>
                                        </strong>
                                    </td>


                                    <!-- Receipt Date -->
                                    <td>
                                        <?= htmlspecialchars(
                                            $grn->receipt_date ?? '-'
                                        ) ?>
                                    </td>


                                    <!-- PO Number -->
                                    <td>
                                        <span dir="ltr">
                                            <?= htmlspecialchars(
                                                $grn->po_number ?? '-'
                                            ) ?>
                                        </span>
                                    </td>


                                    <!-- Supplier -->
                                    <td>
                                        <?= htmlspecialchars(
                                            $grn->supplier_name ?? '-'
                                        ) ?>
                                    </td>


                                    <!-- Total -->
                                    <td class="text-end">
                                        <?= number_format(
                                            (float)(
                                                $grn->total_amount ?? 0
                                            ),
                                            2
                                        ) ?>
                                    </td>


                                    <!-- Actions -->
                                    <td class="text-center">

                                        <a
                                            href="<?= URLROOT ?>/goodsreceipts/print/<?= (int)$grn->id ?>"
                                            target="_blank"
                                            class="btn btn-sm btn-primary"
                                            title="<?= __('print') ?>">
                                            <i class="fas fa-print"></i>
                                            <?= __('print') ?>
                                        </a>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            <?php else: ?>

                <div class="alert alert-info mb-0">
                    <?= __('no_goods_receipts_found') ?>
                </div>

            <?php endif; ?>

        </div>

    </div>

</div>
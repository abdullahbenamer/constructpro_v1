<style>
    /* Inventory Movement Report */
    .inventory-movement-table {
        table-layout: auto;
        width: 100%;
    }

    /* DATE */
    .inventory-movement-table .col-date {
        white-space: nowrap;
        width: 105px;
        min-width: 105px;
        max-width: 105px;
    }

    /* ITEM */
    .inventory-movement-table .col-item {
        min-width: 180px;
        white-space: normal;
    }

    /* USER */
    .inventory-movement-table .col-user {
        white-space: nowrap;
    }
</style>


<h2>
    <i class="fas fa-exchange-alt"></i>
    <?= __('inventory_movements') ?>
</h2>


<div class="table-responsive">

    <table class="table table-striped table-bordered inventory-movement-table">

     <thead>

    <!-- MAIN HEADER ROW -->
    <tr>

        <th rowspan="2" class="col-date">
            <?= __('date') ?>
        </th>

        <th rowspan="2" class="col-item">
            <?= __('item') ?>
        </th>

        <th rowspan="2" class="col-user">
            <?= __('user') ?>
        </th>

        <th rowspan="2">
            <?= __('type') ?>
        </th>

        <th rowspan="2">
            <?= __('qty') ?>
        </th>

        <th rowspan="2">
            <?= __('source_location') ?>
        </th>

        <!-- GROUPED HEADER -->
        <th colspan="2" class="text-center">
            <?= __('balance_after') ?>
        </th>

        <th rowspan="2">
            <?= __('reference') ?>
        </th>

        <th rowspan="2">
            <?= __('notes') ?>
        </th>

    </tr>


    <!-- SECOND HEADER ROW -->
    <tr>

        <th class="text-center">
            <?= __('wh') ?>
        </th>

        <th class="text-center">
            <?= __('global') ?>
        </th>

    </tr>

</thead>


        <tbody>

            <?php foreach ($movements as $move) : ?>

                <tr>

                    <!-- DATE -->
                    <td class="col-date">
                        <?= date('Y-m-d', strtotime($move->created_at)) ?>
                    </td>


                    <!-- ITEM -->
                    <td class="col-item">
                        <?= htmlspecialchars($move->item_name ?? 'Unknown') ?>
                    </td>


                    <!-- USER -->
                    <td class="col-user">
                        <?= htmlspecialchars($move->user_name ?? 'System') ?>
                    </td>


                    <!-- TYPE -->
                    <td>
    <?php if ($move->type == 'IN') : ?>

        <span class="badge bg-success">
            <?= __('in') ?>
        </span>

    <?php elseif ($move->type == 'OUT') : ?>

        <span class="badge bg-danger">
            <?= __('out') ?>
        </span>

    <?php else : ?>

        <span class="badge bg-warning text-dark">
            <?= __('adjustment') ?>
        </span>

    <?php endif; ?>
</td>















                    <!-- QUANTITY -->
                    <td>
                        <?= number_format($move->quantity, 2) ?>
                    </td>


                    <!-- SOURCE LOCATION -->
                    <td>

                        <?php if (!empty($move->location_code)) : ?>

                            <span class="badge bg-secondary">
                                <?= htmlspecialchars($move->location_code) ?>
                            </span>

                            <?php if (!empty($move->location_name)) : ?>

                                <br>

                                <small>
                                    <?= htmlspecialchars($move->location_name) ?>
                                </small>

                            <?php endif; ?>

                        <?php else : ?>

                            <span class="text-muted">
                                <?= __('n_a') ?>
                            </span>

                        <?php endif; ?>

                    </td>


                    <!-- WAREHOUSE BALANCE AFTER -->
                    <td>
                        <?= number_format($move->balance_after, 2) ?>
                    </td>


                    <!-- GLOBAL BALANCE AFTER -->
                    <td>
                        <?= number_format($move->global_balance_after, 2) ?>
                    </td>


                    <!-- REFERENCE -->
                    <td>
                        <?= htmlspecialchars($move->reference ?? '-') ?>
                    </td>

<!-- NOTES -->
<td>

    <?php
    $notes = trim($move->notes ?? '');

    $noteTranslations = [
        'DAMAGED' => 'damaged',
        'BROKEN' => 'broken',
        'LOST' => 'lost',
        'FOUND' => 'found',
        'PHYSICAL_COUNT_CORRECTION' => 'physical_count_correction',
        'EXPIRED' => 'expired',
        'OTHER' => 'other',

        'Warehouse Transfer' => 'warehouse_transfer',
        'Reservation Fulfillment' => 'reservation_fulfillment',
        'Resource requisition fulfillment' => 'resource_requisition_fulfillment',
        'Return to supplier' => 'return_to_supplier'
    ];

    $displayNotes = $notes;

    foreach ($noteTranslations as $text => $translationKey) {

        if (stripos($notes, $text) === 0) {

            $remaining = trim(substr($notes, strlen($text)));

            $displayNotes = __($translationKey);

            if ($remaining !== '') {
                $displayNotes .= ' ' . $remaining;
            }

            break;
        }
    }
    ?>

    <?= htmlspecialchars($displayNotes ?: '-') ?>

</td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>
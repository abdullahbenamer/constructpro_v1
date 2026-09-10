<h2>
    <?= __('transfer_inventory') ?>
</h2>

<a href="<?= URLROOT ?>/inventorytransfers/create"
   class="btn btn-primary mb-3">

    <?= __('new_transfer') ?>

</a>


<table class="table table-striped">

    <thead>

        <tr>

            <th><?= __('date') ?></th>
            <th><?= __('item') ?></th>
            <th><?= __('sku') ?></th>
            <th><?= __('from') ?></th>
            <th><?= __('to') ?></th>
            <th><?= __('qty') ?></th>
            <th><?= __('reference') ?></th>
            <th><?= __('status') ?></th>
            <th><?= __('actions') ?></th>

        </tr>

    </thead>


    <tbody>

<?php if (!empty($transfers)): ?>

    <?php

    /*
    |--------------------------------------------------------------------------
    | IDENTIFY SYSTEM-GENERATED REVERSAL TRANSFERS
    |--------------------------------------------------------------------------
    |
    | The original transfer contains:
    |
    |     reversal_transfer_id
    |
    | pointing to the generated reversal transfer.
    |
    | Therefore, if a transfer ID appears in this list, it is a REVERSAL.
    |
    */

    $reversalTransferIds = [];

    foreach ($transfers as $row) {

        if (!empty($row->reversal_transfer_id)) {

            $reversalTransferIds[] =
                (int) $row->reversal_transfer_id;

        }

    }

    ?>


    <?php foreach ($transfers as $t): ?>

        <?php

        $isReversal = in_array(
            (int) $t->id,
            $reversalTransferIds,
            true
        );

        $isReversed =
            ($t->status ?? '') === 'REVERSED';

        ?>


        <tr>

            <!-- DATE -->

            <td>
                <?= htmlspecialchars(
                    $t->created_at ?? ''
                ) ?>
            </td>


            <!-- ITEM -->

            <td>
                <?= htmlspecialchars(
                    $t->item_name ?? ''
                ) ?>
            </td>


            <!-- SKU -->

            <td>
                <?= htmlspecialchars(
                    $t->item_sku ?? ''
                ) ?>
            </td>


            <!-- FROM -->

            <td>

                <span class="badge bg-secondary">

                    <?= htmlspecialchars(
                        $t->from_code ?? ''
                    ) ?>

                </span>

                <br>

                <small>

                    <?= htmlspecialchars(
                        $t->from_name ?? ''
                    ) ?>

                </small>

            </td>


            <!-- TO -->

            <td>

                <span class="badge bg-secondary">

                    <?= htmlspecialchars(
                        $t->to_code ?? ''
                    ) ?>

                </span>

                <br>

                <small>

                    <?= htmlspecialchars(
                        $t->to_name ?? ''
                    ) ?>

                </small>

            </td>


            <!-- QUANTITY -->

            <td>

                <strong>

                    <?= htmlspecialchars(
                        $t->quantity ?? '0'
                    ) ?>

                </strong>

            </td>


            <!-- REFERENCE -->

            <td>

                <?= htmlspecialchars(
                    $t->reference ?? ''
                ) ?>

            </td>


            <!-- STATUS -->

            <td>

                <?php if ($isReversal): ?>

                    <span class="badge bg-info">

                        <i class="fas fa-undo"></i>

                        <?= __('reversal') ?>

                    </span>

                <?php elseif ($isReversed): ?>

                    <span class="badge bg-danger">

                        <i class="fas fa-ban"></i>

                        <?= __('reversed') ?>

                    </span>

                <?php else: ?>

                    <span class="badge bg-success">

                        <i class="fas fa-check"></i>

                        <?= __('completed') ?>

                    </span>

                <?php endif; ?>

            </td>


            <!-- ACTIONS -->

            <td class="text-nowrap">

                <!--
                <a href="<?= URLROOT ?>/inventorytransfers/view/<?= $t->id ?>"
                   class="btn btn-sm btn-info">

                    <i class="fas fa-eye"></i>
                    <?= __('view') ?>

                </a>
                -->


                <?php if (
                    !$isReversal &&
                    !$isReversed &&
                    ($t->status ?? '') === 'COMPLETED'
                ): ?>

                    <a href="<?= URLROOT ?>/inventorytransfers/reverse/<?= $t->id ?>"
                       class="btn btn-sm btn-warning"
                       onclick="return confirm(
                           '<?= __('reverse_transfer_confirm') ?>'
                       )">

                        <i class="fas fa-undo"></i>

                        <?= __('reverse') ?>

                    </a>

                <?php endif; ?>

            </td>

        </tr>

    <?php endforeach; ?>


<?php else: ?>

    <tr>

        <td colspan="9"
            class="text-center py-5">

            <i class="fas fa-exchange-alt fa-3x text-muted mb-3"></i>

            <h5 class="text-muted">

                <?= __('no_inventory_transfers_found') ?>

            </h5>

            <p class="text-muted mb-3">

                <?= __('no_inventory_transfer_records') ?>

            </p>

            <a href="<?= URLROOT ?>/inventorytransfers/create"
               class="btn btn-primary">

                <i class="fas fa-plus"></i>

                <?= __('create_first_transfer') ?>

            </a>

        </td>

    </tr>

<?php endif; ?>

    </tbody>

</table>
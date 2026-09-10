<div class="container-fluid">

    <!-- PAGE HEADER -->

    <div class="mb-4">

        <h2>
            <?= __('resource_fulfillment') ?>
        </h2>

        <p class="text-muted mb-0">

            <?= __('requisition') ?>:

            <strong>
                <?= htmlspecialchars(
                    $data['requisition']->requisition_no ?? ''
                ) ?>
            </strong>

        </p>

    </div>


    <!-- FULFILLMENT FORM -->

    <form
        method="POST"
        action="<?= URLROOT ?>/ResourceRequisitionFulfillments/storeResource">

        <input
            type="hidden"
            name="requisition_id"
            value="<?= $requisition->id ?>">

        <!-- GENERAL REMARKS -->

        <div class="card mb-4">

            <div class="card-body">

                <div class="row">

                    <div class="col-md-12">

                        <label class="form-label">

                            <?= __('fulfillment_remarks') ?>

                        </label>

                        <textarea
                            name="remarks"
                            class="form-control"
                            rows="3"
                            placeholder="<?= __('enter_fulfillment_remarks') ?>"></textarea>

                    </div>

                </div>

            </div>

        </div>


        <!-- RESOURCE ITEMS -->

        <div class="card">

            <div class="card-header bg-primary text-white">

                <strong>
                    <?= __('resource_items_to_fulfill') ?>
                </strong>

            </div>


            <div class="table-responsive">

                <table class="table table-bordered mb-0 align-middle">

                    <thead>

                        <tr>

                            <th>
                                <?= __('resource') ?>
                            </th>

                            <th>
                                <?= __('type') ?>
                            </th>

                            <th>
                                <?= __('uom') ?>
                            </th>

                            <th class="text-end">
                                <?= __('requested') ?>
                            </th>

                            <th class="text-end">
                                <?= __('previously_fulfilled') ?>
                            </th>

                            <th class="text-end">
                                <?= __('remaining') ?>
                            </th>

                            <th style="min-width: 160px;">
                                <?= __('quantity_to_fulfill') ?>
                            </th>

                            <th style="min-width: 160px;">
                                <?= __('actual_unit_cost') ?>
                            </th>

                            <th style="min-width: 220px;">
                                <?= __('remarks') ?>
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        <?php foreach ($data['items'] as $item): ?>

                            <tr>

                                <!-- RESOURCE -->

                                <td>

                                    <strong>

                                        <?= htmlspecialchars(
                                            $item->resource_name
                                        ) ?>

                                    </strong>


                                    <?php if (
                                        !empty($item->resource_code)
                                    ): ?>

                                        <br>

                                        <small class="text-muted">

                                            <?= htmlspecialchars(
                                                $item->resource_code
                                            ) ?>

                                        </small>

                                    <?php endif; ?>


                                    <input
                                        type="hidden"
                                        name="items[<?= (int) $item->id ?>][resource_id]"
                                        value="<?= (int) $item->resource_id ?>">

                                </td>


                                <!-- TYPE -->

                                <td>

                                    <span class="badge bg-secondary">

                                        <?= htmlspecialchars(
                                            $item->resource_type
                                        ) ?>

                                    </span>

                                </td>


                                <!-- UOM -->

                                <td>

                                    <?= htmlspecialchars(
                                        $item->uom
                                    ) ?>

                                </td>


                                <!-- REQUESTED -->

                                <td class="text-end">

                                    <?= number_format(
                                        (float) $item->quantity,
                                        2
                                    ) ?>

                                </td>


                                <!-- PREVIOUSLY FULFILLED -->

                                <td class="text-end">

                                    <?= number_format(
                                        (float) $item->fulfilled_quantity,
                                        2
                                    ) ?>

                                </td>


                                <!-- REMAINING -->

                                <td class="text-end fw-bold text-primary">

                                    <?= number_format(
                                        (float) $item->remaining_quantity,
                                        2
                                    ) ?>

                                </td>


                                <!-- QUANTITY TO FULFILL -->

                                <td>

                                    <input
                                        type="number"
                                        class="form-control text-end fulfillment-qty"
                                        name="items[<?= (int) $item->id ?>][quantity]"
                                        min="0"
                                        max="<?= (float) $item->remaining_quantity ?>"
                                        step="0.01"
                                        value="0"
                                        data-remaining="<?= (float) $item->remaining_quantity ?>">

                                </td>


                                <!-- ACTUAL UNIT COST -->

                                <td>

                                    <input
                                        type="number"
                                        class="form-control text-end"
                                        name="items[<?= (int) $item->id ?>][unit_cost]"
                                        min="0"
                                        step="0.01"
                                        value="<?= number_format(
                                            (float) $item->estimated_unit_cost,
                                            2,
                                            '.',
                                            ''
                                        ) ?>">

                                </td>


                                <!-- ITEM REMARKS -->

                                <td>

                                    <input
                                        type="text"
                                        class="form-control"
                                        name="items[<?= (int) $item->id ?>][remarks]"
                                        placeholder="<?= __('optional_remarks') ?>">

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>


            <!-- ACTIONS -->

            <div class="card-footer d-flex justify-content-between">

                <a
                    href="<?= URLROOT ?>/ResourceRequisitions/details/<?= (int) $data['requisition']->id ?>"
                    class="btn btn-secondary">

                    <i class="fa fa-times"></i>

                    <?= __('cancel') ?>

                </a>


                <button
                    type="submit"
                    class="btn btn-primary">

                    <i class="fa fa-check-circle"></i>

                    <?= __('process_resource_fulfillment') ?>

                </button>

            </div>

        </div>

    </form>

</div>


<script>
    document
        .querySelectorAll('.fulfillment-qty')
        .forEach(function(input) {

            input.addEventListener(
                'input',
                function() {

                    const remaining =
                        parseFloat(
                            this.dataset.remaining
                        ) || 0;


                    const quantity =
                        parseFloat(
                            this.value
                        ) || 0;


                    if (quantity > remaining) {

                        alert(
                            '<?= __('quantity_exceeds_remaining') ?>'
                        );


                        this.value =
                            remaining;

                    }


                    if (quantity < 0) {

                        this.value = 0;

                    }

                }
            );

        });
</script>
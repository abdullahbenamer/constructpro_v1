<h2>
    <?= __('purchase_order_items') ?>
</h2>

<div class="card mb-4">

    <div class="card-body">

        <h5>
            <?= __('po') ?>:
            <?= htmlspecialchars($po->po_number) ?>
        </h5>

        <form method="POST"
            action="<?= URLROOT ?>/purchaseorders/addItem/<?= $po->id ?>">

            <div class="row">

                <div class="col-md-5 mb-3">

                    <label>
                        <?= __('inventory_item') ?>
                    </label>

                    <select
                        name="inventory_id"
                        class="form-select"
                        required>

                        <option value="">
                            <?= __('select_item') ?>
                        </option>

                        <?php foreach ($inventory as $item): ?>

                            <option value="<?= $item->id ?>">

                                <?= htmlspecialchars($item->name) ?>

                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>


                <div class="col-md-2 mb-3">

                    <label>
                        <?= __('quantity') ?>
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        min="0.01"
                        name="quantity"
                        class="form-control"
                        required>

                </div>


                <div class="col-md-2 mb-3">

                    <label>
                        <?= __('unit_cost') ?>
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        min="0"
                        name="unit_cost"
                        class="form-control"
                        required>

                </div>


                <div class="col-md-3 mb-3 d-flex align-items-end">

                    <button class="btn btn-success w-100">

                        <i class="fas fa-plus"></i>

                        <?= __('add_item') ?>

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>


<table class="table table-bordered table-striped">

    <thead>

        <tr>

            <th>#</th>

            <th><?= __('item') ?></th>

            <th><?= __('sku') ?></th>

            <th><?= __('qty') ?></th>

            <th><?= __('unit_cost') ?></th>

            <th><?= __('total') ?></th>

            <th><?= __('qty_received') ?></th>

            <th width="120"><?= __('actions') ?></th>

        </tr>

    </thead>


    <tbody>

        <?php foreach ($items as $row): ?>

            <!-- <pre><?php //print_r($row); 
                        ?></pre> -->

            <tr>

                <td>
                    <?= $row->id ?>
                </td>

                <td>
                    <?= htmlspecialchars($row->name) ?>
                </td>

                <td>
                    <?= htmlspecialchars($row->sku) ?>
                </td>

                <td>
                    <?= $row->quantity ?>
                    <?= htmlspecialchars($row->unit_name) ?>

                </td>

                <td>
                    <?= number_format(
                        $row->unit_cost,
                        2
                    ) ?>
                </td>

                <td>

                    <?= number_format(
                        $row->quantity * $row->unit_cost,
                        2
                    ) ?>

                </td>

                <td>
                    <?= $row->received_quantity ?>
                </td>

                <td>

                    <a
                        href="<?= URLROOT ?>/purchaseorders/deleteItem/<?= $row->id ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('<?= htmlspecialchars(
                                                        __('delete_item_confirm'),
                                                        ENT_QUOTES,
                                                        'UTF-8'
                                                    ) ?>')">

                        <?= __('delete') ?>

                    </a>

                </td>

            </tr>

        <?php endforeach; ?>

    </tbody>

</table>


<a
    href="<?= URLROOT ?>/purchaseorders"
    class="btn btn-secondary">

    <?= __('back') ?>

</a>
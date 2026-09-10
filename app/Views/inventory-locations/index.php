<h2><?= __('inventory_locations') ?></h2>

<a href="<?= URLROOT ?>/inventorylocations/create"
   class="btn btn-primary mb-3">

    <?= __('add_location') ?>

</a>

<table class="table table-striped">

    <thead>

        <tr>

            <th><?= __('id') ?></th>
            <th><?= __('code') ?></th>
            <th><?= __('warehouse') ?></th>
            <th><?= __('address_location') ?></th>
            <th><?= __('storekeeper') ?></th>
            <th><?= __('mobile_number') ?></th>
            <th><?= __('actions') ?></th>

        </tr>

    </thead>

    <tbody>

        <?php if (empty($locations)): ?>

            <tr>

                <td colspan="7"
                    class="text-center py-5">

                    <i class="fas fa-warehouse fa-3x text-secondary mb-3"></i>

                    <h5 class="mt-3 text-muted">

                        <?= __('no_inventory_locations_available') ?>

                    </h5>

                    <p class="text-muted mb-3">

                        <?= __('add_first_warehouse_location') ?>

                    </p>

                    <a href="<?= URLROOT ?>/inventorylocations/create"
                       class="btn btn-primary">

                        <i class="fas fa-plus"></i>

                        <?= __('add_location') ?>

                    </a>

                </td>

            </tr>

        <?php else: ?>

            <?php foreach ($locations as $loc) : ?>

                <tr>

                    <td>
                        <?= $loc->id ?>
                    </td>

                    <td>

                        <a href="<?= URLROOT ?>/inventorylocations/details/<?= $loc->id ?>">

                            <?= htmlspecialchars($loc->code) ?>

                        </a>

                    </td>

                    <td>
                        <?= htmlspecialchars($loc->name) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($loc->address ?? '') ?>
                    </td>

                   

                    <td>
                        <?= htmlspecialchars($loc->storekeeper ?? '') ?>
                    </td>

                     <td>
                        <?= htmlspecialchars($loc->mobile ?? '') ?>
                    </td>

                    <td>

                        <a href="<?= URLROOT ?>/inventorylocations/edit/<?= $loc->id ?>"
                           class="btn btn-sm btn-warning">

                            <?= __('edit') ?>

                        </a>

                        <?php if ($loc->total_stock <= 0): ?>

                            <a href="<?= URLROOT ?>/inventorylocations/delete/<?= $loc->id ?>"
                               class="btn btn-sm btn-outline-danger"
                               onclick="return confirm('<?= __('delete_location_confirm') ?>')">

                                <i class="bi bi-trash"></i>

                                <?= __('delete') ?>

                            </a>

                        <?php else: ?>

                            <button type="button"
                                    class="btn btn-sm btn-warning"
                                    disabled
                                    title="<?= __('location_contains_stock_cannot_delete') ?>">

                                <i class="bi bi-box-seam"></i>

                                <?= __('contains_stock') ?>

                                <?= number_format($loc->total_stock, 2) ?>

                                <?= __('items') ?>

                            </button>

                        <?php endif; ?>

                    </td>

                </tr>

            <?php endforeach; ?>

        <?php endif; ?>

    </tbody>

</table>
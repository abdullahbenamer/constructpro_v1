<div class="container-fluid mt-4">

    <!-- PAGE HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-3">

        <div>

            <h4 class="mb-0">

                <i class="fas fa-edit"></i>

                <?= __('edit_requisition_item') ?> #<?= $data['item']->id ?>

            </h4>

            <small class="text-muted">

                <?= __('edit_update_quantity_description_remarks_only') ?>

            </small>

        </div>


        <a
            href="<?= URLROOT ?>/ResourceRequisitions/details/<?= $data['item']->requisition_id ?>"
            class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            <?= __('back') ?>

        </a>

    </div>


    <!-- WARNING -->

    <div class="alert alert-danger">

        <strong><?= __('note') ?>:</strong>

        <?= __('changing_material_resource_requires_new_item') ?>

    </div>


    <!-- FORM -->

    <div class="card shadow-sm">

        <div class="card-header">

            <strong>

                <i class="fas fa-box"></i>

                <?= __('requisition_item') ?>

            </strong>

        </div>


        <div class="card-body">

            <form
                method="POST"
                action="<?= URLROOT ?>/ResourceRequisitionItems/update/<?= $data['item']->id ?>">


                <!--
                |--------------------------------------------------------------------------
                | RESOURCE TYPE / DESCRIPTION / QUANTITY
                |--------------------------------------------------------------------------
                -->

                <div class="row">

                    <!-- RESOURCE TYPE -->

                    <div class="col-md-3 mb-3">

                        <label class="form-label">

                            <?= __('resource_type') ?>

                        </label>

                        <div>

                            <?php if ($data['item']->resource_source === 'INVENTORY'): ?>

                                <span class="badge bg-primary fs-6">

                                    MATERIAL

                                </span>

                            <?php else: ?>

                                <span class="badge bg-secondary fs-6">

                                    NON MATERIAL

                                </span>

                            <?php endif; ?>

                        </div>

                    </div>


                    <!-- DESCRIPTION -->

                    <div class="col-md-5 mb-3">

                        <label class="form-label">

                            <?= __('description') ?>

                        </label>

                        <input
                            type="text"
                            name="description"
                            class="form-control"
                            value="<?= htmlspecialchars(
                                $data['item']->description
                                ?? $data['item']->resource_name
                                ?? ''
                            ) ?>"
                            required>

                    </div>


                    <!-- QUANTITY -->

                    <div class="col-md-2 mb-3">

                        <label class="form-label">

                            <?= __('quantity') ?>

                        </label>

                        <input
                            type="number"
                            name="quantity"
                            class="form-control"
                            step="0.01"
                            min="0.01"
                            value="<?= htmlspecialchars($data['item']->quantity) ?>"
                            required>

                    </div>


                    <!-- UOM -->

                    <div class="col-md-2 mb-3">

                        <label class="form-label">

                            <?= __('uom') ?>

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="<?= htmlspecialchars(
                                $data['item']->uom
                                ?? $data['item']->unit_name
                                ?? ''
                            ) ?>"
                            readonly>

                    </div>

    <?php if ($data['item']->resource_source === 'INVENTORY'): ?>

    <!-- MATERIAL COST TYPE — READ ONLY -->
    <div class="col-md-4 mb-3">

        <label class="form-label">
            <?= __('cost_type') ?>
        </label>

        <input
            type="text"
            class="form-control"
            value="<?= __('materials') ?>"
            readonly>

        <input
            type="hidden"
            name="cost_type"
            value="MATERIALS">

    </div>

<?php else: ?>

    <!-- NON-MATERIAL COST TYPE — SELECTABLE -->
    <div class="col-md-4 mb-3">

        <label class="form-label">
            <?= __('cost_type') ?>
        </label>

        <select
            name="cost_type"
            class="form-select"
            required>

            <option value="">
                <?= __('select_cost_type') ?>
            </option>

            <option value="HUMAN_RESOURCES"
                <?= ($data['item']->cost_type ?? '') === 'HUMAN_RESOURCES' ? 'selected' : '' ?>>
                <?= __('human_resources') ?>
            </option>

            <option value="TRANSPORT"
                <?= ($data['item']->cost_type ?? '') === 'TRANSPORT' ? 'selected' : '' ?>>
                <?= __('transport') ?>
            </option>

            <option value="EQUIPMENT"
                <?= ($data['item']->cost_type ?? '') === 'EQUIPMENT' ? 'selected' : '' ?>>
                <?= __('equipment') ?>
            </option>

            <option value="SUBCONTRACT"
                <?= ($data['item']->cost_type ?? '') === 'SUBCONTRACT' ? 'selected' : '' ?>>
                <?= __('subcontract') ?>
            </option>

            <option value="SITE_EXPENSES"
                <?= ($data['item']->cost_type ?? '') === 'SITE_EXPENSES' ? 'selected' : '' ?>>
                <?= __('site_expenses') ?>
            </option>

            <option value="PROFESSIONAL_SERVICES"
                <?= ($data['item']->cost_type ?? '') === 'PROFESSIONAL_SERVICES' ? 'selected' : '' ?>>
                <?= __('professional_services') ?>
            </option>

            <option value="PERMITS_FEES"
                <?= ($data['item']->cost_type ?? '') === 'PERMITS_FEES' ? 'selected' : '' ?>>
                <?= __('permits_fees') ?>
            </option>

            <option value="INSURANCE"
                <?= ($data['item']->cost_type ?? '') === 'INSURANCE' ? 'selected' : '' ?>>
                <?= __('insurance') ?>
            </option>

            <option value="BANK_CHARGES"
                <?= ($data['item']->cost_type ?? '') === 'BANK_CHARGES' ? 'selected' : '' ?>>
                <?= __('bank_charges') ?>
            </option>

            <option value="TAXES"
                <?= ($data['item']->cost_type ?? '') === 'TAXES' ? 'selected' : '' ?>>
                <?= __('taxes') ?>
            </option>

            <option value="MISCELLANEOUS"
                <?= ($data['item']->cost_type ?? '') === 'MISCELLANEOUS' ? 'selected' : '' ?>>
                <?= __('miscellaneous') ?>
            </option>

        </select>

    </div>

<?php endif; ?>

                </div>


                <!--
                |--------------------------------------------------------------------------
                | RESOURCE / INVENTORY
                |--------------------------------------------------------------------------
                -->

                <div class="row">

                    <div class="col-md-8 mb-3">

                        <label class="form-label">

                            <?= $data['item']->resource_source === 'INVENTORY'
                                ? __('inventory_item')
                                : __('resource') ?>

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="<?= htmlspecialchars(
                                ($data['item']->resource_code ?? '') .
                                ' - ' .
                                ($data['item']->resource_name ?? '')
                            ) ?>"
                            readonly>

                    </div>

                </div>


                <!-- REMARKS -->

                <div class="mb-3">

                    <label class="form-label">

                        <?= __('remarks') ?>

                    </label>

                    <textarea
                        name="remarks"
                        class="form-control"
                        rows="4"><?= htmlspecialchars(
                            $data['item']->remarks ?? ''
                        ) ?></textarea>

                </div>


                <!-- ACTIONS -->

                <div class="text-end">

                    <button
                        type="submit"
                        class="btn btn-success">

                        <i class="fas fa-save"></i>

                        <?= __('update_item') ?>

                    </button>


                    <a
                        href="<?= URLROOT ?>/ResourceRequisitions/details/<?= $data['item']->requisition_id ?>"
                        class="btn btn-secondary">

                        <?= __('cancel') ?>

                    </a>

                </div>


            </form>

        </div>

    </div>

</div>
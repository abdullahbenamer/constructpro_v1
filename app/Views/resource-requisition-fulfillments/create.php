<div class="container-fluid mt-4">

    <!-- ==========================================================
     PAGE HEADER
    =========================================================== -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="mb-1">

                <i class="fas fa-dolly text-primary"></i>

                <?= __('fulfill_material_requisition') ?>

            </h2>

            <p class="text-muted mb-0">

                <?= __('issue_materials_from_inventory') ?>

            </p>

        </div>

    </div>


    <!-- ==========================================================
     REQUISITION INFORMATION
    =========================================================== -->

    <div class="card shadow-sm mb-4">

        <div class="card-header bg-light">

            <strong>

                <i class="fas fa-clipboard-list"></i>

                <?= __('requisition_information') ?>

            </strong>

        </div>


        <div class="card-body">

            <div class="row">

                <!-- Requisition Number -->

                <div class="col-md-3 mb-3">

                    <label class="form-label text-muted">

                        <?= __('requisition_no') ?>

                    </label>

                    <div class="fw-bold">

                        <?= htmlspecialchars(
                            $data['requisition']->req_number
                        ) ?>

                    </div>

                </div>


                <!-- Project -->

                <div class="col-md-5 mb-3">

                    <label class="form-label text-muted">

                        <?= __('project') ?>

                    </label>

                    <div class="fw-bold">

                        <?= htmlspecialchars(
                            $data['requisition']->project_name
                        ) ?>

                    </div>

                </div>


                <!-- Status -->

                <div class="col-md-2 mb-3">

                    <label class="form-label text-muted">

                        <?= __('status') ?>

                    </label>

                    <div>

                        <span class="badge bg-success">

                            <?= htmlspecialchars(
                                $data['requisition']->status
                            ) ?>

                        </span>

                    </div>

                </div>


                <!-- Priority -->

                <div class="col-md-2 mb-3">

                    <label class="form-label text-muted">

                        <?= __('priority') ?>

                    </label>

                    <div class="fw-bold">

                        <?= htmlspecialchars(
                            $data['requisition']->priority
                        ) ?>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- ==========================================================
     FULFILLMENT FORM
    =========================================================== -->

    <form method="POST"
        action="<?= URLROOT ?>/ResourceRequisitionFulfillments/store"
        id="fulfillmentForm">


        <!-- REQUISITION ID -->

        <input type="hidden"
            name="requisition_id"
            value="<?= $data['requisition']->id ?>">


        <!-- ======================================================
         FULFILLMENT HEADER
        =========================================================== -->

        <div class="card shadow-sm mb-4">

            <div class="card-header bg-primary text-white">

                <strong>

                    <i class="fas fa-file-alt"></i>

                    <?= __('fulfillment_details') ?>

                </strong>

            </div>


            <div class="card-body">

                <div class="col-md-4 mb-3">

                    <label class="form-label">

                        <?= __('fulfillment_reference') ?>

                    </label>

                    <input
                        type="text"
                        class="form-control"
                        value="<?= __('auto_generated_after_processing') ?>"
                        readonly>

                </div>


                <!-- FULFILLMENT DATE -->

                <div class="col-md-4 mb-3">

                    <label class="form-label">

                        <?= __('fulfillment_date') ?>

                        <span class="text-danger">*</span>

                    </label>

                    <input type="date"
                        name="fulfillment_date"
                        class="form-control"
                        value="<?= date('Y-m-d') ?>"
                        required>

                </div>


                <!-- MATERIAL ONLY -->

                <div class="col-md-4 mb-3">

                    <label class="form-label">

                        <?= __('fulfillment_type') ?>

                    </label>

                    <input type="text"
                        class="form-control"
                        value="<?= __('material_inventory') ?>"
                        readonly>

                </div>

            </div>


            <!-- REMARKS -->

            <div class="mb-0">

                <label class="form-label">

                    <?= __('remarks') ?>

                </label>

                <textarea name="remarks"
                    class="form-control"
                    rows="3"
                    placeholder="<?= __('fulfillment_remarks_placeholder') ?>"></textarea>

            </div>

        </div>

    </div>


    <!-- ======================================================
     MATERIAL ITEMS
    =========================================================== -->

    <div class="card shadow-sm">

        <div class="card-header bg-success text-white">

            <strong>

                <i class="fas fa-boxes"></i>

                <?= __('material_items_to_fulfill') ?>

            </strong>

        </div>


        <div class="card-body p-0">

            <?php if (!empty($data['items'])): ?>


                <div class="table-responsive">

                    <table class="table table-bordered table-hover mb-0 align-middle">

                        <thead class="table-light">

                            <tr>

                                <th style="min-width: 250px;">

                                    <?= __('material') ?>

                                </th>


                                <th class="text-center">

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


                                <th style="min-width: 220px;">

                                    <?= __('issue_from_location') ?>

                                </th>


                                <th class="text-end">

                                    <?= __('available_stock') ?>

                                </th>


                                <th style="min-width: 150px;">

                                    <?= __('quantity_to_fulfill') ?>

                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            <?php foreach ($data['items'] as $item): ?>


                                <?php

                                /*
                                 |--------------------------------------------------
                                 | NORMALIZE VALUES
                                 |--------------------------------------------------
                                */

                                $requested_qty =
                                    (float) (
                                        $item->quantity ?? 0
                                    );


                                $fulfilled_qty =
                                    (float) (
                                        $item->fulfilled_qty ?? 0
                                    );


                                $remaining_qty =
                                    (float) (
                                        $item->remaining_qty ?? 0
                                    );


                                ?>


                                <tr
                                    data-item-id="<?= $item->id ?>"
                                    data-inventory-id="<?= $item->resource_id ?>">

                                    <!-- ======================================
                                         MATERIAL
                                        ======================================= -->

                                    <td>

                                        <strong>

                                            <?= htmlspecialchars(
                                                $item->inventory_name
                                                    ?? $item->description
                                            ) ?>

                                        </strong>

                                        <br>

                                        <small class="text-muted">

                                            <?= __('sku') ?>:

                                            <?= htmlspecialchars(
                                                $item->sku ?? '-'
                                            ) ?>

                                        </small>

                                    </td>


                                    <!-- ======================================
                                         UOM
                                        ======================================= -->

                                    <td>

                                        <?= htmlspecialchars(
                                            $item->uom
                                                ?? $item->base_unit
                                                ?? '-'
                                        ) ?>

                                    </td>


                                    <!-- ====================
                                         REQUESTED
                                        ==================== -->

                                    <td class="text-end">

                                        <?= number_format((float) $item->quantity, 2) ?>

                                    </td>


                                    <!-- ======================================
                                         PREVIOUSLY FULFILLED
                                        ======================================= -->

                                    <td class="text-end">

                                        <?= number_format((float) $item->fulfilled_quantity, 2) ?>

                                    </td>


                                    <!-- ======================================
                                         REMAINING
                                        ======================================= -->

                                    <td class="text-end">

                                        <strong class="text-primary">

                                            <?= number_format((float) $item->remaining_quantity, 2) ?>

                                        </strong>

                                    </td>


                                    <!-- ======================================
                                         LOCATION
                                        ======================================= -->

                                    <td>

                                        <select
                                            class="form-select location-select"
                                            name="items[<?= $item->id ?>][location_id]"
                                            data-row="<?= $item->id ?>">

                                            <option value="">

                                                <?= __('select_location') ?>

                                            </option>

                                            <?php foreach ($item->locations as $location): ?>

                                                <option
                                                    value="<?= $location->location_id ?>"
                                                    data-available="<?= $location->available_qty ?>">

                                                    <?= htmlspecialchars(
                                                        $location->location_name
                                                    ) ?>

                                                    <?php if (!empty($location->location_code)): ?>

                                                        (<?= htmlspecialchars(
                                                            $location->location_code
                                                        ) ?>)

                                                    <?php endif; ?>

                                                    — <?= __('available') ?>:

                                                    <?= number_format(
                                                        $location->available_qty,
                                                        2
                                                    ) ?>

                                                </option>

                                            <?php endforeach; ?>

                                        </select>

                                    </td>


                                    <!-- ======================================
                                         AVAILABLE STOCK
                                        ======================================= -->

                                    <td class="text-center">

                                        <strong
                                            class="available-stock"
                                            data-row="<?= $item->id ?>">

                                            0.00

                                        </strong>

                                    </td>


                                    <!-- ======================================
                                         FULFILL QUANTITY
                                        ======================================= -->

                                    <td>

                                        <input
                                            type="hidden"
                                            name="items[<?= $item->id ?>][inventory_id]"
                                            value="<?= $item->resource_id ?>">

                                        <input
                                            type="number"
                                            class="form-control text-end fulfill-quantity"
                                            name="items[<?= $item->id ?>][fulfilled_quantity]"
                                            data-item-id="<?= $item->id ?>"
                                            step="0.01"
                                            min="0"
                                            max="<?= (float) $item->remaining_quantity ?>"
                                            placeholder="0.00">

                                    </td>


                                </tr>


                            <?php endforeach; ?>


                        </tbody>

                    </table>

                </div>


            <?php else: ?>


                <div class="alert alert-info m-3 mb-0">

                    <i class="fas fa-info-circle"></i>

                    <?= __('no_material_items_remaining') ?>

                </div>


            <?php endif; ?>


        </div>


        <!-- ==================================================
             FORM FOOTER
            =================================================== -->

        <div class="card-footer">

          <div class="d-flex justify-content-between align-items-center">

    <button type="button"
                class="btn btn-secondary"
                onclick="history.back();">

            <i class="fas fa-arrow-left"></i>
            <?= __('back') ?>

        </button>
        
    <button type="submit"
        class="btn btn-success"
        id="submitFulfillment">
        <i class="fas fa-check-circle"></i>
        <?= __('process_material_fulfillment') ?>
    </button>
</div>
        </div>


    </div>


    </form>


</div>


<script>
    document.addEventListener(
        'DOMContentLoaded',
        function() {


            /*
            |--------------------------------------------------------------------------
            | URL ROOT
            |--------------------------------------------------------------------------
            */

            const URLROOT =
                '<?= URLROOT ?>';


            /*
            |--------------------------------------------------------------------------
            | GET STOCK AVAILABILITY
            |--------------------------------------------------------------------------
            |
            | This requires an endpoint:
            |
            | ResourceRequisitionFulfillments/getStockAvailability
            |
            | POST:
            |
            | inventory_id
            | location_id
            |
            */

            document.querySelectorAll(
                '.location-select'
            ).forEach(
                function(locationSelect) {


                    locationSelect.addEventListener(
                        'change',
                        function() {


                            const row =
                                this.closest('tr');


                            const itemId =
                                this.dataset.itemId;


                            const locationId =
                                this.value;


                            const stockDisplay =
                                row.querySelector(
                                    '.available-stock'
                                );


                            /*
                            |----------------------------------------------------------
                            | NO LOCATION
                            |----------------------------------------------------------
                            */

                            if (!locationId) {

                                stockDisplay.innerHTML =
                                    <?= json_encode(__('select_location')) ?>;


                                stockDisplay.className =
                                    'available-stock text-muted';


                                return;

                            }


                            /*
                            |----------------------------------------------------------
                            | GET INVENTORY ID
                            |
                            | The fulfillment model must provide inventory_id
                            | through getFulfillableItems().
                            |----------------------------------------------------------
                            */

                            const inventoryId =
                                row.dataset.inventoryId;


                            if (!inventoryId) {

                                stockDisplay.innerHTML =
                                    <?= json_encode(__('invalid_material')) ?>;


                                stockDisplay.className =
                                    'available-stock text-danger';


                                return;

                            }


                            /*
                            |----------------------------------------------------------
                            | LOADING
                            |----------------------------------------------------------
                            */

                            stockDisplay.innerHTML =
                                '<i class="fas fa-spinner fa-spin"></i>';


                        }

                    );

                }
            );


            /*
            |--------------------------------------------------------------------------
            | VALIDATE QUANTITY WHILE USER TYPES
            |--------------------------------------------------------------------------
            */

            document.querySelectorAll(
                '.fulfill-quantity'
            ).forEach(
                function(input) {


                    input.addEventListener(
                        'input',
                        function() {


                            const row =
                                this.closest('tr');


                            const requestedQty =
                                parseFloat(
                                    this.max
                                ) || 0;


                            const availableQty =
                                parseFloat(
                                    row.dataset.availableQty
                                );


                            const enteredQty =
                                parseFloat(
                                    this.value
                                ) || 0;


                            /*
                            |----------------------------------------------------------
                            | ABOVE REMAINING QUANTITY
                            |----------------------------------------------------------
                            */

                            if (
                                enteredQty >
                                requestedQty
                            ) {

                                this.setCustomValidity(

                                    <?= json_encode(__('quantity_cannot_exceed_remaining')) ?>

                                );


                            }

                            /*
                            |----------------------------------------------------------
                            | ABOVE AVAILABLE STOCK
                            |----------------------------------------------------------
                            */

                            else if (

                                !isNaN(
                                    availableQty
                                )

                                &&

                                enteredQty >
                                availableQty

                            ) {

                                this.setCustomValidity(

                                    <?= json_encode(__('quantity_exceeds_available_stock')) ?>

                                );


                            } else {

                                this.setCustomValidity(
                                    ''
                                );

                            }

                        }

                    );

                }
            );


            /*
            |--------------------------------------------------------------------------
            | PREPARE POST DATA
            |--------------------------------------------------------------------------
            |
            | The table inputs do not initially have name attributes.
            |
            | We only submit rows where quantity > 0.
            |
            */

            document.getElementById(
                'fulfillmentForm'
            ).addEventListener(
                'submit',
                function(event) {


                    let validItems =
                        0;


                    const existingInputs =
                        document.querySelectorAll(
                            '.dynamic-fulfillment-input'
                        );


                    existingInputs.forEach(
                        input => input.remove()
                    );


                    document.querySelectorAll(
                        'tbody tr'
                    ).forEach(
                        function(row) {


                            const itemId =
                                row.dataset.itemId;


                            const quantityInput =
                                row.querySelector(
                                    '.fulfill-quantity'
                                );


                            const locationSelect =
                                row.querySelector(
                                    '.location-select'
                                );


                            if (

                                !quantityInput

                                ||

                                !locationSelect

                            ) {

                                return;

                            }


                            const quantity =
                                parseFloat(
                                    quantityInput.value
                                ) || 0;


                            /*
                            |----------------------------------------------------------
                            | SKIP ZERO
                            |----------------------------------------------------------
                            */

                            if (
                                quantity <= 0
                            ) {

                                return;

                            }


                            /*
                            |----------------------------------------------------------
                            | LOCATION REQUIRED
                            |----------------------------------------------------------
                            */

                            if (
                                !locationSelect.value
                            ) {

                                event.preventDefault();


                                alert(

                                    <?= json_encode(__('select_inventory_location_for_every_item')) ?>

                                );


                                locationSelect.focus();


                                return;

                            }


                            /*
                            |----------------------------------------------------------
                            | CREATE QUANTITY INPUT
                            |----------------------------------------------------------
                            */

                            const quantityHidden =
                                document.createElement(
                                    'input'
                                );


                            quantityHidden.type =
                                'hidden';


                            quantityHidden.name =
                                'items[' +

                                itemId +

                                '][quantity]';


                            quantityHidden.value =
                                quantity;


                            quantityHidden.classList.add(
                                'dynamic-fulfillment-input'
                            );


                            this.appendChild(
                                quantityHidden
                            );


                            /*
                            |----------------------------------------------------------
                            | CREATE LOCATION INPUT
                            |----------------------------------------------------------
                            */

                            const locationHidden =
                                document.createElement(
                                    'input'
                                );


                            locationHidden.type =
                                'hidden';


                            locationHidden.name =
                                'items[' +

                                itemId +

                                '][location_id]';


                            locationHidden.value =
                                locationSelect.value;


                            locationHidden.classList.add(
                                'dynamic-fulfillment-input'
                            );


                            this.appendChild(
                                locationHidden
                            );


                            validItems++;


                        }.bind(this)
                    );


                    /*
                    |--------------------------------------------------------------
                    | NOTHING SELECTED
                    |--------------------------------------------------------------
                    */

                    if (
                        validItems === 0
                    ) {

                        event.preventDefault();


                        alert(

                            <?= json_encode(__('enter_fulfillment_quantity_for_at_least_one_material')) ?>

                        );


                        return;

                    }


                    /*
                    |--------------------------------------------------------------
                    | FINAL BROWSER VALIDATION
                    |--------------------------------------------------------------
                    */

                    if (
                        !this.checkValidity()
                    ) {

                        event.preventDefault();

                        this.reportValidity();

                    }

                }
            );

        }
    );
</script>


<script>

    document.addEventListener('DOMContentLoaded', function() {

        document.querySelectorAll('.location-select').forEach(function(select) {

            select.addEventListener('change', function() {

                const rowId =
                    this.dataset.row;

                const stockDisplay =
                    document.querySelector(
                        '.available-stock[data-row="' + rowId + '"]'
                    );

                const selectedOption =
                    this.options[
                        this.selectedIndex
                    ];

                const available =
                    parseFloat(
                        selectedOption.dataset.available
                    ) || 0;

                stockDisplay.textContent =
                    available.toFixed(2);

            });


            /*
            |--------------------------------------------------------------------------
            | SET INITIAL STOCK
            |--------------------------------------------------------------------------
            */

            if (select.value) {

                const selectedOption =
                    select.options[
                        select.selectedIndex
                    ];

                const available =
                    parseFloat(
                        selectedOption.dataset.available
                    ) || 0;

                const rowId =
                    select.dataset.row;

                const stockDisplay =
                    document.querySelector(
                        '.available-stock[data-row="' + rowId + '"]'
                    );

                if (stockDisplay) {

                    stockDisplay.textContent =
                        available.toFixed(2);

                }

            }

        });

    });

</script>
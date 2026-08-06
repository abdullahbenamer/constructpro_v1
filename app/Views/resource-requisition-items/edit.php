<div class="container-fluid mt-4">


    <!-- PAGE HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-3">


        <div>

            <h4 class="mb-0">

                <i class="fas fa-edit"></i>

                Edit Requisition Item

            </h4>


            <small class="text-muted">

                Update resource requisition item

            </small>


        </div>



        <a href="<?= URLROOT ?>/ResourceRequisitions/details/<?= $data['item']->requisition_id ?>"
            class="btn btn-secondary">


            <i class="fas fa-arrow-left"></i>

            Back


        </a>


    </div>





    <!-- FORM CARD -->


    <div class="card shadow-sm">


        <div class="card-header">


            <strong>

                <i class="fas fa-box"></i>

                Item Details

            </strong>


        </div>




        <div class="card-body">


            <form method="POST"
                action="<?= URLROOT ?>/ResourceRequisitionItems/update/<?= $data['item']->id ?>">



                <div class="row">



                    <!-- RESOURCE -->

                    <div class="col-md-6 mb-3">


                        <label class="form-label">

                            Resource

                        </label>



                        <select name="resource_id"
                            id="resource_id"
                            class="form-select select2"
                            required>



                            <option value="">

                                -- Select Resource --

                            </option>



                            <?php foreach ($data['resources'] as $resource): ?>


                                <option value="<?= $resource->id ?>"

                                    data-description="<?= htmlspecialchars($resource->description) ?>"

                                    data-unit="<?= $resource->unit_name ?>"

                                    <?= ($resource->id == $data['item']->resource_id)
                                        ? 'selected'
                                        : '' ?>>


                                    <?= $resource->resource_code ?>

                                    -

                                    <?= $resource->resource_name ?>


                                </option>



                            <?php endforeach; ?>


                        </select>



                    </div>







                    <!-- DESCRIPTION -->


                    <div class="col-md-6 mb-3">


                        <label class="form-label">

                            Description

                        </label>


                        <input type="text"

                            name="description"

                            id="description"

                            class="form-control"

                            value="<?= htmlspecialchars(
                                        !empty($data['item']->description)
                                            ? $data['item']->description
                                            : $data['item']->resource_description
                                    ) ?>"

                            readonly>



                    </div>




                </div>







                <div class="row">



                    <!-- QUANTITY -->


                    <div class="col-md-4 mb-3">


                        <label class="form-label">

                            Requested Quantity

                        </label>


                        <input type="number"

                            name="quantity"

                            class="form-control"

                            step="0.01"

                            min="0.01"

                            value="<?= $data['item']->quantity ?>"

                            required>


                    </div>





                    <!-- UOM -->


                    <div class="col-md-4 mb-3">


                        <label class="form-label">

                            UOM

                        </label>


                        <input type="text"

                            name="uom"

                            id="uom"

                            class="form-control"

                            value="<?= !empty($data['item']->uom)
        ? $data['item']->uom
        : $data['item']->unit_name ?>"

                            readonly>


                    </div>



                </div>






                <!-- REMARKS -->


                <div class="mb-3">


                    <label class="form-label">

                        Remarks

                    </label>


                    <textarea name="remarks"

                        class="form-control"

                        rows="4"><?= htmlspecialchars($data['item']->remarks) ?></textarea>


                </div>






                <div class="text-end">


                    <button type="submit"

                        class="btn btn-primary">


                        <i class="fas fa-save"></i>

                        Save Changes


                    </button>




                    <a href="<?= URLROOT ?>/ResourceRequisitions/details/<?= $data['item']->requisition_id ?>"

                        class="btn btn-secondary">


                        Cancel


                    </a>



                </div>




            </form>



        </div>

    </div>

</div>

<!-- <script>
    $(document).ready(function() {

        $('#resource_id').select2({

            placeholder: "-- Select Resource --",

            allowClear: true,

            width: '100%'

        });

        $('#resource_id').on('change', function() {

           let option = $(this).find(':selected');

            $('#description').val(

                option.data('description') || ''
            );
            $('#uom').val(
                option.data('unit') || ''
            );
        });
    });
</script> -->
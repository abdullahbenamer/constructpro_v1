<div class="container-fluid mt-4">


    <!-- PAGE HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-3">


        <div>

            <h4 class="mb-0">

                <i class="fas fa-edit"></i>
                Edit Resource Requisition

            </h4>


            <small class="text-muted">

                Update requisition header information

            </small>

        </div>



        <a href="<?= URLROOT ?>/ResourceRequisitions"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>
            Back

        </a>


    </div>





    <!-- FORM CARD -->

    <div class="card shadow-sm">


        <div class="card-header bg-white">

            <strong>

                <i class="fas fa-info-circle"></i>
                Requisition Header

            </strong>

        </div>





        <div class="card-body">


            <form method="POST"
            action="<?= URLROOT ?>/ResourceRequisitions/update/<?= $data['requisition']->id ?>">



                <div class="row">


                    <!-- REQUISITION NUMBER -->

                    <div class="col-md-4 mb-3">


                        <label class="form-label">

                            Requisition No.

                        </label>


                        <input type="text"
                               class="form-control"
                               value="<?= $data['requisition']->requisition_no ?>"
                               readonly>


                    </div>





                    <!-- STATUS -->

                    <div class="col-md-4 mb-3">


                        <label class="form-label">

                            Status

                        </label>


                        <input type="text"
                               class="form-control"
                               value="<?= $data['requisition']->status ?>"
                               readonly>


                    </div>





                <!-- PRIORITY -->
<div class="col-md-4 mb-3">

    <label class="form-label">
        Priority
    </label>

    <select name="priority" class="form-select">

        <option value="LOW"
            <?= ($data['requisition']->priority == 'LOW') ? 'selected' : '' ?>>
            LOW
        </option>

        <option value="NORMAL"
            <?= ($data['requisition']->priority == 'NORMAL') ? 'selected' : '' ?>>
            NORMAL
        </option>

        <option value="HIGH"
            <?= ($data['requisition']->priority == 'HIGH') ? 'selected' : '' ?>>
            HIGH
        </option>

        <option value="URGENT"
            <?= ($data['requisition']->priority == 'URGENT') ? 'selected' : '' ?>>
            URGENT
        </option>

        <option value="CRITICAL"
            <?= ($data['requisition']->priority == 'CRITICAL') ? 'selected' : '' ?>>
            CRITICAL
        </option>

    </select>

</div>


                </div>








                <div class="row">



                    <!-- PROJECT -->

                    <div class="col-md-6 mb-3">


                        <label class="form-label">

                            Project

                        </label>


                        <select name="project_id"
                                class="form-select"
                                required>



                            <?php foreach ($data['projects'] as $project): ?>


                                <option value="<?= $project->id ?>"
                                    
                                    <?= ($project->id == $data['requisition']->project_id) ? 'selected' : '' ?>
                                    
                                >

                                    <?= $project->title ?>
                                       

                                </option>


                            <?php endforeach; ?>


                        </select>


                    </div>






                    <!-- REQUEST DATE -->

                    <div class="col-md-3 mb-3">


                        <label class="form-label">

                            Request Date

                        </label>


                        <input type="date"
                               name="request_date"
                               class="form-control"
                               value="<?= $data['requisition']->request_date ?>"
                               required>


                    </div>






                    <!-- REQUIRED DATE -->

                    <div class="col-md-3 mb-3">


                        <label class="form-label">

                            Required Date

                        </label>


                        <input type="date"
                               name="required_date"
                               class="form-control"
                               value="<?= $data['requisition']->required_date ?>"
                               required>


                    </div>


                </div>








                <!-- REMARKS -->


                <div class="mb-3">


                    <label class="form-label">

                        Remarks

                    </label>


                    <textarea name="remarks"
                              class="form-control"
                              rows="4"><?= $data['requisition']->remarks ?></textarea>


                </div>







                <div class="text-end">


                    <button type="submit"
                            class="btn btn-primary">


                        <i class="fas fa-save"></i>

                        Update Requisition


                    </button>


                </div>



            </form>



        </div>


    </div>



</div>
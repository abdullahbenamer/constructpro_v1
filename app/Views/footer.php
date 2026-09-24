</div>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- // JS form fields validation messages translated-->
<script>
    window.CONSTRUCTPRO_VALIDATION_MESSAGES = {
        required: <?= json_encode(__('validation_required')) ?>,
        email: <?= json_encode(__('validation_email')) ?>,
        url: <?= json_encode(__('validation_url')) ?>,
        invalid: <?= json_encode(__('validation_invalid')) ?>,
        min: <?= json_encode(__('validation_min')) ?>,
        max: <?= json_encode(__('validation_max')) ?>,
        minlength: <?= json_encode(__('validation_minlength')) ?>,
        maxlength: <?= json_encode(__('validation_maxlength')) ?>,
        step: <?= json_encode(__('validation_step')) ?>,
        pattern: <?= json_encode(__('validation_pattern')) ?>
    };
</script>
<!-- Loading script -->
<script src="<?= URLROOT ?>/assets/js/validation.js"></script>

<!-- If you want to load scripts from Local files -->
<!-- 
<script src="/assets/js/jquery.min.js"></script>

<script src="/assets/js/bootstrap.bundle.min.js"></script>

<script src="/assets/js/select2.min.js"></script> -->

<!-- Footer -->
<div style="margin-top: 25px; padding-top: 25px;">
    <div class="card text-center">

        <div class="card-header">
        </div>

        <div class="card-body">

            <p class="card-text">
                <?= __('dedicated_to_quality') ?>
            </p>

            <h5 class="card-title">
                <i class="fas fa-city"></i>
                <?= __('constructpro_system_title') ?>
                <i class="fas fa-drafting-compass"></i>
            </h5>

            <a href="<?= URLROOT ?>/" class="btn btn-primary">
                <i class="fas fa-home"></i>
                <?= __('home') ?>
            </a>

        </div>

    </div>
</div>


</body>
</html>
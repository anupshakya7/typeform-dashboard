
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.pickers'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/@simonwep/pickr/themes/classic.min.css')); ?>" /> <!-- 'classic' theme -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/@simonwep/pickr/themes/monolith.min.css')); ?>" /> <!-- 'monolith' theme -->
    <link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/@simonwep/pickr/themes/nano.min.css')); ?>" /> <!-- 'nano' theme -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Forms
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Pickers
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Flatpickr - Datepicker</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <form action="#">
                        <div class="row gy-3">
                            <div class="col-lg-6">
                                <div>
                                    <label class="form-label mb-0">Basic</label>
                                    <p class="text-muted">Set
                                        <code>data-provider="flatpickr" data-date-format="d M, Y"</code>
                                        attribute.
                                    </p>
                                    <input type="text" class="form-control" data-provider="flatpickr"
                                        data-date-format="d M, Y">
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-6">
                                <div>
                                    <label class="form-label mb-0">DateTime</label>
                                    <p class="text-muted">Set
                                        <code>data-provider="flatpickr" data-date-format="d.m.y" data-enable-time</code>
                                        attribute.
                                    </p>
                                    <input type="text" class="form-control" data-provider="flatpickr"
                                        data-date-format="d.m.y" data-enable-time>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mt-3">
                                    <label class="form-label mb-0">Human-Friendly Dates</label>
                                    <p class="text-muted">Set
                                        <code>data-provider="flatpickr" data-altFormat="F j, Y"</code>
                                        attribute.
                                    </p>
                                    <input type="text" class="form-control flatpickr-input" data-provider="flatpickr"
                                        data-altFormat="F j, Y">
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-6">
                                <div class="mt-3">
                                    <label class="form-label mb-0">MinDate and MaxDate</label>
                                    <p class="text-muted">Set
                                        <code>data-provider="flatpickr" data-date-format="d M, Y"
                                            data-minDate="Your Min. Date" data-maxDate="Your Max. date"</code>
                                        attribute.
                                    </p>
                                    <input type="text" class="form-control" data-provider="flatpickr"
                                        data-date-format="d M, Y" data-minDate="25 12, 2021" data-maxDate="29 12,2021">
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mt-3">
                                    <label class="form-label mb-0">Default Date</label>
                                    <p class="text-muted">Set
                                        <code>data-provider="flatpickr" data-date-format="d M, Y"
                                            data-deafult-date="Your Default Date"</code>
                                        attribute.
                                    </p>
                                    <input type="text" class="form-control" data-provider="flatpickr"
                                        data-date-format="d M, Y" data-deafult-date="25 12,2021">
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-6">
                                <div class="mt-3">
                                    <label class="form-label mb-0">Disabling Dates</label>
                                    <p class="text-muted">Set
                                        <code>data-provider="flatpickr" data-disable="true"</code>
                                        attribute.
                                    </p>
                                    <input type="text" class="form-control" data-provider="flatpickr"
                                        data-date-format="d M, Y" data-disable-date="15 12,2021">
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mt-3">
                                    <label class="form-label mb-0">Selecting Multiple Dates</label>
                                    <p class="text-muted">Set
                                        <code>data-provider="flatpickr" data-date-format="d M, Y"
                                            data-multiple-date="true"</code>
                                        attribute.
                                    </p>
                                    <input type="text" class="form-control" data-provider="flatpickr"
                                        data-date-format="d M, Y" data-multiple-date="true">
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-6">
                                <div class="mt-3">
                                    <label class="form-label mb-0">Range</label>
                                    <p class="text-muted">Set
                                        <code>data-provider="flatpickr" data-date-format="d M, Y"
                                            data-range-date="true"</code>
                                        attribute.
                                    </p>
                                    <input type="text" class="form-control" data-provider="flatpickr"
                                        data-date-format="d M, Y" data-range-date="true">
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mt-3">
                                    <label class="form-label mb-0">Inline</label>
                                    <p class="text-muted">Set
                                        <code>data-provider="flatpickr" data-date-format="d M, Y"
                                            data-deafult-date="today" data-inline-date="true"</code>
                                        attribute.
                                    </p>
                                    <input type="text" class="form-control" data-provider="flatpickr"
                                        data-date-format="d M, Y" data-deafult-date="25 01,2021" data-inline-date="true">
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-lg-6">
                                <div class="mt-3">
                                    <label class="form-label mb-0">Week Numbers</label>
                                    <p class="text-muted">Set <code>data-provider="flatpickr" data-date-format="d M, Y"
                                            data-week-number</code> attribute.</p>
                                    <input type="text" class="form-control" data-provider="flatpickr"
                                        data-date-format="d M, Y" data-week-number>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                    </form><!-- end form -->
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/libs/@simonwep/pickr/pickr.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/form-pickers.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\CSB 2025\typeform-dashboard\resources\views/forms-pickers.blade.php ENDPATH**/ ?>
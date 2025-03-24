
<?php $__env->startSection('title'); ?> <?php echo app('translator')->get('translation.crm'); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/@simonwep/pickr/themes/classic.min.css')); ?>" />
<!-- 'classic' theme -->
<link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/@simonwep/pickr/themes/monolith.min.css')); ?>" />
<!-- 'monolith' theme -->
<link rel="stylesheet" href="<?php echo e(URL::asset('build/libs/@simonwep/pickr/themes/nano.min.css')); ?>" />
<!-- 'nano' theme -->
<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!--greeting section -->

<div class="mb-3 pb-1 d-flex align-items-center flex-row">
    <div class="flex-grow-1">
        <h4 class="fs-16 mb-1">Survey Data Details</h4>
        <p class="text-muted mb-0">View survey data details, including questions and answers.</p>
    </div>
</div>

<!--greeting section -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between align-items-center">
                <h5 class="card-title mb-0">Survey Data</h5>
                    <div class="dropdown d-flex">
                        <a class="btn btn-info me-3" onclick="history.back(); return false;">
                            <i class="ri-arrow-left-line"></i> Back
                        </a>
                        <a class="icon-frame" href="#" id="exportDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="svg-icon" type="image/svg+xml"
                                src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>
                        </a>
        
                        <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                            <li><a class="dropdown-item" href="<?php echo e(route('survey.single.csv',$answer)); ?>">Export as Excel</a></li>
                        </ul>
                    </div>
            </div>

            <div class="card-body">
                <div class="mb-2 table-responsive">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td><?php echo e($answer->id); ?></td>
                            </tr>
                            <tr>
                                <th>Survey Data Id</th>
                                <td><?php echo e($answer->event_id); ?></td>
                            </tr>
                            <tr>
                                <th>Survey Id</th>
                                <td><?php echo e($answer->form_id); ?></td>
                            </tr>
                            <tr>
                                <th>Survey</th>
                                <td><?php echo e($answer->form ? optional($answer->form)->form_title : 'Form Not Sync Yet'); ?></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><?php echo e($answer->name); ?></td>
                            </tr>
                            <tr>
                                <th>Age</th>
                                <td><?php echo e($answer->age); ?></td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td><?php echo e($answer->gender); ?></td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td><?php echo e($answer->{'village-town-city'}); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo e($answer->form->question->well_functioning_government); ?></th>
                                <td><?php echo e($answer->well_functioning_government); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo e($answer->form->question->low_level_corruption); ?></th>
                                <td><?php echo e($answer->low_level_corruption); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo e($answer->form->question->equitable_distribution); ?></th>
                                <td><?php echo e($answer->equitable_distribution); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo e($answer->form->question->good_relations); ?></th>
                                <td><?php echo e($answer->good_relations); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo e($answer->form->question->free_flow); ?></th>
                                <td><?php echo e($answer->free_flow); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo e($answer->form->question->high_levels); ?></th>
                                <td><?php echo e($answer->high_levels); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo e($answer->form->question->sound_business); ?></th>
                                <td><?php echo e($answer->sound_business); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo e($answer->form->question->acceptance_rights); ?></th>
                                <td><?php echo e($answer->acceptance_rights); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo e($answer->form->question->positive_peace); ?></th>
                                <td><?php echo e($answer->positive_peace); ?></td>
                            </tr>
                            <tr>
                                <th><?php echo e($answer->form->question->negative_peace); ?></th>
                                <td><?php echo e($answer->negative_peace); ?></td>
                            </tr>
                            <?php if($answer->extra_ans1): ?>
                            <tr>
                                <th><?php echo e($answer->form->question->extra_ques1); ?></th>
                                <td><?php echo e($answer->extra_ans1); ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php if($answer->extra_ans2): ?>
                            <tr>
                                <th><?php echo e($answer->form->question->extra_ques2); ?></th>
                                <td><?php echo e($answer->extra_ans2); ?></td>
                            </tr>
                            <?php endif; ?>
                            <?php if($answer->extra_ans3): ?>
                            <tr>
                                <th><?php echo e($answer->form->question->extra_ques3); ?></th>
                                <td><?php echo e($answer->extra_ans3); ?></td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <th>Created At</th>
                                <td><?php echo e(Carbon\Carbon::parse($answer->created_at)->format('d M, Y')); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    

                </div>

                <nav class="mb-3">
                    <div class="nav nav-tabs">

                    </div>
                </nav>
                <div class="tab-content">

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- apexcharts -->
<script src="<?php echo e(URL::asset('build/libs/apexcharts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/apexcharts-pie.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/dashboard-crm.init.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/apexcharts-radar.init.js')); ?>"></script>

<script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/libs/@simonwep/pickr/pickr.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('build/js/pages/form-pickers.init.js')); ?>"></script>


<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('typeform.layout.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\CSB 2025\typeform-dashboard\resources\views/typeform/survey/QA.blade.php ENDPATH**/ ?>
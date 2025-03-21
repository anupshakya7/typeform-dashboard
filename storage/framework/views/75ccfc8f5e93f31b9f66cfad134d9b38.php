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
        <h4 class="fs-16 mb-1">Create Division</h4>
        <p class="text-muted mb-0">Note: Please create Division.</p>
    </div>
</div>


<div class="card" id="formForm">
    <div class="card-header d-flex flex-row justify-content-between align-items-center">
        <h5 class="card-title mb-0">Division</h5>
        <a class="btn btn-info" onclick="history.back(); return false;">
                <i class="ri-arrow-left-line"></i> Back
            </a>
    </div>
    <div class="card-body">
        <div class="live-preview">
            <form id="mainForm" action="<?php echo e(route('branch.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="organization_id" class="form-label">Organization<span class="text-danger">*</span></label>
                            <?php if(auth()->user()->role->name == 'superadmin'): ?>
                            <select id="organization_id" name="organization_id" class="form-select" data-choices
                                data-choices-sorting="true">
                                <option selected>Choose Organization</option>
                                <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($organization->id); ?>"><?php echo e($organization->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php else: ?>
                            <input type="text" class="form-control" placeholder="Organization" value="<?php echo e(auth()->user()->organization->name); ?>" readonly>
                            <input type="hidden" name="organization_id" id="organization_id" class="form-control" value="<?php echo e(auth()->user()->organization->id); ?>" placeholder="Organization" readonly>
                            <?php endif; ?>
                            <?php $__errorArgs = ['organization_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger ms-1"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Name" id="name">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger ms-1"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="country" class="form-label">Country<span class="text-danger">*</span></label>

                            <select id="country" name="country" class="form-select select2" data-choices
                                data-choices-sorting="true">
                                <option selected>Choose Country</option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($country['name']); ?>"><?php echo e($country['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger ms-1"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    
                    <!--end col-->
                    <div class="btn-submit-container">
                        <button type="submit" class="btn btn-blue btn-submit">Submit</button>
                    </div>

                    <!--end col-->
                </div>
                <!--end row-->
            </form>
        </div>
    </div>
    <div class="loader-container">
        <div class="dot-spinner">
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
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
<?php echo $__env->make('typeform.layout.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/prateeklalwani/Desktop/Typeform Main/typeform-dashboard/resources/views/typeform/branch/create.blade.php ENDPATH**/ ?>
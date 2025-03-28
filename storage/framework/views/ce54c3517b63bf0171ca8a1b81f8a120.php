
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
        <h4 class="fs-16 mb-1">Update Organization</h4>
        <p class="text-muted mb-0">Note: Please update Organization.</p>
    </div>
</div>


<div class="card" id="formForm">
    <div class="card-header d-flex flex-row justify-content-between align-items-center">
        <h5 class="card-title mb-0">Organization</h5>
        <a class="btn btn-info" onclick="history.back(); return false;">
                <i class="ri-arrow-left-line"></i> Back
            </a>
    </div>
    <div class="card-body">
        <div class="live-preview">
            <form id="mainForm" action="<?php echo e(route('organization.update',$organization)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="<?php echo e(old('name',$organization->name)); ?>" placeholder="Name" id="name">
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
                    <!--end col-->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" class="form-control" name="logo" id="logo" onchange="getImagePreview(event,'logo_image')">
                            <div id="logo_image">
                                <?php if($organization->logo): ?>
                                <img src="<?php echo e(asset('storage/'.$organization->logo)); ?>" alt="<?php echo e($organization->name); ?>" style="width:100px;padding:5px;object-fit:contain;">
                                <?php endif; ?>
                            </div>
                            <?php $__errorArgs = ['logo'];
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
                    
                    </div>
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

<script>
function getImagePreview(event,divId){
    var image = URL.createObjectURL(event.target.files[0]);
    var imageDiv = document.getElementById(divId);

    imageDiv.innerHTML = '';

    var imageTag = document.createElement('img');
    imageTag.src = image;
    imageTag.width = "100";
    imageTag.style.padding = "5px";
    imageTag.style.objectFit = "contain";
    imageDiv.appendChild(imageTag);
  
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('typeform.layout.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\New Advance Project\typeform-dashboard\resources\views/typeform/organization/edit.blade.php ENDPATH**/ ?>
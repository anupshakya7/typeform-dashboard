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
        <h4 class="fs-16 mb-1">Organization Details</h4>
        <p class="text-muted mb-0">View organization details, including structure, contacts, departments, and roles.</p>
    </div>
</div>

<!--greeting section -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between align-items-center">
                <h5 class="card-title mb-0">Organization</h5>
                <a class="btn btn-info" onclick="history.back(); return false;">
                        <i class="ri-arrow-left-line"></i> Back
                    </a>
            </div>

            <div class="card-body">
                <div class="mb-2 table-responsive">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td><?php echo e($organization->id); ?></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><?php echo e($organization->name); ?></td>
                            </tr>
                            <tr>
                                <th>Logo</th>
                                <td>
                                    <?php if($organization->logo): ?>
                                    <img src="<?php echo e(asset('storage/'.$organization->logo)); ?>" width="50" height="50" alt="Logo" style="border-radius:50%;object-fit:contain;">
                                    <?php endif; ?>
                                </td>
                            </tr>
                            
                            <tr>
                                <th>Created At</th>
                                <td><?php echo e(Carbon\Carbon::parse($organization->created_at)->format('d M, Y')); ?></td>
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

<script>
function getImagePreview(event, divId) {
    var image = URL.createObjectURL(event.target.files[0]);
    var imageDiv = document.getElementById(divId);

    imageDiv.innerHTML = '';

    var imageTag = document.createElement('img');
    imageTag.src = image;
    imageTag.width = "150";
    imageTag.style.padding = "5px";
    imageDiv.appendChild(imageTag);
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('typeform.layout.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/krizmaticcomau/projects.krizmatic.com.au/TypeForm-New/resources/views/typeform/organization/view.blade.php ENDPATH**/ ?>
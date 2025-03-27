
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
        <h4 class="fs-16 mb-1">Create User</h4>
        <p class="text-muted mb-0">Note: Please create User.</p>
    </div>
</div>


<form id="mainForm" action="<?php echo e(route('user.store')); ?>" method="POST" enctype="multipart/form-data">
<div class="card" id="formForm">
    <div class="card-header d-flex flex-row justify-content-between align-items-center">
        <h5 class="card-title mb-0">User</h5>
        <a class="btn btn-info" onclick="history.back(); return false;">
                <i class="ri-arrow-left-line"></i> Back
            </a>
    </div>
    
    <div class="card-body">
        <div class="live-preview">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-center">
                            <img src="<?php echo e(asset('build/images/users/user-default.png')); ?>" alt="profile_image" width="150" height="150" id="profile_image" style="border-radius:50%;object-fit:contain;">
                        </div>
                        <div class="mb-3">
                            <label for="profile" class="form-label">Profile</label>
                            <input type="file" name="profile" class="form-control" value="<?php echo e(old('profile')); ?>" id="profile" onchange="getImagePreview(event,'profile_image')">
                            <?php $__errorArgs = ['profile'];
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
                            <input type="text" name="name" class="form-control" value="<?php echo e(old('name')); ?>" placeholder="Name" id="name">
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
                            <label for="email" class="form-label">Email Address<span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" placeholder="Email Address" id="email">
                            <?php $__errorArgs = ['email'];
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
                            <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" placeholder="Password" id="password">
                            <?php $__errorArgs = ['password'];
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
                            <label for="password_confirmation" class="form-label">Confirm Password<span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" id="password_confirmation">
                            <?php $__errorArgs = ['c_password'];
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
                    

                    <!--end col-->
                </div>
                <!--end row-->
        
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
<div class="card" id="formForm">
    <div class="card-header d-flex flex-row justify-content-between align-items-center">
        <h5 class="card-title mb-0">Assign Role</h5>

    </div>
    
    <div class="card-body">
        <div class="tab-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="role" class="form-label">Role<span class="text-danger">*</span></label>
                            <select id="role" name="role_id" class="form-select" data-choices
                                data-choices-sorting="true">
                                <option selected>Choose Role</option>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($role->id); ?>" data-rolename="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['role_id'];
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
        </div>
    </div>
</div>

                            

<div class="card" id="formUserOrganizationLevel">

</div>

<div class="card" id="formUserBranchLevel">

</div>

<div class="card" id="formUserSurveyLevel">
</div>

<div class="btn-submit-container">
    <button type="submit" class="btn btn-blue btn-submit">Submit</button>
</div>
</form>

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
    var imageTag = document.getElementById(divId);

    imageTag.src = image;
    imageTag.style.borderRadius = "50%";
    imageDiv.appendChild(imageTag);
}

$(document).ready(function(){
    
    // $('#role').change(function(){
    //     var roleVal = $('#role option:selected').data('rolename');
    //     $('#formUserType').show();
    //     if(roleVal == "organization"){
    //         $('.title_level').text('Organization'); 
    //         $.ajax({
    //             url: "<?php echo e(route('organization.get')); ?>",
    //             method: 'GET',
    //             success: function(response) {
    //                 console.log(response);
    //                 $('#field_dropdown').html('');
    //                 $('#field_dropdown').append('<option selected>Choose Organization</option>');
    //                 response.organizations.forEach(function(organizationItem) {
    //                     var option = new Option(organizationItem.name, organizationItem.id);
    //                     $('#field_dropdown').append(option);

    //                     // if (organization && organization == organizationItem.id) {
    //                     //     $(option).prop('selected', true);
    //                     // }
    //                 })
    //             },
    //             error: function(xhr, status, error) {
    //                 $('#field_dropdown').prop('disabled', true);
    //                 $('#field_dropdown').html('');
    //                 $('#field_dropdown').append('<option selected>Choose Organization</option>');
    //             }
    //         })
    //     }
    // });
    
    $('#formUserOrganizationLevel').hide();
    $('#formUserBranchLevel').hide();
    $('#formUserSurveyLevel').hide();

    $('#role').change(function(){
        var roleVal = $('#role option:selected').data('rolename');
        
        $('#formUserOrganizationLevel').html('');
        $('#formUserBranchLevel').html('');
        $('#formUserSurveyLevel').html('');
        
        $('#formUserOrganizationLevel').hide();
        $('#formUserBranchLevel').hide();
        $('#formUserSurveyLevel').hide();

        if(roleVal == "organization"){
            $('#formUserOrganizationLevel').html(`
                <div class="card-header d-flex flex-row justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Choose Organization</h5>

                </div>
                
                <div class="card-body">
                    <div class="tab-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3" id="field_level">
                                        <label for="organization" class="form-label title_level">Organization<span class="text-danger">*</span></label>
                                        <select id="organization" name="organization_id" class="form-select" data-choices
                                            data-choices-sorting="true">
                                            <option value="" selected>Choose Organization</option>
                                            <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($organization->id); ?>">
                                                <?php echo e($organization->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            `);

            $('#formUserOrganizationLevel').show();
        }else if(roleVal == "branch"){
            $('#formUserBranchLevel').html(`
                    <div class="card-header d-flex flex-row justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Choose Branch</h5>

                    </div>
                    
                    <div class="card-body">
                        <div class="tab-content">
                                <div class="row">
                                    <div class="col-md-6">
                                         <?php if(auth()->user()->role->name == "organization"): ?>
                                        <div class="mb-3">
                                            <label for="organization" class="form-label title_level">Organization<span class="text-danger">*</span></label>
                                            <input type="text" value="<?php echo e(auth()->user()->organization->name); ?>" class="form-control" readonly>
                                            <input type="hidden" name="organization_id" value="<?php echo e(auth()->user()->organization->id); ?>" class="form-control" id="organization">
                                        </div>
                                        <?php else: ?>
                                        <div class="mb-3">
                                            <label for="organization" class="form-label title_level">Organization<span class="text-danger">*</span></label>
                                            <select id="organization" name="organization_id" class="form-select" data-choices
                                                data-choices-sorting="true">
                                                <option value="" selected>Choose Organization</option>
                                                <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($organization->id); ?>">
                                                    <?php echo e($organization->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="branch" class="form-label title_level">Branch<span class="text-danger">*</span></label>
                                            <select id="branch" name="branch_id[]" class="form-select select2" data-choices
                                                data-choices-sorting="true" multiple disabled>
                                                <option value="" selected>Choose Branch</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
            `);
            $('#formUserBranchLevel').show();
        }
        if(roleVal == "survey"){
            $('#formUserSurveyLevel').html(`
                    <div class="card-header d-flex flex-row justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Choose Survey</h5>

                    </div>
                    
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <?php if(auth()->user()->role->name == "organization"): ?>
                                    <div class="mb-3">
                                        <label for="organization" class="form-label title_level">Organization<span class="text-danger">*</span></label>
                                        <input type="text" value="<?php echo e(auth()->user()->organization->name); ?>" class="form-control" readonly>
                                        <input type="hidden" name="organization_id" value="<?php echo e(auth()->user()->organization->id); ?>" class="form-control" id="organization">
                                    </div>
                                    <?php else: ?>
                                    <div class="mb-3">
                                        <label for="organization" class="form-label title_level">Organization<span class="text-danger">*</span></label>
                                        <select id="organization" name="organization_id" class="form-select" data-choices
                                            data-choices-sorting="true">
                                            <option value="" selected>Choose Organization</option>
                                            <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($organization->id); ?>">
                                                <?php echo e($organization->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="branch" class="form-label title_level">Branch</label>
                                        <select id="branch" name="branch_id" class="form-select" data-choices
                                            data-choices-sorting="true" disabled>
                                            <option value="" selected>Choose Branch</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="survey" class="form-label title_level">Survey<span class="text-danger">*</span></label>
                                        <select id="survey" name="form_id" class="form-select" data-choices
                                            data-choices-sorting="true" disabled>
                                            <option value="" selected>Choose Survey</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`);
            $('#formUserSurveyLevel').show();
        }

        var roleVal = $('#role option:selected').data('rolename');

        filterBranch();

        if(roleVal == 'survey'){
            filterSurvey();
        }
    });

    

    $(document).on('change','#organization',function() {
        var roleVal = $('#role option:selected').data('rolename');

        filterBranch();

        if(roleVal == 'survey'){
            filterSurvey();
        }
    });

    $(document).on('change','#branch',function() {
        filterSurvey();
    });


    function filterBranch() {
        var organizationVal = $('#organization').val();
        console.log(organizationVal);

        if (organizationVal !== '') {
            $.ajax({
                url: "<?php echo e(route('branch.get')); ?>",
                method: 'GET',
                data: {
                    organization_id: organizationVal
                },
                success: function(response) {
                    console.log(response);
                    $('#branch').prop('disabled', false);
                    $('#branch').html('');
                    $('#branch').append('<option value="" selected>Choose Branch</option>');
                    response.branches.forEach(function(branchItem) {
                        // $('#branch').append(new Option(branch.name,
                        // branch.id));
                        var option = new Option(branchItem.name, branchItem.id);
                        $('#branch').append(option);
                    })
                },
                error: function(xhr, status, error) {
                    $('#branch').prop('disabled', true);
                    $('#branch').html('');
                    $('#branch').append('<option value="" selected>Choose Branch</option>');
                }
            })
        }
    }

    function filterSurvey() {
        var organizationVal = $('#organization').val();
        var branchVal = $('#branch').val() ;

        if (organizationVal !== '') {
            $.ajax({
                url: "<?php echo e(route('survey.get')); ?>",
                method: 'GET',
                data: {
                    organization_id: organizationVal,
                    branch_id: branchVal
                },
                success: function(response) {
                    console.log(response);
                    $('#survey').prop('disabled', false);
                    $('#survey').html('');
                    $('#survey').append('<option value="" selected>Choose Survey</option>');
                    response.forms.forEach(function(formItem) {
                        // $('#survey').append(new Option(form.form_title,
                        // form.id));
                        var option = new Option(formItem.form_title, formItem.form_id);
                        $('#survey').append(option);
                    })
                },
                error: function(xhr, status, error) {
                    $('#survey').prop('disabled', true);
                    $('#survey').html('');
                    $('#survey').append('<option value="" selected>Choose Survey</option>');
                }
            })
        }
    }
  
    
    
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('typeform.layout.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\CSB 2025\typeform-dashboard\resources\views/typeform/users/create.blade.php ENDPATH**/ ?>
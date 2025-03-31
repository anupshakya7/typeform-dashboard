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
        <h4 class="fs-16 mb-1">Update User</h4>
        <p class="text-muted mb-0">Note: Please update User.</p>
    </div>
</div>


<form id="mainForm" action="<?php echo e(route('user.update',$user)); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
<div class="card" id="formForm">
    <div class="card-header d-flex flex-row justify-content-between align-items-center">
        <h5 class="card-title mb-0">User</h5>
        <a class="btn btn-info" onclick="history.back(); return false;">
                <i class="ri-arrow-left-line"></i> Back
            </a>
    </div>
    
    <div class="card-body">
        <div class="live-preview">

                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-center">
                            <?php
                                $profile =  $user->avatar ? asset('storage/'.$user->avatar) : asset('build/images/users/user-default.png');
                            ?>
                            <img src="<?php echo e($profile); ?>" alt="profile_image" width="150" height="150" id="profile_image" style="border-radius:50%;object-fit:contain;">
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
                            <input type="text" name="name" class="form-control" value="<?php echo e(old('name',$user->name)); ?>" placeholder="Name" id="name">
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
                            <input type="email" name="email" class="form-control" value="<?php echo e(old('email',$user->email)); ?>" placeholder="Email Address" id="email">
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
                            <label for="password" class="form-label">Password</label>
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
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
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
                            <select id="role" name="role_id" class="form-select select2">
                                <option selected>Select Role</option>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($role->id); ?>" data-rolename="<?php echo e($role->name); ?>" <?php echo e($user->role_id == $role->id ? 'selected':''); ?>><?php echo e($role->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['role'];
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
    $('#formUserOrganizationLevel').hide();
    $('#formUserBranchLevel').hide();
    $('#formUserSurveyLevel').hide();

    var firstLoad = true;
    
    filterLevelBox();

    $('#role').change(function(){
        filterLevelBox();
    });

    

    $(document).on('change','#organization',function() {
        var roleVal = $('#role option:selected').data('rolename');

        if(roleVal == 'survey'){
            filterBranch(function() {
                filterSurvey();
            });
        }else{
            filterBranch();
        }
    });

    $(document).on('change','#branch',function() {
        filterSurvey();
    });

    function filterLevelBox(){
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
                    <h5 class="card-title mb-0">Select Organization</h5>

                </div>
                
                <div class="card-body">
                    <div class="tab-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3" id="field_level">
                                        <label for="organization" class="form-label title_level">Organization<span class="text-danger">*</span></label>
                                        <select id="organization" name="organization_id" class="form-select" data-choices
                                            data-choices-sorting="true">
                                            <option value="" selected>Select Organization</option>
                                            <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($organization->id); ?>" <?php echo e($user->organization_id == $organization->id ? 'selected':''); ?>>
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
                        <h5 class="card-title mb-0">Select Divisions</h5>

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
                                                <option value="" selected>Select Organization</option>
                                                <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($organization->id); ?>" <?php echo e($user->organization_id == $organization->id ? 'selected':''); ?>>
                                                    <?php echo e($organization->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="branch" class="form-label title_level">Division<span class="text-danger">*</span></label>
                                            <select id="branch" name="branch_id[]" class="form-select select2" data-choices
                                                data-choices-sorting="true" multiple disabled>
                                                <option value="" selected>Select Division</option>
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
                        <h5 class="card-title mb-0">Select Survey</h5>

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
                                            <option value="" selected>Select Organization</option>
                                            <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($organization->id); ?>" <?php echo e($user->organization_id == $organization->id ? 'selected':''); ?>>
                                                <?php echo e($organization->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="branch" class="form-label title_level">Division</label>
                                        <select id="branch" name="branch_id" class="form-select" data-choices
                                            data-choices-sorting="true" disabled>
                                            <option value="" selected>Select Division</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="survey" class="form-label title_level">Survey<span class="text-danger">*</span></label>
                                        <select id="survey" name="form_id" class="form-select" data-choices
                                            data-choices-sorting="true" disabled>
                                            <option value="" selected>Select Survey</option>
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
    }

    function filterBranch(callback) {
        var organizationVal = $('#organization').val();

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
                    $('#branch').append('<option value="">Select Division</option>');

                    var userBranchIds = <?php echo json_encode(is_array($user->branch_id)? $user->branch_id : explode(', ', $user->branch_id)) ?>;
                    
                    var userBranchIdsInteger = userBranchIds.map(function(item){
                        return parseInt(item,10);
                    });
                    

                    response.branches.forEach(function(branchItem) {
                        // $('#branch').append(new Option(branch.name,
                        // branch.id));
                        var option = new Option(branchItem.name, branchItem.id);


                        if(userBranchIdsInteger && userBranchIdsInteger.includes(branchItem.id)){
                            if(branchItem.id !== ""){
                                $(option).attr('selected',true);
                            }
                        }

                        $('#branch').append(option);
                    })

                    firstLoad = false;
                    if (callback && typeof callback == 'function') {
                        callback();
                    }
                },
                error: function(xhr, status, error) {
                    $('#branch').prop('disabled', true);
                    $('#branch').html('');
                    $('#branch').append('<option value="" selected>Select Division</option>');
                }
            })
        }
    }

    function filterSurvey() {
        var organizationVal = $('#organization').val();
        var branchLoadId = firstLoad ? <?php echo json_encode($user->branch_id, 15, 512) ?> : null;
        var branchVal = branchLoadId ? branchLoadId : $('#branch').val();

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
                    $('#survey').append('<option value="" selected>Select Survey</option>');

                    var surveyId = <?php echo json_encode($user->form_id, 15, 512) ?>;

                    response.forms.forEach(function(formItem) {
                        // $('#survey').append(new Option(form.form_title,
                        // form.id));
                        var option = new Option(formItem.form_title, formItem.form_id);

                        if(surveyId && surveyId == formItem.form_id){
                            $(option).attr('selected',true);
                        }

                        $('#survey').append(option);
                    })
                },
                error: function(xhr, status, error) {
                    $('#survey').prop('disabled', true);
                    $('#survey').html('');
                    $('#survey').append('<option value="" selected>Select Survey</option>');
                }
            })
        }
    }
  
    
    
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('typeform.layout.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/krizmaticcomau/projects.krizmatic.com.au/TypeForm-New/resources/views/typeform/users/edit.blade.php ENDPATH**/ ?>
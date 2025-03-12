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

<div class="card" id="formForm">
    <div class="card-header align-items-center d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Update Form</h5>
        <a class="btn btn-info" onclick="history.back(); return false;">
                <i class="ri-arrow-left-line"></i> Back
            </a>
    </div><!-- end card header -->
    <div class="card-body">
        <div class="live-preview">
            <form id="mainForm" action="<?php echo e(route('form.update',$form)); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formId" class="form-label">Form Id</label>
                            <input type="text" name="formId" value="<?php echo e(old('formId',$form->form_id)); ?>" class="form-control" placeholder="Form Id" id="formId"
                                readonly>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="form_name" class="form-label">Form Name</label>
                            <input type="text" name="form_name" value="<?php echo e(old('form_name',$form->form_title)); ?>" class="form-control" placeholder="Form Name"
                                id="form_name">
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>

                            <select id="country" name="country" class="form-select" data-choices
                                data-choices-sorting="true">
                                <option selected>Choose Country</option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($country['name']); ?>" <?php echo e($form->country == $country['name'] ? 'selected':''); ?>><?php echo e($country['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="organization" class="form-label">Organization</label>
                            <select id="organization" name="organization" class="form-select" data-choices
                                data-choices-sorting="true">
                                <option selected>Choose Organization</option>
                                <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($organization->id); ?>" <?php echo e($organization->id == $form->organization_id ? 'selected':''); ?>><?php echo e($organization->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-12" id="setBranchDiv">
                        <div class="my-3">
                            <label for="setBranch" class="form-label">Would you like to set this form to the branch of this organization?</label>
                            <input type="checkbox" <?php echo e($form->branch_id ? 'checked':''); ?> class="ms-2" id="setBranch"/>
                        </div>
                    </div>
                    <?php if($form->branch_id): ?>
                    <div class="col-md-6" id="branchDiv">
                        <div class="mb-3">
                            <label for="branch" class="form-label">Branch</label>
                            <?php
                                $organization_id = $form->branches->organization->id;
                                $branches = \App\Models\Branch::where('organization_id',$organization_id)->get();
                            ?>
                            <select id="branch" name="branch" class="form-select" data-choices
                                data-choices-sorting="true">
                                <option selected>Choose Branch</option>
                                <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($branch->id); ?>" <?php echo e($branch->id == $form->branch_id ? 'selected':''); ?>><?php echo e($branch->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="col-md-6" id="branchDiv" style="display: none">
                        <div class="mb-3">
                            <label for="branch" class="form-label">Branch</label>
                            <select id="branch" name="branch" class="form-select select2" data-choices
                                data-choices-sorting="true" disabled>
                                <option value="" selected>Choose Branch</option>
                            </select>
                        </div>
                    </div>
                    <?php endif; ?>
                    <!--end col-->
                    <div class="card-header align-items-center d-flex mb-3">
                        <h4 class="card-title mb-0 flex-grow-1">Survey Timeline</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <label class="form-label mb-0">Before Survey Date [From - To] </label>
                            <input type="text" name="beforedate" class="form-control mt-2" value="<?php echo e(old('beforedate',$form->before)); ?>" data-provider="flatpickr"
                                data-date-format="d M, Y" data-range-date="true" placeholder="Pick before date range">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <label class="form-label mb-0">During Survey Date [From - To] </label>
                            <input type="text" name="duringdate" class="form-control mt-2" value="<?php echo e(old('beforedate',$form->during)); ?>" data-provider="flatpickr"
                                data-date-format="d M, Y" data-range-date="true" placeholder="Pick during date range">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <label class="form-label mb-0">After Survey Date [From - To] </label>
                            <input type="text" name="afterdate" class="form-control mt-2" value="<?php echo e(old('beforedate',$form->after)); ?>" data-provider="flatpickr"
                                data-date-format="d M, Y" data-range-date="true" placeholder="Pick after date range">
                        </div>
                    </div>
                    <div>
                        <p class="note-tag">Note: Please pick the starting and ending date for survey.</p>
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
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Flatpickr
    flatpickr('[data-provider="flatpickr"]', {
        dateFormat: 'd M, Y',
        enableTime: false,
        mode: 'range',
    });
});
$(document).ready(function() {
    // $('#formSync').submit(function(e) {
    //     e.preventDefault();
    //     var formId = $('#form_id').val();
    //     var SyncIcon = $('#syncBtnIcon');
    //     SyncIcon.addClass("rotate");
    //     var url = "<?php echo e(route('form.get')); ?>";
    //     var apiKey = <?php echo json_encode(config('services.api.key'), 15, 512) ?>;
    //     var questions = [];

    //     $.ajax({
    //         url: url,
    //         type: 'GET',
    //         data: {
    //             form_id: formId
    //         },
    //         headers: {
    //             'Authorization': 'Bearer ' + apiKey
    //         },
    //         success: function(response) {
    //             $('#form_id').val(formId);
    //             $('#form_id').prop('readonly', true);
    //             $('#formForm').css('display', 'flex');
    //             $('#formIdMessage').removeClass('text-danger');
    //             $('#formIdMessage').addClass('text-success');
    //             $('#formIdMessage').text('Form Sync Successfully!!!');
    //             $('#formIdMessage').css('display', 'flex');

    //             $('#formId').val(formId);
    //             $('#form_name').val(response.data.title);

    //             const filteredQuestions = response.data.fields.filter(item => item.type !==
    //                 'statement');

    //             filteredQuestions.forEach(function(question) {
    //                 var questionInput = $('<input>')
    //                     .attr('type', 'hidden')
    //                     .attr('name', 'questions[]')
    //                     .val(question.title)

    //                 $('#mainForm').append(questionInput);
    //             });
    //             SyncIcon.removeClass("rotate");
    //         },
    //         error: function(xhr, status, error) {
    //             $('#form_id').val('');
    //             $('#formForm').css('display', 'none');

    //             $('#formIdMessage').removeClass('text-success');
    //             $('#formIdMessage').addClass('text-danger');

    //             $('#formIdMessage').text(xhr.responseJSON.message);
    //             $('#formIdMessage').css('display', 'flex');
    //             SyncIcon.removeClass("rotate");
    //             // toastr.error('The form with this ID was not found.', 'Error', {
    //             //     closeButton: true, 
    //             //     progressBar: true, 
    //             //     timeOut: 5000
    //             // });
    //         }
    //     })
    // })

    $('#organization,#setBranch').change(function() {
        var organizationVal = $('#organization').val();
        console.log(organizationVal);
        if (organizationVal !== '') {
           $('#setBranchDiv').css('display','block');

           if($('#setBranch').prop('checked')){
                $('#branchDiv').css('display','block');
                branch(organizationVal)
           }else{
                $('#branchDiv').css('display','none');
                $('#branch').val('');
           }
           
        }else{
            $('#setBranchDiv').css('display','none');
        }
    });
    // $('#organization').change(function() {
    //     var organizationVal = $('#organization').val();

    //     if (organization !== '') {
           
    //     }
    // });

    function branch(organizationVal){
        $.ajax({
                url: "<?php echo e(route('branch.get')); ?>",
                method: 'GET',
                data: {
                    organization_id: organizationVal
                },
                success: function(response) {
                    $('#branch').prop('disabled', false);
                    $('#branch').html('');
                    $('#branch').append('<option selected>Choose Branch</option>');
                    response.branches.forEach(function(branch) {
                        $('#branch').append(new Option(branch.name, branch.id));
                    })
                },
                error: function(xhr, status, error) {
                    $('#branch').prop('disabled', true);
                    $('#branch').html('');
                    $('#branch').append('<option selected>Choose Branch</option>');
                }
            })
    }

})
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('typeform.layout.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/prateeklalwani/Desktop/Typeform Main/typeform-dashboard/resources/views/typeform/form/edit.blade.php ENDPATH**/ ?>
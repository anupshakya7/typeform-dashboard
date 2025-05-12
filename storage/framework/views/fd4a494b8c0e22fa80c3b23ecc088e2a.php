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
<style>
  .checkbox-wrapper-55 input[type="checkbox"] {
    visibility: hidden;
    display: none;
  }

  .checkbox-wrapper-55 *,
  .checkbox-wrapper-55 ::after,
  .checkbox-wrapper-55 ::before {
    box-sizing: border-box;
  }

  .checkbox-wrapper-55 .rocker {
    display: inline-block;
    position: relative;
    /*
    SIZE OF SWITCH
    ==============
    All sizes are in em - therefore
    changing the font-size here
    will change the size of the switch.
    See .rocker-small below as example.
    */
    font-size: 2em;
    font-weight: bold;
    text-align: center;
    text-transform: uppercase;
    color: #888;
    width: 7em;
    height: 4em;
    overflow: hidden;
    border-bottom: 0.5em solid #eee;
  }

  .checkbox-wrapper-55 .rocker-small {
    font-size: 0.75em;
  }

  .checkbox-wrapper-55 .rocker::before {
    content: "";
    position: absolute;
    top: 0.5em;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #999;
    border: 0.5em solid #eee;
    border-bottom: 0;
  }

  .checkbox-wrapper-55 .switch-left,
  .checkbox-wrapper-55 .switch-right {
    cursor: pointer;
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 2.5em;
    width: 3em;
    transition: 0.2s;
    user-select: none;
  }

  .checkbox-wrapper-55 .switch-left {
    height: 2.4em;
    width: 2.75em;
    left: 0.85em;
    bottom: 0.4em;
    background-color: #ddd;
    transform: rotate(15deg) skewX(15deg);
  }

  .checkbox-wrapper-55 .switch-right {
    right: 0.5em;
    bottom: 0;
    background-color: #bd5757;
    color: #fff;
  }

  .checkbox-wrapper-55 .switch-left::before,
  .checkbox-wrapper-55 .switch-right::before {
    content: "";
    position: absolute;
    width: 0.4em;
    height: 2.45em;
    bottom: -0.45em;
    background-color: #ccc;
    transform: skewY(-65deg);
  }

  .checkbox-wrapper-55 .switch-left::before {
    left: -0.4em;
  }

  .checkbox-wrapper-55 .switch-right::before {
    right: -0.375em;
    background-color: transparent;
    transform: skewY(65deg);
  }

  .checkbox-wrapper-55 input:checked + .switch-left {
    background-color: #0084d0;
    color: #fff;
    bottom: 0px;
    left: 0.5em;
    height: 2.5em;
    width: 3em;
    transform: rotate(0deg) skewX(0deg);
  }

  .checkbox-wrapper-55 input:checked + .switch-left::before {
    background-color: transparent;
    width: 3.0833em;
  }

  .checkbox-wrapper-55 input:checked + .switch-left + .switch-right {
    background-color: #ddd;
    color: #888;
    bottom: 0.4em;
    right: 0.8em;
    height: 2.4em;
    width: 2.75em;
    transform: rotate(-15deg) skewX(-15deg);
  }

  .checkbox-wrapper-55 input:checked + .switch-left + .switch-right::before {
    background-color: #ccc;
  }

  /* Keyboard Users */
  .checkbox-wrapper-55 input:focus + .switch-left {
    color: #333;
  }

  .checkbox-wrapper-55 input:checked:focus + .switch-left {
    color: #fff;
  }

  .checkbox-wrapper-55 input:focus + .switch-left + .switch-right {
    color: #fff;
  }

  .checkbox-wrapper-55 input:checked:focus + .switch-left + .switch-right {
    color: #333;
  }
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!--greeting section -->

<div class="mb-3 pb-1 d-flex align-items-center flex-row">
    <div class="flex-grow-1">
        <h4 class="fs-16 mb-1">Create Survey Form</h4>
        <p class="text-muted mb-0">Note: Please sync the form ID to create the form.</p>
    </div>
</div>

<!--end greeting section-->
<div class="card">
    <div class="card-header d-flex flex-row justify-content-between align-items-center">
        <h5 class="card-title mb-0">Form Sync</h5>
        <a class="btn btn-info" onclick="history.back(); return false;">
                <i class="ri-arrow-left-line"></i> Back
            </a>
    </div>
    <div class="card-body">
        <div class="live-preview">
            <form id="formSync">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="form_id" class="form-label">Survey Id<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Form Id" id="form_id">
                                <button type="submit" id="syncFormBtn" class="btn btn-blue"><i
                                        class="fa-solid fa-arrows-rotate me-2" id="syncBtnIcon"></i><span>Sync</span></button>
                            </div>
                            <span class="ms-1" id="formIdMessage" style="display:none;margin-top:5px;"></span>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>
    <div class="loader-container">
        <div class="loader"></div>
    </div>

</div>

<div class="card" id="formForm" style="display:none;">
    <div class="card-header align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">Survey</h4>
    </div><!-- end card header -->
    <div class="card-body">
        <div class="live-preview">
            <form id="mainForm" action="<?php echo e(route('form.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formId" class="form-label">Survey Id<span class="text-danger">*</span></label>
                            <input type="text" name="formId" class="form-control" placeholder="Form Id" id="formId"
                                readonly>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="form_name" class="form-label">Survey Name<span class="text-danger">*</span></label>
                            <input type="text" name="form_name" class="form-control" placeholder="Form Name"
                                id="form_name">
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="country" class="form-label">Country<span class="text-danger">*</span></label>

                            <select id="country" name="country" class="form-select select2" >
                                <option value="" selected>Select Country</option>
                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($country['name']); ?>"><?php echo e($country['name']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="organization" class="form-label">Organization<span class="text-danger">*</span></label>
                            <select id="organization" name="organization" class="form-select select2" >
                                <option value="" selected>Select Organization</option>
                                <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($organization->id); ?>" <?php echo e(auth()->user()->role->name=='division' &&  $organization->id == auth()->user()->organization_id ? 'selected':''); ?> ><?php echo e($organization->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-12" id="setBranchDiv" style="display: none;">
                        <div class="my-3">
                            <label for="setBranch" class="form-label">Would you like to set this form to the division of this organization?</label>
                            <input type="checkbox" class="ms-2" id="setBranch" <?php if(auth()->user()->role->name=='division'): ?>checked <?php endif; ?> />
                        </div>
                    </div>
                    <div class="col-md-6" id="branchDiv" style="display: none">
                        <div class="mb-3">
                            <label for="branch" class="form-label">Division
                                <?php if(auth()->user()->role->name=='division'): ?>
                                <span class="text-danger">*</span>
                                <?php endif; ?>
                            </label>
                            <select id="branch" name="branch" class="form-select select2" disabled>
                                <option value="" selected>Select Division</option>
                            </select>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="card-header align-items-center d-flex mb-3">
                        <h4 class="card-title mb-0 flex-grow-1">Survey Timeline</h4>
                    </div>
                    <!--<div class="note">-->
                    <div>
                        <p>Note: Please enter the survey dates for each phase: before the project starts, during the project, and after completion. If a survey phase hasn’t been conducted yet, you can leave those dates empty.</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <label class="form-label mb-0">Before Survey Date [From - To]<span class="text-danger">*</span></label>
                            <input type="text" name="beforedate" class="form-control mt-2" data-provider="flatpickr"
                                data-date-format="d M, Y" data-range-date="true" placeholder="Pick before date range">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <label class="form-label mb-0">During Survey Date [From - To] </label>
                            <input type="text" name="duringdate" class="form-control mt-2" data-provider="flatpickr"
                                data-date-format="d M, Y" data-range-date="true" placeholder="Pick during date range">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <label class="form-label mb-0">After Survey Date [From - To] </label>
                            <input type="text" name="afterdate" class="form-control mt-2" data-provider="flatpickr"
                                data-date-format="d M, Y" data-range-date="true" placeholder="Pick after date range">
                        </div>
                    </div>
                    
                    <div class="btn-submit-container">
                        <button type="button" class="btn btn-blue btn-submit" data-bs-toggle="modal" data-bs-target="#exampleModal" >Submit</button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-overlay">
                            <div class="modal-container">
                    
                                <div class="modal-content custom-modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title">Note</h2>
                                    <a class="close-button" data-bs-dismiss="modal" style="cursor: pointer !important;"><i class="fa-solid fa-xmark"></i></a>
                                </div>
                                    <div class="instruction-step">
                                        <span class="step-number">1</span>
                                        <span class="step-title">Go to your Typeform account</span>
                                        <p class="step-description">Log in to your Typeform account where your survey form is hosted.</p>
                                    </div>
                                    
                                    <div class="instruction-step">
                                        <span class="step-number">2</span>
                                        <span class="step-title">Navigate to the Connect section</span>
                                        <p class="step-description">Select your form and go to the "Connect" section in the form editor.</p>
                                    </div>
                                    
                                    <div class="instruction-step">
                                        <span class="step-number">3</span>
                                        <span class="step-title">Add the webhook URL</span>
                                        <p class="step-description">In the webhook settings, add the following URL:</p>
                                        <span class="webhook-url">https://projects.krizmatic.com.au/TypeForm-New/public/answer</span>
                                    </div>
                                    
                                    <div class="instruction-step border-0">
                                        <span class="step-number">4</span>
                                        <span class="step-title">Save and activate the webhook</span>
                                        <p class="step-description">After adding the URL, save your changes and turn on the webhook to start receiving responses in real-time.</p>
                                    </div>
                                    <div calss="d-flex flex-row">
                                        <p class="webhook-url m-0 mb-2 d-flex align-items-center gap-3 align-items-center">
                                            <label for="webhook" class="m-0 flex-shrink-0">
                                                "Have you added & activated Webhook URL in Typeform?"
                                            </label> 
                                            <span class="checkbox-wrapper-55 flex-shrink-0">
                                                <label class="rocker rocker-small m-0 p-0">
                                                    <input type="checkbox" name="webhook" id="webhook">
                                                    <span class="switch-left">Yes</span>
                                                    <span class="switch-right">No</span>
                                                </label>
                    </span>
                                                            <!-- <input type="checkbox" name="webhook" id="webhook">  -->

                                        </p>

                                    </div>
                                    <div class="modal-footer ">
                                
                                    
                                    <button type="submit" class="confirm-button btn-blue">Submit</button>
                                </div>
                                </div>
                                
                            </div>
                        </div>
                        </div>
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



<!-- Button trigger modal -->



                    

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
    $('#formSync').submit(function(e) {
        e.preventDefault();
        var formId = $('#form_id').val();
        var SyncIcon = $('#syncBtnIcon');
        SyncIcon.addClass("rotate");
        var url = "<?php echo e(route('form.get')); ?>";
        var apiKey = <?php echo json_encode(config('services.api.key'), 15, 512) ?>;
        var questions = [];

        $.ajax({
            url: url,
            type: 'GET',
            data: {
                form_id: formId
            },
            headers: {
                'Authorization': 'Bearer ' + apiKey
            },
            success: function(response) {
                $('#form_id').val(formId);
                $('#form_id').prop('readonly', true);
                $('#formForm').css('display', 'flex');
                $('#formIdMessage').removeClass('text-danger');
                $('#formIdMessage').addClass('text-success');
                $('#formIdMessage').text('Form Sync Successfully!!!');
                $('#formIdMessage').css('display', 'flex');

                $('#formId').val(formId);
                $('#form_name').val(response.data.title);
                
                const filteredQuestions = response.data.fields.filter(item => item.type !==
                    'statement');
                    
                if(filteredQuestions[0]['type'] !== "short_text"){
                     var questionInput = $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'questions[]')
                        .val("");
                    $('#mainForm').append(questionInput);
                }
                filteredQuestions.forEach(function(question) {
                    var questionInput = $('<input>')
                        .attr('type', 'hidden')
                        .attr('name', 'questions[]')
                        .val(question.title)

                    $('#mainForm').append(questionInput);
                });
                SyncIcon.removeClass("rotate");
            },
            error: function(xhr, status, error) {
                $('#form_id').val('');
                $('#formForm').css('display', 'none');

                $('#formIdMessage').removeClass('text-success');
                $('#formIdMessage').addClass('text-danger');

                $('#formIdMessage').text(xhr.responseJSON.message);
                $('#formIdMessage').css('display', 'flex');
                SyncIcon.removeClass("rotate");
            }
        })
    })

     //Filter Organizations
    // $('#country').change(function() {
    //     var countryVal = $('#country').val();

    //     if (countryVal !== '') {
    //         $.ajax({
    //             url: "<?php echo e(route('organization.get')); ?>",
    //             method: 'GET',
    //             data: {
    //                 country: countryVal
    //             },
    //             success: function(response) {
    //                 console.log(response);
    //                 $('#organization').prop('disabled', false);
    //                 $('#organization').html('');
    //                 $('#organization').append('<option value="" selected>Choose Organization</option>');
    //                 response.organizations.forEach(function(organization) {
    //                     $('#organization').append(new Option(organization.name, organization.id));
    //                 })
    //             },
    //             error: function(xhr, status, error) {
    //                 $('#organization').prop('disabled', true);
    //                 $('#organization').html('');
    //                 $('#organization').append('<option value="" selected>Choose Organization</option>');
    //             }
    //         })
    //     }
    // });

    checkBoxBranch();

    //Filter Branches
    $('#organization,#setBranch').change(function() {
        checkBoxBranch();
    });

    function checkBoxBranch(){
        var organizationVal = $('#organization').val();
        
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
    }

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
                    $('#branch').append('<option value="" selected>Select Division</option>');

                    var userRole = <?php echo json_encode(auth()->user()->role->name, 15, 512) ?>;
                    var userBranchId = <?php echo json_encode(auth()->user()->branch_id, 15, 512) ?>;

                   
                    var branchList = response.branches.filter(function(branch){
                        if(userRole == "division"){
                            let branchIds = Array.isArray(userBranchId) ? userBranchId : userBranchId.split(', ');
                            return branchIds.includes(branch.id.toString());
                        }

                        return true;
                    });

                    branchList.forEach(function(branch) {
                        $('#branch').append(new Option(branch.name, branch.id));
                    })
                },
                error: function(xhr, status, error) {
                    $('#branch').prop('disabled', true);
                    $('#branch').html('');
                    $('#branch').append('<option value="" selected>Select Division</option>');
                }
            })
    }
});

function changeWebHookValue(value){
    $("#webhook").val(value);
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('typeform.layout.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/krizmaticcomau/projects.krizmatic.com.au/TypeForm-New/resources/views/typeform/form/create.blade.php ENDPATH**/ ?>
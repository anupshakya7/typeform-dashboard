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
        <h4 class="fs-16 mb-1">Add New Country and State fields in Survey Form</h4>
        <p class="text-muted mb-0">Note: Please sync the form ID to add country and state fields in the form.</p>
    </div>
</div>

<!--end greeting section-->
<div class="card">
    <div class="card-header d-flex flex-row justify-content-between align-items-center">
        <h5 class="card-title mb-0">Form Sync</h5>
    </div>
    <div class="card-body">
        <div class="live-preview">
            <form action="<?php echo e(route('form.insert.field.submit')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="form_id" class="form-label">Survey Id<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Form Id" id="formId">
                                <button type="button" id="sync_form" class="btn btn-blue"><i
                                        class="fa-solid fa-arrows-rotate me-2" id="syncBtnIcon"></i><span>Sync</span></button>
                            </div>
                            <span id="form_message"></span>
                        </div>
                        <div id="form_details">
                            <input type="hidden" name="typeform_data" id="typeform_data">
                           <label for="">Select Fields For Form</label> 
                           <br>
                           
                           <input type="checkbox" name="fields[country]" id="country"> <label for="country">Country</label> <br>
                           <input type="checkbox" name="fields[state]" id="state" disabled> <label for="state">State</label> <br>
                           <p style="display:inline-block;border-radius:5px;color:#fff;padding:4px 10px;font-size:14px;font-weight:500;margin-top:10px;background-color:rgb(142, 15, 15);box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;">For State you should check country first</p>
                            <?php $__errorArgs = ['fields.country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>      
                        <div class="my-3">
                            <div id="addBtnWrapper" style="position: relative;">
                                <button type="submit" class="btn btn-primary float-end mx-1" id="addBtn" disabled>Add Fields</button>
                            </div>
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
$(document).ready(function(){
            $('#sync_form').click(function(){
                var syncBtnIcon = $('#syncBtnIcon');
                syncBtnIcon.addClass('rotate');
                let formId = $('#formId').val();
                let baseUrl = "<?php echo e(url('typeform/form/form-details')); ?>";

                $.ajax({
                    url: baseUrl+'/'+formId,
                    type:'GET',
                    success: function(response){
                        $('#form_message').text('Successfully Sync!!!');
                        syncBtnIcon.removeClass('rotate');
                        $('#form_message').removeClass('text-danger');
                        $('#form_message').addClass('text-success');
                        $('#formId').attr('disabled',true);
                        $('#typeform_data').val(JSON.stringify(response));
                        $('#addBtn').attr('disabled',false);
                    },
                    error: function(err){
                        $('#form_message').text('Failed to Sync');
                        syncBtnIcon.removeClass('rotate');
                        $('#form_message').removeClass('text-success');
                        $('#form_message').addClass('text-danger');
                        $('#formId').val('');
                        $('#formId').attr('disabled',false);
                        $('#addBtn').attr('disabled',true);
                    }
                })
            });

            //Country Checkbox
            $('#country').change(function(){
                checkCountryCheckBox();
            });
            checkCountryCheckBox();

            function checkCountryCheckBox(){
                if($('#country').is(':checked')){
                    $('#state').attr('disabled',false);
                    $('#check_country').css('display','none');
                }else{
                    $('#state').attr('disabled',true);
                    $('#check_country').css('display','block');
                }
            }
           
        });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('typeform.layout.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/prateeklalwani/Desktop/Typeform Main/typeform-dashboard/resources/views/typeform/form/insertField.blade.php ENDPATH**/ ?>
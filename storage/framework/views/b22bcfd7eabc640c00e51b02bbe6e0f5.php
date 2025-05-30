
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.crm'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<style>
       .container-fluid {
       position: relative;
       /**
display:inline-flex;
justify-content: center;
**/
       }
       
       .footer {
        position: absolute !important;
       margin-left: var(--vz-vertical-menu-width);
       bottom: 40px;
    padding: 20px .75rem;
    right: 0;
    color: var(--vz-footer-color);
    left: 0;
    height: 60px;
    background-color: none;
    z-index: -1;}
	.page-content {
		    width: 100%;
    height: 100%;
   /**  position: absolute;**/
    top: 0;
    left: 0;
    margin: 0 auto;
	}
	.highlight-area {
        position: absolute;
    background-color: none;
    border-radius: 10px;
    padding: 20px 7px;
    width: 100%;
    background-color: white;
       
		/** width: 85%; **/
		/** margin: 0 auto; **/
		margin-bottom: 100px;
 /** z-index: 99999999; /* Higher than overlay */ 
    pointer-events: auto !important; /* Force allow interactions */
		@media(max-width:767px) {
			width: 100%;
					margin-bottom: 0;

		}
	}
	
</style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row highlight-area">
        <div class="col">
            <div class="h-100">

                <!--greeting section -->

                <div>
                    <div>
                        <h4>Welcome back, <?php echo e(auth()->user()->name); ?></h4>
                    </div>
                </div>

                <div class="row">
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate stat-card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex flex-row gap-2 align-items-center">
                        <i class="fa-regular fa-file"></i>
                        <p class="mb-0">Surveys</p>
                    </div>
                    <div class="flex-shrink-0">
                        <div data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas"
                            aria-controls="theme-settings-offcanvas"
                            data-title="Surveys" 
                            data-content="<p>Total number of surveys conducted.</p>"
                            >
                            <i class='bx bx-info-circle' style="font-size:20px"></i>
                        </div>
                    </div>
                </div>
                <div class=" mt-2">
                    <h4 class="fs-22 fw-semibold ff-secondary"><span class="counter-value"
                            data-target="<?php echo e($topBox['survey']); ?>"><?php echo e($topBox['survey']); ?></span>
                    </h4>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate stat-card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex flex-row gap-1 align-items-center">
                        <i class="fa-solid fa-earth-americas"></i>
                        <p class="mb-0">Countries</p>
                    </div>
                    <div class="flex-shrink-0">
                        <div data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas"
                            aria-controls="theme-settings-offcanvas"
                            data-title="Countries" 
                            data-content="<p>Total number of countries where the survey was conducted.</p>"
                            >
                            <i class='bx bx-info-circle' style="font-size:20px"></i>
                        </div>
                    </div>
                </div>
                <div class=" mt-2">
                    <h4 class="fs-22 fw-semibold ff-secondary "><span class="counter-value"
                            data-target="<?php echo e($topBox['countries']); ?>"><?php echo e($topBox['countries']); ?></span>
                    </h4>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate stat-card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex flex-row gap-2 align-items-center">
                        <i class="fa-solid fa-building-columns"></i>
                        <p class="mb-0">Organisations</p>
                    </div>
                    <div class="flex-shrink-0">
                        <div data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas"
                            aria-controls="theme-settings-offcanvas"
                            data-title="Organisations" 
                            data-content="<p>Total number of organisations conducting the survey.</p>"
                            >
                            <i class='bx bx-info-circle' style="font-size:20px"></i>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <h4 class="fs-22 fw-semibold ff-secondary"><span class="counter-value"
                            data-target="<?php echo e($topBox['organizations']); ?>"><?php echo e($topBox['organizations']); ?></span>
                    </h4>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-xl-3 col-md-6">
        <!-- card -->
        <div class="card card-animate stat-card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex flex-row gap-2 align-items-center">
                        <i class="fa-solid fa-user"></i>
                        <p class="mb-0">Survey Participants</p>
                    </div>
                    <div class="flex-shrink-0">
                        <div data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas"
                            aria-controls="theme-settings-offcanvas"
                            data-title="Survey Participants" 
                            data-content="<p>Total number of respondents who participated in the survey.</p>"
                            >
                            <i class='bx bx-info-circle' style="font-size:20px"></i>
                        </div>
                    </div>
                </div>
                <div class=" mt-2">
                    <h4 class="fs-22 fw-semibold ff-secondary"><span class="counter-value"
                            data-target="<?php echo e($topBox['people']); ?>"><?php echo e($topBox['people']); ?></span>
                    </h4>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
</div> <!-- end row-->
                <!-- end row-->
                <!--end greeting section-->     
            
            <!--initial filter section-->
                <div class="filter-section show-filter mb-3">
                    <div class="d-flex flex-eow justify-content-between">
                    <div>
                        <h5 style="font-size:16px;" class="mb-3">Select a Survey to View Insights</h5>
                        <?php
                            $user = auth()->user()->role->name;
                            if($user == 'superadmin'){
                                $lastText = ' or <b>Organisation</b>';
                            }elseif($user == 'organization'){
                                $lastText = ' or <b>Division</b>';
                            }else{
                                $lastText = '';
                            }
                        ?>
                        <p>Choose a survey to explore detailed insights. Use the filters to narrow results by <b>Country</b><?php echo $lastText; ?>.</p>
                    </div>
                    </div>

                    <div class="mt-3 mt-lg-0 d-flex justify-content-between flex-wrap gap-3" >
                        <form action="<?php echo e(route('home.index')); ?>" method="GET">
                        <div class="row gap-3 m-0 p-0 dashboard flex-nowra align-items-center">
                            <input type="hidden" name="formType" id="formtype"/>
                                
                                <div class="col-auto p-0">
                                    <?php if(auth()->user()->role->name == 'superadmin'): ?>
                                    <select class="form-select select2" id="organization" name="organization"
                                        aria-label="Default select example">
                                        <option value="" selected>Select Organization</option>
                                        <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($organization->id); ?>">
                                                <?php echo e($organization->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php else: ?>
                                    <input type="text" class="form-control organization-name" value="<?php echo e(auth()->user()->organization->name); ?>" readonly>
                                    <input type="hidden" name="organization" class="form-control" value="<?php echo e(old('organization',auth()->user()->organization_id)); ?>" id="organization" readonly>
                                    <?php endif; ?>
                                </div>

                                <div class="col-auto p-0">
                                    
                                    <select class="form-select select2" id="branch" name="branch"
                                        aria-label="Default select example" disabled>
                                        <option value="" selected>Select Division</option>
                                    </select>
                                    
                                </div>
                                <div class="col-auto p-0">
                                    
                                    <select class="form-select select2" name="survey" id="survey"
                                        aria-label="Default select example">
                                        <option value="" selected>Select Survey</option>
                                        <?php $__currentLoopData = $surveyForms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surveyForm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($surveyForm->form_title); ?>" data-formtype="<?php echo e($surveyForm->form_type); ?>"
                                                 <?php if($surveyForm->form_type == 0): ?>
                                                    data-country="<?php echo e($surveyForm->country); ?>"
                                                <?php elseif($surveyForm->form_type ==1): ?>
                                                    data-country-url="<?php echo e(route('countrystate.get', ['surveyId' => $surveyForm->form_id])); ?>"
                                                <?php endif; ?>
                                                 >
                                                
                                                <?php echo e($surveyForm->form_title); ?> (<?php echo e($surveyForm->form_type == 1 ? 'Global':'Single'); ?>)</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    
                                </div>
                                <div class="col-auto p-0" id="countryField">
                                    <input type="text" class="form-control" name="country" id="country_input" readonly style="display:none;">

                                    <select class="form-select select2" name="country" id="country_select"
                                        aria-label="Default select example" disabled>
                                        <option value="" selected>Select Country</option>

                                        <?php
                                            $countries = App\Models\NCountry::all();
                                        ?>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->code); ?>">
                                                <?php echo e($country->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    
                                    
                                </div>
                                <div class="col-auto p-0">
                                    
                                    <select class="form-select select2" name="state" id="state_select"
                                        aria-label="Default select example" disabled>
                                        <option value="" selected>Select State</option>
                                    </select>
                                    
                                    
                                </div>
                                
                                
                                <div class="col-auto p-0">
                                    
                                <button href="#" class="view-insight-btn" id="filter_btn"  <?php echo e(request('survey') ? '' :'disabled'); ?> >
                                        <span>View Insight</span>
                                        <i class='bx bx-arrow-back bx-rotate-180' ></i>
                                    </button>
                                    

                                </div>
                                
                            </div>
                            
                            </div>

                        </form>
                        
                </div>
            <!--initial filter section-->


                <!--table section starts here -->
            </div> <!-- end .h-100-->

        </div> <!-- end col -->
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <!-- apexcharts -->
    <script src="<?php echo e(URL::asset('build/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/apexcharts-pie.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/dashboard-crm.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/apexcharts-radar.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>

    <script>
        $(document).ready(function() {
            var branch_id = <?php echo json_encode($filterData->branch_id ?? null); ?>;
            var survey_id = <?php echo json_encode($filterData->form_id ?? null); ?>;

            //Parameters
            var country = getQueryParams('country');
            var organization = getQueryParams('organization');
            var branch = branch_id ? branch_id : getQueryParams('branch');
            var survey = survey_id ? survey_id : getQueryParams('survey');

            var isFirstLoad = true;

            //filterOrganization();
            filterBranch();
            filterSurvey();
            filterBtn();


            $(document).on('change', '#country', function() {
                filterSurvey();
            });
            $(document).on('change', '#organization', function() {
                $('#branch').prop('disabled', true);
                $('#branch').html('');
                $('#branch').html('<option value="" selected>Select Division</option>');
                
                // filterBranch(function() {
                //     filterSurvey();
                // });

                filterBranch();
                filterSurvey();
                disableCountryField();
                disableStateField();
            });
            $(document).on('change', '#branch', function() {
                filterSurvey();
                disableCountryField();
                disableStateField();
            });

            $(document).on('change input', '#survey', function() {
                filterBtn();
            });

            function filterBtn(){
                let surveyValue = $('#survey').val();
                let surveyType = $('#survey option:selected').data('formtype');
                let surveyCountry = $('#survey option:selected').data('country');

                filterCountry(surveyType,surveyCountry);

                if(surveyValue!==""){
                    $('#filter_btn').prop('disabled',false);
                    $('#filter_btn').popover('dispose').removeAttr('tabindex data-bs-toggle data-bs-trigger data-bs-content');

                }else{
                    $('#filter_btn').prop('disabled', true);
                    $('#filter_btn').attr({
                        'tabindex': '0',
                        'data-bs-toggle': 'popover',
                        'data-bs-trigger': 'hover focus',
                        'data-bs-content': 'Select survey to view insights!',
                        'data-bs-placement' : 'top'
                    }).popover();

                   
                    disableCountryField();
                    disableStateField();
                   
                }
            }

            function disableCountryField(){
                $('#country_input').val('').hide();
                $('#country_select').val('').prop('disabled', true).trigger('change.select2');
                $('#country_select').empty().append('<option value="" selected>Select Country</option>');
                $('#country_select').parent().find('.select2-container').show();
            }

            function disableStateField(){
                $('#state_select').val('').prop('disabled', true).trigger('change.select2');
                $('#state_select').empty().append('<option value="" selected>Select State</option>');
            }

            function filterCountry(surveyType,surveyCountry){

                if (surveyType == 0) {
                    $('#country_select').parent().find('.select2-container').hide();
                    $('#country_select').prop('disabled', true);

                    $('#country_input').show().val(surveyCountry);

                    disableStateField();
                    
                } else if (surveyType == 1) {
                    $('#country_input').hide();
                    $('#country_select').parent().find('.select2-container').show();
                    $('#country_select').prop('disabled', false);

                    //Clear existing options
                    $('#country_select').empty().append('<option value="" selected>Select Country</option>');

                    let countryUrl = $('#survey option:selected').data('country-url');
                    
                    if(countryUrl){
                        $.get(countryUrl,function(data){
                            if(data && data.data){
                                data.data.forEach(function(country){
                                    $('#country_select').append(
                                        `<option value="${country.code}">${country.country}</option>`
                                    );
                                });

                                $('#country_select').trigger('change.select2');
                            }
                        });
                    }
                }
            }

            $('#country_select').change(function(){
               let surveyId = $('#survey').val();
               let countryCode = $(this).val();

               let surveyType = $('#survey option:selected').data('formtype');

               if(surveyType == 1){
                    filterState(surveyId,countryCode);
                    $('#state_select').prop('disabled',false);
               }
            });

            function filterState(surveyId,countryCode){
                $('#state_select').empty().append('<option value="" selected>Select State</option>');
                
                if (surveyId && countryCode) {
                    let stateUrl = `<?php echo e(url('/')); ?>/typeform/getCountryState/${surveyId}/${countryCode}`;
                    
                    $.get(stateUrl,function(response){
                        if(response && response.data){
                            response.data.forEach(function(state){
                                $('#state_select').append(
                                     `<option value="${state.code}">${state.state}</option>`
                                );
                            });

                            $('#state_select').trigger('change.select2');
                        }
                    });
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
                            $('#branch').append('<option value="" selected>Select Division</option>');

                            var userRole = <?php echo json_encode(auth()->user()->role->name, 15, 512) ?>;
                            var userBranchId = <?php echo json_encode(auth()->user()->branch_id, 15, 512) ?>;

                            var branchList = response.branches.filter(function(branch){
                                if(userRole == "division" || userRole == "survey"){
                                    let branchIds = Array.isArray(userBranchId) ? userBranchId : userBranchId.split(', ');
                                    return branchIds.includes(branch.id.toString());
                                }

                                return true;
                            });
                            
                            if (isFirstLoad) {
                                branchList.forEach(function(branchItem) {
                                    // $('#branch').append(new Option(branch.name,
                                    // branch.id));
                                    var option = new Option(branchItem.name, branchItem.id);
                                    $('#branch').append(option);

                                    if (branch && branch == branchItem.id) {
                                        $(option).prop('selected', true);
                                    }
                                });
                            } else {
                                branchList.forEach(function(branchItem) {
                                    var option = new Option(branchItem.name, branchItem.id);
                                    $('#branch').append(option);
                                });
                            }

                            if (callback && typeof callback == 'function') {
                                callback();
                            }

                            isFirstLoad = false;
                        },
                        error: function(xhr, status, error) {
                            $('#branch').prop('disabled', true);
                            $('#branch').html('');
                            $('#branch').append('<option value="" selected>Select Division</option>');
                        }
                    })
                }
            }

            function filterSurvey(){ 
                filterBtn();
                var countryVal = $('#country').val();
                var organizationVal = $('#organization').val();
                var branchVal = isFirstLoad ? branch : $('#branch').val();

                // if (organizationVal !== '' || countryVal !='') {
                    $.ajax({
                        url: "<?php echo e(route('survey.get')); ?>",
                        method: 'GET',
                        data: {
                            country: countryVal,
                            organization_id: organizationVal,
                            branch_id: branchVal
                        },
                        success: function(response) {
                            $('#survey').prop('disabled', false);
                            $('#survey').html('');
                            $('#survey').append('<option value="" selected>Select Survey</option>');

                            var userRole = <?php echo json_encode(auth()->user()->role->name, 15, 512) ?>;
                            var userBranchId = <?php echo json_encode(auth()->user()->branch_id, 15, 512) ?>;

                            console.log('userRole',userRole);

                            console.log('before survey filter',response.forms);

                            var formList = response.forms.filter(function(form){
                                if(userRole == "division"){
                                    var branchIds = Array.isArray(userBranchId) ? userBranchId : userBranchId.split(', ').map(id => id.trim());
                                    
                                    if(form.branch_id !== null){
                                        console.log(branchIds.includes(form.branch_id.toString()));
                                        return branchIds.includes(form.branch_id.toString());
                                    }else{
                                        return false;
                                    }
                                }
                                return true;
                            });

                          
                            
                            formList.forEach(function(formItem) {
                                let formType = formItem.form_type == 1 ? 'Global':'Single'; 
                                let formTypeValue = formItem.form_type;

                                if(userRole == 'survey'){
                                    let surveyId = <?php echo json_encode(auth()->user()->form_id, 15, 512) ?>;
                                    let surveyIds = Array.isArray(surveyId) ? surveyId : surveyId.split(', ');

                                    if(surveyIds.includes(formItem.form_id)){
                                        var option = new Option(formItem.form_title+' ('+formType+')', formItem.form_id);
                                        option.setAttribute('data-formtype',formTypeValue);
                                        if(formTypeValue == 0){
                                            option.setAttribute('data-country',formItem.country);
                                        }else if(formTypeValue == 1){
                                            let countryUrl = `<?php echo e(url('/')); ?>/typeform/getCountryState/${formItem.form_id}`;
                                            option.setAttribute('data-country-url',countryUrl);
                                        }
                                        $('#survey').append(option);

                                        if (survey && survey == formItem.form_id) {
                                            $(option).prop('selected', true);
                                        }
                                    }
                                }else{
                                    var option = new Option(formItem.form_title+' ('+formType+')', formItem.form_id);
                                    option.setAttribute('data-formtype',formTypeValue);
                                    if(formTypeValue == 0){
                                        option.setAttribute('data-country',formItem.country);
                                    }else if(formTypeValue == 1){
                                        let countryUrl = `<?php echo e(url('/')); ?>/typeform/getCountryState/${formItem.form_id}`;
                                        option.setAttribute('data-country-url',countryUrl);
                                    }

                                    $('#survey').append(option);

                                    if (survey && survey == formItem.form_id) {
                                        $(option).prop('selected', true);
                                    }
                                }
                            });
                           

                            if(response.forms.length > 0){
                                let surveyVal2 = $('#survey').val();
                                if(surveyVal2 !== ""){
                                    $('#filter_btn').prop('disabled',false);
                                    $('#filter_btn').popover('dispose').removeAttr('tabindex data-bs-toggle data-bs-trigger data-bs-content');
                                }else{
                                    $('#filter_btn').prop('disabled',true);
                                    $('#filter_btn').attr({
                                        'tabindex': '0',
                                        'data-bs-toggle': 'popover',
                                        'data-bs-trigger': 'hover focus',
                                        'data-bs-content': 'Select survey to view insights!',
                                        'data-bs-placement' : 'top'
                                    }).popover();
                                }
                            }else{
                                $('#filter_btn').prop('disabled',true);
                            }

                        },
                        error: function(xhr, status, error) {
                            $('#survey').prop('disabled', true);
                            $('#survey').html('');
                            $('#survey').append('<option value="" selected>Select Survey</option>');
                        }
                    })
                // }
            }

            function getQueryParams(param) {
                var urlParams = new URLSearchParams(window.location.search);
                return urlParams.get(param);
            }
        });

        $('#filter_btn').on('click', function(e) {
            e.preventDefault();

            let formType = $('#survey option:selected').data('formtype');
            $('#formtype').val(formType);

            $(this).closest('form').submit();
        });

    
       // document.addEventListener('DOMContentLoaded', function() {
            // Check if current page is homepage (root '/' or '')

            // if (window.location.pathname === '/' || window.location.pathname === '') {
            //   document.body.classList.add('overlay-active');
            // } else {
            //   document.body.classList.remove('overlay-active');
            // }
         //   document.body.classList.add('overlay-active');
       // });

    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('typeform.layout.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\New Advance Project\typeform-dashboard\resources\views/typeform/welcome/index.blade.php ENDPATH**/ ?>
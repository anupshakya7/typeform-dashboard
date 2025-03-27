
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.crm'); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col">
            <div class="h-100">

                <!--greeting section -->

                <div>
                    <div>
                        <h4>Welcome back, <?php echo e(auth()->user()->name); ?></h4>
                    </div>
                </div>
                <!--end greeting section-->     
            
            <!--initial filter section-->
                <div class="filter-section show-filter mb-3">
                    <div class="d-flex flex-eow justify-content-between">
                    <div>
                        <h5 style="font-size:16px;" class="mb-3">Get insights, track trends, compare data, manage.</h5>
                    </div>
                    </div>

                    <div class="mt-3 mt-lg-0 d-flex justify-content-between flex-wrap gap-3" >
                        <form action="<?php echo e(route('home.index')); ?>" method="GET">
                        <div class="row gap-3 m-0 p-0 dashboard flex-nowra align-items-center">

                                <div class="col-auto p-0">
                                    <?php if(auth()->user()->role->name == 'survey'): ?>
                                        <input type="text" class="form-control" name="country" id="country" value="<?php echo e($filterData->country); ?>" readonly>
                                    <?php else: ?>
                                    <select class="form-select select2" name="country" id="country"
                                        aria-label="Default select example">
                                        <option value="" selected>Country</option>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->country); ?>">
                                                <?php echo e($country->country); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php endif; ?>
                                    
                                </div>
                                <div class="col-auto p-0">
                                    <?php if(auth()->user()->role->name == 'superadmin'): ?>
                                    <select class="form-select select2" id="organization" name="organization"
                                        aria-label="Default select example">
                                        <option value="" selected>Organization</option>
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
                                    <?php if(auth()->user()->role->name == 'survey'): ?>
                                    <input type="text" class="form-control" value="<?php echo e(auth()->user()->branch_id != null ? auth()->user()->branch->name :''); ?>" readonly>
                                    <input type="hidden" name="branch" class="form-control" value="<?php echo e(old('branch',auth()->user()->branch_id)); ?>" id="branch" readonly>
                                    <?php else: ?>
                                    <select class="form-select select2" id="branch" name="branch"
                                        aria-label="Default select example" disabled>
                                        <option value="" selected>Division</option>
                                    </select>
                                    <?php endif; ?>
                                </div>
                                <div class="col-auto p-0">
                                    <?php if(auth()->user()->role->name == 'survey'): ?>
                                        <input type="text" class="form-control" value="<?php echo e(auth()->user()->survey->form_title); ?>" readonly>
                                        <input type="hidden" name="survey" class="form-control" value="<?php echo e(old('survey',auth()->user()->form_id)); ?>" id="branch" readonly>
                                    <?php else: ?>
                                    <select class="form-select select2" name="survey" id="survey"
                                        aria-label="Default select example" disabled>
                                        <option value="" selected>Survey</option>
                                        <?php $__currentLoopData = $surveyForms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surveyForm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($surveyForm->form_title); ?>">
                                                <?php echo e($surveyForm->form_title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php endif; ?>
                                </div>
                                <?php if(auth()->user()->role->name !== 'survey'): ?>
                                <div class="col-auto p-0">
                                    <button href="#" class="view-insight-btn" id="filter_btn" onclick="this.form.submit();" <?php echo e(request('survey') ? '' :'disabled'); ?>>
                                        <span>View Insight</span>
                                        <i class='bx bx-arrow-back bx-rotate-180' ></i>
                                    </button>
                                </div>
                                <?php endif; ?>
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


            $(document).on('change', '#country', function() {
                filterSurvey();
            });
            $(document).on('change', '#organization', function() {
                $('#branch').prop('disabled', true);
                $('#branch').html('');
                $('#branch').html('<option value="" selected>Choose Branch</option>');
                
                filterBranch(function() {
                    filterSurvey();
                });
            });
            $(document).on('change', '#branch', function() {
                filterSurvey();
            });

            $(document).on('change', '#survey', function() {
                let surveyValue = $('#survey').val();
                if(surveyValue!==""){
                    $('#filter_btn').prop('disabled',false);
                }else{
                    $('#filter_btn').prop('disabled', true);
                }
            });

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
                                if(userRole == "branch"){
                                    let branchIds = Array.isArray(userBranchId) ? userBranchId : userBranchId.split(', ');
                                    return branchIds.includes(branch.id.toString());
                                }

                                return true;
                            });

                            console.log(branchList);
                            
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
                            $('#branch').append('<option value="" selected>Select Branch</option>');
                        }
                    })
                }
            }

            function filterSurvey(){ 
                var countryVal = $('#country').val();
                var organizationVal = $('#organization').val();
                var branchVal = isFirstLoad ? branch : $('#branch').val();

                if (organizationVal !== '' || countryVal !='') {
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
                            response.forms.forEach(function(formItem) {
                                // $('#survey').append(new Option(form.form_title,
                                // form.id));
                                var option = new Option(formItem.form_title, formItem.form_id);
                                $('#survey').append(option);

                                if (survey && survey == formItem.form_id) {
                                    $(option).prop('selected', true);
                                }
                            });

                            if(response.forms.length > 0){
                                let surveyVal2 = $('#survey').val();
                                if(surveyVal2 !== ""){
                                    $('#filter_btn').prop('disabled',false);
                                }else{
                                    $('#filter_btn').prop('disabled',true);
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
                }
            }

            function getQueryParams(param) {
                var urlParams = new URLSearchParams(window.location.search);
                return urlParams.get(param);
            }
        });
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('typeform.layout.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\New Advance Project\typeform-dashboard\resources\views/typeform/welcome/index.blade.php ENDPATH**/ ?>
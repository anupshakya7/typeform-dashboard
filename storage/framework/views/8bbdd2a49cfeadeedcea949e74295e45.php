<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.crm'); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>


</div>
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

  <!-- about csb section--------========================================= -->
  <!-- <div class="about-csb" style="background-image: url(<?php echo e(asset('build/images/csb-banner.jpg')); ?>)">
  <h5>Community Strength Barometer (CSB)</h5>
   <p>
    The Community Strength Barometer (CSB) measures social cohesion, resilience, and well-being within communities, assessing engagement, support networks, and collective problem-solving.
   </p>
</div> -->


                <!-- about csb section--------========================================= -->
               
                <!--card row section ==========================================================-->

                <?php
                    if(auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'krizmatic'){
                        $columns = 3;
                    }else{
                        $columns = 4;
                    }
                ?>

                <div class="row">
                    <div class="col-xl-<?php echo e($columns); ?> col-md-6">
                        <!-- card -->
                        <div class="card card-animate stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-row gap-2 align-items-center">
                                        <i class="fa-regular fa-file"></i>
                                        <p class="mb-0">
                                            Survey Conducted</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas"
                                            aria-controls="theme-settings-offcanvas">
                                            <i class="fa-solid fa-ellipsis"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">

                                    <h4 class="fs-22 fw-semibold ff-secondary"><span class="counter-value"
                                            data-target="<?php echo e($topBox['survey']); ?>"><?php echo e($topBox['survey']); ?></span>
                                    </h4>



                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-<?php echo e($columns); ?> col-md-6">
                        <!-- card -->
                        <div class="card card-animate stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-row gap-2 align-items-center">
                                        <i class="fa-solid fa-earth-americas"></i>
                                        <p class="mb-0">
                                            Country Involved</p>
                                    </div>
                                    <div class="flex-shrink-0">

                                        <div data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas"
                                            aria-controls="theme-settings-offcanvas">
                                            <i class="fa-solid fa-ellipsis"></i>
                                        </div>

                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <h4 class="fs-22 fw-semibold ff-secondary "><span class="counter-value"
                                            data-target="<?php echo e($topBox['countries']); ?>"><?php echo e($topBox['countries']); ?></span>
                                    </h4>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <?php if(auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'krizmatic'): ?>
                    <div class="col-xl-<?php echo e($columns); ?> col-md-6">
                        <!-- card -->
                        <div class="card card-animate stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-row gap-2 align-items-center">
                                        <i class="fa-solid fa-building-columns"></i>
                                        <p class="mb-0">
                                            Organizations</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas"
                                            aria-controls="theme-settings-offcanvas">
                                            <i class="fa-solid fa-ellipsis"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <h4 class="fs-22 fw-semibold ff-secondary"><span class="counter-value"
                                            data-target="<?php echo e($topBox['organizations']); ?>"><?php echo e($topBox['organizations']); ?></span>
                                    </h4>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <?php endif; ?>
                    <div class="col-xl-<?php echo e($columns); ?> col-md-6">
                        <!-- card -->
                        <div class="card card-animate stat-card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-row gap-2 align-items-center">
                                        <i class="fa-solid fa-user"></i>
                                        <p class="mb-0">
                                            People</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas"
                                            aria-controls="theme-settings-offcanvas">
                                            <i class="fa-solid fa-ellipsis"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <h4 class="fs-22 fw-semibold ff-secondary"><span class="counter-value"
                                            data-target="<?php echo e($topBox['people']); ?>"><?php echo e($topBox['people']); ?></span>
                                    </h4>



                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->


                </div> <!-- end row-->

                <!--greeting section ends here -->

            
<!--hidden filter section-->
               
                <div class="filter-section show-filter mb-3 d-flex justify-content-between align-items-center flex-sm-wrap flex-md-wrap g-2">
                    <div>
                        <h4><span class="badge bg-success lh-1"><?php echo e($formDetails->form_title); ?></span></h4>
                        <h5 style="font-size:14px;">Get insights, track trends, compare data, manage.</h5>
                    </div>

                    <div class="mt-3 mt-lg-0 d-flex flex-grow-1 justify-content-sm-end justify-content-start">
                        <form action="<?php echo e(route('home.index')); ?>" method="GET">
                            <div class="row gap-3 m-0 p-0 dashboard flex-nowrap">
                                <div class="col-auto p-0">
                                    <?php if(auth()->user()->role->name == 'survey'): ?>
                                        <input type="text" class="form-control" name="country" id="country" value="<?php echo e($filterData->country); ?>" readonly>
                                    <?php else: ?>
                                    <select class="form-select select2" name="country" id="country"
                                        aria-label="Default select example">
                                        <option value="" selected>Country</option>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country['name']); ?>"
                                                <?php echo e((($filterData && $filterData->country == $country['name']) || request('country') == $country['name']) || ($selectedCountrywithSurvey == $country['name']) ? 'selected' : ''); ?>>
                                                <?php echo e($country['name']); ?></option>
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
                                            <option value="<?php echo e($organization->id); ?>"
                                                <?php echo e(($filterData && $filterData->organization_id == $organization->id) || request('organization') == $organization->id ? 'selected' : ''); ?>>
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
                                        aria-label="Default select example" onchange="this.form.submit()">
                                        <option value="" selected>Survey</option>
                                        <?php $__currentLoopData = $surveyForms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $surveyForm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($surveyForm->form_title); ?>"
                                                <?php echo e(($filterData && $filterData->form_id == $surveyForm->form_id) || request('survey') == $surveyForm->form_id ? 'selected' : ''); ?>>
                                                <?php echo e($surveyForm->form_title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php endif; ?>
                                </div>
                                <div class="col-auto p-0">
                                          <!-- Dropdown for exporting as PDF, PNG, or Excel -->
                                          <div class="dropdown">
                                            <a class="icon-frame bg-white" style="border: 1px solid #BABABA;" href="#"
                                                id="exportDropdown" role="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <img class="svg-icon" type="image/svg+xml"
                                                    src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                                <li><a class="dropdown-item" href="#" id="export-all">Download
                                                        Report</a></li>
    
                                            </ul>
                                        </div>
                                </div>
                            </div>
                            <?php if(auth()->user()->role->name !== 'survey'): ?>
                            <div class="note text-muted">
                                <p>Note: Please select at least one project & choose branch, organization, country
                                    respectively to filter data.</p>
                            </div>
                            <?php endif; ?>
                        </form>

                    </div>
                </div>

<!--hidden filter section-->
                <!--bar graph section starts here-->

                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mean-score-bar-title mb-0 flex-grow-1">Mean Scores Values</h4>
                        <div class="flex-shrink-0">
                            <div class="d-flex flex-row gap-2 align-items-center">
                                <!--info here-->
                                <div class="dropdown">
                            <a class="icon-frame" href="#" id="exportDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="svg-icon" type="image/svg+xml"
                                    src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                <li><a class="dropdown-item" href="#" data-type="pdf"
                                        data-chart-id="sales-forecast-chart">Export as PDF</a></li>
                                <li><a class="dropdown-item" href="#" data-type="png"
                                        data-chart-id="sales-forecast-chart">Export as PNG</a></li>
                            </ul>
                        </div>
                                <a class="icon-frame" href="#" data-bs-toggle="offcanvas"
                                    data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas"
                                    class="m-0 p-0 d-flex justify-content-center align-items-center" data-title="Mean Scores Across the Pillars of Positive Peace (Bar Chart)" data-content="<p>The average scores for the eight Pillars of Positive Peace each represent a key area of societal resilience. The eight pillars that comprise Positive Peace are:</p><ul class='pillar-list'><li><strong>Well-functioning Government</strong></li><li><strong>Sound Business Environment</strong></li><li><strong>Equitable Distribution of Resources</strong></li><li><strong>Acceptance of the Rights of Others</strong></li><li><strong>Good Relations with Neighbours</strong></li><li><strong>Free Flow of Information</strong></li><li><strong>High Levels of Human Capital</strong></li><li><strong>Low Levels of Corruption</strong></li></ul><p>These pillars encompass governance, social cohesion, economic opportunities, and other factors that contribute to the overall stability and well-being of a community.</p><p>Higher scores in any pillar indicate stronger perceptions of resilience, while lower scores highlight areas that may need further development or attention. By examining the mean scores across these pillars, we gain valuable insights into the strengths and challenges within the community's societal framework.</p>">
                                    <img class="svg-icon" type="image/svg+xml"
                                        src="<?php echo e(URL::asset('build/icons/info.svg')); ?>"></img>

                                </a>
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body pb-0">
                        <div id="sales-forecast-chart" data-colors='["--vz-primary", "--vz-success", "--vz-warning"]'
                            class="apex-charts" dir="ltr"></div>
                    </div>
                </div><!-- end card -->


                <!--bar graph section ends here-->


                <!-- radar and pie section -->
                <div class="row">
                    <div class="col-sm-7 pb-4">
                        <div class="card h-100 " id="basic_radar_chart">
                            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                                <h4 class="card-title mean-result-title">Mean Results</h4>
                                <div class="flex-shrink-0">
                                    <div class="d-flex flex-row gap-2 align-items-center">
                                        <!--info here-->
                                    <div class="dropdown">
                                        <a class="icon-frame" href="#" id="exportDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <img class="svg-icon" type="image/svg+xml"
                                                src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                            <li><a class="dropdown-item" href="#" data-type="pdf"
                                                    data-chart-id="basic_radar">Export as PDF</a></li>
                                            <li><a class="dropdown-item" href="#" data-type="png"
                                                    data-chart-id="basic_radar">Export as PNG</a></li>
                                        </ul>
                                    </div>
                                <a class="icon-frame" href="#" data-bs-toggle="offcanvas"
                                    data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas"
                                    class="m-0 p-0 d-flex justify-content-center align-items-center" data-title="Community Resilience Across the Pillars of Positive Peace (Radar plot)" data-content="<p>The average scores for the eight Pillars of Positive Peace each represent a key area of societal resilience. The eight pillars that comprise Positive Peace are:</p><ul><li>Well-functioning Government</li><li>Sound Business Environment</li><li>Equitable Distribution of Resources</li><li>Acceptance of the Rights of Others</li><li>Good Relations with Neighbours</li><li>Free Flow of Information</li><li>High Levels of Human Capital</li><li>Low Levels of Corruption</li></ul><p>These pillars encompass governance, social cohesion, economic opportunities, and other factors that contribute to the overall stability and well-being of a community.</p><p>Higher scores in any pillar indicate stronger perceptions of resilience, while lower scores highlight areas that may need further development or attention. By examining the mean scores across these pillars, we gain valuable insights into the strengths and challenges within the community's societal framework.</p>">
                                    <img class="svg-icon" type="image/svg+xml"
                                        src="<?php echo e(URL::asset('build/icons/info.svg')); ?>"></img>

                                </a>
                                    </div>
                                </div>
                            </div><!-- end card header -->
                            <div class="card-body">
                                <div id="basic_radar" data-colors='["--vz-success"]' class="apex-charts" dir="ltr">
                                </div>
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div>
                    <div class="col-sm-5">

                        <!--gender pie chart here -->

                        <div class="card">
                            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                                <h4 class="card-title pie-gender-title mb-0">Participants by Gender</h4>
                                <div class="flex-shrink-0">
                                    <div class="d-flex flex-row gap-2 align-items-center">
                                        <!--info here-->
                                        <div class="dropdown">
                                    <a class="icon-frame" href="#" id="exportDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img class="svg-icon" type="image/svg+xml"
                                            src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                        <li><a class="dropdown-item" href="#" data-type="pdf"
                                                data-chart-id="simple_pie_chart">Export as PDF</a></li>
                                        <li><a class="dropdown-item" href="#" data-type="png"
                                                data-chart-id="simple_pie_chart">Export as PNG</a></li>
                                    </ul>
                                </div>
                                        <a class="icon-frame" href="#" data-bs-toggle="offcanvas"
                                            data-bs-target="#theme-settings-offcanvas"
                                            aria-controls="theme-settings-offcanvas"
                                            class="m-0 p-0 d-flex justify-content-center align-items-center" data-title="Participation by Gender " data-content="<p>Distribution of survey participants by gender</p>">

                                            <img class="svg-icon" type="image/svg+xml"
                                                src="<?php echo e(URL::asset('build/icons/info.svg')); ?>"></img>

                                        </a>
                                    </div>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div id="simple_pie_chart" data-colors='["--vz-primary", "--vz-success"]'
                                    class="apex-charts" dir="ltr"></div>
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                        <!--gender pie chart here -->


                        <!--age pie chart here -->

                        <div class="card">
                            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                                <h4 class="card-title pie-age-title mb-0">Participants by Age</h4>
                                <div class="flex-shrink-0">
                                    <div class="d-flex flex-row gap-2 align-items-center">
                                        <!--info here-->
                                        <div class="dropdown">
                                    <a class="icon-frame" href="#" id="exportDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img class="svg-icon" type="image/svg+xml"
                                            src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                        <li><a class="dropdown-item" href="#" data-type="pdf"
                                                data-chart-id="simple_pie_chart2">Export as PDF</a></li>
                                        <li><a class="dropdown-item" href="#" data-type="png"
                                                data-chart-id="simple_pie_chart2">Export as PNG</a></li>
                                    </ul>
                                </div>
                                        <a class="icon-frame" href="" data-bs-toggle="offcanvas"
                                            data-bs-target="#theme-settings-offcanvas"
                                            aria-controls="theme-settings-offcanvas"
                                            class="m-0 p-0 d-flex justify-content-center align-items-center" data-title="Participation by Age" data-content="<p>Distribution of survey participants by age</p>">

                                            <img class="svg-icon" type="image/svg+xml"
                                                src="<?php echo e(URL::asset('build/icons/info.svg')); ?>"></img>

                                        </a>
                                    </div>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div id="simple_pie_chart2"
                                    data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger"]'
                                    class="apex-charts" dir="ltr"></div>
                            </div><!-- end card-body -->
                        </div><!-- end card -->

                        <!--age pie chart here -->


                    </div>
                </div>
                <div>
                    <!-- radar and pie section -->

                    <!--two column bar chart section -->



                    <div class="row">

                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title positive-peace-title mb-0 flex-grow-1">Positive Peace</h4>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex flex-row gap-2 align-items-center">
                                            <!--info here-->
                                            <div class="dropdown">
                                        <a class="icon-frame" href="#" id="exportDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <img class="svg-icon" type="image/svg+xml"
                                                src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                            <li><a class="dropdown-item" href="#" data-type="pdf"
                                                    data-chart-id="sales-forecast-chart-2">Export as PDF</a></li>
                                            <li><a class="dropdown-item" href="#" data-type="png"
                                                    data-chart-id="sales-forecast-chart-2">Export as PNG</a></li>
                                        </ul>
                                    </div>
                                            <a class="icon-frame" href="#" data-bs-toggle="offcanvas"
                                                data-bs-target="#theme-settings-offcanvas"
                                                aria-controls="theme-settings-offcanvas"
                                                class="m-0 p-0 d-flex justify-content-center align-items-center" data-title="Positive Peace" data-content="<p>Positive Peace refers to the attitudes, institutions, and structures that foster and sustain peaceful societies. Higher scores in Positive Peace signify greater resilience, enabling societies to better protect their citizens from adverse shocks—whether political, environmental, or economic.</p>">
                                                <img class="svg-icon" type="image/svg+xml"
                                                    src="<?php echo e(URL::asset('build/icons/info.svg')); ?>"></img>

                                            </a>
                                        </div>
                                    </div>
                                </div><!-- end card header -->
                                <div class="card-body pb-0">
                                    <div id="sales-forecast-chart-2"
                                        data-colors='["--vz-primary", "--vz-success", "--vz-warning"]' class="apex-charts"
                                        dir="ltr"></div>
                                </div>
                            </div><!-- end card -->

                        </div>



                        <!--2------>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title negative-peace-title mb-0 flex-grow-1">Negative Peace</h4>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex flex-row gap-2 align-items-center">
                                            <!--info here-->
                                            <div class="dropdown">
                                        <a class="icon-frame" href="#" id="exportDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <img class="svg-icon" type="image/svg+xml"
                                                src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                            <li><a class="dropdown-item" href="#" data-type="pdf"
                                                    data-chart-id="sales-forecast-chart-3">Export as PDF</a></li>
                                            <li><a class="dropdown-item" href="#" data-type="png"
                                                    data-chart-id="sales-forecast-chart-3">Export as PNG</a></li>
                                        </ul>
                                    </div>
                                            <a class="icon-frame" href="#" data-bs-toggle="offcanvas"
                                                data-bs-target="#theme-settings-offcanvas"
                                                aria-controls="theme-settings-offcanvas"
                                                class="m-0 p-0 d-flex justify-content-center align-items-center" data-title="Negative Peace" data-content="<p>Negative Peace refers to the absence of direct violence or fear of violence.</p><p>Higher scores in Negative Peace indicate a greater absence of conflict and violence, suggesting a stable environment with low levels of direct harm or societal unrest. </p>">

                                                <img class="svg-icon" type="image/svg+xml"
                                                    src="<?php echo e(URL::asset('build/icons/info.svg')); ?>"></img>

                                            </a>
                                        </div>
                                    </div>
                                </div><!-- end card header -->
                                <div class="card-body pb-0">
                                    <div id="sales-forecast-chart-3"
                                        data-colors='["--vz-primary", "--vz-success", "--vz-warning"]' class="apex-charts"
                                        dir="ltr"></div>
                                </div>
                            </div><!-- end card -->

                        </div>
                    </div>


                    <!--two column bar chart section -->

                    <!--area radar chart section starts here -->

                    <div class="card">
                        <div class="card-header z-1 d-flex justify-content-between align-items-center">
                            <h4 class="card-title results-by-pillar-radar mb-0">Results by Pillars</h4>
                            <div class="flex-shrink-0">
                                <div class="d-flex flex-row gap-2 align-items-center">
                                    <!--info here-->
                                    <div class="dropdown">
                                <a class="icon-frame" href="#" id="exportDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="svg-icon" type="image/svg+xml"
                                        src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                    <li><a class="dropdown-item" href="#" data-type="pdf"
                                            data-chart-id="multi_radar">Export as PDF</a></li>
                                    <li><a class="dropdown-item" href="#" data-type="png"
                                            data-chart-id="multi_radar">Export as PNG</a></li>
                                </ul>
                            </div>
                                    <a class="icon-frame" href="#" data-bs-toggle="offcanvas"
                                        data-bs-target="#theme-settings-offcanvas"
                                        aria-controls="theme-settings-offcanvas"
                                        class="m-0 p-0 d-flex justify-content-center align-items-center" data-title="Results by Pillars" data-content="<p>The radar plot visualises the eight Pillars of Positive Peace, comparing community response mean scores against country and global averages. It provides insights into community perceptions of these pillars in relation to broader trends.</p>">

                                        <img class="svg-icon" type="image/svg+xml"
                                            src="<?php echo e(URL::asset('build/icons/info.svg')); ?>"></img>

                                    </a>
                                </div>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="multi_radar" data-colors='["--vz-danger", "--vz-success", "--vz-primary"]'
                                class="apex-charts" dir="ltr"></div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->

                    <!--area radar chart section starts here -->

                    <div class="row mb-4">
                        <div class="col-xl-12">
                            <div class="card mb-0">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title results-by-pillar-table mb-0 flex-grow-1">Results By Pillar</h4>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex flex-row gap-2 align-items-center">
                                            
                                            <!--info here-->
                                            <div class="dropdown">
                                        <a class="icon-frame" href="#" id="exportDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <img class="svg-icon" type="image/svg+xml"
                                                src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                            <li><a class="dropdown-item" href="#" data-type="pdf"
                                                    data-chart-id="pillar-table">Export as PDF</a></li>
                                            <li><a class="dropdown-item" href="#" data-type="png"
                                                    data-chart-id="pillar-table">Export as PNG</a></li>
                                            
                                        </ul>
                                    </div>
                                            
                                        </div>
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="live-preview">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap mb-0" id="pillar-table">
                                                <thead class="table-head">
                                                    <tr>

                                                        <th scope="col" class="text-center"></th>
                                                        <th scope="col" class="text-center">Mean</th>
                                                        <th scope="col" class="text-center">Country Mean</th>
                                                        <th scope="col" class="text-center">Global Mean</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $pillars = [
                                                            'well_functioning_government' =>
                                                                'Well-Functioning Government',
                                                            'low_level_corruption' => 'Low Levels of Corruption',
                                                            'equitable_distribution' =>
                                                                'Equitable Distribution of Resources',
                                                            'good_relations' => 'Good Relations with Neighbours',
                                                            'free_flow' => 'Free Flow of Information',
                                                            'high_levels' => 'High Levels of Human Capital',
                                                            'sound_business' => 'Sound Business Environment',
                                                            'acceptance_rights' => 'Acceptance of the Rights of Others',
                                                        ];
                                                    ?>
                                                    <?php $__currentLoopData = $pillarMeanScore['mean']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $pillar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><span
                                                                    class="fw-medium pillar-text"><?php echo e($pillars[$key]); ?></span>
                                                            </td>
                                                            <td class="text-center"><?php echo e($pillar); ?></td>
                                                            <td class="text-center">
                                                                <?php echo e($pillarMeanScore['countryMean'][$key]); ?></td>
                                                            <td class="text-center">
                                                                <?php echo e($pillarMeanScore['globalMean'][$key]); ?></td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </tbody>

                                            </table>
                                            <!-- end table -->
                                        </div>
                                        <!-- end table responsive -->
                                    </div>

                                </div>
                            </div><!-- end card-body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <!--table section starts here -->
                    <?php if($formDetails->during || $formDetails->after): ?>
                    <div class="row">
                    <div class="col-xl-12">
                        <div class="card mb-0">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title pillar-table-time-title mb-0 flex-grow-1">Results Over Time</h4>
                                <div class="flex-shrink-0">
                                    <div class="d-flex flex-row gap-2 align-items-center">
                                        <!--info here-->
                                        <div class="dropdown">
                                        <a class="icon-frame" href="#" id="exportDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <img class="svg-icon" type="image/svg+xml"
                                                src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                            <li><a class="dropdown-item" href="#" data-type="pdf"
                                                    data-chart-id="pillar-table-time">Export as PDF</a></li>
                                            <li><a class="dropdown-item" href="#" data-type="png"
                                                    data-chart-id="pillar-table-time">Export as PNG</a></li>
                                            
                                        </ul>
                                    </div>
                                        
                                    </div>
                                </div>
                            </div><!-- end card header -->
                            <?php
                                
                            ?>
                            <div class="card-body">
                                <div class="live-preview">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap mb-0" id="pillar-table-time">
                                            <thead class="table-head">
                                                <tr>

                                                    <th scope="col"></th>
                                                    <th scope="col">Before</th>
                                                    <th scope="col">During</th>
                                                    <?php if($formDetails->after): ?>
                                                    <th scope="col">After</th>
                                                    <?php endif; ?>
                                                    <th scope="col">% Change</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $pillars = [
                                                        'well_functioning_government' =>
                                                            'Well-Functioning Government',
                                                        'low_level_corruption' => 'Low Levels of Corruption',
                                                        'equitable_distribution' =>
                                                            'Equitable Distribution of Resources',
                                                        'good_relations' => 'Good Relations with Neighbours',
                                                        'free_flow' => 'Free Flow of Information',
                                                        'high_levels' => 'High Levels of Human Capital',
                                                        'sound_business' => 'Sound Business Environment',
                                                        'acceptance_rights' => 'Acceptance of the Rights of Others',
                                                    ];
                                                ?>
                                                <?php $__currentLoopData = $overTimeScores['before']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $overTimeScore): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>

                                                    <td><span class="fw-medium pillar-text"><?php echo e($pillars[$key]); ?></span>
                                                    </td>
                                                    <td><?php echo e($overTimeScore); ?></td>
                                                    <td><?php echo e($overTimeScores['during'][$key]); ?></td>
                                                    <?php if($formDetails->after): ?>
                                                    <td><?php echo e($overTimeScores['after'][$key]); ?></td>
                                                    <?php endif; ?>
                                                    <td class="trend-blue">
                                                        <?php
                                                            $choosenDate = $formDetails->after ? $overTimeScores['after'][$key] : $overTimeScores['during'][$key];
                                                            $overTimeScoreDivide = $overTimeScore > 0 ? $overTimeScore:1;
                                                            $percentChange = ($choosenDate-$overTimeScore)/$overTimeScoreDivide;
                                                        ?> 
                                                        <span ><?php echo e($percentChange); ?>%
                                                            <?php if($percentChange > 0): ?>
                                                            <img class="trend-icon"
                                                                src="<?php echo e(URL::asset('build/icons/trend-blue.svg')); ?>" alt="ArrowExternalRight">
                                                            <?php else: ?>
                                                            <img class="trend-icon"
                                                                src="<?php echo e(URL::asset('build/icons/trend-red.svg')); ?>" alt="ArrowExternalRight">
                                                            <?php endif; ?>
                                                    </td>

                                                </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>

                                        </table>
                                        <!-- end table -->
                                    </div>
                                    <!-- end table responsive -->
                                </div>

                            </div>
                        </div><!-- end card-body -->
                        </div><!-- end card -->
                        
                        </div>
                    <!-- end col -->
                    <?php endif; ?>
                </div>
                <!--end row-->


                <!--table section starts here -->
            </div> <!-- end .h-100-->

        </div> <!-- end col -->

        <div class="card-body">
                                    <div class="live-preview">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap mb-0" id="survey-table" style="display: none;">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th scope="col">Survey Data ID</th>
                                                        <th scope="col">Survey ID</th>
                                                        <th scope="col">Survey Name</th>
                                                        <th scope="col">Survey Country</th>
                                                        <th scope="col">Survey Organization</th>
                                                        <th scope="col">Participants Name</th>
                                                        <th scope="col">Age</th>
                                                        <th scope="col">Gender</th>
                                                        <th scope="col">Survey Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Rows will be populated dynamically by Ajax -->
                                                </tbody>
                                            </table>
                                            <!-- end table -->
                                            <!-- Survey table -->
                                            
                                        </div>
                                        <!-- end table responsive -->

                            </div>

                        </div>
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

            //Filter Organizations
            // $('#country').change(function() {
            //     filterOrganization();
            // });

            // $('#country').change(function(){
            //     filterSurvey();
            // });

            // $('#organization').change(function() {
            //     filterSurvey();
            //     filterBranch();
            // });

            // $('#branch').change(function() {
            //     filterSurvey();
            // });


            $(document).on('change', '#country', function() {
                filterSurvey();
            });
            $(document).on('change', '#organization', function() {
                $('#branch').prop('disabled', true);
                $('#branch').html('<option value="" selected>Choose Branch</option>');
                filterBranch(function() {
                    filterSurvey();
                });

            });
            $(document).on('change', '#branch', function() {
                filterSurvey();
            });



            // function filterOrganization() {
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
            //                 $('#organization').append('<option selected>Choose Organization</option>');
            //                 response.organizations.forEach(function(organizationItem) {
            //                     // $('#organization').append(new Option(organization.name,
            //                     //     organization.id));
            //                     var option = new Option(organizationItem.name, organizationItem.id);
            //                     $('#organization').append(option);

            //                     if (organization && organization == organizationItem.id) {
            //                         $(option).prop('selected', true);
            //                     }
            //                 })
            //             },
            //             error: function(xhr, status, error) {
            //                 $('#organization').prop('disabled', true);
            //                 $('#organization').html('');
            //                 $('#organization').append('<option selected>Choose Organization</option>');
            //             }
            //         })
            //     }
            // }

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

            function filterSurvey() {
                var countryVal = $('#country').val();
                var organizationVal = $('#organization').val();
                var branchVal = isFirstLoad ? branch : $('#branch').val();

                if (organizationVal !== '') {
                    $.ajax({
                        url: "<?php echo e(route('survey.get')); ?>",
                        method: 'GET',
                        data: {
                            country: countryVal,
                            organization_id: organizationVal,
                            branch_id: branchVal
                        },
                        success: function(response) {
                            console.log(response);
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


            //Chart Js Code Start

            // Mean Scores Value Line Charts
            var areachartSalesColors = "";
            areachartSalesColors = getChartColorsArray("sales-forecast-chart");
            if (areachartSalesColors) {
                var options = {
                    series: [{
                            name: 'Well Functioning Government',
                            data: ["<?php echo e($meanScore['well_functioning_government']); ?>"]
                        }, {
                            name: 'Low Levels of corruption',
                            data: ["<?php echo e($meanScore['low_level_corruption']); ?>"]
                        },
                        {
                            name: 'Equitable distribution of resources',
                            data: ["<?php echo e($meanScore['equitable_distribution']); ?>"]
                        }, {
                            name: 'Good relations with neighbours',
                            data: ["<?php echo e($meanScore['good_relations']); ?>"]
                        }, {
                            name: 'Free Flow Of Information',
                            data: ["<?php echo e($meanScore['free_flow']); ?>"]
                        }, {
                            name: 'High Levels Of Human Capital',
                            data: ["<?php echo e($meanScore['high_levels']); ?>"]
                        }, {
                            name: 'Sound Business Environment',
                            data: ["<?php echo e($meanScore['sound_business']); ?>"]
                        }, {
                            name: 'Acceptance Of The Rights Of Others',
                            data: ["<?php echo e($meanScore['acceptance_rights']); ?>"]
                        }
                    ],

                    chart: {
                        type: 'bar',
                        height: 341,
                        toolbar: {
                            show: false,
                        },
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '70%',
                        }
                    },
                    stroke: {
                        show: true,
                        width: 5,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: [''],
                        axisTicks: {
                            show: false,
                            borderType: 'solid',
                            color: '#78909C',
                            height: 6,
                            offsetX: 0,
                            offsetY: 0
                        },
                        title: {
                            offsetX: 0,
                            offsetY: -30,
                            style: {
                                color: '#78909C',
                                fontSize: '12px',
                                fontWeight: 400,
                            },
                        },
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value;
                            }
                        },
                        tickAmount: 4,
                        min: 0
                    },
                    fill: {
                        opacity: 1
                    },
                    legend: {
                        show: true,
                        position: 'bottom',
                        horizontalAlign: 'center',
                        fontWeight: 500,
                        offsetX: 0,
                        offsetY: -14,
                        itemMargin: {
                            horizontal: 8,
                            vertical: 0
                        },
                        markers: {
                            width: 10,
                            height: 10,
                        }
                    },
                    // colors: areachartSalesColors
                    colors: [
                        '#002347', '#00366e', '#004994', '#0f64bc', '#107ec2', '#0c8cdb', '#4cacdc',
                        '#74ccf8'
                    ]
                };
                if (salesForecastChart != "")
                    salesForecastChart.destroy();
                salesForecastChart = new ApexCharts(document.querySelector("#sales-forecast-chart"), options);
                salesForecastChart.render();
            }

            // Mean Radar Chart
            var chartRadarBasicColors = getChartColorsArray("basic_radar");
            if (chartRadarBasicColors) {
                var options = {
                    series: [{
                        name: 'Mean',
                        data: ["<?php echo e($meanScore['well_functioning_government']); ?>",
                            "<?php echo e($meanScore['low_level_corruption']); ?>",
                            " <?php echo e($meanScore['equitable_distribution']); ?>",
                            "<?php echo e($meanScore['good_relations']); ?>",
                            "<?php echo e($meanScore['free_flow']); ?>",
                            "<?php echo e($meanScore['high_levels']); ?>",
                            "<?php echo e($meanScore['sound_business']); ?>",
                            "<?php echo e($meanScore['acceptance_rights']); ?>"
                        ],
                    }],
                    chart: {
                        height: 500,
                        type: 'radar',
                        toolbar: {
                            show: false
                        }
                    },
                    colors: ['#0664bc'],
                    xaxis: {
                        categories: [
                            'Well-functioning Government',
                            'Low Levels Of Corruption',
                            'Equitable Distribution Of Resources',
                            'Good Relations With Neighbors',
                            'Free Flow Of Information',
                            'High Levels Of Human Capital',
                            'Sound Business Environment',
                            'Acceptance Of The Rights Of Others'
                        ]
                    },
                    tooltip: {
                        enabled: true,
                        shared: false,
                        followCursor: true,
                        theme: 'dark',
                        custom: function({
                            series,
                            seriesIndex,
                            dataPointIndex,
                            w
                        }) {
                            let value = series[seriesIndex][dataPointIndex].toFixed(2);
                            return `<div style="background:#222;padding:8px;border-radius:5px;color:white;">
                            <strong style="color:#007bff;">${value} points</strong>
                        </div>`;
                        }
                    },
                    stroke: {
                        width: 2 // Increases line thickness to improve interaction
                    },
                    fill: {
                        opacity: 0.2 // Ensures data is visible while keeping tooltip accessible
                    },
                    markers: {
                        size: 5, // Makes data points larger for better hover detection
                        hover: {
                            size: 8 // Ensures tooltip appears when hovering over points
                        }
                    }

                };

                var chart = new ApexCharts(document.querySelector("#basic_radar"), options);
                chart.render();
            }

            //Piechart Gender
            var chartPieBasicColors = getChartColorsArray("simple_pie_chart");
            if (chartPieBasicColors) {
                var options = {
                    <?php
                        $malePieChart = $participantDetails['genderWise']['male'];
                        $femalePieChart = $participantDetails['genderWise']['female'];

                    ?>
                    series: [<?php echo e($malePieChart); ?>,
                        <?php echo e($femalePieChart); ?>

                    ],
                    chart: {
                        height: 192,
                        type: 'pie',
                    },
                    labels: ['Male', 'Female'],
                    legend: {
                        position: 'right'
                    },
                    dataLabels: {
                        dropShadow: {
                            enabled: false,
                        }
                    },
                    colors: ['#004994', '#0c8cdb']
                };

                var chart = new ApexCharts(document.querySelector("#simple_pie_chart"), options);
                chart.render();
            }




            //Piechart Age
            var chartPieBasicColors2 = getChartColorsArray("simple_pie_chart2");
            if (chartPieBasicColors2) {
                var options = {
                    <?php
                        $level_one = $participantDetails['ageWise']['18 to 24'];
                        $level_two = $participantDetails['ageWise']['25 to 44'];
                        $level_three = $participantDetails['ageWise']['45 to 64'];
                        $level_four = $participantDetails['ageWise']['65 or over'];

                    ?>
                    series: [<?php echo e($level_one); ?>, <?php echo e($level_two); ?>, <?php echo e($level_three); ?>,
                        <?php echo e($level_four); ?>

                    ],

                    chart: {
                        height: 192,
                        type: 'pie',
                    },
                    labels: ['18 to 24 years', '25 to 44 years', '45 to 64 years', '65 or over'],
                    legend: {
                        position: 'right'
                    },
                    dataLabels: {
                        dropShadow: {
                            enabled: false,
                        }
                    },
                    colors: ['#004994', '#0f64bc', '#0c8cdb', '#74ccf8']
                };

                var chart2 = new ApexCharts(document.querySelector("#simple_pie_chart2"), options);
                chart2.render();
            }



            //Positive Peace Bar
            var areachartSalesColorst = "";
            areachartSalesColorst = getChartColorsArray("sales-forecast-chart-2");
            if (areachartSalesColorst) {
                var options = {
                    series: [{
                        name: 'Mean',
                        data: [<?php echo e($positivePeace['mean']); ?>]
                    }, {
                        name: 'Country Mean',
                        data: [<?php echo e($positivePeace['countryMean']); ?>]
                    }, {
                        name: 'Global Mean',
                        data: [<?php echo e($positivePeace['globalMean']); ?>]
                    }],
                    chart: {
                        type: 'bar',
                        height: 341,
                        toolbar: {
                            show: false,
                        },
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '40%',
                        },
                    },
                    stroke: {
                        show: true,
                        width: 5,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: [''],
                        axisTicks: {
                            show: false,
                            borderType: 'solid',
                            color: '#78909C',
                            height: 6,
                            offsetX: 0,
                            offsetY: 0
                        },
                        title: {
                            offsetX: 0,
                            offsetY: -30,
                            style: {
                                color: '#78909C',
                                fontSize: '12px',
                                fontWeight: 400,
                            },
                        },
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value;
                            }
                        },
                        tickAmount: 4,
                        min: 0
                    },
                    fill: {
                        opacity: 1
                    },
                    legend: {
                        show: true,
                        position: 'bottom',
                        horizontalAlign: 'center',
                        fontWeight: 500,
                        offsetX: 0,
                        offsetY: -14,
                        itemMargin: {
                            horizontal: 8,
                            vertical: 0
                        },
                        markers: {
                            width: 10,
                            height: 10,
                        }
                    },
                    colors: ['#0f64bc', '#fb9f68', '#339966']
                };
                if (salesForecastChart2 != "")
                    salesForecastChart2.destroy();
                salesForecastChart2 = new ApexCharts(document.querySelector("#sales-forecast-chart-2"), options);
                salesForecastChart2.render();
            }


            //Negative Peace Bar
            var areachartSalesColorsth = "";
            areachartSalesColorsth = getChartColorsArray("sales-forecast-chart-3");
            if (areachartSalesColorsth) {
                var options = {
                    series: [{
                        name: 'Mean',
                        data: ["<?php echo e($negativePeace['mean']); ?>"]
                    }, {
                        name: 'Country Mean',
                        data: ["<?php echo e($negativePeace['countryMean']); ?>"]
                    }, {
                        name: 'Global Mean',
                        data: ["<?php echo e($negativePeace['globalMean']); ?>"]
                    }],
                    chart: {
                        type: 'bar',
                        height: 341,
                        toolbar: {
                            show: false,
                        },
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '40%',
                        },
                    },
                    stroke: {
                        show: true,
                        width: 5,
                        colors: ['transparent']
                    },
                    xaxis: {
                        categories: [''],
                        axisTicks: {
                            show: false,
                            borderType: 'solid',
                            color: '#78909C',
                            height: 6,
                            offsetX: 0,
                            offsetY: 0
                        },
                        title: {
                            offsetX: 0,
                            offsetY: -30,
                            style: {
                                color: '#78909C',
                                fontSize: '12px',
                                fontWeight: 400,
                            },
                        },
                    },
                    yaxis: {
                        labels: {
                            formatter: function(value) {
                                return value;
                            }
                        },
                        tickAmount: 4,
                        min: 0
                    },
                    fill: {
                        opacity: 1
                    },
                    legend: {
                        show: true,
                        position: 'bottom',
                        horizontalAlign: 'center',
                        fontWeight: 500,
                        offsetX: 0,
                        offsetY: -14,
                        itemMargin: {
                            horizontal: 8,
                            vertical: 0
                        },
                        markers: {
                            width: 10,
                            height: 10,
                        }
                    },
                    colors: ['#0f64bc', '#fb9f68', '#339966']
                };
                if (salesForecastChart3 != "")
                    salesForecastChart3.destroy();
                salesForecastChart3 = new ApexCharts(document.querySelector("#sales-forecast-chart-3"), options);
                salesForecastChart3.render();
            }

            //Pillars Result Radar Chart
            var chartHeight = window.innerWidth <= 768 ? 800 : 600; // 400px for mobile and 600px for desktop

            var chartRadarMultiColors = getChartColorsArray("multi_radar");
            if (chartRadarMultiColors) {
                var options = {
                    series: [{
                            name: 'Mean',
                            data: [
                                <?php $__currentLoopData = $pillarMeanScore['mean']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $means): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    "<?php echo e($means); ?>",
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            ],
                        },
                        {
                            name: 'Country Mean',
                            data: [
                                <?php $__currentLoopData = $pillarMeanScore['countryMean']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $means): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    "<?php echo e($means); ?>",
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            ],
                        },
                        {
                            name: 'Global Mean',
                            data: [
                                <?php $__currentLoopData = $pillarMeanScore['globalMean']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $means): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    "<?php echo e($means); ?>",
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            ],
                        }
                    ],
                    chart: {
                        height: chartHeight,
                        type: 'radar',
                        dropShadow: {
                            enabled: true,
                            blur: 1,
                            left: 1,
                            top: 1
                        },
                        toolbar: {
                            show: false
                        },
                    },
                    stroke: {
                        width: 2
                    },
                    fill: {
                        opacity: 0.2
                    },
                    markers: {
                        size: 4
                    },
                    colors: ['#0f64bc', '#fb9f68', '#38b8a0'],
                    xaxis: {
                        categories: ['Acceptance Of The Rights Of Others', 'Well-Functioning Government',
                            'Low Levels of Corruption', 'Equitable Distribution Of Resource',
                            'Good Relations With Neighbours', 'Free Flow Of Information',
                            'High Levels Of Human Capital', 'Sound Business Environment'
                        ]
                    }
                };
                var chart = new ApexCharts(document.querySelector("#multi_radar"), options);
                chart.render();
            }



            //Chart Js Code End

        });

        //Export All
        document.addEventListener("DOMContentLoaded", function () {
    const exportButton = document.getElementById('export-all');
    const surveyTable = document.getElementById("survey-table");
    const loader = document.querySelector('.download-spinner-container');
    const mainpage = document.querySelector('body'); // Added dot for class selector

    mainpage.style.display = 'block'; // Directly use loader, not loader.element


    exportButton.addEventListener("click", function () {
        exportButton.disabled = true;
            // Show loader if it exists
                
            loader.style.display = 'block'; // Directly use loader, not loader.element
                
                
                mainpage.style.overflow = 'hidden'; // Directly use mainpage, not mainpage.element
        if (surveyTable) surveyTable.style.display = "block";

        const selectedCountry = document.getElementById('country').value;
        const selectedOrganization = document.getElementById('organization').value;

        $.ajax({
            url: '/typeform/fecthallsurvey',
            type: 'GET',
            data: {
                country: selectedCountry,
                organization_id: selectedOrganization
            },
            dataType: 'json',
            success: function (response) {
                const surveyData = response.surveys;
                updateTable(surveyData);

                const charts = [
                    { id: "sales-forecast-chart", title: "Mean Scores Values" },
                    { id: "basic_radar_chart", title: "Mean Result" },
                    { id: "simple_pie_chart", title: "Participants by Gender" },
                    { id: "simple_pie_chart2", title: "Participants by Age" },
                    { id: "sales-forecast-chart-2", title: "Positive Peace" },
                    { id: "sales-forecast-chart-3", title: "Negative Peace" },
                    { id: "multi_radar", title: "Results by pillars: Radar" },
                    { id: "pillar-table", title: "Results by pillar: Table" },
                    { id: "pillar-table-time", title: "Results Over Time: Table" },
                    { id: "survey-table", title: "Survey Report: Table" }
                ];

            
                

                // Export charts and tables to PNG and PDF
                exportChartsToPNGAndPDF(charts, function () {
                    surveyTable.style.display = "none";
                    loader.style.display = 'none';
                    mainpage.style.overflow = 'visible';
                    exportButton.disabled = false;
                });
            },
            error: function (error) {
                console.log('Error fetching data:', error);
                exportButton.disabled = false;
                surveyTable.style.display = "none";
                loader.style.display = 'none';
                mainpage.style.overflow = 'visible';
            }
        });
    });
});

function updateTable(data) {
    const tableBody = document.getElementById("survey-table").getElementsByTagName("tbody")[0];
    tableBody.innerHTML = ""; // Clear existing table rows

    // Populate the table with fetched data
    data.forEach(function (item) {
        const row = tableBody.insertRow();

        // Assuming the response data contains the correct properties
        row.insertCell(0).textContent = item.survey_data_id || 'N/A';
        row.insertCell(1).textContent = item.survey_id || 'N/A';
        row.insertCell(2).textContent = item.survey_name || 'N/A';
        row.insertCell(3).textContent = item.survey_country || 'N/A';
        row.insertCell(4).textContent = item.survey_organization || 'N/A';
        row.insertCell(5).textContent = item.participant_name || 'N/A';
        row.insertCell(6).textContent = item.age || 'N/A';
        row.insertCell(7).textContent = item.gender || 'N/A';
        row.insertCell(8).textContent = item.survey_date || 'N/A';
    });
}

function exportChartsToPNGAndPDF(charts, callback) {
    const jsPDF = window.jspdf.jsPDF;
    const pdf = new jsPDF({ orientation: "portrait" });
    let yOffset = 10; // Padding at the top
    const xOffset = 25; // Padding on the left
    const exportedImages = [];

    const logo = document.querySelector(".logo img");
    const logoData = logo ? logo.src : null;

    // Add logo and title ("Community Strength Barometer") on the same line
    if (logoData) {
        pdf.addImage(logoData, "PNG", xOffset, yOffset, 20, 20); // Logo size
        const titleText = "Community Strength Barometer: Report";
        pdf.setFontSize(14);
        pdf.text(titleText, xOffset + 25, yOffset + 15); // Align text next to the logo
    }

    // Add a light grey border after the logo and title
    const titleYPosition = yOffset + 25; // Slightly move down after title
    const pdfWidth = pdf.internal.pageSize.width;
    pdf.setLineWidth(0.5); // Border thickness
    pdf.setDrawColor(211, 211, 211); // Light grey color
    pdf.line(xOffset, titleYPosition, pdfWidth - xOffset, titleYPosition); // Draw the border

    // Add some padding below the border before the first chart
    yOffset = titleYPosition + 20; // Increased space after the top border

    const captureChart = (index) => {
        if (index >= charts.length) {
            generatePDF(exportedImages);
            if (callback) callback(); // Ensure the callback is called
            return;
        }

        const { id, title } = charts[index];
        const chartElement = document.getElementById(id);

        if (!chartElement) {
            console.error(`Element with ID ${id} not found.`);
            captureChart(index + 1); // Skip to the next chart
            return;
        }

        html2canvas(chartElement).then(canvas => {
            exportedImages.push({ title, imgData: canvas.toDataURL("image/png"), width: canvas.width, height: canvas.height });
            captureChart(index + 1);
        }).catch(error => {
            console.error(`Error rendering chart "${title}":`, error);
            captureChart(index + 1); // Skip to the next chart
        });
    };

    const generatePDF = (images) => {
        images.forEach((image, i) => {
            if (i > 0 && yOffset + image.height > pdf.internal.pageSize.height - 20) {
                pdf.addPage(); // Add a new page if the image doesn't fit
                yOffset = 10; // Reset yOffset for the new page
            }

            const imgWidth = 130;
            const aspectRatio = image.width / image.height;
            const imgHeight = imgWidth / aspectRatio;

            pdf.setFontSize(12);
            pdf.text(image.title, xOffset, yOffset - 5); // Add chart title

            // Add 1px light grey border around each image
            pdf.setLineWidth(0.5);
            pdf.setDrawColor(211, 211, 211);
            pdf.rect(xOffset - 1, yOffset - 1, imgWidth + 2, imgHeight + 2); // Draw the border

            pdf.addImage(image.imgData, "PNG", xOffset, yOffset, imgWidth, imgHeight);
            yOffset += imgHeight + 20; // Add spacing between charts
        });

        pdf.save("CSB_Report.pdf");
    };

    captureChart(0); // Start capturing charts
}
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('typeform.layout.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/prateeklalwani/Desktop/Typeform Main/typeform-dashboard/resources/views/typeform/index.blade.php ENDPATH**/ ?>
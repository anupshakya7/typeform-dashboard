<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.crm'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col">
            <div class="h-100">

                <!--greeting section -->

                <div class="mb-3 pb-1">
                    <div>
                        <h4 class="mb-1">Welcome back, <?php echo e(auth()->user()->name); ?></h4>
                    </div>
                </div>
                <!--end greeting section-->

                <!--card row section ==========================================================-->

                <div class="row">
                    <div class="col-xl-3 col-md-6">
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
                    <div class="col-xl-3 col-md-6">
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
                    <div class="col-xl-3 col-md-6">
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
                    <div class="col-xl-3 col-md-6">
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

                <div class="filter-section mb-3 d-flex justify-content-between align-items-center flex-wrap g-3">
                    <div>
                        <h5 style="font-size:14px;">Get insights, track trends, compare data, manage.</h5>
                    </div>

                    <div class="mt-3 mt-lg-0 d-flex flex-grow-1 justify-content-sm-end justify-content-start">
                        <form action="<?php echo e(route('home.index')); ?>" method="GET">
                            <div class="row gap-3 m-0 p-0 dashboard">
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
                                    <input type="text" class="form-control" value="<?php echo e(auth()->user()->organization->name); ?>" readonly>
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
                                    <a class="icon-frame bg-white" style="border: 1px solid #BABABA;" href="#"
                                        class="m-0 p-0 d-flex justify-content-center align-items-center">

                                        <img class="svg-icon" type="image/svg+xml"
                                            src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>

                                    </a>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>


                <!--bar graph section starts here-->

                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Mean Scores Values</h4>
                        <div class="flex-shrink-0">
                            <div class="d-flex flex-row gap-2 align-items-center">
                                <!--info here-->
                                <a class="icon-frame" href="#"
                                    class="m-0 p-0 d-flex justify-content-center align-items-center">

                                    <img class="svg-icon" type="image/svg+xml"
                                        src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>
                                </a>
                                <a class="icon-frame" href="#" data-bs-toggle="offcanvas"
                                    data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas"
                                    class="m-0 p-0 d-flex justify-content-center align-items-center">

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
                        <div class="card h-100">
                            <div class="card-header d-flex flex-row align-items-center justify-content-between">
                                <h4 class="card-title">Mean Results</h4>
                                <div class="flex-shrink-0">
                                    <div class="d-flex flex-row gap-2 align-items-center">
                                        <!--info here-->
                                        <a class="icon-frame" href="#" data-bs-toggle="offcanvas"
                                            data-bs-target="#theme-settings-offcanvas"
                                            aria-controls="theme-settings-offcanvas"
                                            class="m-0 p-0 d-flex justify-content-center align-items-center">

                                            <img class="svg-icon" type="image/svg+xml"
                                                src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>
                                        </a>
                                        <a class="icon-frame" href="#"
                                            class="m-0 p-0 d-flex justify-content-center align-items-center">

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
                                <h4 class="card-title mb-0">Participants by Gender</h4>
                                <div class="flex-shrink-0">
                                    <div class="d-flex flex-row gap-2 align-items-center">
                                        <!--info here-->
                                        <a class="icon-frame" href="#"
                                            class="m-0 p-0 d-flex justify-content-center align-items-center">

                                            <img class="svg-icon" type="image/svg+xml"
                                                src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>
                                        </a>
                                        <a class="icon-frame" href="#" data-bs-toggle="offcanvas"
                                            data-bs-target="#theme-settings-offcanvas"
                                            aria-controls="theme-settings-offcanvas"
                                            class="m-0 p-0 d-flex justify-content-center align-items-center">

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
                                <h4 class="card-title mb-0">Participants by Age</h4>
                                <div class="flex-shrink-0">
                                    <div class="d-flex flex-row gap-2 align-items-center">
                                        <!--info here-->
                                        <a class="icon-frame" href=""
                                            class="m-0 p-0 d-flex justify-content-center align-items-center">

                                            <img class="svg-icon" type="image/svg+xml"
                                                src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>
                                        </a>
                                        <a class="icon-frame" href="" data-bs-toggle="offcanvas"
                                            data-bs-target="#theme-settings-offcanvas"
                                            aria-controls="theme-settings-offcanvas"
                                            class="m-0 p-0 d-flex justify-content-center align-items-center">

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
                                    <h4 class="card-title mb-0 flex-grow-1">Positive Peace</h4>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex flex-row gap-2 align-items-center">
                                            <!--info here-->
                                            <a class="icon-frame" href="#"
                                                class="m-0 p-0 d-flex justify-content-center align-items-center">

                                                <img class="svg-icon" type="image/svg+xml"
                                                    src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>
                                            </a>
                                            <a class="icon-frame" href="#" data-bs-toggle="offcanvas"
                                                data-bs-target="#theme-settings-offcanvas"
                                                aria-controls="theme-settings-offcanvas"
                                                class="m-0 p-0 d-flex justify-content-center align-items-center">

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
                                    <h4 class="card-title mb-0 flex-grow-1">Negative Peace</h4>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex flex-row gap-2 align-items-center">
                                            <!--info here-->
                                            <a class="icon-frame" href="#"
                                                class="m-0 p-0 d-flex justify-content-center align-items-center">

                                                <img class="svg-icon" type="image/svg+xml"
                                                    src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>
                                            </a>
                                            <a class="icon-frame" href="#" data-bs-toggle="offcanvas"
                                                data-bs-target="#theme-settings-offcanvas"
                                                aria-controls="theme-settings-offcanvas"
                                                class="m-0 p-0 d-flex justify-content-center align-items-center">

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
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Results by Pillars</h4>
                            <div class="flex-shrink-0">
                                <div class="d-flex flex-row gap-2 align-items-center">
                                    <!--info here-->
                                    <a class="icon-frame" href="#"
                                        class="m-0 p-0 d-flex justify-content-center align-items-center">

                                        <img class="svg-icon" type="image/svg+xml"
                                            src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>
                                    </a>
                                    <a class="icon-frame" href="#" data-bs-toggle="offcanvas"
                                        data-bs-target="#theme-settings-offcanvas"
                                        aria-controls="theme-settings-offcanvas"
                                        class="m-0 p-0 d-flex justify-content-center align-items-center">

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
                                    <h4 class="card-title mb-0 flex-grow-1">Results By Pillar</h4>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex flex-row gap-2 align-items-center">
                                            <!--info here-->
                                            <a class="icon-frame" href="#"
                                                class="m-0 p-0 d-flex justify-content-center align-items-center">

                                                <img class="svg-icon" type="image/svg+xml"
                                                    src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>
                                            </a>
                                            <a class="icon-frame" href="#" data-bs-toggle="offcanvas"
                                                data-bs-target="#theme-settings-offcanvas"
                                                aria-controls="theme-settings-offcanvas"
                                                class="m-0 p-0 d-flex justify-content-center align-items-center">

                                                <img class="svg-icon" type="image/svg+xml"
                                                    src="<?php echo e(URL::asset('build/icons/info.svg')); ?>"></img>

                                            </a>
                                        </div>
                                    </div>
                                </div><!-- end card header -->

                                <div class="card-body">
                                    <div class="live-preview">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap mb-0">
                                                <thead class="table-light">
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

                    
                    <!-- end col -->
                </div>
                <!--end row-->


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
                            $('#branch').append('<option value="" selected>Choose Division</option>');

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
                            $('#branch').append('<option value="" selected>Choose Branch</option>');
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
                            $('#survey').append('<option value="" selected>Choose Survey</option>');
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
                            $('#survey').append('<option value="" selected>Choose Survey</option>');
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
                        '#6097CF', '#8B939C', '#67D36E', '#D2D4D7', '#1B68B7', '#A0CFFF', '#E58F87',
                        '#D4DE86'
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
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('typeform.layout.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/prateeklalwani/Desktop/Typeform Main/typeform-dashboard/resources/views/typeform/index.blade.php ENDPATH**/ ?>
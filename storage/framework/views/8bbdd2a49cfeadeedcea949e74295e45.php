<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.crm'); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col">

            <div class="h-100">

                <!--greeting section -->

                <div class="mb-3 pb-1 d-flex align-items-center flex-row">
                    <div class="flex-grow-1">
                        <h4 class="fs-16 mb-1">Welcome back, <?php echo e(auth()->user()->name); ?></h4>
                        <p class="text-muted mb-0">Get insights, track trends, compare data, manage.</p>
                    </div>
                    <div class="mt-3 mt-lg-0">
                        <form action="<?php echo e(route('home.index')); ?>" method="GET">
                            <div class="row">

                                <div class="col-auto col-4">
                                    <select class="form-select select2" name="country" id="country"
                                        aria-label="Default select example" onchange="this.form.submit()">
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country['name']); ?>"
                                                <?php echo e(request('country') == $country['name'] ? 'selected' : ''); ?>>
                                                <?php echo e($country['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-auto col-4">
    
                                    <select class="form-select select2" id="organization" name="organization"
                                        aria-label="Default select example" onchange="this.form.submit()" disabled>
                                        <option value="" selected>Organization</option>
                                        <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($organization->id); ?>"
                                                <?php echo e(request('organization') == $organization->id ? 'selected' : ''); ?>>
                                                <?php echo e($organization->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="col-auto col-4">
                                    <select class="form-select select2" id="branch" name="branch"
                                        aria-label="Default select example" onchange="this.form.submit()" disabled>
                                        <option value="" selected>Branch</option>
                                    </select>
                                </div>
                                <div class="col-auto col-4">
                                    <select class="form-select select2" name="survey" id="survey"
                                        aria-label="Default select example" onchange="this.form.submit()" disabled>
                                        <option value="" selected>Survey</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </form>
                    
                    </div>

                    <a class="icon-frame bg-white ms-sm-3" style="border: 1px solid #BABABA;" href="#"
                        class="m-0 p-0 d-flex justify-content-center align-items-center">

                        <img class="svg-icon" type="image/svg+xml" src="<?php echo e(URL::asset('build/icons/download.svg')); ?>"></img>

                    </a>

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
                                <a class="icon-frame" href="#"
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
                                        <a class="icon-frame" href="#"
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
                                        <a class="icon-frame" href="#"
                                            class="m-0 p-0 d-flex justify-content-center align-items-center">

                                            <img class="svg-icon" type="image/svg+xml"
                                                src="<?php echo e(URL::asset('build/icons/info.svg')); ?>"></img>

                                        </a>
                                    </div>
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div id="simple_pie_chart"
                                    data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'
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
                                        <a class="icon-frame" href="#"
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
                                <div id="simple_pie_chart2"
                                    data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]'
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
                                            <a class="icon-frame" href="#"
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
                                            <a class="icon-frame" href="#"
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
                            <h4 class="card-title mb-0">Results by pillars of Positive Peace</h4>
                            <div class="flex-shrink-0">
                                <div class="d-flex flex-row gap-2 align-items-center">
                                    <!--info here-->
                                    <a class="icon-frame" href="#"
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
                                            <a class="icon-frame" href="#"
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

                                                        <th scope="col"></th>
                                                        <th scope="col">Mean</th>
                                                        <th scope="col">Country Mean</th>
                                                        <th scope="col">Global Mean</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>

                                                        <td><a href="#" class="fw-medium">Well-Functioning
                                                                Government</a>
                                                        </td>
                                                        <td>3.8</td>
                                                        <td>3.8</td>
                                                        <td><span class="trend-blue">3.8%<img class="trend-icon"
                                                                    src="<?php echo e(URL::asset('build/icons/trend-blue.svg')); ?>"
                                                                    alt="ArrowExternalRight"></td>

                                                    </tr>
                                                    <tr>

                                                        <td><a href="#" class="fw-medium">Low Levels of
                                                                Corruption</a></td>
                                                        <td>3.8</td>
                                                        <td>3.8</td>
                                                        <td><span class="trend-blue">3.8%</span><img class="trend-icon"
                                                                src="<?php echo e(URL::asset('build/icons/trend-blue.svg')); ?>"
                                                                alt="ArrowExternalRight"></td>

                                                    </tr>
                                                    <tr>

                                                        <td><a href="#" class="fw-medium">Equitable Distribution Of
                                                                Resource</a></td>
                                                        <td>3.8</td>
                                                        <td>3.8</td>
                                                        <td><span class="trend-red">3.8%</span><img class="trend-icon"
                                                                src="<?php echo e(URL::asset('build/icons/trend-red.svg')); ?>"
                                                                alt="ArrowExternalRight"></td>

                                                    </tr>
                                                    <tr>

                                                        <td><a href="#" class="fw-medium">Good Relations With
                                                                Neighbours</a>
                                                        </td>
                                                        <td>3.8</td>
                                                        <td>3.8</td>
                                                        <td><span class="trend-blue">3.8%<img class="trend-icon"
                                                                    src="<?php echo e(URL::asset('build/icons/trend-blue.svg')); ?>"
                                                                    alt="ArrowExternalRight"></td>

                                                    </tr>
                                                    <tr>

                                                        <td><a href="#" class="fw-medium">Free Flow Of
                                                                Information</a></td>
                                                        <td>3.8</td>
                                                        <td>3.8</td>
                                                        <td><span class="trend-blue">3.8%</span><img class="trend-icon"
                                                                src="<?php echo e(URL::asset('build/icons/trend-blue.svg')); ?>"
                                                                alt="ArrowExternalRight"></td>

                                                    </tr>
                                                    <tr>

                                                        <td><a href="#" class="fw-medium">High Levels Of Human
                                                                Capital</a>
                                                        </td>
                                                        <td>3.8</td>
                                                        <td>3.8</td>
                                                        <td><span class="trend-red">3.8%</span><img class="trend-icon"
                                                                src="<?php echo e(URL::asset('build/icons/trend-red.svg')); ?>"
                                                                alt="ArrowExternalRight"></td>

                                                    </tr>
                                                    <tr>

                                                        <td><a href="#" class="fw-medium">Sound Business
                                                                Environment</a>
                                                        </td>
                                                        <td>3.8</td>
                                                        <td>3.8</td>
                                                        <td><span class="trend-blue">3.8%</span><img class="trend-icon"
                                                                src="<?php echo e(URL::asset('build/icons/trend-blue.svg')); ?>"
                                                                alt="ArrowExternalRight"></td>

                                                    </tr>
                                                    <tr>

                                                        <td><a href="#" class="fw-medium">Acceptance Of The Rights
                                                                Of
                                                                Others</a></td>
                                                        <td>3.8</td>
                                                        <td>3.8</td>
                                                        <td><span class="trend-blue">3.8%</span><img class="trend-icon"
                                                                src="<?php echo e(URL::asset('build/icons/trend-blue.svg')); ?>"
                                                                alt="ArrowExternalRight"></td>

                                                    </tr>

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

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card mb-0">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Results Over Time</h4>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex flex-row gap-2 align-items-center">
                                            <!--info here-->
                                            <a class="icon-frame" href="#"
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
                                    <div class="live-preview">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-nowrap mb-0">
                                                <thead class="table-light">
                                                    <tr>

                                                        <th scope="col"></th>
                                                        <th scope="col">Before</th>
                                                        <th scope="col">During</th>
                                                        <th scope="col">% Change</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>

                                                        <td><a href="#" class="fw-medium">Well-Functioning
                                                                Government</a>
                                                        </td>
                                                        <td>3.8</td>
                                                        <td>3.8</td>
                                                        <td><span class="trend-blue">3.8%<img class="trend-icon"
                                                                    src="<?php echo e(URL::asset('build/icons/trend-blue.svg')); ?>"
                                                                    alt="ArrowExternalRight"></td>

                                                    </tr>
                                                    <tr>

                                                        <td><a href="#" class="fw-medium">Low Levels of
                                                                Corruption</a></td>
                                                        <td>3.8</td>
                                                        <td>3.8</td>
                                                        <td><span class="trend-blue">3.8%</span><img class="trend-icon"
                                                                src="<?php echo e(URL::asset('build/icons/trend-blue.svg')); ?>"
                                                                alt="ArrowExternalRight"></td>

                                                    </tr>
                                                    <tr>

                                                        <td><a href="#" class="fw-medium">Equitable Distribution Of
                                                                Resource</a></td>
                                                        <td>3.8</td>
                                                        <td>3.8</td>
                                                        <td><span class="trend-red">3.8%</span><img class="trend-icon"
                                                                src="<?php echo e(URL::asset('build/icons/trend-red.svg')); ?>"
                                                                alt="ArrowExternalRight"></td>

                                                    </tr>
                                                    <tr>

                                                        <td><a href="#" class="fw-medium">Good Relations With
                                                                Neighbours</a>
                                                        </td>
                                                        <td>3.8</td>
                                                        <td>3.8</td>
                                                        <td><span class="trend-blue">3.8%<img class="trend-icon"
                                                                    src="<?php echo e(URL::asset('build/icons/trend-blue.svg')); ?>"
                                                                    alt="ArrowExternalRight"></td>

                                                    </tr>
                                                    <tr>

                                                        <td><a href="#" class="fw-medium">Free Flow Of
                                                                Information</a></td>
                                                        <td>3.8</td>
                                                        <td>3.8</td>
                                                        <td><span class="trend-blue">3.8%</span><img class="trend-icon"
                                                                src="<?php echo e(URL::asset('build/icons/trend-blue.svg')); ?>"
                                                                alt="ArrowExternalRight"></td>

                                                    </tr>
                                                    <tr>

                                                        <td><a href="#" class="fw-medium">High Levels Of Human
                                                                Capital</a>
                                                        </td>
                                                        <td>3.8</td>
                                                        <td>3.8</td>
                                                        <td><span class="trend-red">3.8%</span><img class="trend-icon"
                                                                src="<?php echo e(URL::asset('build/icons/trend-red.svg')); ?>"
                                                                alt="ArrowExternalRight"></td>

                                                    </tr>
                                                    <tr>

                                                        <td><a href="#" class="fw-medium">Sound Business
                                                                Environment</a>
                                                        </td>
                                                        <td>3.8</td>
                                                        <td>3.8</td>
                                                        <td><span class="trend-blue">3.8%</span><img class="trend-icon"
                                                                src="<?php echo e(URL::asset('build/icons/trend-blue.svg')); ?>"
                                                                alt="ArrowExternalRight"></td>

                                                    </tr>
                                                    <tr>

                                                        <td><a href="#" class="fw-medium">Acceptance Of The Rights
                                                                Of
                                                                Others</a></td>
                                                        <td>3.8</td>
                                                        <td>3.8</td>
                                                        <td><span class="trend-blue">3.8%</span><img class="trend-icon"
                                                                src="<?php echo e(URL::asset('build/icons/trend-blue.svg')); ?>"
                                                                alt="ArrowExternalRight"></td>

                                                    </tr>

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
            //Parameters
            var country = getQueryParams('country');
            var organization = getQueryParams('organization');
            var branch = getQueryParams('branch');
            var survey = getQueryParams('survey');

            filterOrganization();
            filterSurvey();
            filterBranch();
            
            //Filter Organizations
            $('#country').change(function() {
                filterOrganization();
            });
            
            $('#organization').change(function() {
                filterSurvey();
                filterBranch();
            });

            $('#branch').change(function() {
                filterSurvey();
            });
            

            function filterOrganization() {
                var countryVal = $('#country').val();

                if (countryVal !== '') {     
                    $.ajax({
                        url: "<?php echo e(route('organization.get')); ?>",
                        method: 'GET',
                        data: {
                            country: countryVal
                        },
                        success: function(response) {
                            console.log(response);
                            $('#organization').prop('disabled', false);
                            $('#organization').html('');
                            $('#organization').append('<option selected>Choose Organization</option>');
                            response.organizations.forEach(function(organizationItem) {
                                // $('#organization').append(new Option(organization.name,
                                //     organization.id));
                                var option = new Option(organizationItem.name,organizationItem.id);
                                $('#organization').append(option);

                                if(organization && organization == organizationItem.id){
                                    $(option).prop('selected',true);
                                }
                            })
                        },
                        error: function(xhr, status, error) {
                            $('#organization').prop('disabled', true);
                            $('#organization').html('');
                            $('#organization').append('<option selected>Choose Organization</option>');
                        }
                    })
                }
            }

            function filterBranch() {
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
                            $('#branch').append('<option value="" selected>Choose Branch</option>');
                            response.branches.forEach(function(branchItem) {
                                // $('#branch').append(new Option(branch.name,
                                // branch.id));
                                var option = new Option(branchItem.name,branchItem.id);
                                $('#branch').append(option);

                                if(branch && branch == branchItem.id){
                                    $(option).prop('selected',true);
                                }
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
                var branchVal = $('#branch').val();

                if (organizationVal !== '') {
                    $.ajax({
                        url: "<?php echo e(route('survey.get')); ?>",
                        method: 'GET',
                        data: {
                            organization_id: organizationVal,
                            branch_id:branchVal
                        },
                        success: function(response) {
                            console.log(response);
                            $('#survey').prop('disabled', false);
                            $('#survey').html('');
                            $('#survey').append('<option value="" selected>Choose Survey</option>');
                            response.forms.forEach(function(formItem) {
                                // $('#survey').append(new Option(form.form_title,
                                // form.id));
                                var option = new Option(formItem.form_title,formItem.form_id);
                                $('#survey').append(option);

                                if(survey && survey == formItem.form_id){
                                    $(option).prop('selected',true);
                                }
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

            function getQueryParams(param){
                var urlParams = new URLSearchParams(window.location.search);
                return urlParams.get(param);
            }
            
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('typeform.layout.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/prateeklalwani/Desktop/Typeform Main/typeform-dashboard/resources/views/typeform/index.blade.php ENDPATH**/ ?>
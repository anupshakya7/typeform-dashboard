@extends('typeform.layout.web')
@section('title') @lang('translation.crm') @endsection


@section('content')
<div class="row">
    <div class="col">

        <div class="h-100">

            <!--greeting section -->

            <div class="mb-3 pb-1 d-flex align-items-center flex-row">
                <div class="flex-grow-1">
                    <h4 class="fs-16 mb-1">Welcome back, Admin</h4>
                    <p class="text-muted mb-0">Get insights, track trends, compare data, manage.</p>
                </div>
                <div class="mt-3 mt-lg-0">

                    <div class="row">

                        <div class="col-auto">
                            <select class="form-select " aria-label="Default select example">
                                <option selected>Country </option>
                                <option value="1">Australia</option>
                                <option value="2">USA</option>
                                <option value="3">India</option>
                                <option value="4">Nepal</option>

                            </select>
                        </div>
                        <div class="col-auto">

                            <select class="form-select" aria-label="Default select example">
                                <option selected>Organization </option>
                                <option value="1">IEP</option>
                                <option value="2">World Vision</option>
                                <option value="3">Global Peace</option>
                                <option value="4">CSB</option>
                                <option value="5">ATI</option>
                            </select>
                        </div>

                        <div class="col-auto">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Division</option>
                                <option value="1">Division1</option>
                                <option value="2">Division2</option>
                                <option value="3">Division3</option>
                            </select>
                        </div>

                        <div class="col-auto">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Project</option>
                                <option value="1">Project1</option>
                                <option value="2">Project2</option>
                                <option value="3">Project3</option>
                            </select>
                        </div>
                    </div>
                </div>

                <a class="icon-frame bg-white ms-sm-3" style="border: 1px solid #BABABA;" href="#"
                    class="m-0 p-0 d-flex justify-content-center align-items-center">

                    <img class="svg-icon" type="image/svg+xml"
                        src="{{ URL::asset('build/icons/download.svg')}}"></img>

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
                                    <a href="#">
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-3">

                                <h4 class="fs-22 fw-semibold ff-secondary"><span class="counter-value"
                                        data-target="320">0</span>
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
                                    <i class="fa-solid fa-ellipsis"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-3">

                                <h4 class="fs-22 fw-semibold ff-secondary "><span class="counter-value"
                                        data-target="150">0</span>
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
                                    <i class="fa-solid fa-ellipsis"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-3">

                                <h4 class="fs-22 fw-semibold ff-secondary"><span class="counter-value"
                                        data-target="57">0</span>
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
                                    <i class="fa-solid fa-ellipsis"></i>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-3">
                                <h4 class="fs-22 fw-semibold ff-secondary"><span class="counter-value"
                                        data-target="1520">0</span>
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
                                    src="{{ URL::asset('build/icons/download.svg')}}"></img>
                            </a>
                            <a class="icon-frame" href="#"
                                class="m-0 p-0 d-flex justify-content-center align-items-center">

                                <img class="svg-icon" type="image/svg+xml"
                                    src="{{ URL::asset('build/icons/info.svg')}}"></img>

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
                                            src="{{ URL::asset('build/icons/download.svg')}}"></img>
                                    </a>
                                    <a class="icon-frame" href="#"
                                        class="m-0 p-0 d-flex justify-content-center align-items-center">

                                        <img class="svg-icon" type="image/svg+xml"
                                            src="{{ URL::asset('build/icons/info.svg')}}"></img>

                                    </a>
                                </div>
                            </div>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div id="basic_radar" data-colors='["--vz-success"]' class="apex-charts" dir="ltr"></div>
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
                                            src="{{ URL::asset('build/icons/download.svg')}}"></img>
                                    </a>
                                    <a class="icon-frame" href="#"
                                        class="m-0 p-0 d-flex justify-content-center align-items-center">

                                        <img class="svg-icon" type="image/svg+xml"
                                            src="{{ URL::asset('build/icons/info.svg')}}"></img>

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
                                            src="{{ URL::asset('build/icons/download.svg')}}"></img>
                                    </a>
                                    <a class="icon-frame" href="#"
                                        class="m-0 p-0 d-flex justify-content-center align-items-center">

                                        <img class="svg-icon" type="image/svg+xml"
                                            src="{{ URL::asset('build/icons/info.svg')}}"></img>

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
                                                src="{{ URL::asset('build/icons/download.svg')}}"></img>
                                        </a>
                                        <a class="icon-frame" href="#"
                                            class="m-0 p-0 d-flex justify-content-center align-items-center">

                                            <img class="svg-icon" type="image/svg+xml"
                                                src="{{ URL::asset('build/icons/info.svg')}}"></img>

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
                                                src="{{ URL::asset('build/icons/download.svg')}}"></img>
                                        </a>
                                        <a class="icon-frame" href="#"
                                            class="m-0 p-0 d-flex justify-content-center align-items-center">

                                            <img class="svg-icon" type="image/svg+xml"
                                                src="{{ URL::asset('build/icons/info.svg')}}"></img>

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
                                        src="{{ URL::asset('build/icons/download.svg')}}"></img>
                                </a>
                                <a class="icon-frame" href="#"
                                    class="m-0 p-0 d-flex justify-content-center align-items-center">

                                    <img class="svg-icon" type="image/svg+xml"
                                        src="{{ URL::asset('build/icons/info.svg')}}"></img>

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
                                                src="{{ URL::asset('build/icons/download.svg')}}"></img>
                                        </a>
                                        <a class="icon-frame" href="#"
                                            class="m-0 p-0 d-flex justify-content-center align-items-center">

                                            <img class="svg-icon" type="image/svg+xml"
                                                src="{{ URL::asset('build/icons/info.svg')}}"></img>

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

                                                    <td><a href="#" class="fw-medium">Well-Functioning Government</a>
                                                    </td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-blue">3.8%<img class="trend-icon"
                                                                src="{{ URL::asset('build/icons/trend-blue.svg')}}"
                                                                alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><a href="#" class="fw-medium">Low Levels of Corruption</a></td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-blue">3.8%</span><img class="trend-icon"
                                                            src="{{ URL::asset('build/icons/trend-blue.svg')}}"
                                                            alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><a href="#" class="fw-medium">Equitable Distribution Of
                                                            Resource</a></td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-red">3.8%</span><img class="trend-icon"
                                                            src="{{ URL::asset('build/icons/trend-red.svg')}}"
                                                            alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><a href="#" class="fw-medium">Good Relations With Neighbours</a>
                                                    </td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-blue">3.8%<img class="trend-icon"
                                                                src="{{ URL::asset('build/icons/trend-blue.svg')}}"
                                                                alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><a href="#" class="fw-medium">Free Flow Of Information</a></td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-blue">3.8%</span><img class="trend-icon"
                                                            src="{{ URL::asset('build/icons/trend-blue.svg')}}"
                                                            alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><a href="#" class="fw-medium">High Levels Of Human Capital</a>
                                                    </td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-red">3.8%</span><img class="trend-icon"
                                                            src="{{ URL::asset('build/icons/trend-red.svg')}}"
                                                            alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><a href="#" class="fw-medium">Sound Business Environment</a>
                                                    </td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-blue">3.8%</span><img class="trend-icon"
                                                            src="{{ URL::asset('build/icons/trend-blue.svg')}}"
                                                            alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><a href="#" class="fw-medium">Acceptance Of The Rights Of
                                                            Others</a></td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-blue">3.8%</span><img class="trend-icon"
                                                            src="{{ URL::asset('build/icons/trend-blue.svg')}}"
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
@endsection


@section('script')
<!-- apexcharts -->
<script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/apexcharts-pie.init.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/dashboard-crm.init.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/apexcharts-radar.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
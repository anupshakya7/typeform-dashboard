@extends('typeform.layout.web')
@section('title') @lang('translation.crm') @endsection


@section('content')
    <div class="row">
        <div class="col">

            <div class="h-100">

            <!--greeting section -->

                <div class="row mb-3 pb-1">
                    <div class="col-12">
                        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-16 mb-1">Good Morning, Anna!</h4>
                                <p class="text-muted mb-0">Here's what's happening with your store
                                    today.</p>
                            </div>
                            <div class="mt-3 mt-lg-0">
                                <form action="javascript:void(0);">
                                    <div class="row g-3 mb-0 align-items-center">
                                        <div class="col-sm-auto">
                                            <div class="input-group">
                                                <input type="text"
                                                    class="form-control border-0 dash-filter-picker shadow"
                                                    data-provider="flatpickr" data-range-date="true"
                                                    data-date-format="d M, Y"
                                                    data-deafult-date="01 Jan 2022 to 31 Jan 2022">
                                                <div class="input-group-text bg-primary border-primary text-white">
                                                    <i class="ri-calendar-2-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-auto">
                                            <button type="button" class="btn btn-soft-success"><i
                                                    class="ri-add-circle-line align-middle me-1"></i>
                                                Add Product</button>
                                        </div>
                                        <!--end col-->
                                        <div class="col-auto">
                                            <button type="button"
                                                class="btn btn-soft-info btn-icon waves-effect waves-light layout-rightside-btn"><i
                                                    class="ri-pulse-line"></i></button>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                        </div><!-- end card header -->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Total Earnings</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <h5 class="text-success fs-14 mb-0">
                                            <i class="ri-arrow-right-up-line fs-13 align-middle"></i>
                                            +16.24 %
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value"
                                                data-target="559.25">0</span>k
                                        </h4>
                                        <a href="" class="text-decoration-underline">View net
                                            earnings</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-success-subtle rounded fs-3">
                                            <i class="bx bx-dollar-circle text-success"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Orders</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <h5 class="text-danger fs-14 mb-0">
                                            <i class="ri-arrow-right-down-line fs-13 align-middle"></i>
                                            -3.57 %
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                data-target="36894">0</span></h4>
                                        <a href="" class="text-decoration-underline">View all orders</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-info-subtle rounded fs-3">
                                            <i class="bx bx-shopping-bag text-info"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            Customers</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <h5 class="text-success fs-14 mb-0">
                                            <i class="ri-arrow-right-up-line fs-13 align-middle"></i>
                                            +29.08 %
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                data-target="183.35">0</span>M
                                        </h4>
                                        <a href="" class="text-decoration-underline">See details</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-warning-subtle rounded fs-3">
                                            <i class="bx bx-user-circle text-warning"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                            My Balance</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <h5 class="text-muted fs-14 mb-0">
                                            +0.00 %
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value"
                                                data-target="165.89">0</span>k
                                        </h4>
                                        <a href="" class="text-decoration-underline">Withdraw money</a>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle rounded fs-3">
                                            <i class="bx bx-wallet text-primary"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div> <!-- end row-->

              <!--greeting section ends here -->


            <!--bar graph section starts here-->

            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Sales Forecast</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span class="text-muted">Nov 2021<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Oct 2021</a>
                                <a class="dropdown-item" href="#">Nov 2021</a>
                                <a class="dropdown-item" href="#">Dec 2021</a>
                                <a class="dropdown-item" href="#">Jan 2022</a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body pb-0">
                    <div id="sales-forecast-chart" data-colors='["--vz-primary", "--vz-success", "--vz-warning"]' class="apex-charts" dir="ltr"></div>
                </div>
            </div><!-- end card -->


            <!--bar graph section ends here-->


            <!-- radar and pie section -->
            <div class="row">
                <div class="col-sm-8">
                <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Basic Radar Chart</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="basic_radar" data-colors='["--vz-success"]' class="apex-charts" dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
                </div>
                <div class="col-sm-4">

                            <!--gender pie chart here -->

                <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Simple Pie Chart</h4>
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
                <div class="card-header">
                    <h4 class="card-title mb-0">Simple Pie Chart 2</h4>
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
                    <h4 class="card-title mb-0 flex-grow-1">Sales Forecast</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span class="text-muted">Nov 2021<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Oct 2021</a>
                                <a class="dropdown-item" href="#">Nov 2021</a>
                                <a class="dropdown-item" href="#">Dec 2021</a>
                                <a class="dropdown-item" href="#">Jan 2022</a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body pb-0">
                    <div id="sales-forecast-chart-2" data-colors='["--vz-primary", "--vz-success", "--vz-warning"]' class="apex-charts" dir="ltr"></div>
                </div>
            </div><!-- end card -->

</div>



<!--2------>
<div class="col-sm-6">
<div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Sales Forecast</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span class="text-muted">Nov 2021<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Oct 2021</a>
                                <a class="dropdown-item" href="#">Nov 2021</a>
                                <a class="dropdown-item" href="#">Dec 2021</a>
                                <a class="dropdown-item" href="#">Jan 2022</a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body pb-0">
                    <div id="sales-forecast-chart-3" data-colors='["--vz-primary", "--vz-success", "--vz-warning"]' class="apex-charts" dir="ltr"></div>
                </div>
            </div><!-- end card -->

</div>
</div>


<!--two column bar chart section -->

<!--area radar chart section starts here -->

<div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Radar Chart - Multiple series</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div id="multi_radar" data-colors='["--vz-danger", "--vz-success", "--vz-primary"]' class="apex-charts" dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
            
<!--area radar chart section starts here -->


<!--table section starts here -->

<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Results Over Time</h4>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <!--info here-->
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
                                  
                                    <td><a href="#" class="fw-medium">Well-Functioning Government</a></td>
                                    <td>3.8</td>
                                    <td>3.8</td>
                                    <td><span class="trend-blue">3.8%</span><i class="fa-solid fa-arrow-trend-up trend-blue "></i></td>
                                    
                                </tr>
                                <tr>
                                  
                                    <td><a href="#" class="fw-medium">Low Levels of Corruption</a></td>
                                    <td>3.8</td>
                                    <td>3.8</td>
                                    <td><span class="trend-blue">3.8%</span><i class="fa-solid fa-arrow-trend-up trend-blue "></i></td>
                                    
                                </tr>
                                <tr>
                                  
                                    <td><a href="#" class="fw-medium">Equitable Distribution Of Resource</a></td>
                                    <td>3.8</td>
                                    <td>3.8</td>
                                    <td><span class="trend-red">3.8%</span><i class="fa-solid fa-arrow-trend-down trend-red"></i></td>
                                    
                                </tr>
                                <tr>
                                  
                                    <td><a href="#" class="fw-medium">Good Relations With Neighbours</a></td>
                                    <td>3.8</td>
                                    <td>3.8</td>
                                    <td><span class="trend-blue">3.8%</span><i class="fa-solid fa-arrow-trend-up trend-blue "></i></td>
                                    
                                </tr>
                                <tr>
                                  
                                    <td><a href="#" class="fw-medium">Free Flow Of Information</a></td>
                                    <td>3.8</td>
                                    <td>3.8</td>
                                    <td><span class="trend-blue">3.8%</span><i class="fa-solid fa-arrow-trend-up trend-blue "></i></td>
                                    
                                </tr>
                                <tr>
                                  
                                    <td><a href="#" class="fw-medium">High Levels Of Human Capital</a></td>
                                    <td>3.8</td>
                                    <td>3.8</td>
                                    <td><span class="trend-red">3.8%</span><i class="fa-solid fa-arrow-trend-down trend-red"></i></td>
                                    
                                </tr>
                                <tr>
                                  
                                    <td><a href="#" class="fw-medium">Sound Business Environment</a></td>
                                    <td>3.8</td>
                                    <td>3.8</td>
                                    <td><span class="trend-blue">3.8%</span><i class="fa-solid fa-arrow-trend-up trend-blue "></i></td>
                                    
                                </tr>
                                <tr>
                                  
                                    <td><a href="#" class="fw-medium">Acceptance Of The Rights Of Others</a></td>
                                    <td>3.8</td>
                                    <td>3.8</td>
                                    <td><span class="trend-blue">3.8%</span><i class="fa-solid fa-arrow-trend-up trend-blue "></i></td>
                                    
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
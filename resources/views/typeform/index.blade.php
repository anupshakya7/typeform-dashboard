@extends('typeform.layout.web')
@section('title')
@lang('translation.crm')
@endsection


@section('content')
<div class="row">
    <div class="col">

        <div class="h-100">

            <!--greeting section -->

            <div class="mb-3 pb-1 d-block d-sm-flex align-items-center flex-row gap-3">
                <div>
                    <h4 class="fs-16 mb-1">Welcome back, {{auth()->user()->name}}</h4>
                    <p class="text-muted mb-0">Get insights, track trends, compare data, manage.</p>
                </div>
                <div class="mt-3 mt-lg-0 d-flex flex-grow-1 justify-content-sm-end justify-content-start">
                    <form action="{{route('home.index')}}" method="GET">
                        <div class="row gap-3 m-0 p-0 dashboard">

                            <div class="col-auto p-0">
                                <select class="form-select select2" name="country" id="country"
                                    aria-label="Default select example" onchange="this.form.submit()">
                                    @foreach ($countries as $country)
                                    <option value="{{ $country['name'] }}"
                                        {{ request('country') == $country['name'] ? 'selected' : '' }}>
                                        {{ $country['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto p-0">

                                <select class="form-select select2" id="organization" name="organization"
                                    aria-label="Default select example" onchange="this.form.submit()" disabled>
                                    <option value="" selected>Organization</option>
                                    @foreach ($organizations as $organization)
                                    <option value="{{ $organization->id }}"
                                        {{ request('organization') == $organization->id ? 'selected' : '' }}>
                                        {{ $organization->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-auto p-0">
                                <select class="form-select select2" id="branch" name="branch"
                                    aria-label="Default select example" onchange="this.form.submit()" disabled>
                                    <option value="" selected>Branch</option>
                                </select>
                            </div>
                            <div class="col-auto p-0">
                                <select class="form-select select2" name="survey" id="survey"
                                    aria-label="Default select example" onchange="this.form.submit()" disabled>
                                    <option value="" selected>Survey</option>
                                    {{-- @foreach ($surveyForms as $surveyForm)
                                            <option value="{{ $surveyForm->form_title }}"
                                    {{ request('survey_form') == $surveyForm->form_title ? 'selected' : '' }}>
                                    {{ $surveyForm->form_title }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="col-auto p-0">
                                <a class="icon-frame bg-white" style="border: 1px solid #BABABA;" href="#"
                                    class="m-0 p-0 d-flex justify-content-center align-items-center">

                                    <img class="svg-icon" type="image/svg+xml"
                                        src="{{ URL::asset('build/icons/download.svg') }}"></img>

                                </a>

                            </div>
                        </div>
                    </form>

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
                                        data-target="{{$topBox['survey']}}">{{$topBox['survey']}}</span>
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
                                        data-target="{{$topBox['countries']}}">{{$topBox['countries']}}</span>
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
                                        data-target="{{$topBox['organizations']}}">{{$topBox['organizations']}}</span>
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
                                        data-target="{{$topBox['people']}}">{{$topBox['people']}}</span>
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
                                    src="{{ URL::asset('build/icons/download.svg') }}"></img>
                            </a>
                            <a class="icon-frame" href="#"
                                class="m-0 p-0 d-flex justify-content-center align-items-center">

                                <img class="svg-icon" type="image/svg+xml"
                                    src="{{ URL::asset('build/icons/info.svg') }}"></img>

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
                                            src="{{ URL::asset('build/icons/download.svg') }}"></img>
                                    </a>
                                    <a class="icon-frame" href="#"
                                        class="m-0 p-0 d-flex justify-content-center align-items-center">

                                        <img class="svg-icon" type="image/svg+xml"
                                            src="{{ URL::asset('build/icons/info.svg') }}"></img>

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
                                            src="{{ URL::asset('build/icons/download.svg') }}"></img>
                                    </a>
                                    <a class="icon-frame" href="#"
                                        class="m-0 p-0 d-flex justify-content-center align-items-center">

                                        <img class="svg-icon" type="image/svg+xml"
                                            src="{{ URL::asset('build/icons/info.svg') }}"></img>

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
                                            src="{{ URL::asset('build/icons/download.svg') }}"></img>
                                    </a>
                                    <a class="icon-frame" href="#"
                                        class="m-0 p-0 d-flex justify-content-center align-items-center">

                                        <img class="svg-icon" type="image/svg+xml"
                                            src="{{ URL::asset('build/icons/info.svg') }}"></img>

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
                                                src="{{ URL::asset('build/icons/download.svg') }}"></img>
                                        </a>
                                        <a class="icon-frame" href="#"
                                            class="m-0 p-0 d-flex justify-content-center align-items-center">

                                            <img class="svg-icon" type="image/svg+xml"
                                                src="{{ URL::asset('build/icons/info.svg') }}"></img>

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
                                                src="{{ URL::asset('build/icons/download.svg') }}"></img>
                                        </a>
                                        <a class="icon-frame" href="#"
                                            class="m-0 p-0 d-flex justify-content-center align-items-center">

                                            <img class="svg-icon" type="image/svg+xml"
                                                src="{{ URL::asset('build/icons/info.svg') }}"></img>

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
                                        src="{{ URL::asset('build/icons/download.svg') }}"></img>
                                </a>
                                <a class="icon-frame" href="#"
                                    class="m-0 p-0 d-flex justify-content-center align-items-center">

                                    <img class="svg-icon" type="image/svg+xml"
                                        src="{{ URL::asset('build/icons/info.svg') }}"></img>

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
                                                src="{{ URL::asset('build/icons/download.svg') }}"></img>
                                        </a>
                                        <a class="icon-frame" href="#"
                                            class="m-0 p-0 d-flex justify-content-center align-items-center">

                                            <img class="svg-icon" type="image/svg+xml"
                                                src="{{ URL::asset('build/icons/info.svg') }}"></img>

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

                                                    <td><span class="fw-medium pillar-text">Well-Functioning
                                                            Government</span>
                                                    </td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-blue">3.8%<img class="trend-icon"
                                                                src="{{ URL::asset('build/icons/trend-blue.svg') }}"
                                                                alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><span class="fw-medium pillar-text">Low Levels of
                                                            Corruption</span></td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-blue">3.8%</span><img class="trend-icon"
                                                            src="{{ URL::asset('build/icons/trend-blue.svg') }}"
                                                            alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><span class="fw-medium pillar-text">Equitable Distribution Of
                                                            Resource</span></td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-red">3.8%</span><img class="trend-icon"
                                                            src="{{ URL::asset('build/icons/trend-red.svg') }}"
                                                            alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><span class="fw-medium pillar-text">Good Relations With
                                                            Neighbours</span>
                                                    </td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-blue">3.8%<img class="trend-icon"
                                                                src="{{ URL::asset('build/icons/trend-blue.svg') }}"
                                                                alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><span class="fw-medium pillar-text">Free Flow Of
                                                            Information</span></td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-blue">3.8%</span><img class="trend-icon"
                                                            src="{{ URL::asset('build/icons/trend-blue.svg') }}"
                                                            alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><span class="fw-medium pillar-text">High Levels Of Human
                                                            Capital</span>
                                                    </td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-red">3.8%</span><img class="trend-icon"
                                                            src="{{ URL::asset('build/icons/trend-red.svg') }}"
                                                            alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><span class="fw-medium pillar-text">Sound Business
                                                            Environment</span>
                                                    </td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-blue">3.8%</span><img class="trend-icon"
                                                            src="{{ URL::asset('build/icons/trend-blue.svg') }}"
                                                            alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><span class="fw-medium pillar-text">Acceptance Of The Rights
                                                            Of
                                                            Others</span></td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-blue">3.8%</span><img class="trend-icon"
                                                            src="{{ URL::asset('build/icons/trend-blue.svg') }}"
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
                                                src="{{ URL::asset('build/icons/download.svg') }}"></img>
                                        </a>
                                        <a class="icon-frame" href="#"
                                            class="m-0 p-0 d-flex justify-content-center align-items-center">

                                            <img class="svg-icon" type="image/svg+xml"
                                                src="{{ URL::asset('build/icons/info.svg') }}"></img>

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

                                                    <td><span class="fw-medium pillar-text">Well-Functioning
                                                            Government</span>
                                                    </td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-blue">3.8%<img class="trend-icon"
                                                                src="{{ URL::asset('build/icons/trend-blue.svg') }}"
                                                                alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><span class="fw-medium pillar-text">Low Levels of
                                                            Corruption</span></td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-blue">3.8%</span><img class="trend-icon"
                                                            src="{{ URL::asset('build/icons/trend-blue.svg') }}"
                                                            alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><span class="fw-medium pillar-text">Equitable Distribution Of
                                                            Resource</span></td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-red">3.8%</span><img class="trend-icon"
                                                            src="{{ URL::asset('build/icons/trend-red.svg') }}"
                                                            alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><span class="fw-medium pillar-text">Good Relations With
                                                            Neighbours</span>
                                                    </td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-blue">3.8%<img class="trend-icon"
                                                                src="{{ URL::asset('build/icons/trend-blue.svg') }}"
                                                                alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><span class="fw-medium pillar-text">Free Flow Of
                                                            Information</span></td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-blue">3.8%</span><img class="trend-icon"
                                                            src="{{ URL::asset('build/icons/trend-blue.svg') }}"
                                                            alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><span class="fw-medium pillar-text">High Levels Of Human
                                                            Capital</span>
                                                    </td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-red">3.8%</span><img class="trend-icon"
                                                            src="{{ URL::asset('build/icons/trend-red.svg') }}"
                                                            alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><span class="fw-medium pillar-text">Sound Business
                                                            Environment</span>
                                                    </td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-blue">3.8%</span><img class="trend-icon"
                                                            src="{{ URL::asset('build/icons/trend-blue.svg') }}"
                                                            alt="ArrowExternalRight"></td>

                                                </tr>
                                                <tr>

                                                    <td><span class="fw-medium pillar-text">Acceptance Of The Rights
                                                            Of
                                                            Others</span></td>
                                                    <td>3.8</td>
                                                    <td>3.8</td>
                                                    <td><span class="trend-blue">3.8%</span><img class="trend-icon"
                                                            src="{{ URL::asset('build/icons/trend-blue.svg') }}"
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
                url: "{{ route('organization.get') }}",
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
                        var option = new Option(organizationItem.name, organizationItem.id);
                        $('#organization').append(option);

                        if (organization && organization == organizationItem.id) {
                            $(option).prop('selected', true);
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
                url: "{{ route('branch.get') }}",
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
                        var option = new Option(branchItem.name, branchItem.id);
                        $('#branch').append(option);

                        if (branch && branch == branchItem.id) {
                            $(option).prop('selected', true);
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
                url: "{{ route('survey.get') }}",
                method: 'GET',
                data: {
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
                    data: [{
                        {
                            $meanScore['well_functioning_government']
                        }
                    }]
                }, {
                    name: 'Low Levels of corruption',
                    data: [{
                        {
                            $meanScore['low_level_corruption']
                        }
                    }]
                },
                {
                    name: 'Equitable distribution of resources',
                    data: [{
                        {
                            $meanScore['equitable_distribution']
                        }
                    }]
                }, {
                    name: 'Good relations with neighbours',
                    data: [{
                        {
                            $meanScore['good_relations']
                        }
                    }]
                }, {
                    name: 'Free Flow Of Information',
                    data: [{
                        {
                            $meanScore['free_flow']
                        }
                    }]
                }, {
                    name: 'High Levels Of Human Capital',
                    data: [{
                        {
                            $meanScore['high_levels']
                        }
                    }]
                }, {
                    name: 'Sound Business Environment',
                    data: [{
                        {
                            $meanScore['sound_business']
                        }
                    }]
                }, {
                    name: 'Acceptance Of The Rights Of Others',
                    data: [{
                        {
                            $meanScore['acceptance_rights']
                        }
                    }]
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
            colors: areachartSalesColors
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
                data: [{
                        {
                            $meanScore['well_functioning_government']
                        }
                    },
                    {
                        {
                            $meanScore['low_level_corruption']
                        }
                    },
                    {
                        {
                            $meanScore['equitable_distribution']
                        }
                    },
                    {
                        {
                            $meanScore['good_relations']
                        }
                    },
                    {
                        {
                            $meanScore['free_flow']
                        }
                    },
                    {
                        {
                            $meanScore['high_levels']
                        }
                    },
                    {
                        {
                            $meanScore['sound_business']
                        }
                    },
                    {
                        {
                            $meanScore['acceptance_rights']
                        }
                    }
                ],
            }],
            chart: {
                height: 500,
                type: 'radar',
                toolbar: {
                    show: false
                }
            },
            colors: chartRadarBasicColors,
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
                shared: false, // Set to false to ensure visibility
                followCursor: true, // Follows the mouse for better positioning
                theme: 'dark', // Ensures the tooltip is visible
                y: {
                    formatter: function(val) {
                        return val.toFixed(2) + " points";
                    }
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
            series: [{
                    {
                        $participantDetails['genderWise']['male']
                    }
                },
                {
                    {
                        $participantDetails['genderWise']['female']
                    }
                }
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
            colors: chartPieBasicColors
        };

        var chart = new ApexCharts(document.querySelector("#simple_pie_chart"), options);
        chart.render();
    }

    //Piechart Age
    var chartPieBasicColors2 = getChartColorsArray("simple_pie_chart2");
    if (chartPieBasicColors2) {
        var options = {
            series: [{
                    {
                        $participantDetails['ageWise']['Less than 18']
                    }
                },
                {
                    {
                        $participantDetails['ageWise']['18 to 25']
                    }
                },
                {
                    {
                        $participantDetails['ageWise']['26 to 40']
                    }
                },
                {
                    {
                        $participantDetails['ageWise']['41 to 60']
                    }
                }
            ],
            chart: {
                height: 192,
                type: 'pie',
            },
            labels: ['>18 years', '18-24 years', '25-40 years', '40 years Over'],
            legend: {
                position: 'right'
            },
            dataLabels: {
                dropShadow: {
                    enabled: false,
                }
            },
            colors: chartPieBasicColors2
        };

        var chart2 = new ApexCharts(document.querySelector("#simple_pie_chart2"), options);
        chart2.render();
    }

    //Chart Js Code End

});
</script>
@endsection
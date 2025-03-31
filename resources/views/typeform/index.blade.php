@extends('typeform.layout.web')
@section('title')
    @lang('translation.crm')
@endsection



@section('content')


    <div class="row">
        <div class="col">
            <div class="h-100">

                <!--greeting section -->

                <div>
                    <div>
                        <h4>Welcome back, {{ auth()->user()->name }}</h4>
                    </div>
                </div>
                <!--end greeting section-->

  <!-- about csb section--------========================================= -->
  <!-- <div class="about-csb" style="background-image: url({{ asset('build/images/csb-banner.jpg') }})">
  <h5>Community Strength Barometer (CSB)</h5>
   <p>
    The Community Strength Barometer (CSB) measures social cohesion, resilience, and well-being within communities, assessing engagement, support networks, and collective problem-solving.
   </p>
</div> -->


                <!-- about csb section--------========================================= -->
               
                <!--card row section ==========================================================-->

                @php
                    if(auth()->user()->role->name == 'superadmin' || auth()->user()->role->name == 'krizmatic'){
                        $columns = 3;
                    }else{
                        $columns = 4;
                    }
                @endphp

               

                <!--greeting section ends here -->

            
<!--initial filter section-->
<div class="row mb-3">
               <div class="col-12 col-sm-10 col-md-9">
               <div class="filter-section show-filter d-flex flex-column align-content-stretch justify-content-start h-100">
                    <div class="mb-2">
                        <h5 class="my-1" style="font-size:16px;color: #333;">Showing insights for <b>{{ $formDetails->form_title }}</b>. <br><span>Use the filters below to switch between different surveys or refine your results by Country or Organisation.</span></h5>
                    </div>
                    

                    <div class="mt-3 mt-lg-0 d-flex justify-content-between flex-wrap gap-3" >
                        <form action="{{ route('home.index') }}" method="GET">
                        <div class="row gap-3 m-0 p-0 dashboard flex-nowra align-items-center">
                                <div class="col-auto p-0">
                                    @if(auth()->user()->role->name == 'survey')
                                        <input type="text" class="form-control" name="country" id="country" value="{{auth()->user()->survey->country}}" readonly>
                                    @else
                                    <select class="form-select select2" name="country" id="country"
                                        aria-label="Default select example">

                                        <option value="" selected>Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->country }}"
                                                {{ (($filterData && $filterData->country == $country->country) || request('country') == $country->country) || ($selectedCountrywithSurvey == $country->country) ? 'selected' : '' }}>
                                                {{ $country->country }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                    {{-- <div id="country_hidden">

                                    </div> --}}
                                </div>
                                <div class="col-auto p-0">
                                    @if(auth()->user()->role->name == 'superadmin')
                                    <select class="form-select select2" id="organization" name="organization"
                                        aria-label="Default select example">
                                        <option value="" selected>Organization</option>
                                        @foreach ($organizations as $organization)
                                            <option value="{{ $organization->id }}"
                                                {{ (($filterData && $filterData->organization_id == $organization->id) || request('organization') == $organization->id) || ($selectedOrganizationwithSurvey == $organization->id) ? 'selected' : '' }}>
                                                {{ $organization->name }}</option>
                                        @endforeach
                                    </select>
                                    @else
                                    <input type="text" class="form-control organization-name" value="{{auth()->user()->organization->name}}" readonly>
                                    <input type="hidden" name="organization" class="form-control" value="{{old('organization',auth()->user()->organization_id)}}" id="organization" readonly>
                                    @endif
                                </div>

                                <div class="col-auto p-0">
                                    @if(auth()->user()->role->name == 'survey')
                                    <input type="text" class="form-control" value="{{auth()->user()->branch_id != null ? auth()->user()->branch->name :''}}" readonly>
                                    <input type="hidden" name="branch" class="form-control" value="{{old('branch',auth()->user()->branch_id)}}" id="branch" readonly>
                                    @else
                                    <select class="form-select select2" id="branch" name="branch"
                                        aria-label="Default select example" disabled>
                                        <option value="" selected>Division</option>
                                    </select>
                                    @endif
                                </div>
                                <div class="col-auto p-0">
                                    @if(auth()->user()->role->name == 'survey')
                                        <input type="text" class="form-control" value="{{auth()->user()->survey->form_title}}" readonly>
                                        <input type="hidden" name="survey" class="form-control" value="{{old('survey',auth()->user()->form_id)}}" id="branch" readonly>
                                    @else
                                    <select class="form-select select2" name="survey" id="survey"
                                        aria-label="Default select example">
                                        <option value="" selected>Survey</option>
                                        @foreach ($surveyForms as $surveyForm)
                                            <option value="{{ $surveyForm->form_title }}"
                                                {{ ($filterData && $filterData->form_id == $surveyForm->form_id) || request('survey') == $surveyForm->form_id ? 'selected' : '' }}>
                                                {{ $surveyForm->form_title }}</option>
                                        @endforeach
                                    </select>
                                    @endif
                                </div>
                                @if(auth()->user()->role->name !== 'survey')
                                <div class="col-auto p-0">
                                <button href="#" class="view-insight-btn" id="filter_btn" onclick="this.form.submit();" {{request('survey') ? '' :'disabled'}} >
                                        <span>View Insight</span>
                                        <i class='bx bx-arrow-back bx-rotate-180' ></i>
                                    </button>
                                    
                                </div>

                                @endif
                            </div>
                            
                            </div>

                        </form>
                        
                </div>
               </div>
               <div class="col-12 col-sm-2 col-md-3">
               <div class="card card-animate stat-card people-card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-row gap-3 align-items-center">
                                        <i class="fa-solid fa-user" style="font-size:18px;"></i>
                                        <p class="mb-0" style="font-size:18px;">
                                            Survey Participants</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <div data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas"
                                            aria-controls="theme-settings-offcanvas">
                                            <i class='bx bx-info-circle' style="font-size:24px;"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="gap-2 mt-4">
                                    <h4 class="fs-22 fw-semibold ff-secondary"><span class="counter-value"
                                            data-target="{{ $topBox['people'] }}">{{ $topBox['people'] }}</span>
                                    </h4>



                                </div>
                            </div><!-- end card body -->
                        </div>
               </div>
</div>
                
<!--initial filter section-->

<!--project title --survey-title section -->

<div class="title-container mb-3 d-flex flex-row justify-content-between">
<h4><span class="project-title">{{$formDetails->form_title}}</span></h4>
<!-- Dropdown for exporting as PDF, PNG, or Excel -->
<div class="dropdown">
                                            <a class="icon-frame bg-white" style="border: 1px solid #BABABA;" href="#"
                                                id="exportDropdown" role="button" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <img class="svg-icon" type="image/svg+xml"
                                                    src="{{ URL::asset('build/icons/download.svg') }}"></img>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                                <li><a class="dropdown-item" href="#" id="export-all">Download
                                                        Report</a></li>
                                                <li><a class="dropdown-item" href="{{route('survey.csv',['country'=>session('country'),'survey'=>session('survey_id')])}}" >
                                                        Export Survey Data</a></li>
    
                                            </ul>
                                        </div>

</div>
<!--project title --survey-title section -->
                <!--bar graph section starts here-->

                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mean-score-bar-title mb-0 flex-grow-1">Survey mean score across pillars of Positive Peace</h4>
                        <div class="flex-shrink-0">
                            <div class="d-flex flex-row gap-2 align-items-center">
                                <!--info here-->
                                <div class="dropdown">
                            <a class="icon-frame" href="#" id="exportDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="svg-icon" type="image/svg+xml"
                                    src="{{ URL::asset('build/icons/download.svg') }}"></img>
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
                                    class="m-0 p-0 d-flex justify-content-center align-items-center" data-title="Mean Scores Across the Pillars of Positive Peace" data-content="<p>The average scores for the eight Pillars of Positive Peace each represent a key area of societal resilience. The eight pillars that comprise Positive Peace are:</p><ul class='pillar-list'><li><strong>Well-functioning Government</strong></li><li><strong>Sound Business Environment</strong></li><li><strong>Equitable Distribution of Resources</strong></li><li><strong>Acceptance of the Rights of Others</strong></li><li><strong>Good Relations with Neighbours</strong></li><li><strong>Free Flow of Information</strong></li><li><strong>High Levels of Human Capital</strong></li><li><strong>Low Levels of Corruption</strong></li></ul><p>These pillars encompass governance, social cohesion, economic opportunities, and other factors that contribute to the overall stability and well-being of a community.</p><p>Higher scores in any pillar indicate stronger perceptions of resilience, while lower scores highlight areas that may need further development or attention. By examining the mean scores across these pillars, we gain valuable insights into the strengths and challenges within the community's societal framework.</p>">
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
                                                src="{{ URL::asset('build/icons/download.svg') }}"></img>
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
                                    class="m-0 p-0 d-flex justify-content-center align-items-center" data-title="Community Resilience Across the Pillars of Positive Peace" data-content="<p>The average scores for the eight Pillars of Positive Peace each represent a key area of societal resilience. The eight pillars that comprise Positive Peace are:</p><ul><li>Well-functioning Government</li><li>Sound Business Environment</li><li>Equitable Distribution of Resources</li><li>Acceptance of the Rights of Others</li><li>Good Relations with Neighbours</li><li>Free Flow of Information</li><li>High Levels of Human Capital</li><li>Low Levels of Corruption</li></ul><p>These pillars encompass governance, social cohesion, economic opportunities, and other factors that contribute to the overall stability and well-being of a community.</p><p>Higher scores in any pillar indicate stronger perceptions of resilience, while lower scores highlight areas that may need further development or attention. By examining the mean scores across these pillars, we gain valuable insights into the strengths and challenges within the community's societal framework.</p>">
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
                                <h4 class="card-title pie-gender-title mb-0">Participants by Gender</h4>
                                <div class="flex-shrink-0">
                                    <div class="d-flex flex-row gap-2 align-items-center">
                                        <!--info here-->
                                        <div class="dropdown">
                                    <a class="icon-frame" href="#" id="exportDropdown" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <img class="svg-icon" type="image/svg+xml"
                                            src="{{ URL::asset('build/icons/download.svg') }}"></img>
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
                                                src="{{ URL::asset('build/icons/info.svg') }}"></img>

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
                                            src="{{ URL::asset('build/icons/download.svg') }}"></img>
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
                                                src="{{ URL::asset('build/icons/info.svg') }}"></img>

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
                                                src="{{ URL::asset('build/icons/download.svg') }}"></img>
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
                                    <h4 class="card-title negative-peace-title mb-0 flex-grow-1">Negative Peace</h4>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex flex-row gap-2 align-items-center">
                                            <!--info here-->
                                            <div class="dropdown">
                                        <a class="icon-frame" href="#" id="exportDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <img class="svg-icon" type="image/svg+xml"
                                                src="{{ URL::asset('build/icons/download.svg') }}"></img>
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
                        <div class="card-header z-1 d-flex justify-content-between align-items-center">
                            <h4 class="card-title results-by-pillar-radar mb-0">Results by Pillars</h4>
                            <div class="flex-shrink-0">
                                <div class="d-flex flex-row gap-2 align-items-center">
                                    <!--info here-->
                                    <div class="dropdown">
                                <a class="icon-frame" href="#" id="exportDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="svg-icon" type="image/svg+xml"
                                        src="{{ URL::asset('build/icons/download.svg') }}"></img>
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

                    <!--area radar chart section ends here -->

                    <div class="row mb-4">
                        <div class="col-xl-12">
                            <div class="card mb-0">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title results-by-pillar-table mb-0 flex-grow-1">Results By Pillar</h4>
                                    <div class="flex-shrink-0">
                                        <div class="d-flex flex-row gap-2 align-items-center">
                                            {{-- <a href="{{route('home.csv',['survey'=> request('survey') ])}}" type="button" class="btn btn-success"><i class="ri-file-download-line align-bottom me-1"></i>
                                                Export</a> --}}
                                            <!--info here-->
                                            <div class="dropdown">
                                        <a class="icon-frame" href="#" id="exportDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <img class="svg-icon" type="image/svg+xml"
                                                src="{{ URL::asset('build/icons/download.svg') }}"></img>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                            <li><a class="dropdown-item" href="#" data-type="pdf"
                                                    data-chart-id="pillar-table">Export as PDF</a></li>
                                            <li><a class="dropdown-item" href="#" data-type="png"
                                                    data-chart-id="pillar-table">Export as PNG</a></li>
                                            {{-- <li><a class="dropdown-item" href="#" data-type="excel"
                                                    data-chart-id="pillar-table">Export as Excel</a></li> --}}
                                        </ul>
                                    </div>
                                
                                             <a class="icon-frame" href="#" data-bs-toggle="offcanvas"
                                                data-bs-target="#theme-settings-offcanvas"
                                                aria-controls="theme-settings-offcanvas"
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
                                                    @php
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
                                                    @endphp
                                                    @foreach ($pillarMeanScore['mean'] as $key => $pillar)
                                                        <tr>
                                                            <td><span
                                                                    class="fw-medium pillar-text">{{ $pillars[$key] }}</span>
                                                            </td>
                                                            <td class="text-center">{{ $pillar }}</td>
                                                            <td class="text-center">
                                                                {{ $pillarMeanScore['countryMean'][$key] }}</td>
                                                            <td class="text-center">
                                                                {{ $pillarMeanScore['globalMean'][$key] }}</td>
                                                        </tr>
                                                    @endforeach

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
                    @if($formDetails->during || $formDetails->after)
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
                                                src="{{ URL::asset('build/icons/download.svg') }}"></img>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="exportDropdown">
                                            <li><a class="dropdown-item" href="#" data-type="pdf"
                                                    data-chart-id="pillar-table-time">Export as PDF</a></li>
                                            <li><a class="dropdown-item" href="#" data-type="png"
                                                    data-chart-id="pillar-table-time">Export as PNG</a></li>
                                            {{-- <li><a class="dropdown-item" href="#" data-type="excel"
                                                    data-chart-id="pillar-table-time">Export as Excel</a></li> --}}
                                        </ul>
                                    </div>
                                        <a class="icon-frame" href="#"  data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas"
                                        aria-controls="theme-settings-offcanvas" class="m-0 p-0 d-flex justify-content-center align-items-center">

                                            <img class="svg-icon" type="image/svg+xml" src="{{ URL::asset('build/icons/info.svg') }}"></img>
                                        </a> 
                                        
                                    </div>
                                </div>
                            </div><!-- end card header -->
                            @php
                                
                            @endphp
                            <div class="card-body">
                                <div class="live-preview">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap mb-0" id="pillar-table-time">
                                            <thead class="table-head">
                                                <tr class="text-center">

                                                    <th scope="col"></th>
                                                    <th scope="col">Before</th>
                                                    <th scope="col">During</th>
                                                    @if($formDetails->after)
                                                    <th scope="col">After</th>
                                                    @endif
                                                    <th scope="col">% Change</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
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
                                                @endphp
                                                @foreach($overTimeScores['before'] as $key=> $overTimeScore)
                                                <tr>

                                                    <td><span class="fw-medium pillar-text">{{$pillars[$key]}}</span>
                                                    </td>
                                                    <td class="text-center">{{$overTimeScore}}</td>
                                                    <td class="text-center">{{$overTimeScores['during'][$key]}}</td>
                                                    @if($formDetails->after)
                                                    <td class="text-center">{{$overTimeScores['after'][$key]}}</td>
                                                    @endif
                                                    <td class="trend-blue text-center">
                                                        @php
                                                            $choosenDate = $formDetails->after ? $overTimeScores['after'][$key] : $overTimeScores['during'][$key];
                                                            $overTimeScoreDivide = $overTimeScore > 0 ? $overTimeScore:1;
                                                            $percentChange = round(($choosenDate-$overTimeScore)/$overTimeScoreDivide,1);
                                                        @endphp 
                                                        <span >{{$percentChange}}%
                                                            @if($percentChange > 0)
                                                            <img class="trend-icon"
                                                                src="{{ URL::asset('build/icons/trend-blue.svg') }}" alt="ArrowExternalRight">
                                                            @else
                                                            <img class="trend-icon"
                                                                src="{{ URL::asset('build/icons/trend-red.svg') }}" alt="ArrowExternalRight">
                                                            @endif
                                                    </td>

                                                </tr>
                                                @endforeach
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
                    @endif
                </div>
                <!--end row-->


                <!--table section starts here -->
            </div> <!-- end .h-100-->

        </div> <!-- end col -->

        <div class="card-body" id="survey-data" style="display:none;">
                                    <div class="live-preview">
                                        <div class="table-responsive" >
                                            <table class="table align-middle table-nowrap mb-0"  id="survey-table" >
                                                <thead class="table-head">
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
            var branch_id = {!! json_encode($filterData->branch_id ?? null) !!};
            var survey_id = {!! json_encode($filterData->form_id ?? null) !!};

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
                // $('#survey').html('');
                // $('#survey').append('<option value="" selected>Select Survey</option>');
                
                filterSurvey();
                // filterBtn();
            });
            $(document).on('change', '#organization', function() {
                $('#branch').prop('disabled', true);
                $('#branch').html('');
                $('#branch').html('<option value="" selected>Choose Branch</option>');
                
                // $('#survey').html('');
                // $('#survey').append('<option value="" selected>Select Survey</option>');
                
                // filterBranch(function() {
                //     filterSurvey();
                // });
                filterBranch();

                filterSurvey();
                // filterBtn();

            });
            $(document).on('change', '#branch', function() {
                // $('#survey').html('');
                // $('#survey').append('<option value="" selected>Select Survey</option>');
                filterSurvey();
                // filterBtn();
            });

            $(document).on('change', '#survey', function() {
                let surveyValue = $('#survey').val();
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
                        'data-bs-placement': 'top'

                    }).popover();

                }
            });

            
            

            function filterBranch(callback) {
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
                            $('#branch').append('<option value="" selected>Select Division</option>');

                            var userRole = @json(auth()->user()->role->name);
                            var userBranchId = @json(auth()->user()->branch_id);
                        
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
                console.log(countryVal,organizationVal);

                // if (organizationVal !== '' || countryVal !='') {
                    $.ajax({
                        url: "{{ route('survey.get') }}",
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
                // }else{
                //     $('#survey').prop('disabled', true);
                //     $('#survey').html('');
                //     $('#survey').append('<option value="" selected>Select Survey</option>');
                // }
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
                            data: ["{{ $meanScore['well_functioning_government'] }}"]
                        }, {
                            name: 'Low Levels of corruption',
                            data: ["{{ $meanScore['low_level_corruption'] }}"]
                        },
                        {
                            name: 'Equitable distribution of resources',
                            data: ["{{ $meanScore['equitable_distribution'] }}"]
                        }, {
                            name: 'Good relations with neighbours',
                            data: ["{{ $meanScore['good_relations'] }}"]
                        }, {
                            name: 'Free Flow Of Information',
                            data: ["{{ $meanScore['free_flow'] }}"]
                        }, {
                            name: 'High Levels Of Human Capital',
                            data: ["{{ $meanScore['high_levels'] }}"]
                        }, {
                            name: 'Sound Business Environment',
                            data: ["{{ $meanScore['sound_business'] }}"]
                        }, {
                            name: 'Acceptance Of The Rights Of Others',
                            data: ["{{ $meanScore['acceptance_rights'] }}"]
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
                        data: ["{{ $meanScore['well_functioning_government'] }}",
                            "{{ $meanScore['low_level_corruption'] }}",
                            " {{ $meanScore['equitable_distribution'] }}",
                            "{{ $meanScore['good_relations'] }}",
                            "{{ $meanScore['free_flow'] }}",
                            "{{ $meanScore['high_levels'] }}",
                            "{{ $meanScore['sound_business'] }}",
                            "{{ $meanScore['acceptance_rights'] }}"
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
                    @php
                        $malePieChart = $participantDetails['genderWise']['male'];
                        $femalePieChart = $participantDetails['genderWise']['female'];
                        $otherPieChart = $participantDetails['genderWise']['other'];
                    @endphp
                    series: [{{ $malePieChart }},
                        {{ $femalePieChart }},
                        {{ $otherPieChart }}
                    ],
                    chart: {
                        height: 200,
                        type: 'pie',
                    },
                    labels: ['Male', 'Female','Other'],
                    legend: {
                        position: 'right'
                    },
                    dataLabels: {
                        dropShadow: {
                            enabled: false,
                        }
                    },
                    colors: ['#004994', '#0c8cdb','#87bce3']
                };

                var chart = new ApexCharts(document.querySelector("#simple_pie_chart"), options);
                chart.render();
            }




            //Piechart Age
            var chartPieBasicColors2 = getChartColorsArray("simple_pie_chart2");
            if (chartPieBasicColors2) {
                var options = {
                    @php
                        $level_one = $participantDetails['ageWise']['18 to 24'];
                        $level_two = $participantDetails['ageWise']['25 to 44'];
                        $level_three = $participantDetails['ageWise']['45 to 64'];
                        $level_four = $participantDetails['ageWise']['65 or over'];

                    @endphp
                    series: [{{ $level_one }}, {{ $level_two }}, {{ $level_three }},
                        {{ $level_four }}
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
                        data: [{{ $positivePeace['mean'] }}]
                    }, {
                        name: 'Country Mean',
                        data: [{{ $positivePeace['countryMean'] }}]
                    }, {
                        name: 'Global Mean',
                        data: [{{ $positivePeace['globalMean'] }}]
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
                        data: ["{{ $negativePeace['mean'] }}"]
                    }, {
                        name: 'Country Mean',
                        data: ["{{ $negativePeace['countryMean'] }}"]
                    }, {
                        name: 'Global Mean',
                        data: ["{{ $negativePeace['globalMean'] }}"]
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
                                @foreach ($pillarMeanScore['mean'] as $key => $means)
                                    "{{ $means }}",
                                @endforeach
                            ],
                        },
                        {
                            name: 'Country Mean',
                            data: [
                                @foreach ($pillarMeanScore['countryMean'] as $key => $means)
                                    "{{ $means }}",
                                @endforeach
                            ],
                        },
                        {
                            name: 'Global Mean',
                            data: [
                                @foreach ($pillarMeanScore['globalMean'] as $key => $means)
                                    "{{ $means }}",
                                @endforeach
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
    const surveydata = document.getElementById("survey-data");
    const loader = document.querySelector('.download-spinner-container');
    const mainpage = document.querySelector('body'); // Added dot for class selector

    mainpage.style.display = 'block'; // Directly use loader, not loader.element


    exportButton.addEventListener("click", function () {
        exportButton.disabled = true;
            // Show loader if it exists
                
            loader.style.display = 'block'; // Directly use loader, not loader.element
                
                
                mainpage.style.overflow = 'hidden'; // Directly use mainpage, not mainpage.element
        if (surveydata) surveydata.style.display = "block";

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
                    { id: "sales-forecast-chart", title: "Survey mean score across pillars of Positive Peace" },
                    { id: "basic_radar", title: "Mean Result" },
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
                    surveydata.style.display = "none";
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
    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF({ orientation: "portrait" });
    
    // Constants for styling - REDUCED MARGINS
    const margin = 5; // Reduced from 15 to 10 (smaller border padding)
    const logoWidth = 45;
    let logoHeight; 
        const titleFontSize = 16;
    const chartTitleFontSize = 14;
    const footerFontSize = 10;
    const lineSpacing = 5;
    const contentPadding = 5; // Padding inside the border
    
    const logo = document.querySelector(".logo img");
    let logoData = null;
    
    if (logo) {
        logoData = logo.src;
        // Calculate height maintaining aspect ratio
        const logoAspectRatio = logo.naturalHeight / logo.naturalWidth;
        logoHeight = logoWidth * logoAspectRatio;
    }
    
    // Add header to first page
    const addFirstPageHeader = (pdf) => {
        const pageWidth = pdf.internal.pageSize.getWidth();
        
        // Add logo
        if (logoData) {
            pdf.addImage(logoData, "PNG", margin + contentPadding, margin + contentPadding, logoWidth, logoHeight);
        }
        
        // Add main title
        pdf.setFontSize(titleFontSize);
        pdf.setTextColor(30, 30, 30);
        pdf.text("Community Strength Barometer Report", 
                margin + contentPadding + logoWidth + 5, 
                margin + contentPadding + 18);
        
        // Add page border (closer to edge now)
        pdf.setDrawColor(30, 30, 30);
        pdf.setLineWidth(0.2);
        pdf.rect(margin, margin, 
                pageWidth - 2 * margin, 
                pdf.internal.pageSize.getHeight() - 2 * margin);
        
        // Add "Page 1" to first page
        pdf.setFontSize(footerFontSize);
        pdf.text("Page 1", pageWidth - margin - contentPadding - 15, margin + contentPadding + 5);
    };
    
    // Add header to subsequent pages
    const addSubsequentPageHeader = (pdf, pageNumber) => {
        const pageWidth = pdf.internal.pageSize.getWidth();
        
        // Add page border (same reduced padding)
        pdf.setDrawColor(30, 30, 30);
        pdf.setLineWidth(0.2);
        pdf.rect(margin, margin, 
                pageWidth - 2 * margin, 
                pdf.internal.pageSize.getHeight() - 2 * margin);
        
        // Add page number
        pdf.setFontSize(footerFontSize);
        pdf.text(`Page ${pageNumber}`, pageWidth - margin - contentPadding - 15, margin + contentPadding + 5);
    };
    
    // Initialize variables for positioning
    let yOffset = margin + contentPadding + logoHeight + 25; // Start below header on first page
    let currentPage = 1;
    addFirstPageHeader(pdf);
    
    // Function to process charts sequentially
    const processCharts = (index) => {
        if (index >= charts.length) {
            addFooter(pdf);
            pdf.save("CSB_Report.pdf");
            if (callback) callback();
            return;
        }

        const { id, title } = charts[index];
        const chartElement = document.getElementById(id);

        if (!chartElement) {
            console.error(`Element with ID ${id} not found.`);
            processCharts(index + 1);
            return;
        }

        html2canvas(chartElement, {
            scale: 2,
            useCORS: true,
            backgroundColor: null
        }).then(canvas => {
            const imgData = canvas.toDataURL("image/png");
            const aspectRatio = canvas.width / canvas.height;
            // Calculate available width considering reduced margins
            const availableWidth = pdf.internal.pageSize.getWidth() - 2 * (margin + contentPadding) - 10;
            const imgWidth = availableWidth;
            const imgHeight = imgWidth / aspectRatio;
            
            // Check if we need a new page (using reduced margin in calculation)
            if (yOffset + imgHeight + 40 > pdf.internal.pageSize.getHeight() - (margin + contentPadding)) {
                addFooter(pdf);
                pdf.addPage();
                currentPage++;
                yOffset = margin + contentPadding + 15; // Adjusted for reduced margin
                addSubsequentPageHeader(pdf, currentPage);
            }
            
            // Add chart title
            pdf.setFontSize(chartTitleFontSize);
            pdf.setTextColor(30, 30, 30);
            const titleX = pdf.internal.pageSize.getWidth() / 2;
            pdf.text(title, titleX, yOffset, { align: 'center' });
            yOffset += lineSpacing * 2;
            
            // Add chart with border (using contentPadding)
            pdf.setDrawColor(211, 211, 211);
            pdf.setLineWidth(0.5);
            pdf.rect(margin + contentPadding + 5, yOffset, imgWidth, imgHeight);
            pdf.addImage(imgData, "PNG", margin + contentPadding + 5, yOffset, imgWidth, imgHeight);
            
            yOffset += imgHeight + 15; // Reduced spacing after chart
            
            processCharts(index + 1);
        }).catch(error => {
            console.error(`Error rendering chart "${title}":`, error);
            processCharts(index + 1);
        });
    };
    
    // Add footer function (adjusted for reduced margin)
    const addFooter = (pdf) => {
        const pageWidth = pdf.internal.pageSize.getWidth();
        const footerY = pdf.internal.pageSize.getHeight() - margin - contentPadding - 7;
        
        pdf.setFontSize(footerFontSize);
        pdf.setTextColor(100, 100, 100);
        const orgText = "{{ $formDetails->organization->name }}";
        const emailText = "Source:  {{ $formDetails->form_title }}";Source: 
        pdf.text(orgText, margin + contentPadding + 5, footerY);
        pdf.text(emailText, margin + contentPadding + 5, footerY + lineSpacing);

        // Right-aligned source
        pdf.text("csb.economicsandpeace.org", pageWidth - margin - contentPadding - 5, footerY + 4, { align: 'right' });
    };
    
    // Start processing charts
    processCharts(0);
}


/**download data js */
document.addEventListener("DOMContentLoaded", function () {
    // Add a single event listener for all export actions
    document.querySelectorAll(".dropdown-item[data-type]").forEach(item => {
        item.addEventListener("click", function (event) {
            event.preventDefault(); // Prevent default link behavior

            const exportType = this.getAttribute("data-type"); // Get the export type (pdf, png, excel)
            const chartId = this.getAttribute("data-chart-id"); // Get the chart ID
            

            // Nested if-else for chartId and exportType
            if (chartId === "sales-forecast-chart") {
                const chartTitle = document.querySelector('.mean-score-bar-title')?.innerText || "Overview";

                if (exportType === "pdf") {
                    exportToPDF(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNG(chartId,chartTitle);
                } 
                else {
                    console.error("Unsupported export type for chart1:", exportType);
                }
            } else if (chartId === "basic_radar") {
                const chartTitle = document.querySelector('.mean-result-title')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDFMeanRadar(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNGMeanRadar(chartId,chartTitle);
                }  else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            } 
            else if (chartId === "simple_pie_chart") {
                const chartTitle = document.querySelector('.pie-gender-title')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDFPnBar(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNGPie(chartId,chartTitle);
                }  else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            }
            else if (chartId === "simple_pie_chart2") {
                const chartTitle = document.querySelector('.pie-age-title')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDFPnBar(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNGPie(chartId,chartTitle);
                }  else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            }
            else if (chartId === "sales-forecast-chart-2") {
                const chartTitle = document.querySelector('.positive-peace-title')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDFPnBar(chartId,chartTitle);
                }  else if (exportType === "png") {
                    exportToPNGPP(chartId,chartTitle);
                } else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            }
            
            else if (chartId === "sales-forecast-chart-3") {
                const chartTitle = document.querySelector('.negative-peace-title')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDFPnBar(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNGPP(chartId,chartTitle);
                } else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            } 
            else if (chartId === "multi_radar") {
                const chartTitle = document.querySelector('.results-by-pillar-radar')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDFMultiRadar(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNGMultiRadar(chartId,chartTitle);
                }  else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            }
            else if (chartId === "pillar-table-time") {
                const chartTitle = document.querySelector('.pillar-table-time-title')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDF(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNG(chartId,chartTitle);
                } else if (exportType === "excel") {
                    exportToExcel(chartId,chartTitle);
                } else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            }  else if (chartId === "pillar-table") {
                const chartTitle = document.querySelector('.results-by-pillar-table')?.innerText || "Overview";

                if (exportType === "pdf") {

                    exportToPDF(chartId,chartTitle);
                } else if (exportType === "png") {
                    exportToPNG(chartId,chartTitle);
                } else if (exportType === "excel") {
                    exportToExcel(chartId,chartTitle);
                } else {
                    console.error("Unsupported export type for chart2:", exportType);
                }
            } else {
                console.error("Unsupported chart ID:", chartId);
            }
        });
    });
});
function exportToPDF(chartId, chartTitle) {
    // Capture the logo (assuming the logo is an img element with a specific class or ID)
    const logo = document.querySelector(".logo img"); // Adjust the selector to match your logo element
    const logoData = logo ? logo.src : null;

    // Capture the chart as an image
    html2canvas(document.getElementById(chartId), {
        scale: 2, // Increase scale for higher resolution
    useCORS: true, // Enable CORS if images are from external sources
    backgroundColor: null
    }).then(canvas => {
        const chartImgData = canvas.toDataURL("image/png");

        // Initialize PDF
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF({ orientation: "landscape" });

        // Define margins and dimensions
        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();
        const margin = 5; // Margin from the edges
        const logoWidth = 100; // Width of the logo
        const logoHeight = 20; // Height of the logo
        const titleFontSize = 24;
        const titleLineHeight = 20; // Line height for the title

        // Add a black border around the content
        pdf.setDrawColor(30,30,30); // Set border color to black
        pdf.setLineWidth(0.2); // Set border thickness
        pdf.rect(margin, margin, pageWidth - 2 * margin, pageHeight - 2 * margin); // Draw border

        // Add logo to the PDF (if available)
        if (logoData) {
            pdf.addImage(logoData, "PNG", margin + 10, margin + 10, logoWidth, logoHeight); // Position logo inside the border
        }

        // Add chart title to the PDF (after the logo, centered a bit higher)
        pdf.setFontSize(titleFontSize);
        pdf.setTextColor(30,30,30); // Ensure text color is black
        // Calculate title position (below logo + spacing)
        const titleX = pdf.internal.pageSize.getWidth() / 2; // Center horizontally
        const titleY = margin + logoHeight + 35; // Below logo + extra spacing

        // Set alignment to center and add title
        pdf.text(chartTitle, titleX, titleY, { align: 'center' });


        // Calculate the position for the chart image to center it
        const chartImgWidth = pageWidth - 2 * margin - 20; // Chart width (full width minus margins and padding)
        const chartImgHeight = (chartImgWidth * canvas.height) / canvas.width; // Maintain aspect ratio
        const chartImgX = margin + 10; // Centered horizontally inside the border
        const chartImgY = titleY + titleLineHeight + 0; // Position below the title with some spacing

        // Add chart image to the PDF
        pdf.addImage(chartImgData, "PNG", chartImgX, chartImgY, chartImgWidth, chartImgHeight);

         // ===== FOOTER =====
         const footerY = pageHeight - margin - 15; // Start 15mm from bottom
         const lineHeight = 5; // Space between lines
         const rightPadding = margin + 10; // Right margin
         const footerFontSize = 12;

         // Left-aligned organization (line 1)
        pdf.setFontSize(footerFontSize);
        pdf.setTextColor(100, 100, 100); // Black
        const orgText = "{{ $formDetails->organization->name }}";
        pdf.text(orgText, margin + 10, footerY, { align: 'left' });

        // Left-aligned source (line 2, grey text)
        pdf.setTextColor(100, 100, 100); // Grey
        pdf.text("Source:  {{ $formDetails->form_title }}", margin + 10, footerY + lineHeight, { align: 'left' });

        // Right-aligned email (line 2)
        const emailText = "csb.economicsandpeace.org";
        pdf.text(emailText, pageWidth - rightPadding, footerY + lineHeight, { align: 'right' });



        // Save the PDF
        pdf.save(`${chartTitle}.pdf`);
    });
}

function exportToPNG(chartId, chartTitle) {
    // Capture elements
    const logo = document.querySelector(".logo img");
    const logoData = logo ? logo.src : null;

    // Create canvas with dimensions matching A4 landscape at high DPI
    const pxPerMM = 5; // Higher resolution
    const canvasWidth = 297 * pxPerMM; // A4 width in mm (1485px)
    const canvasHeight = 210 * pxPerMM; // A4 height in mm (1050px)
    
    // Capture chart with higher quality
    html2canvas(document.getElementById(chartId), {
        scale: 3, // Increased scale for better quality
        useCORS: true,
        backgroundColor: null,
        logging: false
    }).then(chartCanvas => {
        // Create final composition canvas
        const finalCanvas = document.createElement("canvas");
        finalCanvas.width = canvasWidth;
        finalCanvas.height = canvasHeight;
        const ctx = finalCanvas.getContext("2d");

        // White background
        ctx.fillStyle = "#FFFFFF";
        ctx.fillRect(0, 0, canvasWidth, canvasHeight);

        // Design parameters (match PDF exactly)
        const margin = 5 * pxPerMM; // 5mm margin
        const contentWidth = canvasWidth - 2 * margin;
        const contentHeight = canvasHeight - 2 * margin;
        
        // Add border (match PDF style)
        ctx.strokeStyle = "#1E1E1E"; // RGB 30,30,30
        ctx.lineWidth = 1; // 1px border
        ctx.strokeRect(margin, margin, contentWidth, contentHeight);


   

        // Add logo (top left)
        if (logoData) {
            const logoImg = new Image();
            logoImg.src = logoData;
            logoImg.onload = () => {
                const logoWidth = 100 * pxPerMM; // 100mm
                const logoHeight = 20 * pxPerMM; // 20mm
                ctx.drawImage(
                    logoImg, 
                    margin + 10, 
                    margin + 10, 
                    logoWidth, 
                    logoHeight
                );

                // Add title (match PDF styling)
                const titleFontSize = 42; // 24pt
                ctx.font = `${titleFontSize}px 'Arial'`;
                ctx.fillStyle = "#333"; // Dark gray
                ctx.textAlign = "center";
                const titleY = margin + logoHeight + 35 * pxPerMM; // 35mm below logo
                ctx.fillText(chartTitle, canvasWidth / 2, titleY);

                // Calculate chart dimensions (80% width with more spacing)
                const chartWidth = contentWidth * 0.9; // Larger than PDF's 75%
                const chartHeight = (chartWidth * chartCanvas.height) / chartCanvas.width;
                const chartX = (canvasWidth - chartWidth) / 2;
                const chartY = titleY + 20 * pxPerMM; // Extra spacing below title

                // Add chart with shadow effect (like PDF)
                ctx.shadowColor = "rgba(0,0,0,0.1)";
                ctx.shadowBlur = 10;
                ctx.shadowOffsetY = 5;
                ctx.drawImage(chartCanvas, chartX, chartY, chartWidth, chartHeight);
                ctx.shadowColor = "transparent"; // Reset shadow

                // Add footer (match PDF exactly)
                const footerY = canvasHeight - margin - 15 * pxPerMM;
                const footerFontSize = 24; // 12pt

                // Organization info (left, first line)
                ctx.font = `${footerFontSize}px 'Arial'`;
                ctx.fillStyle = "#646464"; // Gray
                ctx.textAlign = "left";
                ctx.fillText("{{ $formDetails->organization->name }}", margin + 10, footerY);

                // Source text (left, second line)
                ctx.fillText("Source:  {{ $formDetails->form_title }}", margin + 10, footerY + 5 * pxPerMM);

                // Email (right)
                ctx.textAlign = "right";
                ctx.fillText("csb.economicsandpeace.org", canvasWidth - margin - 10, footerY + 5 * pxPerMM);


                // Final export
                const link = document.createElement("a");
                link.download = `${chartTitle.replace(/[/\\?%*:|"<>]/g, '-')}.png`;
                link.href = finalCanvas.toDataURL("image/png", 1.0);
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            };
        } else {
            // Fallback version without logo
            const titleFontSize = 24;
            ctx.font = `bold ${titleFontSize}px 'Arial'`;
            ctx.fillStyle = "#1E1E1E";
            ctx.textAlign = "center";
            const titleY = margin + 50 * pxPerMM;
            ctx.fillText(chartTitle, canvasWidth / 2, titleY);

            // Add larger chart (80% width)
            const chartWidth = contentWidth * 0.8;
            const chartHeight = (chartWidth * chartCanvas.height) / chartCanvas.width;
            const chartX = (canvasWidth - chartWidth) / 2;
            const chartY = titleY + 20 * pxPerMM;
            
            // Add chart with subtle shadow
            ctx.shadowColor = "rgba(0,0,0,0.1)";
            ctx.shadowBlur = 10;
            ctx.shadowOffsetY = 5;
            ctx.drawImage(chartCanvas, chartX, chartY, chartWidth, chartHeight);
            ctx.shadowColor = "transparent";

            // Add footer
            const footerY = canvasHeight - margin - 15 * pxPerMM;
            ctx.font = "16px 'Arial'";
            ctx.fillStyle = "#646464";
            ctx.textAlign = "right";
            ctx.fillText(
                "{{ $formDetails->organization->name }}",
                canvasWidth - margin - 10,
                footerY
            );
            ctx.fillText(
                "csb.economicsandpeace.org",
                canvasWidth - margin - 10,
                footerY + 5 * pxPerMM
            );

            // Export
            const link = document.createElement("a");
            link.download = `${chartTitle.replace(/[/\\?%*:|"<>]/g, '-')}.png`;
            link.href = finalCanvas.toDataURL("image/png", 1.0);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }).catch(error => {
        console.error("PNG export error:", error);
        alert("Error generating image. Please try again.");
    });
}
function exportToExcel(chartId, chartTitle) {
    // Get the table element
    const table = document.getElementById(chartId);

    if (!table) {
        alert("Table not found!");
        return;
    }

    // Convert the table to a worksheet using SheetJS
    const wb = XLSX.utils.table_to_book(table, { sheet: "Chart Data" });

    // Sanitize title for a valid filename (remove special characters and spaces)
    const safeTitle = chartTitle.replace(/[^a-zA-Z0-9]/g, "_").trim();

    // Ensure there's a valid filename
    const fileName = safeTitle ? `${safeTitle}.xlsx` : "Chart_Data.xlsx";

    // Export the workbook to an Excel file with the title as filename
    XLSX.writeFile(wb, fileName);
}

//for mean radar
function exportToPDFMeanRadar(chartId, chartTitle) {
    // Capture the logo (assuming the logo is an img element with a specific class or ID)
    const logo = document.querySelector(".logo img"); // Adjust the selector to match your logo element
    const logoData = logo ? logo.src : null;

    // Capture the chart as an image
    html2canvas(document.getElementById(chartId), {
        scale: 2, // Increase scale for higher resolution
        backgroundColor: null // Ensures a transparent background
    }).then(canvas => {
        const chartImgData = canvas.toDataURL("image/png");

        // Initialize PDF
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF({ orientation: "landscape" });

        // Define margins and dimensions
        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();
        const margin = 5; // Margin from the edges
        const logoWidth = 100; // Width of the logo
        const logoHeight = 20; // Height of the logo
        const titleFontSize = 24;
        const titleLineHeight = 20; // Line height for the title

        // Add a black border around the content
        pdf.setDrawColor(30, 30, 30); // Set border color to black
        pdf.setLineWidth(0.2); // Set border thickness
        pdf.rect(margin, margin, pageWidth - 2 * margin, pageHeight - 2 * margin); // Draw border

        // Add logo to the PDF (if available)
        if (logoData) {
            pdf.addImage(logoData, "PNG", margin + 10, margin + 10, logoWidth, logoHeight);
        }

        // Add chart title to the PDF (centered below logo)
        pdf.setFontSize(titleFontSize);
        pdf.setTextColor(30, 30, 30); // Set text color to black
        const titleX = pdf.internal.pageSize.getWidth() / 2; // Center horizontally
        const titleY = margin + logoHeight + 35; // Below logo + extra spacing
        pdf.text(chartTitle, titleX, titleY, { align: 'center' });

        // Calculate the position for the chart image to center it
        const chartImgWidth = (pageWidth - 2 * margin) * 0.75; // 75% of available width
        const chartImgHeight = (chartImgWidth * canvas.height) / canvas.width; // Maintain aspect ratio
        const chartImgX = (pageWidth - chartImgWidth) / 2;
        const chartImgY = 25; // Position below the title with spacing

        // Add chart image to the PDF
        pdf.addImage(chartImgData, "PNG", chartImgX, chartImgY, chartImgWidth, chartImgHeight);

        // ===== FOOTER =====
        const footerY = pageHeight - margin - 15; // Start 15mm from bottom
        const lineHeight = 5; // Space between lines
        const rightPadding = margin + 10; // Right margin
        const footerFontSize = 12;
        
        // Left-aligned organization (line 1)
        pdf.setFontSize(footerFontSize);
        pdf.setTextColor(100, 100, 100); // Black
        const orgText = "{{ $formDetails->organization->name }}";
        pdf.text(orgText, margin + 10, footerY, { align: 'left' });

        // Left-aligned source (line 2, grey text)
        pdf.setTextColor(100, 100, 100); // Grey
        pdf.text("Source:  {{ $formDetails->form_title }}", margin + 10, footerY + lineHeight, { align: 'left' });

        // Right-aligned email (line 2)
        const emailText = "csb.economicsandpeace.org";
        pdf.text(emailText, pageWidth - rightPadding, footerY + lineHeight, { align: 'right' });


        // Save the PDF
        pdf.save(`${chartTitle}.pdf`);
    });
}
//for multi radar
function exportToPDFMultiRadar(chartId, chartTitle) {
    // Capture the logo
    const logo = document.querySelector(".logo img");
    const logoData = logo ? logo.src : null;

    // Capture the chart as an image
    html2canvas(document.getElementById(chartId), {
        scale: 2,
        useCORS: true,
        backgroundColor: null
    }).then(canvas => {
        const chartImgData = canvas.toDataURL("image/png");

        // Initialize PDF
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF({ orientation: "landscape" });

        // Define margins and dimensions
        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();
        const margin = 5;
        const logoWidth = 100;
        const logoHeight = 20;
        const titleFontSize = 24;
        const titleLineHeight = 20;

        // Add border
        pdf.setDrawColor(30, 30, 30);
        pdf.setLineWidth(0.2);
        pdf.rect(margin, margin, pageWidth - 2 * margin, pageHeight - 2 * margin);

        // Add logo
        if (logoData) {
            pdf.addImage(logoData, "PNG", margin + 10, margin + 10, logoWidth, logoHeight);
        }

        // Add title (centered)
        pdf.setFontSize(titleFontSize);
        pdf.setTextColor(30, 30, 30);
        const titleX = pdf.internal.pageSize.getWidth() / 2;
        const titleY = margin + logoHeight + 35; // Reduced spacing below logo
        pdf.text(chartTitle, titleX, titleY, { align: 'center' });

        // Calculate image dimensions (90% width - larger than before)
        const chartImgWidth = (pageWidth - 2 * margin) * 0.9; // Increased from 0.75 to 0.9
        const chartImgHeight = (chartImgWidth * canvas.height) / canvas.width;
        
        // Position the image lower on the page
        const chartImgX = (pageWidth - chartImgWidth) / 2;
        const chartImgY = 40;// Reduced spacing below title

        // Add chart image
        pdf.addImage(chartImgData, "PNG", chartImgX, chartImgY, chartImgWidth, chartImgHeight);

        // Footer
        const footerY = pageHeight - margin - 15;
        const lineHeight = 5;
        const rightPadding = margin + 10;
        const footerFontSize = 12;
        
        // Left-aligned organization (line 1)
        pdf.setFontSize(footerFontSize);
        pdf.setTextColor(100, 100, 100); // Black
        const orgText = "{{ $formDetails->organization->name }}";
        pdf.text(orgText, margin + 10, footerY, { align: 'left' });

        // Left-aligned source (line 2, grey text)
        pdf.setTextColor(100, 100, 100); // Grey
        pdf.text("Source:  {{ $formDetails->form_title }}", margin + 10, footerY + lineHeight, { align: 'left' });

        // Right-aligned email (line 2)
        const emailText = "csb.economicsandpeace.org";
        pdf.text(emailText, pageWidth - rightPadding, footerY + lineHeight, { align: 'right' });


        // Save PDF
        pdf.save(`${chartTitle}.pdf`);
    });
}


//for positive and negative peace
function exportToPDFPnBar(chartId, chartTitle) {
    // Capture the logo
    const logo = document.querySelector(".logo img");
    const logoData = logo ? logo.src : null;

    // Capture the chart as an image
    html2canvas(document.getElementById(chartId), {
        scale: 2, // High resolution
        useCORS: true,
        backgroundColor: null // Ensure transparency
    }).then(canvas => {
        const chartImgData = canvas.toDataURL("image/png");

        // Initialize PDF
        const { jsPDF } = window.jspdf;
        const pdf = new jsPDF({ orientation: "landscape" });

        // Define margins and dimensions
        const pageWidth = pdf.internal.pageSize.getWidth();
        const pageHeight = pdf.internal.pageSize.getHeight();
        const margin = 5; // Reduced margin for more content space
        const logoWidth = 100; // Larger logo like other functions
        const logoHeight = 20;
        const titleFontSize = 24; // Larger title font
        const titleLineHeight = 20;

        // Add a black border around the content (consistent styling)
        pdf.setDrawColor(30, 30, 30); // Dark gray border
        pdf.setLineWidth(0.2); // Thinner border
        pdf.rect(margin, margin, pageWidth - 2 * margin, pageHeight - 2 * margin);

        // Add logo (if available)
        if (logoData) {
            pdf.addImage(logoData, "PNG", margin + 10, margin + 10, logoWidth, logoHeight);
        }

        // Add title (centered like other functions)
        pdf.setFontSize(titleFontSize);
        pdf.setTextColor(30, 30, 30); // Dark gray text
        const titleX = pdf.internal.pageSize.getWidth() / 2;
        const titleY = margin + logoHeight + 35; // Consistent spacing below logo
        pdf.text(chartTitle, titleX, titleY, { align: 'center' });

        // Calculate the image dimensions (75% width like other functions)
        const chartImgWidth = (pageWidth - 2 * margin) * 0.5; // Reduced to 60% width
        const chartImgHeight = (chartImgWidth * canvas.height) / canvas.width;
        
        // Center the image horizontally
        const chartImgX = (pageWidth - chartImgWidth) / 2;
        // Position below title with consistent spacing
        const chartImgY = titleY + titleLineHeight;

        // Add the chart image
        pdf.addImage(chartImgData, "PNG", chartImgX, chartImgY, chartImgWidth, chartImgHeight);

        // ===== FOOTER (consistent with other functions) =====
        const footerY = pageHeight - margin - 15;
        const lineHeight = 5;
        const rightPadding = margin + 10;
        const footerFontSize = 12;
        
        // Left-aligned organization (line 1)
        pdf.setFontSize(footerFontSize);
        pdf.setTextColor(100, 100, 100); // Black
        const orgText = "{{ $formDetails->organization->name }}";
        pdf.text(orgText, margin + 10, footerY, { align: 'left' });

        // Left-aligned source (line 2, grey text)
        pdf.setTextColor(100, 100, 100); // Grey
        pdf.text("Source:  {{ $formDetails->form_title }}", margin + 10, footerY + lineHeight, { align: 'left' });

        // Right-aligned email (line 2)
        const emailText = "csb.economicsandpeace.org";
        pdf.text(emailText, pageWidth - rightPadding, footerY + lineHeight, { align: 'right' });

        // Save the PDF
        pdf.save(`${chartTitle}.pdf`);
    });
}

//for mean radar png
function exportToPNGMeanRadar(chartId, chartTitle) {
    // Capture elements
    const logo = document.querySelector(".logo img");
    const logoData = logo ? logo.src : null;

    // Create canvas with dimensions matching A4 landscape at high DPI
    const pxPerMM = 5; // Higher resolution
    const canvasWidth = 297 * pxPerMM; // A4 width in mm (1485px)
    const canvasHeight = 210 * pxPerMM; // A4 height in mm (1050px)
    
    // Capture chart with higher quality
    html2canvas(document.getElementById(chartId), {
        scale: 3, // Increased scale for better quality
        useCORS: true,
        backgroundColor: null,
        logging: false
    }).then(chartCanvas => {
        // Create final composition canvas
        const finalCanvas = document.createElement("canvas");
        finalCanvas.width = canvasWidth;
        finalCanvas.height = canvasHeight;
        const ctx = finalCanvas.getContext("2d");

        // White background
        ctx.fillStyle = "#FFFFFF";
        ctx.fillRect(0, 0, canvasWidth, canvasHeight);

        // Design parameters (match PDF exactly)
        const margin = 5 * pxPerMM; // 5mm margin
        const contentWidth = canvasWidth - 2 * margin;
        const contentHeight = canvasHeight - 2 * margin;
        
        // Add border (match PDF style)
        ctx.strokeStyle = "#1E1E1E"; // RGB 30,30,30
        ctx.lineWidth = 1; // 1px border
        ctx.strokeRect(margin, margin, contentWidth, contentHeight);


   

        // Add logo (top left)
        if (logoData) {
            const logoImg = new Image();
            logoImg.src = logoData;
            logoImg.onload = () => {
                const logoWidth = 100 * pxPerMM; // 100mm
                const logoHeight = 20 * pxPerMM; // 20mm
                ctx.drawImage(
                    logoImg, 
                    margin + 10, 
                    margin + 10, 
                    logoWidth, 
                    logoHeight
                );

                // Add title (match PDF styling)
                const titleFontSize = 42; // 24pt
                ctx.font = `${titleFontSize}px 'Arial'`;
                ctx.fillStyle = "#333"; // Dark gray
                ctx.textAlign = "center";
                const titleY = margin + logoHeight + 20 * pxPerMM; // 35mm below logo
                ctx.fillText(chartTitle, canvasWidth / 2, titleY);

                // Calculate chart dimensions (80% width with more spacing)
                const chartWidth = contentWidth * 0.9; // Larger than PDF's 75%
                const chartHeight = (chartWidth * chartCanvas.height) / chartCanvas.width;
                const chartX = (canvasWidth - chartWidth) / 2;
                const chartY = 30; // Extra spacing below title

                // Add chart with shadow effect (like PDF)
                ctx.shadowColor = "rgba(0,0,0,0.1)";
                ctx.shadowBlur = 10;
                ctx.shadowOffsetY = 5;
                ctx.drawImage(chartCanvas, chartX, chartY, chartWidth, chartHeight);
                ctx.shadowColor = "transparent"; // Reset shadow

                // Add footer (match PDF exactly)
                const footerY = canvasHeight - margin - 15 * pxPerMM;
                const footerFontSize = 24; // 12pt

                // Organization info (left, first line)
                ctx.font = `${footerFontSize}px 'Arial'`;
                ctx.fillStyle = "#646464"; // Gray
                ctx.textAlign = "left";
                ctx.fillText("{{ $formDetails->organization->name }}", margin + 10, footerY);

                // Source text (left, second line)
                ctx.fillText("Source:  {{ $formDetails->form_title }}", margin + 10, footerY + 5 * pxPerMM);

                // Email (right)
                ctx.textAlign = "right";
                ctx.fillText("csb.economicsandpeace.org", canvasWidth - margin - 10, footerY + 5 * pxPerMM);


                // Final export
                const link = document.createElement("a");
                link.download = `${chartTitle.replace(/[/\\?%*:|"<>]/g, '-')}.png`;
                link.href = finalCanvas.toDataURL("image/png", 1.0);
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            };
        } else {
            // Fallback version without logo
            const titleFontSize = 24;
            ctx.font = `bold ${titleFontSize}px 'Arial'`;
            ctx.fillStyle = "#1E1E1E";
            ctx.textAlign = "center";
            const titleY = margin + 50 * pxPerMM;
            ctx.fillText(chartTitle, canvasWidth / 2, titleY);

            // Add larger chart (80% width)
            const chartWidth = contentWidth * 0.8;
            const chartHeight = (chartWidth * chartCanvas.height) / chartCanvas.width;
            const chartX = (canvasWidth - chartWidth) / 2;
            const chartY = titleY + 20 * pxPerMM;
            
            // Add chart with subtle shadow
            ctx.shadowColor = "rgba(0,0,0,0.1)";
            ctx.shadowBlur = 10;
            ctx.shadowOffsetY = 5;
            ctx.drawImage(chartCanvas, chartX, chartY, chartWidth, chartHeight);
            ctx.shadowColor = "transparent";

            // Add footer
            const footerY = canvasHeight - margin - 15 * pxPerMM;
            ctx.font = "16px 'Arial'";
            ctx.fillStyle = "#646464";
            ctx.textAlign = "right";
            ctx.fillText(
                "{{ $formDetails->organization->name }}",
                canvasWidth - margin - 10,
                footerY
            );
            ctx.fillText(
                "csb.economicsandpeace.org",
                canvasWidth - margin - 10,
                footerY + 5 * pxPerMM
            );

            // Export
            const link = document.createElement("a");
            link.download = `${chartTitle.replace(/[/\\?%*:|"<>]/g, '-')}.png`;
            link.href = finalCanvas.toDataURL("image/png", 1.0);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }).catch(error => {
        console.error("PNG export error:", error);
        alert("Error generating image. Please try again.");
    });
}
//piechart png download
function exportToPNGPie(chartId, chartTitle) {
    // Capture elements
    const logo = document.querySelector(".logo img");
    const logoData = logo ? logo.src : null;

    // Create canvas with dimensions matching A4 landscape at high DPI
    const pxPerMM = 5; // Higher resolution
    const canvasWidth = 297 * pxPerMM; // A4 width in mm (1485px)
    const canvasHeight = 210 * pxPerMM; // A4 height in mm (1050px)
    
    // Capture chart with higher quality
    html2canvas(document.getElementById(chartId), {
        scale: 3, // Increased scale for better quality
        useCORS: true,
        backgroundColor: null,
        logging: false
    }).then(chartCanvas => {
        // Create final composition canvas
        const finalCanvas = document.createElement("canvas");
        finalCanvas.width = canvasWidth;
        finalCanvas.height = canvasHeight;
        const ctx = finalCanvas.getContext("2d");

        // White background
        ctx.fillStyle = "#FFFFFF";
        ctx.fillRect(0, 0, canvasWidth, canvasHeight);

        // Design parameters (match PDF exactly)
        const margin = 5 * pxPerMM; // 5mm margin
        const contentWidth = canvasWidth - 2 * margin;
        const contentHeight = canvasHeight - 2 * margin;
        
        // Add border (match PDF style)
        ctx.strokeStyle = "#1E1E1E"; // RGB 30,30,30
        ctx.lineWidth = 1; // 1px border
        ctx.strokeRect(margin, margin, contentWidth, contentHeight);

        // Add logo (top left)
        if (logoData) {
            const logoImg = new Image();
            logoImg.src = logoData;
            logoImg.onload = () => {
                const logoWidth = 100 * pxPerMM; // 100mm
                const logoHeight = 20 * pxPerMM; // 20mm
                ctx.drawImage(
                    logoImg, 
                    margin + 10, 
                    margin + 10, 
                    logoWidth, 
                    logoHeight
                );

                // Add title (match PDF styling)
                const titleFontSize = 42; // 24pt
                ctx.font = `${titleFontSize}px 'Arial'`;
                ctx.fillStyle = "#333"; // Dark gray
                ctx.textAlign = "center";
                const titleY = margin + logoHeight + 35 * pxPerMM; // 35mm below logo
                ctx.fillText(chartTitle, canvasWidth / 2, titleY);

                // Calculate chart dimensions maintaining original aspect ratio
                const maxChartWidth = contentWidth * 0.7;
                const maxChartHeight = contentHeight * 0.5;
                
                // Calculate dimensions that fit within bounds while maintaining aspect ratio
                const chartAspectRatio = chartCanvas.width / chartCanvas.height;
                let chartWidth = maxChartWidth;
                let chartHeight = chartWidth / chartAspectRatio;
                
                if (chartHeight > maxChartHeight) {
                    chartHeight = maxChartHeight;
                    chartWidth = chartHeight * chartAspectRatio;
                }

                const chartX = (canvasWidth - chartWidth) / 2;
                const chartY = titleY + 20 * pxPerMM; // Extra spacing below title

                // Add chart with shadow effect (like PDF)
                ctx.shadowColor = "rgba(0,0,0,0.1)";
                ctx.shadowBlur = 10;
                ctx.shadowOffsetY = 5;
                ctx.drawImage(chartCanvas, chartX, chartY, chartWidth, chartHeight);
                ctx.shadowColor = "transparent"; // Reset shadow

                // Add footer (match PDF exactly)
                const footerY = canvasHeight - margin - 15 * pxPerMM;
                const footerFontSize = 24; // 12pt

                // Organization info (left, first line)
                ctx.font = `${footerFontSize}px 'Arial'`;
                ctx.fillStyle = "#646464"; // Gray
                ctx.textAlign = "left";
                ctx.fillText("{{ $formDetails->organization->name }}", margin + 10, footerY);

                // Source text (left, second line)
                ctx.fillText("Source:  {{ $formDetails->form_title }}", margin + 10, footerY + 5 * pxPerMM);

                // Email (right)
                ctx.textAlign = "right";
                ctx.fillText("csb.economicsandpeace.org", canvasWidth - margin - 10, footerY + 5 * pxPerMM);


                // Final export
                const link = document.createElement("a");
                link.download = `${chartTitle.replace(/[/\\?%*:|"<>]/g, '-')}.png`;
                link.href = finalCanvas.toDataURL("image/png", 1.0);
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            };
        } else {
            // Fallback version without logo
            const titleFontSize = 42;
            ctx.font = `${titleFontSize}px 'Arial'`;
            ctx.fillStyle = "#333";
            ctx.textAlign = "center";
            const titleY = margin + 50 * pxPerMM;
            ctx.fillText(chartTitle, canvasWidth / 2, titleY);

            // Calculate chart dimensions maintaining original aspect ratio
            const maxChartWidth = contentWidth * 0.9;
            const maxChartHeight = contentHeight * 0.6;
            
            const chartAspectRatio = chartCanvas.width / chartCanvas.height;
            let chartWidth = maxChartWidth;
            let chartHeight = chartWidth / chartAspectRatio;
            
            if (chartHeight > maxChartHeight) {
                chartHeight = maxChartHeight;
                chartWidth = chartHeight * chartAspectRatio;
            }

            const chartX = (canvasWidth - chartWidth) / 2;
            const chartY = titleY + 20 * pxPerMM;
            
            // Add chart with subtle shadow
            ctx.shadowColor = "rgba(0,0,0,0.1)";
            ctx.shadowBlur = 10;
            ctx.shadowOffsetY = 5;
            ctx.drawImage(chartCanvas, chartX, chartY, chartWidth, chartHeight);
            ctx.shadowColor = "transparent";

            // Add footer
            const footerY = canvasHeight - margin - 15 * pxPerMM;
            ctx.font = "24px 'Arial'";
            ctx.fillStyle = "#646464";
            ctx.textAlign = "right";
            ctx.fillText(
                "{{ $formDetails->organization->name }}",
                canvasWidth - margin - 10,
                footerY
            );
            ctx.fillText(
                "csb.economicsandpeace.org",
                canvasWidth - margin - 10,
                footerY + 5 * pxPerMM
            );

            // Export
            const link = document.createElement("a");
            link.download = `${chartTitle.replace(/[/\\?%*:|"<>]/g, '-')}.png`;
            link.href = finalCanvas.toDataURL("image/png", 1.0);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }).catch(error => {
        console.error("PNG export error:", error);
        alert("Error generating image. Please try again.");
    });
}

//png multi radar
function exportToPNGMultiRadar(chartId, chartTitle) {
    // Capture elements
    const logo = document.querySelector(".logo img");
    const logoData = logo ? logo.src : null;

    // Create canvas with dimensions matching A4 landscape at high DPI
    const pxPerMM = 5; // Higher resolution
    const canvasWidth = 297 * pxPerMM; // A4 width in mm (1485px)
    const canvasHeight = 210 * pxPerMM; // A4 height in mm (1050px)
    
    // Capture chart with higher quality
    html2canvas(document.getElementById(chartId), {
        scale: 3, // Increased scale for better quality
        useCORS: true,
        backgroundColor: null,
        logging: false
    }).then(chartCanvas => {
        // Create final composition canvas
        const finalCanvas = document.createElement("canvas");
        finalCanvas.width = canvasWidth;
        finalCanvas.height = canvasHeight;
        const ctx = finalCanvas.getContext("2d");

        // White background
        ctx.fillStyle = "#FFFFFF";
        ctx.fillRect(0, 0, canvasWidth, canvasHeight);

        // Design parameters (match PDF exactly)
        const margin = 5 * pxPerMM; // 5mm margin
        const contentWidth = canvasWidth - 2 * margin;
        const contentHeight = canvasHeight - 2 * margin;
        
        // Add border (match PDF style)
        ctx.strokeStyle = "#1E1E1E"; // RGB 30,30,30
        ctx.lineWidth = 1; // 1px border
        ctx.strokeRect(margin, margin, contentWidth, contentHeight);


   

        // Add logo (top left)
        if (logoData) {
            const logoImg = new Image();
            logoImg.src = logoData;
            logoImg.onload = () => {
                const logoWidth = 100 * pxPerMM; // 100mm
                const logoHeight = 20 * pxPerMM; // 20mm
                ctx.drawImage(
                    logoImg, 
                    margin + 10, 
                    margin + 10, 
                    logoWidth, 
                    logoHeight
                );

                // Add title (match PDF styling)
                const titleFontSize = 42; // 24pt
                ctx.font = `${titleFontSize}px 'Arial'`;
                ctx.fillStyle = "#333"; // Dark gray
                ctx.textAlign = "center";
                const titleY = margin + logoHeight + 20 * pxPerMM; // 35mm below logo
                ctx.fillText(chartTitle, canvasWidth / 2, titleY);

                // Calculate chart dimensions (80% width with more spacing)
                const chartWidth = contentWidth * 1; // Larger than PDF's 75%
                const chartHeight = (chartWidth * chartCanvas.height) / chartCanvas.width;
                const chartX = (canvasWidth - chartWidth) / 2;
                const chartY = 100; // Extra spacing below title

                // Add chart with shadow effect (like PDF)
                ctx.shadowColor = "rgba(0,0,0,0.1)";
                ctx.shadowBlur = 10;
                ctx.shadowOffsetY = 5;
                ctx.drawImage(chartCanvas, chartX, chartY, chartWidth, chartHeight);
                ctx.shadowColor = "transparent"; // Reset shadow

                // Add footer (match PDF exactly)
                const footerY = canvasHeight - margin - 15 * pxPerMM;
                const footerFontSize = 24; // 12pt

                // Organization info (left, first line)
                ctx.font = `${footerFontSize}px 'Arial'`;
                ctx.fillStyle = "#646464"; // Gray
                ctx.textAlign = "left";
                ctx.fillText("{{ $formDetails->organization->name }}", margin + 10, footerY);

                // Source text (left, second line)
                ctx.fillText("Source:  {{ $formDetails->form_title }}", margin + 10, footerY + 5 * pxPerMM);

                // Email (right)
                ctx.textAlign = "right";
                ctx.fillText("csb.economicsandpeace.org", canvasWidth - margin - 10, footerY + 5 * pxPerMM);


                // Final export
                const link = document.createElement("a");
                link.download = `${chartTitle.replace(/[/\\?%*:|"<>]/g, '-')}.png`;
                link.href = finalCanvas.toDataURL("image/png", 1.0);
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            };
        } else {
            // Fallback version without logo
            const titleFontSize = 24;
            ctx.font = `bold ${titleFontSize}px 'Arial'`;
            ctx.fillStyle = "#1E1E1E";
            ctx.textAlign = "center";
            const titleY = margin + 50 * pxPerMM;
            ctx.fillText(chartTitle, canvasWidth / 2, titleY);

            // Add larger chart (80% width)
            const chartWidth = contentWidth * 0.8;
            const chartHeight = (chartWidth * chartCanvas.height) / chartCanvas.width;
            const chartX = (canvasWidth - chartWidth) / 2;
            const chartY = titleY + 20 * pxPerMM;
            
            // Add chart with subtle shadow
            ctx.shadowColor = "rgba(0,0,0,0.1)";
            ctx.shadowBlur = 10;
            ctx.shadowOffsetY = 5;
            ctx.drawImage(chartCanvas, chartX, chartY, chartWidth, chartHeight);
            ctx.shadowColor = "transparent";

            // Add footer
            const footerY = canvasHeight - margin - 15 * pxPerMM;
            ctx.font = "16px 'Arial'";
            ctx.fillStyle = "#646464";
            ctx.textAlign = "right";
            ctx.fillText(
                "{{ $formDetails->organization->name }}",
                canvasWidth - margin - 10,
                footerY
            );
            ctx.fillText(
                "csb.economicsandpeace.org",
                canvasWidth - margin - 10,
                footerY + 5 * pxPerMM
            );

            // Export
            const link = document.createElement("a");
            link.download = `${chartTitle.replace(/[/\\?%*:|"<>]/g, '-')}.png`;
            link.href = finalCanvas.toDataURL("image/png", 1.0);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }).catch(error => {
        console.error("PNG export error:", error);
        alert("Error generating image. Please try again.");
    });
}

//png pp
function exportToPNGPP(chartId, chartTitle) {
    // Capture elements
    const logo = document.querySelector(".logo img");
    const logoData = logo ? logo.src : null;

    // Create canvas with dimensions matching A4 landscape at high DPI
    const pxPerMM = 5; // Higher resolution
    const canvasWidth = 297 * pxPerMM; // A4 width in mm (1485px)
    const canvasHeight = 210 * pxPerMM; // A4 height in mm (1050px)
    
    // Capture chart with higher quality
    html2canvas(document.getElementById(chartId), {
        scale: 3, // Increased scale for better quality
        useCORS: true,
        backgroundColor: null,
        logging: false
    }).then(chartCanvas => {
        // Create final composition canvas
        const finalCanvas = document.createElement("canvas");
        finalCanvas.width = canvasWidth;
        finalCanvas.height = canvasHeight;
        const ctx = finalCanvas.getContext("2d");

        // White background
        ctx.fillStyle = "#FFFFFF";
        ctx.fillRect(0, 0, canvasWidth, canvasHeight);

        // Design parameters (match PDF exactly)
        const margin = 5 * pxPerMM; // 5mm margin
        const contentWidth = canvasWidth - 2 * margin;
        const contentHeight = canvasHeight - 2 * margin;
        
        // Add border (match PDF style)
        ctx.strokeStyle = "#1E1E1E"; // RGB 30,30,30
        ctx.lineWidth = 1; // 1px border
        ctx.strokeRect(margin, margin, contentWidth, contentHeight);


   

        // Add logo (top left)
        if (logoData) {
            const logoImg = new Image();
            logoImg.src = logoData;
            logoImg.onload = () => {
                const logoWidth = 100 * pxPerMM; // 100mm
                const logoHeight = 20 * pxPerMM; // 20mm
                ctx.drawImage(
                    logoImg, 
                    margin + 10, 
                    margin + 10, 
                    logoWidth, 
                    logoHeight
                );

                // Add title (match PDF styling)
                const titleFontSize = 42; // 24pt
                ctx.font = `${titleFontSize}px 'Arial'`;
                ctx.fillStyle = "#333"; // Dark gray
                ctx.textAlign = "center";
                const titleY = margin + logoHeight + 35 * pxPerMM; // 35mm below logo
                ctx.fillText(chartTitle, canvasWidth / 2, titleY);

                // Calculate chart dimensions (80% width with more spacing)
                const chartWidth = contentWidth * 0.5; // Larger than PDF's 75%
                const chartHeight = (chartWidth * chartCanvas.height) / chartCanvas.width;
                const chartX = (canvasWidth - chartWidth) / 2;
                const chartY = titleY + 20 * pxPerMM; // Extra spacing below title

                // Add chart with shadow effect (like PDF)
                ctx.shadowColor = "rgba(0,0,0,0.1)";
                ctx.shadowBlur = 10;
                ctx.shadowOffsetY = 5;
                ctx.drawImage(chartCanvas, chartX, chartY, chartWidth, chartHeight);
                ctx.shadowColor = "transparent"; // Reset shadow

                // Add footer (match PDF exactly)
                const footerY = canvasHeight - margin - 15 * pxPerMM;
                const footerFontSize = 24; // 12pt

                // Organization info (left, first line)
                ctx.font = `${footerFontSize}px 'Arial'`;
                ctx.fillStyle = "#646464"; // Gray
                ctx.textAlign = "left";
                ctx.fillText("{{ $formDetails->organization->name }}", margin + 10, footerY);

                // Source text (left, second line)
                ctx.fillText("Source:  {{ $formDetails->form_title }}", margin + 10, footerY + 5 * pxPerMM);

                // Email (right)
                ctx.textAlign = "right";
                ctx.fillText("csb.economicsandpeace.org", canvasWidth - margin - 10, footerY + 5 * pxPerMM);


                // Final export
                const link = document.createElement("a");
                link.download = `${chartTitle.replace(/[/\\?%*:|"<>]/g, '-')}.png`;
                link.href = finalCanvas.toDataURL("image/png", 1.0);
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            };
        } else {
            // Fallback version without logo
            const titleFontSize = 24;
            ctx.font = `bold ${titleFontSize}px 'Arial'`;
            ctx.fillStyle = "#1E1E1E";
            ctx.textAlign = "center";
            const titleY = margin + 50 * pxPerMM;
            ctx.fillText(chartTitle, canvasWidth / 2, titleY);

            // Add larger chart (80% width)
            const chartWidth = contentWidth * 0.4;
            const chartHeight = (chartWidth * chartCanvas.height) / chartCanvas.width;
            const chartX = (canvasWidth - chartWidth) / 2;
            const chartY = titleY + 20 * pxPerMM;
            
            // Add chart with subtle shadow
            ctx.shadowColor = "rgba(0,0,0,0.1)";
            ctx.shadowBlur = 10;
            ctx.shadowOffsetY = 5;
            ctx.drawImage(chartCanvas, chartX, chartY, chartWidth, chartHeight);
            ctx.shadowColor = "transparent";

            // Add footer
            const footerY = canvasHeight - margin - 15 * pxPerMM;
            ctx.font = "16px 'Arial'";
            ctx.fillStyle = "#646464";
            ctx.textAlign = "right";
            ctx.fillText(
                "{{ $formDetails->organization->name }}",
                canvasWidth - margin - 10,
                footerY
            );
            ctx.fillText(
                "csb.economicsandpeace.org",
                canvasWidth - margin - 10,
                footerY + 5 * pxPerMM
            );

            // Export
            const link = document.createElement("a");
            link.download = `${chartTitle.replace(/[/\\?%*:|"<>]/g, '-')}.png`;
            link.href = finalCanvas.toDataURL("image/png", 1.0);
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    }).catch(error => {
        console.error("PNG export error:", error);
        alert("Error generating image. Please try again.");
    });
}
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

@endsection

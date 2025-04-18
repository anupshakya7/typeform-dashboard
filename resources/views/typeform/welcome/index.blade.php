@extends('typeform.layout.web')
@section('title')
    @lang('translation.crm')
@endsection
@section('css')
<style>
       .container-fluid {
       position: relative;
display:flex;
justify-content: center;
       }
       .highlight-area {
        position: absolute;
    z-index: 999999;
    background-color: none;
    border-radius: 10px;
    padding: 20px 7px;
    width: 100%;
    background-color: white;
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
    position: absolute;
    top: 0;
    left: 0;
    margin: 0 auto;
	}
	.highlight-area {
		width: 85%;
		margin: 0 auto;
		margin-bottom: 100px;
 z-index: 99999999; /* Higher than overlay */
    pointer-events: auto !important; /* Force allow interactions */
		@media(max-width:767px) {
			width: 100%;
					margin-bottom: 0;

		}
	}
	
</style>
@endsection


@section('content')
    <div class="row highlight-area">
        <div class="col">
            <div class="h-100">

                <!--greeting section -->

                <div>
                    <div>
                        <h4>Welcome back, {{ auth()->user()->name }}</h4>
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
                            data-target="{{ $topBox['survey'] }}">{{ $topBox['survey'] }}</span>
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
                            data-target="{{ $topBox['countries'] }}">{{ $topBox['countries'] }}</span>
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
                            data-target="{{ $topBox['organizations'] }}">{{ $topBox['organizations'] }}</span>
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
                            data-target="{{ $topBox['people'] }}">{{ $topBox['people'] }}</span>
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
                        @php
                            $user = auth()->user()->role->name;
                            if($user == 'superadmin'){
                                $lastText = ' or <b>Organisation</b>';
                            }elseif($user == 'organization'){
                                $lastText = ' or <b>Division</b>';
                            }else{
                                $lastText = '';
                            }
                        @endphp
                        <p>Choose a survey to explore detailed insights. Use the filters to narrow results by <b>Country</b>{!!$lastText!!}.</p>
                    </div>
                    </div>

                    <div class="mt-3 mt-lg-0 d-flex justify-content-between flex-wrap gap-3" >
                        <form action="{{ route('home.index') }}" method="GET">
                        <div class="row gap-3 m-0 p-0 dashboard flex-nowra align-items-center">

                                <div class="col-auto p-0">
                                    {{-- @if(auth()->user()->role->name == 'survey')
                                        <input type="text" class="form-control" name="country" id="country" value="{{$filterData->country}}" readonly>
                                    @else --}}
                                    <select class="form-select select2" name="country" id="country"
                                        aria-label="Default select example">
                                        <option value="" selected>Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->country }}">
                                                {{ $country->country }}</option>
                                        @endforeach
                                    </select>
                                    {{-- @endif --}}
                                    {{-- <div id="country_hidden">

                                    </div> --}}
                                </div>
                                <div class="col-auto p-0">
                                    @if(auth()->user()->role->name == 'superadmin')
                                    <select class="form-select select2" id="organization" name="organization"
                                        aria-label="Default select example">
                                        <option value="" selected>Select Organization</option>
                                        @foreach ($organizations as $organization)
                                            <option value="{{ $organization->id }}">
                                                {{ $organization->name }}</option>
                                        @endforeach
                                    </select>
                                    @else
                                    <input type="text" class="form-control organization-name" value="{{auth()->user()->organization->name}}" readonly>
                                    <input type="hidden" name="organization" class="form-control" value="{{old('organization',auth()->user()->organization_id)}}" id="organization" readonly>
                                    @endif
                                </div>

                                <div class="col-auto p-0">
                                    {{-- @if(auth()->user()->role->name == 'survey')
                                    <input type="text" class="form-control" value="{{auth()->user()->branch_id != null ? auth()->user()->branch->name :''}}" readonly>
                                    <input type="hidden" name="branch" class="form-control" value="{{old('branch',auth()->user()->branch_id)}}" id="branch" readonly>
                                    @else --}}
                                    <select class="form-select select2" id="branch" name="branch"
                                        aria-label="Default select example" disabled>
                                        <option value="" selected>Select Division</option>
                                    </select>
                                    {{-- @endif --}}
                                </div>
                                <div class="col-auto p-0">
                                    {{-- @if(auth()->user()->role->name == 'survey')
                                        <input type="text" class="form-control" value="{{auth()->user()->survey->form_title}}" readonly>
                                        <input type="hidden" name="survey" class="form-control" value="{{old('survey',auth()->user()->form_id)}}" id="branch" readonly>
                                    @else --}}
                                    <select class="form-select select2" name="survey" id="survey"
                                        aria-label="Default select example">
                                        <option value="" selected>Select Survey</option>
                                        @foreach ($surveyForms as $surveyForm)
                                            <option value="{{ $surveyForm->form_title }}">
                                                {{ $surveyForm->form_title }}</option>
                                        @endforeach
                                    </select>
                                    {{-- @endif --}}
                                </div>
                                {{-- @if(auth()->user()->role->name !== 'survey') --}}
                                <div class="col-auto p-0">
                                    
                                <button href="#" class="view-insight-btn" id="filter_btn" onclick="this.form.submit();" {{request('survey') ? '' :'disabled'}} >
                                        <span>View Insight</span>
                                        <i class='bx bx-arrow-back bx-rotate-180' ></i>
                                    </button>
                                    

                                </div>
                                {{-- @endif --}}
                            </div>
                            
                            </div>

                        </form>
                        
                </div>
            <!--initial filter section-->


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
            });
            $(document).on('change', '#branch', function() {
                filterSurvey();
            });

            $(document).on('change', '#survey', function() {
                filterBtn();
            });

            function filterBtn(){
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
                        'data-bs-placement' : 'top'
                    }).popover();

                }
            }

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
                var countryVal = $('#country').val();
                var organizationVal = $('#organization').val();
                var branchVal = isFirstLoad ? branch : $('#branch').val();

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

                            var userRole = @json(auth()->user()->role->name);
                            var userBranchId = @json(auth()->user()->branch_id);

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

                            console.log("after survey filter",formList);

                          

                            formList.forEach(function(formItem) {
                                // $('#survey').append(new Option(form.form_title,
                                // form.id));
                                if(userRole == 'survey'){
                                    let surveyId = @json(auth()->user()->form_id);
                                    let surveyIds = Array.isArray(surveyId) ? surveyId : surveyId.split(', ');

                                    if(surveyIds.includes(formItem.form_id)){
                                        var option = new Option(formItem.form_title, formItem.form_id);
                                        $('#survey').append(option);

                                        if (survey && survey == formItem.form_id) {
                                            $(option).prop('selected', true);
                                        }
                                    }
                                }else{
                                    var option = new Option(formItem.form_title, formItem.form_id);
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

        document.addEventListener('DOMContentLoaded', function() {
            // Check if current page is homepage (root '/' or '')

            // if (window.location.pathname === '/' || window.location.pathname === '') {
            //   document.body.classList.add('overlay-active');
            // } else {
            //   document.body.classList.remove('overlay-active');
            // }
            document.body.classList.add('overlay-active');
        });

    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

@endsection

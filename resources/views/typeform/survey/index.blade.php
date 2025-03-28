@extends('typeform.layout.web')

@section('title') @lang('translation.crm') @endsection
@section('css')
<link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
<!--datatable css-->
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<!--datatable responsive css-->
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
    type="text/css" />
<link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />

<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

@endsection
@section('content')
<!--greeting section -->

<div class="mb-3 pb-1 d-flex align-items-center flex-row">
    <div class="flex-grow-1">
        <h4 class="fs-16 mb-1">Survey Data</h4>
        <p class="text-muted mb-0">Survey data involves viewing, exporting, sorting, filtering, and organizing
            surveys.</p>
    </div>
</div>

<!--end greeting section-->


<!--form section starts here -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex justify-content-between">
                <h5 class="card-title mb-0">Survey Data</h5>
                <div class="flex-shrink-0">
                    <div class="d-flex flex-row gap-2 align-items-center">
                        <!--info here-->
                        <a href="{{route('survey.csv',['search_participant'=>request('search_participant'),'country'=>request('country'),'organization'=>request('organization'),'branch'=>request('branch'),'survey'=>request('survey')])}}" type="button" class="btn btn-success">
                            <i
                                class="ri-file-download-line align-bottom me-1"></i>

                            Export</a>
                        {{-- <a class="icon-frame" href="#" class="m-0 p-0 d-flex justify-content-center align-items-center" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas"
                        aria-controls="theme-settings-offcanvas">
                            <img class="svg-icon" type="image/svg+xml"
                                src="{{ URL::asset('build/icons/info.svg')}}"></img>

                        </a> --}}
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex flex-row align-items-center justify-content-between pb-3">
                    <div class="d-flex flex-row align-items-center gap-1">

                    </div>
                    <form action="{{route('survey.index')}}" method="GET" id="survey_search">
                        <div class="row dashboard g-3">
                            <div class="col-auto d-flex justify-content-sm-end">
                                <div class="search-box"> <input type="text" class="form-control" id="searchProductList" name="search_participant" value="{{request('search_participant')}}" onkeyup="debounceSeach()"
                                        placeholder="Search Participants"> <i class="ri-search-line search-icon"></i> </div>
                            </div>
                            <div class="col-auto"> 
                                <select class="form-select select2" name="country" aria-label="Default select example" onchange="this.form.submit()">
                                    <option value="" selected>Country </option>
                                    @foreach($countries as $country)
                                        <option value="{{$country['name']}}" {{request('country') == $country['name'] ? 'selected':''}}>{{$country['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto"> 
                                <select class="form-select select2" name="organization" id="organization" aria-label="Default select example" onchange="this.form.submit()">
                                    <option value="" selected>Organization</option>
                                    @foreach($organizations as $organization)
                                    <option value="{{$organization->id}}" {{request('organization') == $organization->id ? 'selected':''}}>{{$organization->name}}</option>
                                    @endforeach
                                </select> 
                            </div>
                            <div class="col-auto"> 
                                <select class="form-select select2" name="branch" id="branch" aria-label="Default select example" onchange="this.form.submit()" disabled>
                                    <option value="" selected>Division</option>
                                </select> 
                            </div>
                            <div class="col-auto">
                                <div class="col-auto"> <select class="form-select select2" name="survey" id="survey" onchange="this.form.submit()" aria-label="Default select example" disabled>
                                        <option value="" selected>Survey</option>
                                    </select> 
                                </div>
                            </div>
                        </div>
                    </form>
                   
                   
                </div>

                <div class="table-responsive">
                    <table id="scroll-horizontal" class="table nowrap align-middle table-bordered" style="width:100%">
                        <thead class="table-head">
                            <tr>
                                <th scope="col">
                                    S.No.
                                </th>
                                <th>Survey Data ID</th>
                                <th>Survey ID</th>
                                <th>Survey Name</th>
                                <th>Survey Country</th>
                                <th>Survey Organization</th>
                                <th>Survey Branch</th>
                                <th>Participants Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Survey Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($answers as $answer)
                            <tr>
                                <th scope="row">
                                    {{$answer->serial_no}}
                                </th>
                                <td>{{$answer->event_id}}</td>
                                <td>{{$answer->form_id}}</td>
                                <td>{{$answer->form ? optional($answer->form)->form_title : 'Form Not Sync Yet'}}</td>
                                <td>{{$answer->form ? optional($answer->form)->country : 'No Country'}}</td>
                                <td>{{$answer->form ? optional($answer->form)->organization->name : 'No Organization'}}</td>
                                <td>{{optional($answer->form)->branches ? optional($answer->form)->branches->name : 'Head Office'}}</td>
                                <td>
                                    <span class="participants-name">
                                        {{$answer->name}}
                                    </span>
                                </td>
                                <td> {{$answer->age}}</td>
                                <td> {{$answer->gender}}</td>
                                @php
                                $date = Carbon\Carbon::parse($answer->created_at)->format('d M,Y');
                                @endphp
                                <td>{{$date}}</td>
                                <td>
                                    @if($answer->form)
                                    <a href="{{route('survey.qa',$answer)}}" class="view-tag"><i
                                        class="ri-eye-fill align-bottom"></i></a>
                                    <a href="{{route('survey.single.csv',$answer)}}" class="export-tag">
                                    <i
                                    class="ri-file-download-line"></i>
                                    </a>
                                    {{-- <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end"> --}}
                                            {{-- <li><a href="{{route('survey.show',$answer)}}" class="dropdown-item"><i
                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                            </li> --}}
                                          
                                            {{-- <li><a href="{{route('survey.qa',$answer)}}" class="dropdown-item"><i
                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                            </li> --}}
                                            
                                            <!-- <li><a class="dropdown-item edit-item-btn"><i
                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    Edit</a></li>
                                            <li>
                                                <a class="dropdown-item remove-item-btn">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                    Delete
                                                </a>
                                            </li> -->
                                        {{-- </ul>
                                    </div> --}}
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!--tfooter section-->
                @include('typeform.partials.pagination',['paginator'=>$answers])
                <!-- <div class="align-items-center mt-xl-3 mt-4 justify-content-between d-flex">
                    <div class="flex-shrink-0">
                        <div class="text-muted">Showing <span class="fw-semibold">5</span> of <span
                                class="fw-semibold">25</span> Results </div>
                    </div>
                    <ul class="pagination pagination-separated pagination-sm mb-0">
                        <li class="page-item disabled"> <a href="#" class="page-link">Previous</a> </li>
                        <li class="page-item"> <a href="#" class="page-link">1</a> </li>
                        <li class="page-item active"> <a href="#" class="page-link">2</a> </li>
                        <li class="page-item"> <a href="#" class="page-link">3</a> </li>
                        <li class="page-item"> <a href="#" class="page-link">Next</a> </li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--form section ends here-->



<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">&nbsp;</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <form class="tablelist-form" autocomplete="off">
                <div class="modal-body">
                    <input type="hidden" id="id-field" />

                    <div class="mb-3 d-none" id="modal-id">
                        <label for="applicationId" class="form-label">ID</label>
                        <input type="text" id="applicationId" class="form-control" placeholder="ID" readonly />
                    </div>

                    <div class="text-center">
                        <div class="position-relative d-inline-block">
                            <div class="position-absolute  bottom-0 end-0">
                                <label for="companylogo-image-input" class="mb-0" data-bs-toggle="tooltip"
                                    data-bs-placement="right" title="Select Image">
                                    <div class="avatar-xs cursor-pointer">
                                        <div class="avatar-title bg-light border rounded-circle text-muted">
                                            <i class="ri-image-fill"></i>
                                        </div>
                                    </div>
                                </label>
                                <input class="form-control d-none" value="" id="companylogo-image-input" type="file"
                                    accept="image/png, image/gif, image/jpeg">
                            </div>
                            <div class="avatar-lg p-1">
                                <div class="avatar-title bg-light rounded-circle">
                                    <img src="{{URL::asset('build/images/users/multi-user.jpg')}}" id="companylogo-img"
                                        class="avatar-md h-auto rounded-circle object-fit-cover" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="company-field" class="form-label">Company</label>
                        <input type="text" id="company-field" class="form-control" placeholder="Enter company name"
                            required />
                    </div>

                    <div class="mb-3">
                        <label for="designation-field" class="form-label">Designation</label>
                        <input type="text" id="designation-field" class="form-control" placeholder="Enter designation"
                            required />
                    </div>

                    <div class="mb-3">
                        <label for="date-field" class="form-label">Apply Date</label>
                        <input type="date" id="date-field" class="form-control" data-provider="flatpickr"
                            data-date-format="d M, Y" required placeholder="Select date" />
                    </div>

                    <div class="mb-3">
                        <label for="contact-field" class="form-label">Contacts</label>
                        <input type="text" id="contact-field" class="form-control" placeholder="Enter contact"
                            required />
                    </div>

                    <div class="row gy-4 mb-3">
                        <div class="col-md-6">
                            <div>
                                <label for="status-input" class="form-label">Status</label>
                                <select class="form-control" data-trigger name="status-input" id="status-input">
                                    <option value="">Status</option>
                                    <option value="Approved">Approved</option>
                                    <option value="New">New</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <label for="type-input" class="form-label">Type</label>
                                <select class="form-control" data-trigger name="type-input" id="type-input">
                                    <option value="">Select Type</option>
                                    <option value="Full Time">Full Time</option>
                                    <option value="Part Time">Part Time</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" id="add-btn">Add</button>
                        {{-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> --}}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-5 text-center">
                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                    colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px">
                </lord-icon>
                <div class="mt-4 text-center">
                    <h4>You are about to delete a order ?</h4>
                    <p class="text-muted fs-15 mb-4">Deleting your order will remove all of your
                        information from our database.</p>
                    <div class="hstack gap-2 justify-content-center remove">
                        <button class="btn btn-link link-success fw-medium text-decoration-none" id="deleteRecord-close"
                            data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                        <button class="btn btn-danger" id="delete-record">Yes, Delete It</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end modal -->
</div>
</div>

</div>
<!--end col-->
</div>
<!--end row-->
<!--form section ends here-->



@endsection
@section('script')
<!-- list.js min js -->
<script src="{{URL::asset('build/libs/list.js/list.min.js')}}"></script>

<!--list pagination js-->
<script src="{{URL::asset('build/libs/list.pagination.js/list.pagination.min.js')}}"></script>

<!-- ecommerce-order init js -->
<script src="{{URL::asset('build/js/pages/job-application.init.js')}}"></script>

<!-- Sweet Alerts js -->
<script src="{{URL::asset('build/libs/sweetalert2/sweetalert2.min.js')}}"></script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="{{ URL::asset('build/js/pages/datatables.init.js') }}"></script>


<!-- App js -->
<script src="{{URL::asset('build/js/app.js')}}"></script>

<script>
    let debouceTimeout;
    function debounceSeach(){
        clearTimeout(debouceTimeout);

        debouceTimeout = setTimeout(()=>{
            document.getElementById('survey_search').submit();
        },800);
    }

    $(document).ready(function(){
        function getQueryParams(param){
            var urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        var country_name = getQueryParams('country');
        var organization_id = getQueryParams('organization');
        var branch_id = getQueryParams('branch');
        var survey_id = getQueryParams('survey');

        if(country_name !== null){
                filterSurvey();
            }

            if(organization_id !== null){
                filterBranch();
                filterSurvey();
            }

            if(branch_id !== null){
                filterSurvey();
            }

            $(document).on('change','#organization',function(){
                filterBranch();
                filterSurvey();
            });


            function filterBranch(callback) {
                var organizationVal = organization_id;

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
                            $('#branch').append('<option value="" selected>Choose Division</option>');

                            var userRole = @json(auth()->user()->role->name);
                            var userBranchId = @json(auth()->user()->branch_id);

                        
                            var branchList = response.branches.filter(function(branch){
                                if(userRole == "branch"){
                                    let branchIds = Array.isArray(userBranchId) ? userBranchId : userBranchId.split(', ');
                                    return branchIds.includes(branch.id.toString());
                                }

                                return true;
                            });
                            
                            branchList.forEach(function(branchItem) {
                                // $('#branch').append(new Option(branch.name,
                                // branch.id));
                                var option = new Option(branchItem.name, branchItem.id);
                                $('#branch').append(option);

                                if (branch_id && branch_id == branchItem.id) {
                                    $(option).prop('selected', true);
                                }
                            });

                            if (callback && typeof callback == 'function') {
                                callback();
                            }

                            isFirstLoad = false;
                        },
                        error: function(xhr, status, error) {
                            $('#branch').prop('disabled', true);
                            $('#branch').html('');
                            $('#branch').append('<option value="" selected>Choose Division</option>');
                        }
                    })
                }else{
                    $('#branch').prop('disabled', true);
                    $('#branch').html('');
                    $('#branch').append('<option value="" selected>Choose Division</option>');
                }
            }

            function filterSurvey() {
                var countryVal = country_name;
                var organizationVal = organization_id;
                var branchVal = branch_id;

                if (organizationVal !== '' || countryVal !== '') {
                    $.ajax({
                        url: "{{ route('survey.get') }}",
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

                                if (survey_id && survey_id == formItem.form_id) {
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
    }); 
</script>

@endsection
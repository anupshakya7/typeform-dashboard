@extends('typeform.layout.web')
@section('title') @lang('translation.crm') @endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
    integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ URL::asset('build/libs/@simonwep/pickr/themes/classic.min.css') }}" />
<!-- 'classic' theme -->
<link rel="stylesheet" href="{{ URL::asset('build/libs/@simonwep/pickr/themes/monolith.min.css') }}" />
<!-- 'monolith' theme -->
<link rel="stylesheet" href="{{ URL::asset('build/libs/@simonwep/pickr/themes/nano.min.css') }}" />
<!-- 'nano' theme -->
<!-- Flatpickr CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection
@section('content')
<!--greeting section -->

<div class="mb-3 pb-1 d-flex align-items-center flex-row">
    <div class="flex-grow-1">
        <h4 class="fs-16 mb-1">Create User</h4>
        <p class="text-muted mb-0">Note: Please create User.</p>
    </div>
</div>


<form id="mainForm" action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
<div class="card" id="formForm">
    <div class="card-header d-flex flex-row justify-content-between align-items-center">
        <h5 class="card-title mb-0">User</h5>
        <a class="btn btn-info" onclick="history.back(); return false;">
                <i class="ri-arrow-left-line"></i> Back
            </a>
    </div>
    
    <div class="card-body">
        <div class="live-preview">
        
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name<span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Name" id="name">
                            @error('name')
                                <span class="text-danger ms-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address<span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email Address" id="email">
                            @error('email')
                                <span class="text-danger ms-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control" placeholder="Password" id="password">
                            @error('password')
                                <span class="text-danger ms-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password<span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" id="password_confirmation">
                            @error('c_password')
                                <span class="text-danger ms-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="mb-3">
                            <label for="organization_id" class="form-label">Organization</label>
                            <select id="organization_id" name="organization_id" class="form-select" data-choices
                                data-choices-sorting="true">
                                <option selected>Choose Organization</option>
                                @foreach($organizations as $organization)
                                <option value="{{$organization->id}}">{{$organization->name}}</option>
                                @endforeach
                            </select>
                            @error('organization_id')
                                <span class="text-danger ms-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div> --}}

                    
                    <!--end col-->
                    {{-- <div class="btn-submit-container">
                        <button type="submit" class="btn btn-blue btn-submit">Submit</button>
                    </div> --}}

                    <!--end col-->
                </div>
                <!--end row-->
        
        </div>
    </div>
    <div class="loader-container">
        <div class="dot-spinner">
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
            <div class="dot-spinner__dot"></div>
        </div>
    </div>
</div>
<div class="card" id="formForm">
    <div class="card-header d-flex flex-row justify-content-between align-items-center">
        <h5 class="card-title mb-0">Assign Role</h5>

    </div>
    
    <div class="card-body">
        <div class="tab-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="role" class="form-label">Role<span class="text-danger">*</span></label>
                            <select id="role" name="role_id" class="form-select" data-choices
                                data-choices-sorting="true">
                                <option selected>Choose Role</option>
                                @foreach($roles as $role)
                                <option value="{{$role->id}}" data-rolename="{{$role->name}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            @error('role')
                                <span class="text-danger ms-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
{{-- <div class="card" id="formUserType" style="display:none;">
    <div class="card-header d-flex flex-row justify-content-between align-items-center">
        <h5 class="card-title mb-0">Choose <span class="title_level"></span></h5>

    </div>
    
    <div class="card-body">
        <div class="tab-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3" id="field_level">
                            <label for="field_dropdown" class="form-label title_level"><span class="text-danger">*</span></label>
                            <select id="field_dropdown" class="form-select" data-choices
                                data-choices-sorting="true">
                                {{-- <option selected>Choose Role</option>
                                @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach --}}
                            {{-- </select>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div> --}}

<div class="card" id="formUserOrganizationLevel">

</div>

<div class="card" id="formUserBranchLevel">

</div>

<div class="card" id="formUserSurveyLevel">
</div>

<div class="btn-submit-container">
    <button type="submit" class="btn btn-blue btn-submit">Submit</button>
</div>
</form>
{{-- --}}
@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- apexcharts -->
<script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/apexcharts-pie.init.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/dashboard-crm.init.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/apexcharts-radar.init.js') }}"></script>

<script src="{{ URL::asset('build/js/app.js') }}"></script>
<script src="{{ URL::asset('build/libs/@simonwep/pickr/pickr.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/form-pickers.init.js') }}"></script>


<!-- Flatpickr JS -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
$(document).ready(function(){
    
    // $('#role').change(function(){
    //     var roleVal = $('#role option:selected').data('rolename');
    //     $('#formUserType').show();
    //     if(roleVal == "organization"){
    //         $('.title_level').text('Organization'); 
    //         $.ajax({
    //             url: "{{ route('organization.get') }}",
    //             method: 'GET',
    //             success: function(response) {
    //                 console.log(response);
    //                 $('#field_dropdown').html('');
    //                 $('#field_dropdown').append('<option selected>Choose Organization</option>');
    //                 response.organizations.forEach(function(organizationItem) {
    //                     var option = new Option(organizationItem.name, organizationItem.id);
    //                     $('#field_dropdown').append(option);

    //                     // if (organization && organization == organizationItem.id) {
    //                     //     $(option).prop('selected', true);
    //                     // }
    //                 })
    //             },
    //             error: function(xhr, status, error) {
    //                 $('#field_dropdown').prop('disabled', true);
    //                 $('#field_dropdown').html('');
    //                 $('#field_dropdown').append('<option selected>Choose Organization</option>');
    //             }
    //         })
    //     }
    // });
    
    $('#formUserOrganizationLevel').hide();
    $('#formUserBranchLevel').hide();
    $('#formUserSurveyLevel').hide();

    $('#role').change(function(){
        var roleVal = $('#role option:selected').data('rolename');
        
        $('#formUserOrganizationLevel').html('');
        $('#formUserBranchLevel').html('');
        $('#formUserSurveyLevel').html('');
        
        $('#formUserOrganizationLevel').hide();
        $('#formUserBranchLevel').hide();
        $('#formUserSurveyLevel').hide();

        if(roleVal == "organization"){
            $('#formUserOrganizationLevel').html(`
                <div class="card-header d-flex flex-row justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Choose Organization</h5>

                </div>
                
                <div class="card-body">
                    <div class="tab-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3" id="field_level">
                                        <label for="organization" class="form-label title_level">Organization<span class="text-danger">*</span></label>
                                        <select id="organization" name="organization_id" class="form-select" data-choices
                                            data-choices-sorting="true">
                                            <option value="" selected>Choose Organization</option>
                                            @foreach ($organizations as $organization)
                                            <option value="{{ $organization->id }}">
                                                {{ $organization->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            `);

            $('#formUserOrganizationLevel').show();
        }else if(roleVal == "branch"){
            $('#formUserBranchLevel').html(`
                    <div class="card-header d-flex flex-row justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Choose Branch</h5>

                    </div>
                    
                    <div class="card-body">
                        <div class="tab-content">
                                <div class="row">
                                    <div class="col-md-6">
                                         @if(auth()->user()->role->name == "organization")
                                        <div class="mb-3">
                                            <label for="organization" class="form-label title_level">Organization<span class="text-danger">*</span></label>
                                            <input type="text" value="{{auth()->user()->organization->name}}" class="form-control" readonly>
                                            <input type="hidden" name="organization_id" value="{{auth()->user()->organization->id}}" class="form-control" id="organization">
                                        </div>
                                        @else
                                        <div class="mb-3">
                                            <label for="organization" class="form-label title_level">Organization<span class="text-danger">*</span></label>
                                            <select id="organization" name="organization_id" class="form-select" data-choices
                                                data-choices-sorting="true">
                                                <option value="" selected>Choose Organization</option>
                                                @foreach ($organizations as $organization)
                                                <option value="{{ $organization->id }}">
                                                    {{ $organization->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="branch" class="form-label title_level">Division<span class="text-danger">*</span></label>
                                            <select id="branch" name="branch_id[]" class="form-select select2" data-choices
                                                data-choices-sorting="true" multiple disabled>
                                                <option value="" selected>Choose Branch</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
            `);
            $('#formUserBranchLevel').show();
        }
        if(roleVal == "survey"){
            $('#formUserSurveyLevel').html(`
                    <div class="card-header d-flex flex-row justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Choose Survey</h5>

                    </div>
                    
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="row">
                                <div class="col-md-4">
                                    @if(auth()->user()->role->name == "organization")
                                    <div class="mb-3">
                                        <label for="organization" class="form-label title_level">Organization<span class="text-danger">*</span></label>
                                        <input type="text" value="{{auth()->user()->organization->name}}" class="form-control" readonly>
                                        <input type="hidden" name="organization_id" value="{{auth()->user()->organization->id}}" class="form-control" id="organization">
                                    </div>
                                    @else
                                    <div class="mb-3">
                                        <label for="organization" class="form-label title_level">Organization<span class="text-danger">*</span></label>
                                        <select id="organization" name="organization_id" class="form-select" data-choices
                                            data-choices-sorting="true">
                                            <option value="" selected>Choose Organization</option>
                                            @foreach ($organizations as $organization)
                                            <option value="{{ $organization->id }}">
                                                {{ $organization->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="branch" class="form-label title_level">Division</label>
                                        <select id="branch" name="branch_id" class="form-select" data-choices
                                            data-choices-sorting="true" disabled>
                                            <option value="" selected>Choose Branch</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="survey" class="form-label title_level">Survey<span class="text-danger">*</span></label>
                                        <select id="survey" name="form_id" class="form-select" data-choices
                                            data-choices-sorting="true" disabled>
                                            <option value="" selected>Choose Survey</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`);
            $('#formUserSurveyLevel').show();
        }

        var roleVal = $('#role option:selected').data('rolename');

        filterBranch();

        if(roleVal == 'survey'){
            filterSurvey();
        }
    });

    

    $(document).on('change','#organization',function() {
        var roleVal = $('#role option:selected').data('rolename');

        filterBranch();

        if(roleVal == 'survey'){
            filterSurvey();
        }
    });

    $(document).on('change','#branch',function() {
        filterSurvey();
    });


    function filterBranch() {
        var organizationVal = $('#organization').val();
        console.log(organizationVal);

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
        var branchVal = $('#branch').val() ;

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
  
    
    
});
</script>
@endsection
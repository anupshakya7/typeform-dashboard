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

<div class="card" id="formForm">
    <div class="card-header align-items-center d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0">Update Survey</h5>
        <a class="btn btn-info" onclick="history.back(); return false;">
                <i class="ri-arrow-left-line"></i> Back
            </a>
    </div><!-- end card header -->
    <div class="card-body">
        <div class="live-preview">
            <form id="mainForm" action="{{route('form.update',$form)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formId" class="form-label">Survey Id<span class="text-danger">*</span></label>
                            <input type="text" name="formId" value="{{old('formId',$form->form_id)}}" class="form-control" placeholder="Form Id" id="formId"
                                readonly>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="form_name" class="form-label">Survey Name<span class="text-danger">*</span></label>
                            <input type="text" name="form_name" value="{{old('form_name',$form->form_title)}}" class="form-control" placeholder="Form Name"
                                id="form_name">
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="country" class="form-label">Country<span class="text-danger">*</span></label>

                            <select id="country" name="country" class="form-select select2" data-choices
                                data-choices-sorting="true">
                                <option selected>Choose Country</option>
                                @foreach ($countries as $country)
                                <option value="{{$country['name']}}" {{$form->country == $country['name'] ? 'selected':''}}>{{$country['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="organization" class="form-label">Organization<span class="text-danger">*</span></label>
                            <select id="organization" name="organization" class="form-select select2" data-choices
                                data-choices-sorting="true">
                                <option value="" selected>Choose Organization</option>
                                @foreach($organizations as $organization)
                                <option value="{{$organization->id}}" {{$organization->id == $form->organization_id ? 'selected':''}}>{{$organization->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-12" id="setBranchDiv">
                        <div class="my-3">
                            <label for="setBranch" class="form-label">Would you like to set this form to the branch of this organization?</label>
                            <input type="checkbox" {{$form->branch_id ? 'checked':''}} class="ms-2" id="setBranch"/>
                        </div>
                    </div>
                    @if($form->branch_id)
                    <div class="col-md-6" id="branchDiv">
                        <div class="mb-3">
                            <label for="branch" class="form-label">Branch</label>
                            @php
                                $organization_id = $form->branches->organization->id;
                                $branches = \App\Models\Branch::where('organization_id',$organization_id)->get();
                            @endphp
                            <select id="branch" name="branch" class="form-select select2" data-choices
                                data-choices-sorting="true">
                                <option value="" selected>Choose Branch</option>
                                {{-- @foreach($branches as $branch)
                                <option value="{{$branch->id}}" {{$branch->id == $form->branch_id ? 'selected':''}}>{{$branch->name}}</option>
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    @else
                    <div class="col-md-6" id="branchDiv" style="display: none">
                        <div class="mb-3">
                            <label for="branch" class="form-label">Branch</label>
                            <select id="branch" name="branch" class="form-select select2" data-choices
                                data-choices-sorting="true" disabled>
                                <option value="" selected>Choose Branch</option>
                            </select>
                        </div>
                    </div>
                    @endif
                    <!--end col-->
                    <div class="card-header align-items-center d-flex mb-3">
                        <h4 class="card-title mb-0 flex-grow-1">Survey Timeline</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <label class="form-label mb-0">Before Survey Date [From - To]<span class="text-danger">*</span></label>
                            <input type="text" name="beforedate" class="form-control mt-2" value="{{old('beforedate',$form->before)}}" data-provider="flatpickr"
                                data-date-format="d M, Y" data-range-date="true" placeholder="Pick before date range">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <label class="form-label mb-0">During Survey Date [From - To] </label>
                            <input type="text" name="duringdate" class="form-control mt-2" value="{{old('beforedate',$form->during)}}" data-provider="flatpickr"
                                data-date-format="d M, Y" data-range-date="true" placeholder="Pick during date range">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <label class="form-label mb-0">After Survey Date [From - To] </label>
                            <input type="text" name="afterdate" class="form-control mt-2" value="{{old('beforedate',$form->after)}}" data-provider="flatpickr"
                                data-date-format="d M, Y" data-range-date="true" placeholder="Pick after date range">
                        </div>
                    </div>
                    <div>
                        <p class="note-tag">Note: Please pick the starting and ending date for survey.</p>
                    </div>
                    <div class="btn-submit-container">

                        <button type="submit" class="btn btn-blue btn-submit">Submit</button>

                    </div>

                    <!--end col-->
                </div>
                <!--end row-->
            </form>
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
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Flatpickr
    flatpickr('[data-provider="flatpickr"]', {
        dateFormat: 'd M, Y',
        enableTime: false,
        mode: 'range',
    });
});
$(document).ready(function() {
    // $('#formSync').submit(function(e) {
    //     e.preventDefault();
    //     var formId = $('#form_id').val();
    //     var SyncIcon = $('#syncBtnIcon');
    //     SyncIcon.addClass("rotate");
    //     var url = "{{route('form.get')}}";
    //     var apiKey = @json(config('services.api.key'));
    //     var questions = [];

    //     $.ajax({
    //         url: url,
    //         type: 'GET',
    //         data: {
    //             form_id: formId
    //         },
    //         headers: {
    //             'Authorization': 'Bearer ' + apiKey
    //         },
    //         success: function(response) {
    //             $('#form_id').val(formId);
    //             $('#form_id').prop('readonly', true);
    //             $('#formForm').css('display', 'flex');
    //             $('#formIdMessage').removeClass('text-danger');
    //             $('#formIdMessage').addClass('text-success');
    //             $('#formIdMessage').text('Form Sync Successfully!!!');
    //             $('#formIdMessage').css('display', 'flex');

    //             $('#formId').val(formId);
    //             $('#form_name').val(response.data.title);

    //             const filteredQuestions = response.data.fields.filter(item => item.type !==
    //                 'statement');

    //             filteredQuestions.forEach(function(question) {
    //                 var questionInput = $('<input>')
    //                     .attr('type', 'hidden')
    //                     .attr('name', 'questions[]')
    //                     .val(question.title)

    //                 $('#mainForm').append(questionInput);
    //             });
    //             SyncIcon.removeClass("rotate");
    //         },
    //         error: function(xhr, status, error) {
    //             $('#form_id').val('');
    //             $('#formForm').css('display', 'none');

    //             $('#formIdMessage').removeClass('text-success');
    //             $('#formIdMessage').addClass('text-danger');

    //             $('#formIdMessage').text(xhr.responseJSON.message);
    //             $('#formIdMessage').css('display', 'flex');
    //             SyncIcon.removeClass("rotate");
    //             // toastr.error('The form with this ID was not found.', 'Error', {
    //             //     closeButton: true, 
    //             //     progressBar: true, 
    //             //     timeOut: 5000
    //             // });
    //         }
    //     })
    // })
    // var countryVal = $('#country').val();
    // // var organizationVal = $('#organization').val();

    // if (countryVal !== '') {
    //     organization(countryVal);
    // }
    
    var organizationVals = @json($form->organization->id);

    if (organizationVals !== '') {
        $('#setBranchDiv').css('display','block');

        if($('#setBranch').prop('checked')){
            $('#branchDiv').css('display','block');
            branch(organizationVals)
        }else{
            $('#branchDiv').css('display','none');
            $('#branch').val('');
        }
        
    }else{
        $('#setBranchDiv').css('display','none');
        $('#branch').prop('disabled', true);
        $('#branch').html('');
        $('#branch').append('<option value="" selected>Choose Branch</option>');
    }


    // $('#country').change(function() {
    //     var countryVal = $('#country').val();

    //     if (countryVal !== '') {
    //         organization(countryVal);
    //         handleBranch();
    //     }
    // });

    $('#organization,#setBranch').change(function() {
       handleBranch();
    });

    function handleBranch(){
        var organizationVal = $('#organization').val();
        console.log(organizationVal);
        if (organizationVal !== '') {
        $('#setBranchDiv').css('display','block');

        if($('#setBranch').prop('checked')){
                $('#branchDiv').css('display','block');
                branch(organizationVal)
        }else{
                $('#branchDiv').css('display','none');
                $('#branch').val('');
        }
        
        }else{
            $('#setBranch').prop('checked',false);
            $('#setBranchDiv').css('display','none');
            $('#branchDiv').css('display','none');
            branch(organizationVal);
        }
    }

    // function organization(countryVal){
    //     $.ajax({
    //             url: "{{route('organization.get')}}",
    //             method: 'GET',
    //             data: {
    //                 country: countryVal
    //             },
    //             success: function(response) {
    //                 console.log(response);
    //                 $('#organization').prop('disabled', false);
    //                 $('#organization').html('');
    //                 $('#organization').append('<option value="" selected>Choose Organization</option>');
    //                 var selectedItem = @json($form->organization->id);
    //                 response.organizations.forEach(function(organization) {
    //                     // $('#organization').append(new Option(organization.name, organization.id));
    //                     var option = new Option(organization.name,organization.id);
                        
    //                     $('#organization').append(option);

    //                     if(selectedItem && selectedItem == organization.id){
    //                         $(option).prop('selected',true);
    //                     }
    //                 })
    //             },
    //             error: function(xhr, status, error) {
    //                 $('#organization').prop('disabled', true);
    //                 $('#organization').html('');
    //                 $('#organization').append('<option value="" selected>Choose Organization</option>');
    //             }
    //         })
    // }

    function branch(organizationVal){
        if(organizationVal){
            $.ajax({
                url: "{{route('branch.get')}}",
                method: 'GET',
                data: {
                    organization_id: organizationVal
                },
                success: function(response) {
                    $('#branch').prop('disabled', false);
                    $('#branch').html('');
                    $('#branch').append('<option value="" selected>Choose Branch</option>');

                    @php
                        $selectedBranchId = $form->branches !== null ? json_encode($form->branches->id) : 'null';
                    @endphp

                    
                    var selectedItem = {!! $selectedBranchId !!};
                    response.branches.forEach(function(branch) {
                        // $('#organization').append(new Option(organization.name, organization.id));
                        var option = new Option(branch.name,branch.id);
                        
                        $('#branch').append(option);

                        if(selectedItem && selectedItem == branch.id){
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
        }else{
            $('#branch').prop('disabled', true);
            $('#branch').html('');
            $('#branch').append('<option value="" selected>Choose Branch</option>');
        }
        
    }

    // $('#country').change(function(){
    //     const countryVal = $(this).val();
    //     countryVal ? organization(countryVal);
    // });

    // function organization(countryVal){
    //     $.ajax({
    //         url:"{{route('organization.get')}}",
    //         method:'GET',
    //         data:{
    //             country:countryVal
    //         },
    //         success:function(response){
    //             console.log('Organizations: ',response);
    //             populateBranchSelect(response.organizations);
    //         },
    //         error: function(xhr){
    //             console.log('Organization Error:',xhr.responseText);
    //             resetOrganization();
    //         }
    //     })
    // }

    // function branch(organizationVal){
    //     $.ajax({
    //         url:"{{route('branch.get')}}",
    //         method:'GET',
    //         data:{organization_id:organizationVal},
    //         success:function(response){
    //             console.log('Branches: ',response);
    //             populateBranchSelect(response.branches);
    //         },
    //         error:function(xhr){
    //             console.log('Branch Error: ',xhr.responseText);
    //             resetBranch();
    //         }
    //     })
    // }

    // function populateOrganizationSelect(organizations){
    //     const select = $('#organization').prop('disabled',false).html('');
    //     select.append('<option value="">Choose Organization</option>');
        
    //     organizations.forEach(org=>{
    //         const option = new Option(org.name,org.id);
    //         const selectedItems = @json($form->organization->id ?? null);
    //         if(selectedItems && selectedItems == org.id) option.selected == true;
    //         select.append(option);
    //     }); 
    // }

    // function handleOrganizationChange(organizationVal){
    //     if(organizationVal){
    //         $('#setBranchDiv').show();
        
    //     }else{
    //         $('#setBranchDiv').hide();
    //         $('#branchDiv').hide().find('#branch').val('');
    //     }
    // }

    // function handleBranchToggle(organizationVal){
    //     if($('#setBranch').prop('checked')){
    //         $('#branchDiv').show();
    //         branch(organizationVal);
    //     }else{
    //         $('#branchDiv').hide().find('#branch').val('');
    //     }
    // }

    // function populateBranchSelect($branches){
    //     const select = $('#branch').prop('disabled',false).html('');
    //     select.append('<option value="">Choose Branch</option>');
    //     branches.forEach(br=>select.append(new Option(br.name,br.id)));
    // }

    // function resetOrganization(){
    //     $('#organization').prop('disabled',true)
    //         .html('<option value="">Choose Organization</option>');
    //     $('#setBranchDiv','#branchDiv').hide();
    //     resetBranch();
    // }

    // function resetBranch(){
    //     $('#branch').prop('disabled',true)
    //         .html('<option value="">Choose Branch</option>');
    // }

})
</script>
@endsection
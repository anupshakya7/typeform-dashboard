@extends('typeform.layout.web')
@section('title') @lang('translation.crm') @endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ URL::asset('build/libs/@simonwep/pickr/themes/classic.min.css') }}" /> <!-- 'classic' theme -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/@simonwep/pickr/themes/monolith.min.css') }}" /> <!-- 'monolith' theme -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/@simonwep/pickr/themes/nano.min.css') }}" /> <!-- 'nano' theme -->
@endsection
@section('content')
<div class="card">
    <div class="card-header align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">Form Sync</h4>
    </div><!-- end card header -->

    <div class="card-body">
        <div class="live-preview">
            <form id="formSync">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="form_id" class="form-label">Form Id</label>
                            <input type="text" class="form-control" placeholder="Form Id"
                                id="form_id">
                            <span class="ms-1" id="formIdMessage" style="display:none;margin-top:5px;"></span>
                        </div>
                    </div><!--end col-->
                    <div class="col-lg-12">
                        <div class="text-end">
                            <button type="submit" id="syncFormBtn" class="btn btn-primary">Sync</button>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </form>
        </div>
    </div>
</div>

<div class="card" id="formForm" style="display:none;">
    <div class="card-header align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">Form</h4>
    </div><!-- end card header -->

    <div class="card-body">
        <div class="live-preview">
            <form id="mainForm" action="{{route('form.store')}}" method="POST">
                @csrf
                <div class="row">
                <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formId" class="form-label">Form Id</label>
                            <input type="text" name="formId" class="form-control" placeholder="Form Id"
                                id="formId" readonly>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="form_name" class="form-label">Form Name</label>
                            <input type="text" name="form_name" class="form-control" placeholder="Form Name"
                                id="form_name">
                        </div>
                    </div><!--end col-->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <select id="country" name="country" class="form-select" data-choices
                                data-choices-sorting="true">
                                <option selected>Choose Country</option>
                                <option value="Nepal">Nepal</option>
                                <option value="UK">UK</option>
                                <option value="Australia">Australia</option>
                            </select>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="organization" class="form-label">Organization</label>
                            <select id="organization" name="organization" class="form-select" data-choices
                                data-choices-sorting="true">
                                <option selected>Choose Organization</option>
                                <option value="WorldVision">WorldVision</option>
                                <option value="ATI">ATI</option>
                            </select>
                        </div>
                    </div><!--end col-->
                    <div class="card-header align-items-center d-flex mb-3">
                        <h4 class="card-title mb-0 flex-grow-1">Form Timeline</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <label class="form-label mb-0">Before Date [From - To] </label>
                            <input type="date" name="beforedate" class="form-control mt-2" data-provider="flatpickr"
                                data-date-format="d M, Y" data-range-date="true" placeholder="Before Date [From - To]">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <label class="form-label mb-0">During Date [From - To] </label>
                            <input type="date" name="duringdate" class="form-control mt-2" data-provider="flatpickr"
                                data-date-format="d M, Y" data-range-date="true" placeholder="Before Date [From - To]">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mt-3">
                            <label class="form-label mb-0">After Date [From - To] </label>
                            <input type="date" name="afterdate" class="form-control mt-2" data-provider="flatpickr"
                                data-date-format="d M, Y" data-range-date="true" placeholder="Before Date [From - To]">
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </form> 
        </div>
    </div>
</div>

{{-- --}}
@endsection


@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- apexcharts -->
<script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/apexcharts-pie.init.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/dashboard-crm.init.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/apexcharts-radar.init.js') }}"></script>

{{-- <script src="{{ URL::asset('build/js/app.js') }}"></script> --}}
<script src="{{ URL::asset('build/libs/@simonwep/pickr/pickr.min.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/form-pickers.init.js') }}"></script>

<script>
    $(document).ready(function(){
       

        $('#formSync').submit(function(e){
            e.preventDefault();
            var formId = $('#form_id').val();
            var url = "{{route('form.get')}}";
            var apiKey = @json(config('services.api.key')) ;
            var questions = [];

            $.ajax({
                url:url,
                type:'GET',
                data:{
                    form_id:formId
                },
                headers:{
                    'Authorization':'Bearer '+apiKey
                },
                success:function(response){
                    $('#form_id').val(formId);
                    $('#form_id').prop('readonly',true);
                    $('#formForm').css('display','flex');
                    $('#formIdMessage').removeClass('text-danger');
                    $('#formIdMessage').addClass('text-success');
                    $('#formIdMessage').text('Form Sync Successfully!!!');
                    $('#formIdMessage').css('display','flex');

                    $('#formId').val(formId);
                    $('#form_name').val(response.data.title);

                    response.data.fields.forEach(function(question){
                        var questionInput = $('<input>')
                            .attr('type','hidden')
                            .attr('name','questions[]')
                            .val(question.title)

                        $('#mainForm').append(questionInput);
                    })
                },
                error:function(xhr,status,error){
                    $('#form_id').val('');
                    $('#formForm').css('display','none');

                    $('#formIdMessage').removeClass('text-success');
                    $('#formIdMessage').addClass('text-danger');
                    
                    $('#formIdMessage').text(xhr.responseJSON.message);
                    $('#formIdMessage').css('display','flex');

                    // toastr.error('The form with this ID was not found.', 'Error', {
                    //     closeButton: true, 
                    //     progressBar: true, 
                    //     timeOut: 5000
                    // });
                }
            })
        })
    })
</script>
@endsection
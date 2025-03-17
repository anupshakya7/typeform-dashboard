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
        <h4 class="fs-16 mb-1">Create Organization</h4>
        <p class="text-muted mb-0">Note: Please create Organization.</p>
    </div>
</div>


<div class="card" id="formForm">
    <div class="card-header d-flex flex-row justify-content-between align-items-center">
        <h5 class="card-title mb-0">Organization</h5>
        <a class="btn btn-info" onclick="history.back(); return false;">
                <i class="ri-arrow-left-line"></i> Back
            </a>
    </div>
    <div class="card-body">
        <div class="live-preview">
            <form id="mainForm" action="{{route('organization.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" class="form-control" placeholder="Name" id="name">
                            @error('name')
                                <span class="text-danger ms-1">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" class="form-control" name="logo" id="logo" onchange="getImagePreview(event,'logo_image')">
                            @error('logo')
                                <span class="text-danger ms-1">{{$message}}</span>
                            @enderror
                            <div id="logo_image"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="country" class="form-label">Country <span class="text-danger">*</span></label>

                            <select id="country" name="country" class="form-select select2" data-choices
                                data-choices-sorting="true">
                                <option selected>Choose Country</option>
                                @foreach ($countries as $country)
                                <option value="{{$country['name']}}">{{$country['name']}}</option>
                                @endforeach
                            </select>
                            @error('country')
                                <span class="text-danger ms-1">{{$message}}</span>
                            @enderror
                        </div>
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
function getImagePreview(event,divId){
    var image = URL.createObjectURL(event.target.files[0]);
    var imageDiv = document.getElementById(divId);

    imageDiv.innerHTML = '';

    var imageTag = document.createElement('img');
    imageTag.src = image;
    imageTag.width = "100";
    imageTag.style.padding = "5px";
    imageDiv.appendChild(imageTag);
}
</script>
@endsection
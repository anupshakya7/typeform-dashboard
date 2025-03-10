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
        <h4 class="fs-16 mb-1">Organization Details</h4>
        <p class="text-muted mb-0">View organization details, including structure, contacts, departments, and roles.</p>
    </div>
</div>

<!--greeting section -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between align-items-center">
                <h5 class="card-title mb-0">Organization</h5>
                <a class="btn btn-info" onclick="history.back(); return false;">
                        <i class="ri-arrow-left-line"></i> Back
                    </a>
            </div>

            <div class="card-body">
                <div class="mb-2">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{$organization->id}}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{$organization->name}}</td>
                            </tr>
                            <tr>
                                <th>Logo</th>
                                <td>
                                    @if($organization->logo)
                                    <img src="{{asset('storage/'.$organization->logo)}}" width="80" alt="Logo">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{$organization->country}}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{Carbon\Carbon::parse($organization->created_at)->format('d M, Y')}}</td>
                            </tr>
                        </tbody>
                    </table>
                    

                </div>

                <nav class="mb-3">
                    <div class="nav nav-tabs">

                    </div>
                </nav>
                <div class="tab-content">

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
function getImagePreview(event, divId) {
    var image = URL.createObjectURL(event.target.files[0]);
    var imageDiv = document.getElementById(divId);

    imageDiv.innerHTML = '';

    var imageTag = document.createElement('img');
    imageTag.src = image;
    imageTag.width = "150";
    imageTag.style.padding = "5px";
    imageDiv.appendChild(imageTag);
}
</script>
@endsection
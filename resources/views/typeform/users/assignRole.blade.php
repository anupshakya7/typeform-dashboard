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
        <h4 class="fs-16 mb-1">User Details</h4>
        <p class="text-muted mb-0">View user details, including organization and role.</p>
    </div>
</div>

<!--greeting section -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between align-items-center">
                <h5 class="card-title mb-0">User</h5>
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
                                <td>{{$user->id}}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{$user->name}}</td>
                            </tr>
                        </tbody>
                    </table>
                    

                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between align-items-center">
                <h5 class="card-title mb-0">Assign User Role</h5>
            </div>

            <div class="card-body">
                <div class="tab-content mt-4">
                    <form action="{{route('user.assignRole.submit',$user)}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role<span class="text-danger">*</span></label>
                                    <select id="role" name="role" class="form-select" data-choices
                                        data-choices-sorting="true">
                                        <option selected>Choose Role</option>
                                        @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{$role->id == $user->role_id ? 'selected':''}}>{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <span class="text-danger ms-1">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex flex-row justify-content-between align-items-center">
                                <div></div>
                                <button type="submit" class="btn btn-info">
                                       Assign Role
                                </button>
                            </div>
                        </div>
                    </form>
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
@endsection
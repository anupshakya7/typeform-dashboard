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
        <h4 class="fs-16 mb-1">Survey QA Details</h4>
        <p class="text-muted mb-0">View survey QA details, including structure, contacts, departments, and roles.</p>
    </div>
</div>

<!--greeting section -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between align-items-center">
                <h5 class="card-title mb-0">Survey QA</h5>
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
                                <td>{{$answer->id}}</td>
                            </tr>
                            <tr>
                                <th>Form</th>
                                <td>{{$answer->form ? optional($answer->form)->form_title : 'Form Not Sync Yet'}}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{$answer->name}}</td>
                            </tr>
                            <tr>
                                <th>{{$answer->form->question->well_functioning_government}}</th>
                                <td>{{$answer->well_functioning_government}}</td>
                            </tr>
                            <tr>
                                <th>{{$answer->form->question->low_level_corruption}}</th>
                                <td>{{$answer->low_level_corruption}}</td>
                            </tr>
                            <tr>
                                <th>{{$answer->form->question->equitable_distribution}}</th>
                                <td>{{$answer->equitable_distribution}}</td>
                            </tr>
                            <tr>
                                <th>{{$answer->form->question->good_relations}}</th>
                                <td>{{$answer->good_relations}}</td>
                            </tr>
                            <tr>
                                <th>{{$answer->form->question->free_flow}}</th>
                                <td>{{$answer->free_flow}}</td>
                            </tr>
                            <tr>
                                <th>{{$answer->form->question->high_levels}}</th>
                                <td>{{$answer->high_levels}}</td>
                            </tr>
                            <tr>
                                <th>{{$answer->form->question->sound_business}}</th>
                                <td>{{$answer->sound_business}}</td>
                            </tr>
                            <tr>
                                <th>{{$answer->form->question->acceptance_rights}}</th>
                                <td>{{$answer->acceptance_rights}}</td>
                            </tr>
                            <tr>
                                <th>{{$answer->form->question->positive_peace}}</th>
                                <td>{{$answer->positive_peace}}</td>
                            </tr>
                            <tr>
                                <th>{{$answer->form->question->negative_peace}}</th>
                                <td>{{$answer->negative_peace}}</td>
                            </tr>
                            @if($answer->extra_ans1)
                            <tr>
                                <th>{{$answer->form->question->extra_ques1}}</th>
                                <td>{{$answer->extra_ans1}}</td>
                            </tr>
                            @endif
                            @if($answer->extra_ans2)
                            <tr>
                                <th>{{$answer->form->question->extra_ques2}}</th>
                                <td>{{$answer->extra_ans2}}</td>
                            </tr>
                            @endif
                            @if($answer->extra_ans3)
                            <tr>
                                <th>{{$answer->form->question->extra_ques3}}</th>
                                <td>{{$answer->extra_ans3}}</td>
                            </tr>
                            @endif
                            <tr>
                                <th>Created At</th>
                                <td>{{Carbon\Carbon::parse($answer->created_at)->format('d M, Y')}}</td>
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
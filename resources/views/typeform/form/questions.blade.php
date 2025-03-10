@extends('typeform.layout.web')
@section('title')
    @lang('translation.crm')
@endsection

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
            <h4 class="fs-16 mb-1">Form Questions Details</h4>
            <p class="text-muted mb-0">View form details, including pillar questions, and extra questions.</p>
        </div>
    </div>

    <!--greeting section -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex flex-row justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Form Questions</h5>
                    <a class="btn btn-info" onclick="history.back(); return false;">
                        <i class="ri-arrow-left-line"></i> Back
                    </a>
                </div>

                <div class="card-body">
                    <div class="mb-2">
                        <div>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $form->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Form Name</th>
                                        <td>{{ $form->form_title }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-top: 35px;">
                            <h5 class="ms-1">Pillar Questions</h5>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th>Well-Functioning Government</th>
                                        <td>{{ $form->question->well_functioning_government }}</td>
                                    </tr>
                                    <tr>
                                        <th>Low Levels of Corruption</th>
                                        <td>{{ $form->question->low_level_corruption }}</td>
                                    </tr>
                                    <tr>
                                        <th>Equitable Distribution of Resources</th>
                                        <td>{{ $form->question->equitable_distribution }}</td>
                                    </tr>
                                    <tr>
                                        <th>Good Relations with Neighbours</th>
                                        <td>{{ $form->question->good_relations }}</td>
                                    </tr>
                                    <tr>
                                        <th>Free Flow of Information</th>
                                        <td>{{ $form->question->free_flow }}</td>
                                    </tr>
                                    <tr>
                                        <th>High Levels of Human Capital</th>
                                        <td>{{ $form->question->high_levels }}</td>
                                    </tr>
                                    <tr>
                                        <th>Sound Business Environment</th>
                                        <td>{{ $form->question->sound_business }}</td>
                                    </tr>
                                    <tr>
                                        <th>Acceptance of the Rights of Others</th>
                                        <td>{{ $form->question->acceptance_rights }}</td>
                                    </tr>
                                    <tr>
                                        <th>Positive Peace</th>
                                        <td>{{ $form->question->positive_peace }}</td>
                                    </tr>
                                    <tr>
                                        <th>Negative Peace</th>
                                        <td>{{ $form->question->negative_peace }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="margin-top: 35px;">
                            <h5 class="ms-1">Extra Questions</h5>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    @if($form->question->extra_ques1 || $form->question->extra_ques2 || $form->question->extra_ques3)
                                    @if($form->question->extra_ques1)
                                    <tr>
                                        <th>Extra Question 1</th>
                                        <td>{{ $form->question->extra_ques1 }}</td>
                                    </tr>
                                    @endif
                                    @if($form->question->extra_ques2)
                                    <tr>
                                        <th>Extra Question 2</th>
                                        <td>{{ $form->question->extra_ques2 }}</td>
                                    </tr>
                                    @endif
                                    @if($form->question->extra_ques3)
                                    <tr>
                                        <th>Extra Question 3</th>
                                        <td>{{ $form->question->extra_ques3 }}</td>
                                    </tr>
                                    @endif
                                    @else
                                    <tr>
                                        <td>No Extra Questions</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
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

@extends('typeform.layout.web')
@section('title')
    @lang('translation.crm')
@endsection
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
            <h4 class="fs-16 mb-1">Permission Management</h4>
        </div>
    </div>

    <!--end greeting section-->
    <!--form section top -->
    <div class="form-top-bar mb-4">
        <div class="d-flex align-items-center justify-content-between">
            <div class="flex-shrink-0">
                <div class="d-flex gap-1 flex-wrap">

                    <a href="{{ route('permission.create') }}" class="btn btn-info add-btn"><i
                            class="ri-add-line align-bottom me-1"></i> Create
                        Permission</a>
                </div>
            </div>
            <div class="flex-shrink-0">
                <div class="d-flex flex-row gap-2 align-items-center">
                    <!--info here-->
                    {{-- <a class="icon-frame" href="#" class="m-0 p-0 d-flex justify-content-center align-items-center"
                        data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas"
                        aria-controls="theme-settings-offcanvas">
                        <img class="svg-icon" type="image/svg+xml" src="{{ URL::asset('build/icons/info.svg') }}"></img>
                    </a> --}}
                </div>
            </div>
        </div>
    </div>

    <!--form section starts here -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Permission Lists</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="scroll-horizontal" class="table nowrap align-middle table-bordered " style="width:100%">
                            <thead class="table-head">
                                <tr>
                                    <th>S.No.</th>
                                    <th>Name</th>
                                    <th>Route</th>
                                    <th>Authorize</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $key => $permission)
                                    <tr>
                                        <td>{{ $permission->serial_no }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            @foreach($permission->routes as $route)
                                                <span class="authorize-batch">{{$route->route}}</span>
                                            @endforeach
                                        </td>
                                        <td><a href="{{ route('permission.assignRoute',$permission) }}"
                                            class="role-batch permission-assign"><i class='bx bxs-user-check'></i>
                                            Assign Route</a></td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a href="{{ route('permission.show', $permission) }}"
                                                            class="dropdown-item"><i
                                                                class="ri-eye-fill align-bottom me-2 text-muted"></i>
                                                            View</a>
                                                    </li>
                                                    <li><a href="{{route('permission.edit',$permission)}}" class="dropdown-item edit-item-btn"><i
                                                                class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit</a>
                                                    </li>
                                                    <li>
                                                        <button class="dropdown-item remove-item-btn"
                                                            data-item-id="{{ $permission->id }}"
                                                            data-item-name="{{ $permission->name }}" data-bs-toggle="modal"
                                                            data-bs-target="#zoomInModal">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!--tfooter section-->
                    @include('typeform.partials.pagination', ['paginator' => $permissions])
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--form section ends here-->
    </div>
    </div>

    </div>
    <!--end col-->
    </div>
    <!--end row-->
    <!--form section ends here-->

    <!-- Modal Blur -->
    @include('typeform.partials.deleteModal')

@endsection
@section('script')
    <!-- list.js min js -->
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>

    <!--list pagination js-->
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <!-- ecommerce-order init js -->
    <script src="{{ URL::asset('build/js/pages/job-application.init.js') }}"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>




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

    <script>
        document.querySelectorAll('.remove-item-btn').forEach(button => {
            button.addEventListener('click', function() {
                var itemId = this.getAttribute('data-item-id');
                var itemName = this.getAttribute('data-item-name');

                //Set the organization Id in the hidden input field
                document.getElementById('delete_item_id').value = itemId;

                //Set the organization name
                document.getElementById('delete_item').textContent = itemName;

                //Set Item Description
                document.getElementById('delete_item_description').innerHTML = 'Deleting this item will permanently remove it from the system.';

                var deleteForm = document.getElementById('deleteForm');
                
                var baseUrl = window.location.origin+window.location.pathname;
    
                deleteForm.action = baseUrl+ '/' + itemId;

            })
        })
    </script>
@endsection

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
        <h4 class="fs-16 mb-1">Form Management</h4>
        <p class="text-muted mb-0">Create and manage forms easily accessing the form information.</p>
    </div>
</div>

<!--end greeting section-->
<!--form section top -->
<div class="form-top-bar mb-4">
    <div class="d-flex align-items-center justify-content-between">
        <div class="flex-shrink-0">
            <div class="d-flex gap-1 flex-wrap">

                <a href="{{route('form.create')}}" class="btn btn-info add-btn"><i class="ri-add-line align-bottom me-1"></i> Create
                    Form</a>
            </div>
        </div>
        <div class="flex-shrink-0">
            <div class="d-flex flex-row gap-2 align-items-center">
                <!--info here-->
                <button type="button" class="btn btn-success"><i class="ri-file-download-line align-bottom me-1"></i>

                    Export</button>

                <a class="icon-frame" href="#" class="m-0 p-0 d-flex justify-content-center align-items-center">

                    <img class="svg-icon" type="image/svg+xml" src="{{ URL::asset('build/icons/download.svg')}}"></img>
                </a>
                <a class="icon-frame" href="#" class="m-0 p-0 d-flex justify-content-center align-items-center">

                    <img class="svg-icon" type="image/svg+xml" src="{{ URL::asset('build/icons/info.svg')}}"></img>

                </a>
            </div>
        </div>
    </div>
</div>

<!--form section starts here -->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Form Lists</h5>
            </div>
            <div class="card-body">
                <div class="d-flex flex-row align-items-center justify-content-between pb-3">
                    <div class="d-flex flex-row align-items-center gap-1"><span>Showing</span> <select
                            class="form-select" aria-label="Default select example">
                            <option selected>10</option>
                            <option value="1">20</option>
                            <option value="2">50</option>
                            <option value="3">100</option>
                        </select> <span>entries</span> </div>
                    <div class="row">
                        <div class="col-auto d-flex justify-content-sm-end">
                            <div class="search-box"> <input type="text" class="form-control" id="searchProductList"
                                    placeholder="Search"> <i class="ri-search-line search-icon"></i> </div>
                        </div>
                        <div class="col-auto"> <select class="form-select " aria-label="Default select example">
                                <option selected>Country </option>
                                <option value="1">Australia</option>
                                <option value="2">USA</option>
                                <option value="3">India</option>
                                <option value="4">Nepal</option>
                            </select> </div>
                        <div class="col-auto">
                            <div class="col-auto"> <select class="form-select" aria-label="Default select example">
                                    <option selected>Project</option>
                                    <option value="1">Project1</option>
                                    <option value="2">Project2</option>
                                    <option value="3">Project3</option>
                                </select> </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="scroll-horizontal" class="table nowrap align-middle table-bordered " style="width:100%">
                        <thead class="table-head">
                            <tr>
                                <th scope="col">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" id="checkAll"
                                            value="option">
                                    </div>
                                </th>
                                <th>Form Type ID</th>
                                <th>Form Name</th>
                                <th>Country</th>
                                <th>Organization</th>
                                <th>Before Survey</th>
                                <th>During Survey</th>
                                <th>After Survey</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                            value="option1">
                                    </div>
                                </th>
                                <td>F012</td>
                                <td>Governance</td>
                                <td>Australia</td>
                                <td>CSB</td>
                                <td>05 Mar, 2025 <span class="fw-bold">to</span> 06 Mar, 2025</td>
                                <td>05 Mar, 2025 <span class="fw-bold">to</span> 06 Mar, 2025</td>
                                <td>05 Mar, 2025 <span class="fw-bold">to</span> 06 Mar, 2025</td>

                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="#!" class="dropdown-item"><i
                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                            </li>
                                            <li><a class="dropdown-item edit-item-btn"><i
                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item remove-item-btn">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                            value="option1">
                                    </div>
                                </th>
                                <td>F012</td>
                                <td>Governance</td>
                                <td>Australia</td>
                                <td>CSB</td>
                                <td>05 Mar, 2025 <span class="fw-bold">to</span> 06 Mar, 2025</td>
                                <td>05 Mar, 2025 <span class="fw-bold">to</span> 06 Mar, 2025</td>
                                <td>05 Mar, 2025 <span class="fw-bold">to</span> 06 Mar, 2025</td>

                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="#!" class="dropdown-item"><i
                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                            </li>
                                            <li><a class="dropdown-item edit-item-btn"><i
                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item remove-item-btn">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                            value="option1">
                                    </div>
                                </th>
                                <td>F012</td>
                                <td>Governance</td>
                                <td>Australia</td>
                                <td>CSB</td>
                                <td>05 Mar, 2025 <span class="fw-bold">to</span> 06 Mar, 2025</td>
                                <td>05 Mar, 2025 <span class="fw-bold">to</span> 06 Mar, 2025</td>
                                <td>05 Mar, 2025 <span class="fw-bold">to</span> 06 Mar, 2025</td>

                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="#!" class="dropdown-item"><i
                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                            </li>
                                            <li><a class="dropdown-item edit-item-btn"><i
                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item remove-item-btn">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                            value="option1">
                                    </div>
                                </th>
                                <td>F012</td>
                                <td>Governance</td>
                                <td>Australia</td>
                                <td>CSB</td>
                                <td>05 Mar, 2025 <span class="fw-bold">to</span> 06 Mar, 2025</td>
                                <td>05 Mar, 2025 <span class="fw-bold">to</span> 06 Mar, 2025</td>
                                <td>05 Mar, 2025 <span class="fw-bold">to</span> 06 Mar, 2025</td>

                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="#!" class="dropdown-item"><i
                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                            </li>
                                            <li><a class="dropdown-item edit-item-btn"><i
                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item remove-item-btn">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                            value="option1">
                                    </div>
                                </th>
                                <td>F012</td>
                                <td>Governance</td>
                                <td>Australia</td>
                                <td>CSB</td>
                                <td>05 Mar, 2025 <span class="fw-bold">to</span> 06 Mar, 2025</td>
                                <td>05 Mar, 2025 <span class="fw-bold">to</span> 06 Mar, 2025</td>
                                <td>05 Mar, 2025 <span class="fw-bold">to</span> 06 Mar, 2025</td>

                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="#!" class="dropdown-item"><i
                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                            </li>
                                            <li><a class="dropdown-item edit-item-btn"><i
                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item remove-item-btn">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                            value="option1">
                                    </div>
                                </th>
                                <td>F012</td>
                                <td>Governance</td>
                                <td>Australia</td>
                                <td>CSB</td>
                                <td>05 Mar, 2025 <span class="fw-bold">to</span> 06 Mar, 2025</td>
                                <td>05 Mar, 2025 <span class="fw-bold">to</span> 06 Mar, 2025</td>
                                <td>05 Mar, 2025 <span class="fw-bold">to</span> 06 Mar, 2025</td>

                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="#!" class="dropdown-item"><i
                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                            </li>
                                            <li><a class="dropdown-item edit-item-btn"><i
                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item remove-item-btn">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </div>
                <!--tfooter section-->
                <div class="align-items-center mt-xl-3 mt-4 justify-content-between d-flex">
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
                </div>
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

<!-- App js -->
<script src="{{URL::asset('build/js/app.js')}}"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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



@section('script')

@endsection
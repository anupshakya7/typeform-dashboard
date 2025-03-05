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
        <h4 class="fs-16 mb-1">Organization Management</h4>
    </div>
</div>

<!--end greeting section-->
<!--form section top -->
<div class="form-top-bar mb-4">
    <div class="d-flex align-items-center justify-content-between">
        <div class="flex-shrink-0">
            <div class="d-flex gap-1 flex-wrap">

                <a href="{{route('organization.create')}}" class="btn btn-info add-btn"><i class="ri-add-line align-bottom me-1"></i> Create
                    Organization</a>
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
                <h5 class="card-title mb-0">Organization Lists</h5>
            </div>
            <div class="card-body">
                {{-- <div class="d-flex flex-row align-items-center justify-content-between pb-3">
                    <form method="GET" action="{{route('organization.index')}}">
                    <div class="d-flex flex-row align-items-center gap-1"><span>Showing</span> 
                        <select
                            class="form-select" name="items_per_page" id="items_per_page" onchange="this.form.submit()">
                            <option value="5" {{request('items_per_page') == '5' ? 'selected':''}}>5</option>
                            <option value="10" {{request('items_per_page') == '10' ? 'selected':''}}>10</option>
                            <option value="15" {{request('items_per_page') == '15' ? 'selected':''}}>15</option>
                            <option value="20" {{request('items_per_page') == '20' ? 'selected':''}}>20</option>
                        </select> 
                        <span>entries</span> 
                    </div>
                    </form>
                    <div class="row">
                
                    </div>
                </div> --}}

                <div class="table-responsive">
                    <table id="scroll-horizontal" class="table nowrap align-middle table-bordered text-center" style="width:100%">
                        <thead class="table-head">
                            <tr>
                                <th>S.No.</th>
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($organizations as $key => $organization)
                            <tr>
                                <td>{{$organization->serial_no}}</td>
                                <td>{{$organization->name}}</td>
                                <td>
                                    @if($organization->logo)

                                        <img src="{{asset('storage/'.$organization->logo)}}" alt="Logo" width="80">
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="{{route('organization.show',$organization)}}" class="dropdown-item"><i
                                                        class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a>
                                            </li>
                                            <li><a href="{{route('organization.edit',$organization)}}" class="dropdown-item edit-item-btn"><i
                                                        class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                    Edit</a>
                                            </li>
                                            @if(Auth::user()->organization_id !== $organization->id)
                                            <li>
                                                <button class="dropdown-item remove-item-btn" data-organization-id="{{$organization->id}}" data-organization-name="{{$organization->name}}" data-bs-toggle="modal" data-bs-target="#zoomInModal">
                                                    <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                    Delete
                                                </button>
                                            </li>
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- @dd($organizations) --}}
                <!--tfooter section-->
                <div class="align-items-center mt-xl-3 mt-4 justify-content-between d-flex">
                    @if($organizations->hasPages())
                    <div class="flex-shrink-0">
                        <div class="text-muted">Showing <span class="fw-semibold">{{$organizations->perPage()}}</span> of <span
                                class="fw-semibold">{{$organizations->total()}}</span> Results </div>
                    </div>
                    <ul class="pagination pagination-separated pagination-sm mb-0">
                        @if($organizations->onFirstPage())
                            <li class="page-item disabled"> <a href="#" class="page-link">Previous</a> </li>
                        @else
                            <li class="page-item"> <a href="{{$organizations->previousPageUrl()}}" class="page-link">Previous</a> </li>
                        @endif
                       
                        @foreach($organizations->getUrlRange(1,$organizations->lastPage()) as $page=>$url)
                        <li class="page-item {{$page ==$organizations->currentPage() ? 'active' :'' }}"> <a href="{{$url}}" class="page-link">{{$page}}</a> </li>
                        @endforeach
                        {{-- <li class="page-item active"> <a href="#" class="page-link">2</a> </li>
                        <li class="page-item"> <a href="#" class="page-link">3</a> </li> --}}

                        @if($organizations->hasMorePages())
                            <li class="page-item"> <a href="{{$organizations->nextPageUrl()}}" class="page-link">Next</a> </li>
                        @else
                            <li class="page-item disabled"> <a href="#" class="page-link">Next</a> </li>
                        @endif
                    </ul>
                    @endif
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
 <!-- Modal Blur -->
 <div id="zoomInModal" class="modal fade zoomIn" tabindex="-1" aria-labelledby="zoomInModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="zoomInModalLabel">Delete Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <h5 class="fs-16">
                        Are you sure you want to delete <span id="delete_item"></span>?
                    </h5>
                    <p class="text-muted">Deleting this item will permanently remove it from the system, <span class="text-danger"> along with all associated user details who are part of this company</span></p>
                    <input type="hidden" name="organization_id" id="delete_item_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger ">Delete</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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

<script>
    document.querySelectorAll('.remove-item-btn').forEach(button=>{
        button.addEventListener('click',function(){
            var organizationId = this.getAttribute('data-organization-id');
            var organizationName = this.getAttribute('data-organization-name');

            //Set the organization Id in the hidden input field
            document.getElementById('delete_item_id').value = organizationId;

            //Set the organization name
            document.getElementById('delete_item').textContent = organizationName;

            var deleteForm = document.getElementById('deleteForm');
            console.log();
            deleteForm.action = window.location.href+'/'+organizationId;
            
        })
    })
</script>

@endsection
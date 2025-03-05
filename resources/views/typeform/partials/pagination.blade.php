<div class="align-items-center mt-xl-3 mt-4 justify-content-between d-flex">
    @if($paginator->hasPages())
    <div class="flex-shrink-0">
        <div class="text-muted">Showing <span class="fw-semibold">{{$paginator->firstItem()}}</span> to <span class="fw-semibold">{{$paginator->lastItem()}}</span> of <span
                class="fw-semibold">{{$paginator->total()}}</span> Results </div>
    </div>
    <ul class="pagination pagination-separated pagination-sm mb-0">
        @if($paginator->onFirstPage())
            <li class="page-item disabled"> <a href="#" class="page-link">Previous</a> </li>
        @else
            <li class="page-item"> <a href="{{$paginator->previousPageUrl()}}" class="page-link">Previous</a> </li>
        @endif
       
        @foreach($paginator->getUrlRange(1,$paginator->lastPage()) as $page=>$url)
        <li class="page-item {{$page ==$paginator->currentPage() ? 'active' :'' }}"> <a href="{{$url}}" class="page-link">{{$page}}</a> </li>
        @endforeach
        {{-- <li class="page-item active"> <a href="#" class="page-link">2</a> </li>
        <li class="page-item"> <a href="#" class="page-link">3</a> </li> --}}

        @if($paginator->hasMorePages())
            <li class="page-item"> <a href="{{$paginator->nextPageUrl()}}" class="page-link">Next</a> </li>
        @else
            <li class="page-item disabled"> <a href="#" class="page-link">Next</a> </li>
        @endif
    </ul>
    @endif
</div>
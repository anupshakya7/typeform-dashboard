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
        
        @php
            $currentPage = $paginator->currentPage();
            $lastPage = $paginator->lastPage();
            $start = max(1, $currentPage - 1);
            $end = min($lastPage,$currentPage+1);
        @endphp
        
        @if($start > 1)
            <li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}">1</a></li>
            @if ($start > 2)
                <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
            @endif
        @endif
        
        {{-- Pages in range --}}
        @for ($i = $start; $i <= $end; $i++)
            <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        
        {{-- Always show last page --}}
        @if ($end < $lastPage)
            @if ($end < $lastPage - 1)
                <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
            @endif
            <li class="page-item"><a class="page-link" href="{{ $paginator->url($lastPage) }}">{{ $lastPage }}</a></li>
        @endif
        
        
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
@if ($paginator->hasPages())
<div class="row">
    <div class="container text-right">
        @if ($paginator->onFirstPage())
            <a class="disabled btn btn-disabled"><span>← Previous</span></a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="btn btn-red">← Previous</a></li>
        @endif
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="btn btn-red">Next →</a>
        @else
            <a class="disabled btn btn-disabled"><span>Next →</span></a>
        @endif
    </div>
</div>
@endif 
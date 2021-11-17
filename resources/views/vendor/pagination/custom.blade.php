@section('css')
<style>
    .pagination {
        display: inline-block !important;
    }
    .pagination .page-item,
    .pagination .disabled{
        display: inline-table !important;
        margin-top: 8px;
    }
</style>
@endsection

@if ($paginator->hasPages())
    <ul class="pagination justify-content-start">

        @if ($paginator->onFirstPage())
            <li class="disabled"><a class="page-link" href="javascript:void(0)"><i class="elegant-icon arrow_left"></i></a></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="elegant-icon arrow_left"></i></a></li>
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="page-item active"><a class="page-link" href="javascript:void(0)">{{ $page }}</a></li>
                    @else
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"><i class="elegant-icon arrow_right"></i></a></li>
        @else
            <li class="disabled"><a class="page-link" href="javascript:void(0)"><i class="elegant-icon arrow_right"></i></a></li>
        @endif
    </ul>
@endif

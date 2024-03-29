@if ($paginator->hasPages())
    <ul class="pager pagination dataset__pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled page-item dataset__pagination-item"><span>Prev.</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">Prev.</a></li>
        @endif


        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled page-item dataset__pagination-item"><span>{{ $element }}</span></li>
            @endif


            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active page-item dataset__pagination-item"><span>{{ $page }}</span></li>
                    @else
                        <li><a class="page-link dataset__pagination-page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach


        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item dataset__pagination-item"><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a></li>
        @else
            <li class="disabled page-item dataset__pagination-item"><span>Next</span></li>
        @endif
    </ul>
@endif
@if ($paginator->hasPages())
<div class="pagination-d-flex">
    <div class="pagination__meta">
        <p>Halaman </p>
    </div>
    <ul class="flat-pagination">
        @if (!$paginator->onFirstPage())
            <li><a href="#" title="Sebelumnya"><</a></li>
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
            <li><a href="#" title="">{{ $element }}</a></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><a class="active" href="#" title="Halaman ke {{ $page }}">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}" title="Halaman ke {{ $page }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif

        @endforeach

        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" title="">></a></li>
        @endif
    </ul>
</div>
@endif

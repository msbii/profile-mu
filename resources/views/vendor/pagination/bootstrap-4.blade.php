@if ($paginator->hasPages())
    <div class="styled-pagination text-center">
        <ul class="pagination">
            {{-- Tombol Sebelumnya --}}
            @if ($paginator->onFirstPage())
                <li class="prev disabled"><span class="fa fa-angle-left"></span></li>
            @else
                <li class="prev"><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><span class="fa fa-angle-left"></span></a></li>
            @endif

            {{-- Nomor Halaman --}}
            @foreach ($elements as $element)
                {{-- Tanda ... --}}
                @if (is_string($element))
                    <li class="disabled"><span>{{ $element }}</span></li>
                @endif

                {{-- Tautan ke Halaman --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Tombol Berikutnya --}}
            @if ($paginator->hasMorePages())
                <li class="next"><a href="{{ $paginator->nextPageUrl() }}" rel="next"><span class="fa fa-angle-right"></span></a></li>
            @else
                <li class="next disabled"><span class="fa fa-angle-right"></span></li>
            @endif
        </ul>
    </div>
@endif

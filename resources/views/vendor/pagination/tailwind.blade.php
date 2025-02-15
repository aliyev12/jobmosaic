@if ($paginator->hasPages())
    <nav class="flex justify-center" role="navigation">
        {{-- Previous Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 bg-slate-300 text-white rounded-l-lg">
                Previous
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
                class="px-4 py-2 bg-slate-500 hover:bg-slate-600 text-white rounded-l-lg">Previous</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Three dots separator --}}
            @if (is_string($element))
                <span class="px-4 py-2 bg-gray-300 text-slate-bg-slate-300">{{ $element }}</span>
            @endif

            {{-- Array of links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-2 bg-background text-foreground font-bold">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}"
                            class="px-4 py-2 bg-slate-500 hover:bg-slate-600 text-white">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
                class="px-4 py-2 bg-slate-500 hover:bg-slate-600 text-white rounded-r-lg">Next</a>
        @else
            <span class="px-4 py-2 bg-gray-500 text-white rounded-r-lg">Next</span>
        @endif
    </nav>
@else
@endif

@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div>
            <div class="flex items-center py-8">
                {{-- Previous Page Link --}}
                @if (!$paginator->onFirstPage())
                    <span wire:click="previousPage"
                       class="h-10 w-10 font-semibold text-gray-800 hover:text-blue-800 text-sm flex items-center justify-center mr-6 cursor-pointer"
                       aria-label="{{ __('pagination.previous') }}"
                    >
                        <i class="fas fa-arrow-left mr-2"></i>
                        Previous
                    </span>

                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span aria-disabled="true">
                            <span
                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                        </span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span wire:click="gotoPage({{$page}})"
                                   class="h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center cursor-pointer"
                                   aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </span>
                            @else
                                <a wire:click="gotoPage({{$page}})"
                                   class="h-10 w-10 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center cursor-pointer"
                                   aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <span wire:click="nextPage" rel="next"
                       class="h-10 w-10 font-semibold text-gray-800 hover:text-blue-800 text-sm flex items-center justify-center ml-3 cursor-pointer"
                       aria-label="{{ __('pagination.next') }}">
                        Next
                        <i class="fas fa-arrow-right ml-2"></i>
                    </span>
                @endif
            </div>
        </div>
        </div>
    </nav>
@endif

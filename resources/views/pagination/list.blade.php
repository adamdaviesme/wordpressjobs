<div class="flex justify-center">
    @if ($paginator->hasPages())
        <nav class="flex" role="navigation" aria-label="Navigation">
            <div class="mr-2">
                @if ($paginator->onFirstPage())
                    <span
                        class="inline-flex items-center justify-center rounded leading-5 px-2.5 py-2 bg-white border border-slate-200 text-slate-300">
                        <span class="sr-only">Previous</span><wbr />
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 16 16">
                            <path d="M9.4 13.4l1.4-1.4-4-4 4-4-1.4-1.4L4 8z" />
                        </svg>
                    </span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled"
                        class="inline-flex items-center justify-center rounded leading-5 px-2.5 py-2 bg-white hover:bg-indigo-500 border border-slate-200 text-slate-600 hover:text-white shadow-sm">
                        <span class="sr-only">Previous</span><wbr />
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 16 16">
                            <path d="M9.4 13.4l1.4-1.4-4-4 4-4-1.4-1.4L4 8z" />
                        </svg>
                    </button>
                @endif
            </div>
            <ul class="inline-flex text-sm font-medium -space-x-px shadow-sm">
                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    <li>
                        @if ($paginator->currentPage() == $i)
                            <span
                                class="inline-flex items-center justify-center rounded-l leading-5 px-3.5 py-2 bg-white border border-slate-200 text-slate-300">
                                {{ $i }}
                            </span>
                        @else
                            <button wire:click="gotoPage({{ $i }})" wire:loading.attr="disabled"
                                class="inline-flex items-center justify-center rounded-l leading-5 px-3.5 py-2 bg-white border border-slate-200 text-indigo-500">
                                {{ $i }}
                            </button>
                        @endif

                    </li>
                @endfor

            </ul>
            <div class="ml-2">
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled"
                        class="inline-flex items-center justify-center rounded leading-5 px-2.5 py-2 bg-white hover:bg-indigo-500 border border-slate-200 text-slate-600 hover:text-white shadow-sm">
                        <span class="sr-only">Next</span><wbr />
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 16 16">
                            <path d="M6.6 13.4L5.2 12l4-4-4-4 1.4-1.4L12 8z" />
                        </svg>
                    </button>
                @else
                    <span
                        class="inline-flex items-center justify-center rounded leading-5 px-2.5 py-2 bg-white border border-slate-200 text-slate-300">
                        <span class="sr-only">Next</span><wbr />
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 16 16">
                            <path d="M6.6 13.4L5.2 12l4-4-4-4 1.4-1.4L12 8z" />
                        </svg>
                    </span>
                @endif
            </div>

        </nav>
    @endif
</div>

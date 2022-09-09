<div
    class="flex flex-col space-y-10 sm:flex-row sm:space-x-6 sm:space-y-0 md:flex-col md:space-x-0 md:space-y-10 xl:flex-row xl:space-x-6 xl:space-y-0 mt-9">
    <!-- Sidebar -->
    <x-list.sidebar />

    <div class="w-full">
        <!-- Search form -->
        <div class="mb-5">
            <div class="relative group">
                <label for="job-search" class="sr-only">Search</label>
                <input id="job-search" class="form-input w-full pl-9 focus:border-slate-300" type="search"
                    placeholder="Search job title or keyword…" wire:model.debounce.500ms="search" />
                <span class="absolute flex items-center inset-y-0 left-0">
                    <svg class="w-4 h-4 shrink-0 fill-current text-slate-400 group-focus-within:!text-indigo-600 group-hover:text-slate-500 ml-3 mr-2"
                        viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z" />
                        <path
                            d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z" />
                    </svg>
                </span>

                <span class="absolute flex items-center inset-y-0 right-0">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="ml-2 mr-4 h-4 w-4 shrink-0 text-slate-400 animate-spin" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" wire:loading.delay>
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                </span>
            </div>
        </div>

        <!-- Jobs header -->
        <div class="flex justify-between items-center mb-4">
            <div class="text-sm text-slate-500 italic">
                Results: {{ $totalJobs }}
                {{ $totalJobs > 1 ? 'jobs' : 'job' }} across {{ $pages }}
                {{ $pages > 1 ? 'pages' : 'page' }}
            </div>

            <!-- Sort -->
            <div class="text-sm">

                <span class="hidden md:inline-block">Sort by </span>
                <x-unit.dropdown>
                    <x-slot name="currentSelection">{{ $orders[$currentOrder] }}</x-slot>
                    <x-slot name="options">
                        @foreach ($orders as $order => $label)
                            @if ($order != $currentOrder)
                                <li>
                                    <button type="button" wire:click="changeOrder('{{ $order }}')"
                                        class="font-medium text-sm text-slate-600 hover:text-slate-800 flex items-center py-1 px-3"
                                        @click="open = false" @focus="open = true" @focusout="open = false">
                                        {{ $label }}
                                    </button>
                                </li>
                            @endif
                        @endforeach
                    </x-slot>
                </x-unit.dropdown>

            </div>
        </div>

        <!-- Job list -->
        <div class="w-full relative">
            <div class="flex items-center justify-center py-4 px-2 z-10 bg-white/50 absolute inset-0"
                wire:loading.delay.short>
            </div>
            <div class="space-y-2 lg:space-y-4">
                @if ($totalJobs > 0)
                    @foreach ($jobs as $job)
                        <x-list.job wire:key="single-job-listing-{{ $job->id }}"
                            isNew="{{ $pastThreshold < $job->created_at }}" featured="{{ $job->is_featured }}"
                            :job="$job" />
                    @endforeach
                @else
                    <div
                        class="bg-white shadow hover:shadow-lg transition-shadow rounded-sm border text-sm border-slate-200 px-5 py-4 block">
                        Unfortunately there are currently no job posts matching your search. Try simplifying your
                        search.
                    </div>
                @endif
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $jobs->links() }}
        </div>

    </div>

</div>

@push('scripts')
    <script>
        Livewire.on('gotoTop', () => {
            window.scrollTo({
                top: 0,
                left: 0,
                behaviour: 'smooth'
            })
        })
    </script>
@endpush

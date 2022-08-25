<div
    class="flex flex-col space-y-10 sm:flex-row sm:space-x-6 sm:space-y-0 md:flex-col md:space-x-0 md:space-y-10 xl:flex-row xl:space-x-6 xl:space-y-0 mt-9">
    <!-- Sidebar -->
    <x-list.sidebar />

    <div class="w-full">
        <!-- Search form -->
        <div class="mb-5">
            <form class="relative">
                <label for="job-search" class="sr-only">Search</label>
                <input id="job-search" class="form-input w-full pl-9 focus:border-slate-300" type="search"
                    placeholder="Search job title or keyword…" wire:model.debounce.500ms="search" />
                <button class="absolute inset-0 right-auto group" type="submit" aria-label="Search">
                    <svg class="w-4 h-4 shrink-0 fill-current text-slate-400 group-hover:text-slate-500 ml-3 mr-2"
                        viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 14c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zM7 2C4.243 2 2 4.243 2 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5z" />
                        <path
                            d="M15.707 14.293L13.314 11.9a8.019 8.019 0 01-1.414 1.414l2.393 2.393a.997.997 0 001.414 0 .999.999 0 000-1.414z" />
                    </svg>
                </button>
            </form>
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
                <div class="relative inline-flex" x-data="{ open: false }">
                    <button class="inline-flex justify-center items-center group" aria-haspopup="true"
                        @click.prevent="open = !open" :aria-expanded="open">
                        <div class="flex items-center truncate">
                            <span class="truncate font-medium text-indigo-500 group-hover:text-indigo-600">
                                {{ $orders[$currentOrder] }}
                            </span>
                            <svg class="w-3 h-3 shrink-0 ml-1 fill-current text-indigo-400" viewBox="0 0 12 12">
                                <path d="M5.9 11.4L.5 6l1.4-1.4 4 4 4-4L11.3 6z" />
                            </svg>
                        </div>
                    </button>
                    <div class="origin-top-right z-10 absolute top-full right-0 bg-white border border-slate-200 py-1.5 rounded shadow-lg overflow-hidden mt-1"
                        @click.outside="open = false" @keydown.escape.window="open = false" x-show="open"
                        x-transition:enter="transition ease-out duration-200 transform"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-out duration-200" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" x-cloak>
                        <ul>
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
                        </ul>
                    </div>
                </div>
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

@section('scripts')
    <script>
        Livewire.on('gotoTop', () => {
            window.scrollTo({
                top: 0,
                left: 0,
                behaviour: 'smooth'
            })
        })
    </script>
@endsection

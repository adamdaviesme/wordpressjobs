<div class="w-full">

    <!-- Search form -->
    <div class="mb-5">
        <form class="relative">
            <label for="job-search" class="sr-only">Search</label>
            <input id="job-search" class="form-input w-full pl-9 focus:border-slate-300" type="search"
                placeholder="Search job title or keyword…" />
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
        <div class="text-sm text-slate-500 italic">Currently showing 289 Jobs</div>
        <!-- Sort -->
        <div class="text-sm">
            <span>Sort by </span>
            <div class="relative inline-flex" x-data="{ open: false }">
                <button class="inline-flex justify-center items-center group" aria-haspopup="true"
                    @click.prevent="open = !open" :aria-expanded="open">
                    <div class="flex items-center truncate">
                        <span class="truncate font-medium text-indigo-500 group-hover:text-indigo-600">Newest</span>
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
                        <li>
                            <a class="font-medium text-sm text-slate-600 hover:text-slate-800 flex items-center py-1 px-3"
                                href="#0" @click="open = false" @focus="open = true"
                                @focusout="open = false">Oldest</a>
                        </li>
                        <li>
                            <a class="font-medium text-sm text-slate-600 hover:text-slate-800 flex items-center py-1 px-3"
                                href="#0" @click="open = false" @focus="open = true"
                                @focusout="open = false">Featured</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Job list -->
    <div class="space-y-2 lg:space-y-4">

        <x-struct.list.job jobLink="{{ route('job.single') }}" featured="true" />

        <x-struct.list.job jobLink="{{ route('job.single') }}" />
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        <div class="flex justify-center">
            <nav class="flex" role="navigation" aria-label="Navigation">
                <div class="mr-2">
                    <span
                        class="inline-flex items-center justify-center rounded leading-5 px-2.5 py-2 bg-white border border-slate-200 text-slate-300">
                        <span class="sr-only">Previous</span><wbr />
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 16 16">
                            <path d="M9.4 13.4l1.4-1.4-4-4 4-4-1.4-1.4L4 8z" />
                        </svg>
                    </span>
                </div>
                <ul class="inline-flex text-sm font-medium -space-x-px shadow-sm">
                    <li>
                        <span
                            class="inline-flex items-center justify-center rounded-l leading-5 px-3.5 py-2 bg-white border border-slate-200 text-indigo-500">1</span>
                    </li>
                    <li>
                        <a class="inline-flex items-center justify-center leading-5 px-3.5 py-2 bg-white hover:bg-indigo-500 border border-slate-200 text-slate-600 hover:text-white"
                            href="#0">2</a>
                    </li>
                    <li>
                        <a class="inline-flex items-center justify-center leading-5 px-3.5 py-2 bg-white hover:bg-indigo-500 border border-slate-200 text-slate-600 hover:text-white"
                            href="#0">3</a>
                    </li>
                    <li>
                        <span
                            class="inline-flex items-center justify-center leading-5 px-3.5 py-2 bg-white border border-slate-200 text-slate-400">…</span>
                    </li>
                    <li>
                        <a class="inline-flex items-center justify-center rounded-r leading-5 px-3.5 py-2 bg-white hover:bg-indigo-500 border border-slate-200 text-slate-600 hover:text-white"
                            href="#0">9</a>
                    </li>
                </ul>
                <div class="ml-2">
                    <a href="#0"
                        class="inline-flex items-center justify-center rounded leading-5 px-2.5 py-2 bg-white hover:bg-indigo-500 border border-slate-200 text-slate-600 hover:text-white shadow-sm">
                        <span class="sr-only">Next</span><wbr />
                        <svg class="h-4 w-4 fill-current" viewBox="0 0 16 16">
                            <path d="M6.6 13.4L5.2 12l4-4-4-4 1.4-1.4L12 8z" />
                        </svg>
                    </a>
                </div>
            </nav>
        </div>
    </div>

</div>

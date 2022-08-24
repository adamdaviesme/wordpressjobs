<div class="flex flex-col lg:flex-row lg:space-x-8 xl:space-x-16 pb-8 md:pb-12">
    <!-- Content -->
    <div>
        <div class="bg-white p-5 md:px-12 md:py-8 shadow-lg rounded-sm border border-slate-200">
            <div class="mb-2 flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <span class="text-sm text-slate-500 italic">Posted {{ $job->created_at->format('l, dS M') }}</span>
                    @if ($job->is_remote)
                        <span
                            class="text-xs inline-flex font-medium bg-indigo-100 ml-1 text-indigo-600 rounded-full text-center px-2.5 py-px">
                            Remote
                        </span>
                    @endif
                </div>
                <div>
                    <span class="text-sm font-semibold italic text-indigo-600">
                        Applications close {{ Carbon\Carbon::parse($job->expiry_date)->diffForHumans() }}</span>
                </div>
            </div>
            <header class="mb-4">
                <!-- Title -->
                <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">
                    {{ $job->name }}
                </h1>
            </header>
            <!-- Tags -->
            <div class="mb-6">
                <div class="flex flex-wrap items-center -m-1">
                    @foreach ($job->tags as $tag)
                        <div class="m-1">
                            <span
                                class="text-xs inline-flex font-medium bg-indigo-100 text-indigo-600 rounded-full text-center px-2.5 py-1">
                                {{ $tag->name }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
            <hr class="my-6 border-t border-slate-200" />
            <!-- The Role -->
            <div class="prose max-w-full">
                {!! $job->job_description !!}
            </div>
            <hr class="my-6 border-t border-slate-200" />
            <!-- Apply section -->
            <div class="mt-6">
                <div class="flex justify-between items-center">
                    <!-- Apply button -->
                    <x-unit.apply-button applicationUrl="{{ $job->application_url }}" />
                    <!-- Share -->
                    <div class="flex items-center">
                        <div class="text-sm text-slate-500 italic mr-4">Share:</div>
                        <div class="flex items-center space-x-3">
                            <a target="_blank" rel="noopener noreferrer"
                                href="https://twitter.com/intent/tweet?text=Check%20this%20Wordpress%20job%3A%20{{ urlencode($job->name) }}%20-%20{{ urlencode(Request::fullUrl()) }}"
                                class="text-slate-400 hover:text-indigo-500">
                                <span class="sr-only">Share on Twitter</span>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 16 16"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16 3.5c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4 0 1.6 1.1 2.9 2.6 3.2-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H0c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4c.7-.5 1.3-1.1 1.7-1.8Z" />
                                </svg>
                            </a>
                            <a target="_blank" rel="noopener noreferrer"
                                href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}"
                                class="text-slate-400 hover:text-indigo-500">
                                <span class="sr-only">Share on Facebook</span>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 16 16"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.023 16 6 9H3V6h3V4c0-2.7 1.672-4 4.08-4 1.153 0 2.144.086 2.433.124v2.821h-1.67c-1.31 0-1.563.623-1.563 1.536V6H13l-1 3H9.28v7H6.023Z" />
                                </svg>
                            </a>
                            <a target="_blank" rel="noopener noreferrer"
                                href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(Request::fullUrl()) }}&title={{ urlencode($job->company->name) }}%20is%20hiring&summary=Apply%20for%20your%20next%20Wordpress%20job%20at%20{{ urlencode($job->company->name) }}&source="
                                class="text-slate-400 hover:text-indigo-500">
                                <span class="sr-only">Share on Linkedin</span>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 16 16"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0 1.146C0 .514.53 0 1.182 0h13.635C15.471 0 16 .513 16 1.146v13.708c0 .633-.53 1.146-1.183 1.146H1.182C.53 16 0 15.487 0 14.854V1.146ZM4.862 13.39V6.187H2.468v7.203h2.394ZM3.666 5.203c.834 0 1.354-.553 1.354-1.244-.016-.707-.52-1.245-1.338-1.245-.82 0-1.355.538-1.355 1.245 0 .691.52 1.244 1.323 1.244h.015Zm2.522 8.187h2.394V9.368c0-.215.015-.43.078-.584.173-.43.567-.876 1.229-.876.866 0 1.213.66 1.213 1.629v3.853h2.394V9.26c0-2.213-1.181-3.242-2.756-3.242-1.292 0-1.86.722-2.174 1.213h.016V6.187H6.188c.03.676 0 7.203 0 7.203Z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <hr class="my-6 border-t border-slate-200" /> --}}

        <!-- Related Jobs -->
        <div class="p-5 md:p-12 rounded-sm border border-slate-200 shadow-lg mt-8 bg-white">
            <h2 class="text-xl leading-snug text-slate-800 font-bold ">Related Jobs</h2>
            <p class="text-sm mb-6">Other jobs that have some of the same specificaions</p>
            <div class="space-y-4">
                @foreach ($relatedJobs as $relatedJob)
                    <x-list.job :job="$relatedJob" />
                @endforeach
            </div>
        </div>

    </div>

    <!-- Sidebar -->
    <div class="block space-y-4">

        <!-- Company information (desktop) -->
        <div class="bg-white p-5 shadow-lg rounded-sm border border-slate-200 lg:w-72 xl:w-80">
            <div class="text-center mb-6">
                <div class="text-lg font-bold text-slate-800 mb-1">{{ $job->company->name }}</div>
                <div class="text-sm text-slate-500 italic">
                    {{ $job->company->jobs->count() > 1 ? $job->company->jobs->count() . ' jobs' : $job->company->jobs->count() . ' job' }}
                    posted</div>
            </div>
            <div class="space-y-2">
                <x-unit.apply-button class="w-full" applicationUrl="{{ $job->application_url }}" />
            </div>
        </div>

    </div>
</div>

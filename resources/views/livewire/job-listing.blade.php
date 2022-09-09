<article class="flex flex-col lg:flex-row lg:space-x-8 xl:space-x-16 pb-8 md:pb-12">
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

            <!-- Title -->
            <header class="mb-4">
                <h1 class="text-2xl md:text-3xl text-slate-800 font-bold">
                    {{ $job->name }}
                </h1>
                <h2>{{ $job->location->name . ', ' . $job->location->country }}</h2>
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
                    <x-unit.button-link target="_blank" rel="noopener noreferrer" :href="$job->application_url">
                        Apply Today
                        -&gt;
                    </x-unit.button-link>
                    <!-- Share -->
                    <x-unit.job-share :job="$job" />
                </div>
            </div>
        </div>

        {{-- <hr class="my-6 border-t border-slate-200" /> --}}

        <!-- Related Jobs -->
        <aside class="p-5 md:p-12 rounded-sm border border-slate-200 shadow-lg mt-8 bg-white">
            <h2 class="text-xl leading-snug text-slate-800 font-bold ">Related Jobs</h2>
            <p class="text-sm mb-6">Other jobs that have some of the same specificaions</p>
            <div class="space-y-4">
                @foreach ($relatedJobs as $relatedJob)
                    <x-list.job :job="$relatedJob" />
                @endforeach
            </div>
        </aside>

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
                <x-unit.button-link class="w-full" target="_blank" rel="noopener noreferrer" :href="$job->application_url">
                    Apply Today
                    -&gt;
                </x-unit.button-link>
            </div>
        </div>

    </div>
</article>

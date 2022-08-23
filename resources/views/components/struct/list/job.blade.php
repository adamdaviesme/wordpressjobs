<a href="{{ route('job.single', ['id' => $job->id]) }}" title="View job post"
    {{ $attributes->class(['bg-white shadow hover:shadow-lg transition-shadow rounded-sm border border-slate-200 px-5 py-4 block', '!bg-amber-50' => $featured]) }}>
    <div class="flex flex-col md:flex-row justify-between md:items-center space-y-4 md:space-y-0 md:space-x-2">
        <!-- Left side -->
        <div class="flex items-start space-x-3 md:space-x-4">
            <div>
                <span class="inline-flex items-center font-semibold text-slate-800">
                    <span>{{ $job->name }}</span>
                    <span class="w-2 h-px block bg-slate-400 mx-2"></span>
                    <span>{{ $job->company->name }}</span>
                </span>
                <div class="text-sm mt-1">
                    {{ $job->jobType->name }} /
                    {{ $job->location->name . ', ' . $job->location->country }}
                    @if ($job->is_remote)
                        <span
                            class="text-xs inline-flex font-medium bg-indigo-100 ml-1 text-indigo-600 rounded-full text-center px-2.5 py-px">
                            Remote
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <!-- Right side -->
        <div class="flex items-start md:items-center space-x-4 md:pl-10">
            <div class="text-sm text-slate-500 italic whitespace-nowrap">
                Posted: {{ $job->created_at->diffForHumans() }}
            </div>
            @if ($featured)
                <div
                    class="text-xs inline-flex font-medium bg-amber-100 text-amber-600 rounded-full text-center px-2.5 py-1">
                    Featured
                </div>
            @endif
            @if ($isNew)
                <div
                    class="text-xs inline-flex font-medium bg-emerald-100 text-emerald-600 rounded-full text-center px-2.5 py-1">
                    New
                </div>
            @endif
        </div>
    </div>
</a>

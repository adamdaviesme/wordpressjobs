<x-layout.master>
    <!-- Page header -->
    <div class="sm:flex sm:justify-between sm:items-center mb-5">

        <!-- Left: Title -->
        <div class="mb-4 sm:mb-0">
            <h1 class="text-xl md:text-2xl text-slate-800 font-bold">Find your next
                <span class="text-indigo-600 border-b-4 border-indigo-600">Wordpress</span> job
            </h1>
        </div>

        <div>
            <div class="text-sm text-slate-500 italic">{{ $totalJobs }} jobs posted and counting...</div>
        </div>

    </div>

    {{-- Job Listings --}}
    <livewire:job-list />

</x-layout.master>

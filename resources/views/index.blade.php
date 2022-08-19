<x-layout.master>
    <x-slot name="main">

        <!-- Page header -->
        <div class="sm:flex sm:justify-between sm:items-center mb-5">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-xl md:text-2xl text-slate-800 font-bold">Find your next
                    <span class="text-indigo-600 border-b-4 border-indigo-600">Wordpress</span> job
                </h1>
            </div>

            <div>
                <div class="text-sm text-slate-500 italic">289 jobs posted and counting...</div>
            </div>

        </div>

        <!-- Page content -->
        <div
            class="flex flex-col space-y-10 sm:flex-row sm:space-x-6 sm:space-y-0 md:flex-col md:space-x-0 md:space-y-10 xl:flex-row xl:space-x-6 xl:space-y-0 mt-9">

            <!-- Sidebar -->
            <livewire:list.sidebar />

            <!-- Content -->
            <livewire:list.main />

        </div>

    </x-slot>
</x-layout.master>

<x-layout.master>
    <div
        class="flex flex-col space-y-10 sm:flex-row sm:space-x-6 sm:space-y-0 md:flex-col md:space-x-0 md:space-y-10 xl:flex-row xl:space-x-6 xl:space-y-0 mt-9">

        <livewire:create-job-post wire:key="create-job-post" />

        <livewire:job-post-checkout wire:key="job-post-checkout" />

    </div>
</x-layout.master>

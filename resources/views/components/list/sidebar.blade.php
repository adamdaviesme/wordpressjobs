<div class="space-y-8" id="listing-sidebar">
    <!-- Alert -->
    <x-unit.newsletter-signup />

    <!-- White box -->
    <div class="bg-white shadow-lg rounded-sm border border-slate-200 min-w-60" x-data="{ open: false }">
        <button type="button" x-on:click="open = !open"
            class="md:hidden flex flex-row w-full text-sm justify-between items-center px-5 py-3 font-semibold text-slate-800">
            <span>Show Job filters</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 transform" x-bind:class="{ 'rotate-180': open }">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </button>
        <div class="md:grid-cols-2 p-5 xl:grid-cols-1 gap-6 md:!grid" x-bind:class="{ 'grid': open, 'hidden': !open }">
            <!-- Group 1 -->
            <div>
                <div class="text-sm text-slate-800 font-semibold mb-3">Job Type</div>
                <ul class="space-y-2">
                    @foreach ($jobTypes as $jobType)
                        <li>
                            <label class="flex items-center">
                                <input type="checkbox" wire:model="filters.jobTypes.{{ $jobType->id }}"
                                    class="form-checkbox" value="{{ $jobType->slug }}" />
                                <span class="text-sm text-slate-600 font-medium ml-2">{{ $jobType->name }}</span>
                            </label>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div>
                <div class="text-sm text-slate-800 font-semibold mb-3">Remote only</div>
                <div class="flex items-center">
                    <div class="form-switch">
                        <input type="checkbox" id="is_remote" class="sr-only" name="is_remote" wire:model="isRemote" />
                        <label class="bg-slate-400" for="is_remote">
                            <span class="bg-white shadow-sm" aria-hidden="true"></span>
                            <span class="sr-only">Remote only</span>
                        </label>
                    </div>
                </div>
                <div class="text-sm italic mt-3">Only show jobs that offer remote work</div>
            </div>
            <!-- Group 1 -->
            <div>
                <div class="text-sm text-slate-800 font-semibold mb-3">Benefits</div>
                <ul class="space-y-2">
                    @foreach ($benefits as $benefit)
                        <li>
                            <label class="flex items-center">
                                <input type="checkbox" wire:model="filters.benefits.{{ $benefit->id }}"
                                    class="form-checkbox" value="{{ $benefit->slug }}" />
                                <span class="text-sm text-slate-600 font-medium ml-2">{{ $benefit->name }}</span>
                            </label>
                        </li>
                    @endforeach

                </ul>
            </div>

        </div>
    </div>
</div>

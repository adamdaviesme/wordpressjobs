<form wire:submit.prevent="createJobPost"
    class="flex flex-col relative space-y-10 sm:flex-row sm:space-x-6 sm:space-y-0 md:flex-col md:space-x-0 md:space-y-10 xl:flex-row xl:space-x-6 xl:space-y-0 mt-9">
    <div class="w-full bg-white shadow-lg rounded-sm border p-5 border-slate-200 mt-4">
        <h1 class="font-bold text-slate-800 text-2xl">Create job post</h1>
        <h2 class="font-semibold text-indigo-600 text-lg">Create a Wordpress job posting</h2>
        <p class="mt-2">
            Fill out the below information and proceed with the checkout to get your job submitted for approval.
            Don't
            worry, we only charge once your job post is live.
        </p>

        <hr class="border-slate-200 my-4" />

        <div class="flex-col flex gap-4">

            {{-- Job Name --}}
            <div>
                <x-form.label>
                    Job Name
                    <x-slot name="labelDescription">Please give a descriptive name for the job posting.</x-slot>
                    @error('name')
                        <x-slot name="error">
                            Please provide a job name
                        </x-slot>
                    @enderror
                </x-form.label>
                <input type="text" class="form-input w-full" wire:model="name" />
            </div>

            {{-- Salary --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-form.label>
                        Salary From
                        <x-slot name="labelDescription">What is the base salary for this position?</x-slot>
                        @error('salaryFrom')
                            <x-slot name="error">
                                Provide min. salary
                            </x-slot>
                        @enderror
                    </x-form.label>
                    <span class="relative block">
                        <span class="absolute left-0 top-0 bottom-0 flex items-center justify-center">
                            <span class="px-4 text-slate-600 font-bold">&pound;</span>
                        </span>
                        <input type="number" class="form-input w-full pl-8" wire:model="salaryFrom" />
                    </span>
                </div>

                <div>
                    <x-form.label>
                        Salary To
                        <x-slot name="labelDescription">What is the max salary for this position?</x-slot>
                        @error('salaryTo')
                            <x-slot name="error">
                                What is the max salary?
                            </x-slot>
                        @enderror
                    </x-form.label>
                    <span class="relative block">
                        <span class="absolute left-0 top-0 bottom-0 flex items-center justify-center">
                            <span class="px-4 text-slate-600 font-bold">&pound;</span>
                        </span>
                        <input type="number" class="form-input w-full pl-8" wire:model="salaryTo" />
                    </span>
                </div>
            </div>

            {{-- remote and featured --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <x-form.label>
                        Remote Position
                        <x-slot name="labelDescription">Is this a remote position?</x-slot>
                    </x-form.label>
                    <div class="flex items-center">
                        <div class="form-switch">
                            <input type="checkbox" id="is_remote" class="sr-only" name="is_remote"
                                wire:model="isRemote" />
                            <label class="bg-slate-400" for="is_remote">
                                <span class="bg-white shadow-sm" aria-hidden="true"></span>
                                <span class="sr-only">Remote only</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <x-form.label>
                        Feature Job Post?
                        <x-slot name="labelDescription">Feature your post for an extra &pound;25?</x-slot>
                    </x-form.label>
                    <div class="flex items-center">
                        <div class="form-switch">
                            <input type="checkbox" id="is_featured" class="sr-only" name="is_featured"
                                wire:model="isFeatured" />
                            <label class="bg-slate-400" for="is_featured">
                                <span class="bg-white shadow-sm" aria-hidden="true"></span>
                                <span class="sr-only">Remote only</span>
                            </label>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Job Types --}}
            <div>
                <x-form.label>
                    Job Type
                    <x-slot name="labelDescription">
                        What kind of job is it?
                    </x-slot>
                    @error('selectedJobType')
                        <x-slot name="error">
                            Please say what kind of job it is
                        </x-slot>
                    @enderror
                </x-form.label>
                <div class="flex flex-row flex-wrap gap-1 mt-2">
                    @foreach ($jobTypes as $jobType)
                        <span>
                            <span wire:click="$set('selectedJobType', {{ $jobType->id }})"
                                class="{{ $selectedJobType == $jobType->id ? '!bg-indigo-600 !text-white' : '' }} hover:cursor-pointer hover:bg-slate-300 transition-colors bg-slate-200 text-slate-800 rounded-full text-center px-2.5 py-1 text-sm flex items-center flex-shrink-0">
                                @if ($selectedJobType == $jobType->id)
                                    <span
                                        class="rounded-full bg-indigo-800 text-white h-4 w-4 mr-2 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="w-3 h-3">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                @endif
                                {{ $jobType->name }}
                            </span>
                        </span>
                    @endforeach
                </div>
            </div>
            {{-- Job Description --}}
            <div wire:ignore>
                <x-form.label>
                    Job Description
                    <x-slot name="labelDescription">Give some further detail to the job listing.</x-slot>
                    @error('jobDescription')
                        <x-slot name="error">
                            Please give us some details about the job
                        </x-slot>
                    @enderror
                </x-form.label>
                <div id="toolbar"></div>
                <div class="min-h-[320px] w-full" id="job_description" x-data x-ref="quillEditor"
                    x-init="quill = new Quill($refs.quillEditor, {
                        theme: 'snow',
                        modules: {
                            toolbar: [
                                [{ header: [2, false] }],
                                ['bold', 'italic', 'underline', 'link'],
                                [{ list: 'ordered' }, { list: 'bullet' }],
                            ],
                        }
                    });
                    quill.on('editor-change', function() { $dispatch('input', quill.root.innerHTML); });" wire:model.debounce.1000ms="jobDescription">
                    {!! $jobDescription !!}
                </div>
            </div>

            {{-- Job location --}}
            <div x-data="{ isSearching: @entangle('isSearching') }" x-on:click.away="isSearching = false">
                <x-form.label>
                    Job Location
                    <x-slot name="labelDescription">
                        Where is the head office for the job listing?
                        <span class="text-indigo-600">Locations are demo from faker data</span>
                    </x-slot>
                    @error('locationId')
                        <x-slot name="error">
                            Please tell us where the job is
                        </x-slot>
                    @enderror
                </x-form.label>
                <input type="text" class="form-input w-full" wire:model="jobLocation"
                    wire:keydown.debounce.500ms="searchLocation" placeholder="Search locations..." />
                @if ($isSearching)
                    <div class="w-full p-2 mt-2 max-h-[150px] overflow-y-auto border border-slate-200">
                        <div class="block w-full" wire:loading wire:target="searchLocation">
                            Loading locations
                        </div>
                        @if ($locations->count() == 0)
                            <p class="font-semibold text-sm">Sorry, there are no locations in our database for that
                                name.
                            </p>
                        @endif
                        @foreach ($locations as $location)
                            <button type="button" wire:click="selectLocation({{ $location->id }})"
                                class="py-1 hover:text-indigo-600 w-full block text-left">
                                {{ $location->name . ', ' . $location->country }}
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Job Tags --}}
            {{-- TODO: Make multi tag togglers into one component --}}
            <div>
                <x-form.label>
                    Job Tags
                    <x-slot name="labelDescription">
                        Select tags that define the job better.
                    </x-slot>
                    @error('selectedTags')
                        <x-slot name="error">
                            Please select at least one tag to describe the job
                        </x-slot>
                    @enderror
                </x-form.label>
                <div class="flex flex-row flex-wrap  gap-1 mt-2">
                    @foreach ($jobTags as $jobTag)
                        <span>
                            <span wire:click="toggleTag({{ $jobTag->id }})"
                                class="{{ key_exists($jobTag->id, $selectedTags) ? '!bg-indigo-600 !text-white' : '' }} hover:cursor-pointer hover:bg-slate-300 transition-colors bg-slate-200 text-slate-800 rounded-full text-center px-2.5 py-1 text-sm flex items-center flex-shrink-0">
                                @if (key_exists($jobTag->id, $selectedTags))
                                    <span
                                        class="rounded-full bg-indigo-800 text-white h-4 w-4 mr-2 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" class="w-3 h-3">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                @endif
                                {{ $jobTag->name }}
                            </span>
                        </span>
                    @endforeach
                </div>
            </div>

            {{-- Benefits --}}
            <div>
                <x-form.label>
                    Job Benefits
                    <x-slot name="labelDescription">
                        What are some of the benefits the employee will receive
                    </x-slot>
                    @error('selectedBenefits')
                        <x-slot name="error">
                            Please select at least one benefit
                        </x-slot>
                    @enderror
                </x-form.label>
                <div class="flex flex-row flex-wrap  gap-1 mt-2">
                    @foreach ($benefits as $benefit)
                        <span>
                            <span wire:click="toggleBenefit({{ $benefit->id }})"
                                class="{{ key_exists($benefit->id, $selectedBenefits) ? '!bg-indigo-600 !text-white' : '' }} hover:cursor-pointer hover:bg-slate-300 transition-colors bg-slate-200 text-slate-800 rounded-full text-center px-2.5 py-1 text-sm flex items-center flex-shrink-0">
                                @if (key_exists($benefit->id, $selectedBenefits))
                                    <span
                                        class="rounded-full bg-indigo-800 text-white h-4 w-4 mr-2 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" class="w-3 h-3">
                                            <path fill-rule="evenodd"
                                                d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </span>
                                @endif
                                {{ $benefit->name }}
                            </span>
                        </span>
                    @endforeach
                </div>
            </div>

            {{-- Application URL --}}
            <div>
                <x-form.label>
                    Application URL
                    <x-slot name="labelDescription">Where can candidates apply</x-slot>
                    @error('name')
                        <x-slot name="error">
                            Please provide a valid URL
                        </x-slot>
                    @enderror
                </x-form.label>
                <input type="url" class="form-input w-full" wire:model="applicationUrl" />
            </div>
        </div>

    </div>
    <div class="h-screen md:sticky md:top-0">

        <div class="mt-4">
            <div class="bg-white shadow-lg rounded-sm border p-5 border-slate-200 min-w-72">
                <h2 class="font-bold text-lg">Job checkout</h2>
                <p class="text-sm">Please find below your quote</p>
                <hr class="border-slate-200 my-4">
                <h3 class="text-indigo-600 font-semibold">Single job post</h3>
                <div class="flex flex-col md:flex-row w-full justify-between">
                    <div>
                        Basic post
                    </div>
                    <div class="">
                        <span>&pound;{{ $postBasePrice }}</span>
                    </div>
                </div>
                @if ($isFeatured)
                    <div class="flex flex-col md:flex-row text-indigo-600 w-full justify-between">
                        <div>
                            Featured post
                        </div>
                        <div class="">
                            <span>&pound;25</span>
                        </div>
                    </div>
                @endif
                <hr class="border-slate-200 my-4">
                <div class="flex flex-col md:flex-row w-full justify-between">
                    <div>
                        Total:
                    </div>
                    <div>
                        <span class="font-semibold">&pound;{{ $checkoutTotal }}</span>
                    </div>
                </div>
                @error('create')
                    There was an issue creating your job listing please try again later.
                @enderror
                <x-unit.button class="w-full mt-4" wire:click="createJobListing" wire:loading.disable>
                    Create job listing
                </x-unit.button>
            </div>
        </div>

    </div>
</form>

@push('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endpush

<div class="w-full bg-white shadow-lg rounded-sm border p-5 border-slate-200">
    <h1 class="font-bold text-slate-800 text-2xl">Create job post</h1>
    <h2 class="font-semibold text-indigo-600 text-lg">Create a Wordpress job posting for our current introductary price
        from $50
    </h2>
    <p class="mt-2">
        Fill out the below information and proceed with the checkout to get your job submitted for approval. Don't
        worry, we only charge once your job post is live.
    </p>

    <hr class="border-slate-200 my-4" />

    <form class="flex-col space-y-4" wire:submit.prevent="createJobPost">
        <div>
            <x-form.label>Job name</x-form.label>
            <input type="text" class="form-input w-full" wire:model="name" />
        </div>
        <div wire:ignore>
            <x-form.label>Job Description</x-form.label>
            <div id="toolbar"></div>
            <div class="min-h-[320px] w-full" id="job_description" x-data x-ref="quillEditor" x-init="quill = new Quill($refs.quillEditor, {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ header: [2, false] }],
                        ['bold', 'italic', 'underline', 'link'],
                        [{ list: 'ordered' }, { list: 'bullet' }],
                    ],
                }
            });
            quill.on('editor-change', function() { $dispatch('input', quill.root.innerHTML); });"
                wire:model.debounce.1000ms="job_description">
                {!! $job_description !!}
            </div>
            {{-- <textarea class="form-input w-full" wire:model="job_description"></textarea> --}}
        </div>
    </form>
</div>

@push('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endpush

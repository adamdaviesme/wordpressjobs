<div class="p-5">
    <h2 class="font-bold text-xl text-center">Congratulations 🎉</h2>
    <p class="text-center mt-2">Thank you for submitting your first job with Wordpressjobs.io</p>

    <div class="flex flex-row mt-4 justify-center w-full">
        <x-unit.button-link
            href="{{ route('job.show', ['slug' => $job->slug, 'companySlug' => $job->company->slug, 'job' => $job]) }}">
            View Job Listing
        </x-unit.button-link>
    </div>
</div>

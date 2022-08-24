<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;

class JobListing extends Component
{
    public $job, $relatedJobs;


    private function getRelatedJobs()
    {
        $currentJobTags = $this->job->tags->toArray();
        $filterTags = array_map(fn ($tag) => $tag['id'], $currentJobTags);

        $this->relatedJobs = Job::where('expiry_date', '>', today())
            ->whereHas('tags', function ($query) use ($filterTags) {
                return $query->whereIn('tag_id', $filterTags);
            })->inRandomOrder()->limit(5)->get();
    }

    public function mount(Job $job)
    {
        ray()->clearScreen();
        $this->job = $job;
        $this->getRelatedJobs();
    }

    public function render()
    {
        return view('livewire.job-listing');
    }
}

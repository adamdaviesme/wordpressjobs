<?php

namespace App\Http\Livewire;

use App\Models\Benefit;
use App\Models\Company;
use App\Models\Job;
use App\Models\JobType;
use App\Models\Location;
use App\Models\Tag;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateJobPost extends Component
{
    // TODO: Add spam protection

    public $name, $salaryFrom, $salaryTo, $isRemote = false, $isFeatured = false, $selectedJobType, $jobDescription, $jobLocation, $locationId, $selectedTags, $selectedBenefits, $applicationUrl, $locations = [], $isSearching = false, $jobTags, $jobTypes, $benefits, $postBasePrice = 50.00, $checkoutTotal;

    protected $rules = [
        'name' => 'string|min:5|required',
        'salaryFrom' => 'required|int',
        'salaryTo' => 'required|int|gt:salaryFrom',
        'isRemote' => 'boolean',
        'isFeatured' => 'boolean',
        'selectedJobType' => 'int|required',
        'jobDescription' => 'string|required',
        'locationId' => 'int|required',
        'selectedTags' => 'array|required|min:1',
        'selectedBenefits' => 'array|required|min:1',
        'applicationUrl' => 'required|url'
    ];

    public function mount()
    {
        $this->jobTags = Tag::all();
        $this->jobTypes = JobType::all();
        $this->benefits = Benefit::all();
        $this->checkoutTotal = $this->postBasePrice;
        $this->selectedTags = [];
        $this->selectedBenefits = [];
    }

    // TODO: Change toggle methods into single multi-use toggler
    public function toggleTag(Tag $tag)
    {
        if (key_exists($tag->id, $this->selectedTags)) {
            unset($this->selectedTags[$tag->id]);
            return;
        }

        $this->selectedTags[$tag->id] = $tag->name;
        return;
    }

    // TODO: Change toggle methods into single multi-use toggler
    public function toggleBenefit(Benefit $benefit)
    {
        if (key_exists($benefit->id, $this->selectedBenefits)) {
            unset($this->selectedTags[$benefit->id]);
            return;
        }

        $this->selectedBenefits[$benefit->id] = $benefit->name;
        return;
    }

    public function searchLocation()
    {
        $this->isSearching = true;

        $this->locations = Location::where('name', 'LIKE', '%' . $this->jobLocation . '%')
            ->whereOr('country', 'LIKE', '%' . $this->jobLocation . '%')
            ->get();
    }

    public function selectLocation(Location $location)
    {
        $this->locationId = $location->id;
        $this->jobLocation = $location->name . ', ' . $location->country;
        $this->isSearching = false;
    }

    public function updatedIsFeatured()
    {
        if ($this->isFeatured) {
            $this->checkoutTotal = $this->postBasePrice + 25.00;
            return;
        }

        $this->checkoutTotal = $this->postBasePrice;
    }

    public function createJobListing()
    {
        $validatedData = $this->validate();

        // Create job instance
        $jobPosting = new Job([
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name'], '_'),
            'job_description' => $validatedData['jobDescription'],
            'salary_from' => $validatedData['salaryFrom'],
            'salary_to' => $validatedData['salaryTo'],
            'is_remote' => $validatedData['isRemote'],
            'is_featured' => $validatedData['isFeatured'],
            'application_url' => $validatedData['applicationUrl'],
            'location_id' => $validatedData['locationId'],
            'company_id' => Company::pluck('id')->random(),
            'job_type_id' => $validatedData['selectedJobType'],
            'expiry_date' => Carbon::now()->addWeeks(1),
        ]);

        // check save is valid
        if ($jobPosting->save()) {
            //attach benefits
            $jobPosting->benefits()->attach(array_keys($validatedData['selectedBenefits']));
            $jobPosting->tags()->attach(array_keys($validatedData['selectedTags']));
        } else {
            $this->addError('create', 'There was an issue creating your job post please try again later.');
        }

        // TODO: Add company profile

        // TODO: Add payment wall

        // Confirm modal
        $this->emit('openModal', 'modal.post-confirmation', ['job' => $jobPosting->id]);

        return;
    }

    public function render()
    {
        return view('livewire.create-job-post');
    }
}

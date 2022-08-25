<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;


class JobList extends Component
{
    use WithPagination;

    public $totalJobs = 12, $pages = 1, $search, $today, $pastThreshold, $isRemote = false, $currentOrder = 'desc',
        $filters = [
            'jobTypes' => [],
            'benefits' => []
        ],
        $orders = [
            'desc' => 'Newest',
            'asc' => 'Oldest'
        ];

    public function mount()
    {
        $today = new Carbon('now');
        $this->pastThreshold = $today->subDays(2);
    }

    public function paginationView()
    {
        return 'pagination.list';
    }

    public function updated()
    {
        $this->resetPage();
    }

    private function filterMultipleCheckboxes($choices)
    {
        foreach ($choices as $id => $slug) {
            if ($slug == false) {
                unset($choices[$id]);
            }
        }

        return $choices;
    }

    public function changeOrder(string $order)
    {
        $this->currentOrder = $order;
        $this->resetPage();
    }

    public function render()
    {
        // Emit scroll to top on render
        $this->emit('gotoTop');

        // Filter to id's for queries
        $jobTypes = array_keys($this->filterMultipleCheckboxes($this->filters['jobTypes']));
        $benefits = array_keys($this->filterMultipleCheckboxes($this->filters['benefits']));

        // Build query
        $jobs = Job::whereLike(['name', 'job_description', 'location.name', 'location.country'], $this->search ?? '')->where('expiry_date', '>', today())
            ->when($this->isRemote, function ($query, $isRemote) {
                return $query->where('is_remote', $isRemote);
            })
            ->when($jobTypes, function ($query, $jobTypes) {
                return $query->whereIn('job_type_id', $jobTypes);
            })
            ->when($benefits, function ($query, $benefits) {
                $query->whereHas('benefits', function ($query) use ($benefits) {
                    return $query->whereIn('benefit_id', $benefits);
                });
            })
            ->orderBy('is_featured', 'desc')

            ->orderBy('created_at', $this->currentOrder)->paginate(24);

        // Get other info based on query result
        $this->totalJobs = $jobs->total();
        $this->pages = $jobs->lastPage();

        return view('livewire.job-list', [
            'jobs' => $jobs
        ]);
    }
}

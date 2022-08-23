<?php

namespace App\View\Components\List;

use App\Models\JobType;
use App\Models\Benefit;

use Illuminate\View\Component;

class Sidebar extends Component
{

    public $jobTypes, $benefits;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->jobTypes = JobType::all();
        $this->benefits = Benefit::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.list.sidebar', [
            'jobTypes' => $this->jobTypes,
            'benefits' => $this->benefits
        ]);
    }
}

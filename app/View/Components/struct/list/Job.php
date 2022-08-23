<?php

namespace App\View\Components\struct\list;

use App\Models\Job as JobModel;
use Illuminate\View\Component;

class Job extends Component
{
    public $featured, $job, $isNew;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(int $featured = 0, JobModel $job = null, bool $isNew = false)
    {
        $this->isNew = $isNew;
        $this->featured = $featured;
        $this->job = $job;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.struct.list.job');
    }
}

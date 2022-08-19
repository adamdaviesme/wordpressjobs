<?php

namespace App\View\Components\struct\list;

use Illuminate\View\Component;

class Job extends Component
{
    public $featured, $jobLink;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(bool $featured = false, $jobLink = '#')
    {
        ray()->clearScreen();
        ray($jobLink);
        $this->featured = $featured;
        $this->jobLink = $jobLink;
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

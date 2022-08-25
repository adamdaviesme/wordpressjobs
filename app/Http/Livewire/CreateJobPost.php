<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CreateJobPost extends Component
{
    public $name, $job_description;

    public function mount()
    {
        ray()->clearScreen();
    }

    public function updated()
    {
        ray($this->job_description);
    }

    public function render()
    {
        return view('livewire.create-job-post');
    }
}

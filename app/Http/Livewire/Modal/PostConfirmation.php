<?php

namespace App\Http\Livewire\Modal;

use App\Models\Job;
use LivewireUI\Modal\ModalComponent;

class PostConfirmation extends ModalComponent
{

    public $job;

    public function mount(Job $job)
    {
        $this->job = $job;
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }

    public function render()
    {
        return view('livewire.modal.post-confirmation');
    }
}

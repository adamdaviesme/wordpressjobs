<?php

namespace App\Http\Livewire;

use Livewire\Component;

class JobPostCheckout extends Component
{
    public $postBasePrice = 50.00, $checkoutTotal;

    public function render()
    {
        return view('livewire.job-post-checkout');
    }
}

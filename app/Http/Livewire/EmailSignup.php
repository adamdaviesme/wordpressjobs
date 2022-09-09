<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use LivewireUI\Modal\ModalComponent;
use Spatie\Honeypot\Http\Livewire\Concerns\UsesSpamProtection;
use Spatie\Honeypot\Http\Livewire\Concerns\HoneypotData;

class EmailSignup extends ModalComponent
{
    use UsesSpamProtection;

    public $name, $email;
    public HoneypotData $honeyData;

    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email|unique:contacts,email',
    ];

    public function mount()
    {
        $this->honeyData = new HoneypotData();
    }

    public static function modalMaxWidth(): string
    {
        return 'md';
    }

    public function submit()
    {
        $validatedData = $this->validate();
        $this->protectAgainstSpam();

        $newContact = Contact::create($validatedData);

        if ($newContact instanceof Contact) {
            $this->resetExcept('honeyData');
            $this->closeModal();
            $this->dispatchBrowserEvent('banner-message', ['message' => '🎉 Successfully signed up to newsletter. Thank you!']);
            return;
        }

        $this->addError('signup-error', 'There was an issue signing up.');
    }

    public function render()
    {
        return view('livewire.email-signup');
    }
}

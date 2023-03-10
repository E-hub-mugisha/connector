<?php

namespace App\Http\Livewire\Admin;

use App\Models\Newsletter;
use Livewire\Component;

class NewsletterComponent extends Component
{
    public $names;
    public $email;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'names' => 'required',
            'email' => 'required|email'
        ]);
    }

    public function sendNewsletter()
    {
        $this->validate([
            'names' => 'required',
            'email' => 'required|email'
        ]);

        $contact = new Newsletter();
        $contact->names = $this->names;
        $contact->email = $this->email;
        $contact->save();

        session()->flash('Newsletter', 'Your Newsletter has been send successfully!');
    }
    public function render()
    {
        return view('livewire.admin.newsletter-component');
    }
}

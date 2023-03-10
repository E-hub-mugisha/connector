<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;

class ContactComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
    }

    public function sendMessage()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $contact = new Contact();
        $contact->name = $this->name;
        $contact->email = $this->email;
        $contact->phone = $this->phone;
        $contact->subject = $this->subject;
        $contact->message = $this->message;
        $contact->save();

        alert()->success('Thank You', 'Your message have been sent successfully.');
        session()->flash('message', 'Your message has been send successfully!');
        return redirect()->route('home');
    }
    public function render()
    {
        return view('livewire.contact-component')->layout('layouts.base');
    }
}

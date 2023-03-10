<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function sendNewsletter(Request $request)
    {
        $contact = new Newsletter();
        $contact->names = $request->input('names');
        $contact->email = $request->input('email');
        $contact->save();

        session()->flash('message', 'Your message has been send successfully!');

        return redirect()->route('home');
    }
}

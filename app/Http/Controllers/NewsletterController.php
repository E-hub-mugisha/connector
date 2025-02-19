<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function sendNewsletter(Request $request)
    {
        $contact = new Newsletter();
        $contact->email = $request->input('email');
        $contact->save();

        session()->flash('message', 'Your Newsletter Email has been send successfully!');

        return redirect()->route('home');
    }
    public function SubscribeEmail(Request $request)
    {
        $contact = new NewsletterSubscription();
        $contact->email = $request->input('email');
        $contact->save();

        session()->flash('message', 'Your Newsletter Email has been send successfully!');

        return redirect()->back();
    }
}

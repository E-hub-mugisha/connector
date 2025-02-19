<?php

namespace App\Http\Controllers;

use App\Mail\NewsletterMail;
use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewsletterSubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = NewsletterSubscription::all();
        return view('admin.newsletters.index', compact('subscriptions'));
    }

    public function create()
    {
        return view('admin.newsletters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscriptions,email',
        ]);

        NewsletterSubscription::create($request->all());

        return redirect()->route('admin.newsletterSubscriptions.index')
                         ->with('success', 'Subscription created successfully.');
    }

    public function show($id)
    {
        $subscription = NewsletterSubscription::find($id);
        return view('admin.newsletters.show', compact('subscription'));
    }

    public function edit($id)
    {
        $subscription = NewsletterSubscription::find($id);
        return view('admin.newsletters.edit', compact('subscription'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_subscriptions,email,' . $id,
        ]);

        $subscription = NewsletterSubscription::find($id);
        $subscription->update($request->all());

        return redirect()->route('admin.newsletterSubscriptions.index')
                         ->with('success', 'Subscription updated successfully.');
    }

    public function destroy($id)
    {
        $subscription = NewsletterSubscription::find($id);
        $subscription->delete();

        return redirect()->route('admin.newsletterSubscriptions.index')
                         ->with('success', 'Subscription deleted successfully.');
    }
    public function Newsletter()
    {
        return view('admin.newsletters.send');
    }
    public function sendNewsletter(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $content = $request->input('content');
        $subscriptions = NewsletterSubscription::all();

        foreach ($subscriptions as $subscription) {
            Mail::to($subscription->email)->send(new NewsletterMail($content));
        }

        return redirect()->route('admin.newsletterSubscriptions.index')
                         ->with('success', 'Newsletter sent successfully.');
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


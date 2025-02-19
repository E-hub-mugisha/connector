<?php

namespace App\Http\Controllers;

use App\Mail\EmailInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceProviderController extends Controller
{
    public function sendEmailInquiry(Request $request)
    {
        $mailData = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'proEmail' => $request->get('proEmail'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ];

        Mail::to($mailData['proEmail'])
            ->send(new EmailInquiry($mailData));

        alert()->success('Thank You', 'Your message have been sent successfully.');
        return redirect()->back();
    }
}

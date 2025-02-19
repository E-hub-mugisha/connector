<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceBooked;
use App\Models\ServiceBooking;
use App\Models\ServiceTransaction;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\bookMail;
use App\Models\Service;

class BookingController extends Controller
{
    public function bookNow(Request $request)
    {

        $booking = new ServiceBooking();
        $booking->user_id = Auth::user()->id;
        $booking->service_provider_id = $request->input('service_provider_id');
        $booking->service_id = $request->input('service_id');
        $booking->status = 'pending';
        $booking->total = $request->input('total');
        $booking->payment_mode = $request->input('payment_mode');
        $booking->names = $request->input('names');
        $booking->email = $request->input('email');
        $booking->phone = $request->input('phone');
        $booking->location = $request->input('location');
        $booking->notes = $request->input('notes');
        $booking->date = $request->input('date');
        $booking->time = $request->input('time');

        $booking->save();

        $mailData = [
            'payment_mode' => $request->get('payment_mode'),
            'names' => $request->get('names'),
            'proEmail' => $request->get('proEmail'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'location' => $request->get('location'),
            'notes' => $request->get('notes'),
            'date' => $request->get('date'),
            'time' => $request->get('time'),
            'service_name' => $request->get('service_name'),
            'url' => '#',
        ];

        Mail::to($mailData['proEmail'])
            ->send(new bookMail($mailData));

        alert()->success('Thank You', 'Your booking have been sent successfully.');

        return redirect()->route('home');
    }
    public function BookingService($service_slug)
    {
        $service = Service::where('slug', $service_slug)->first();
        return view('services.booking', compact('service'));
    }
}

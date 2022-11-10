<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceBooked;
use App\Models\ServiceBooking;
use App\Models\ServiceTransaction;

class BookingController extends Controller
{
    public function bookNow(Request $request)
    {
        $booking = new ServiceBooking();
        $booking->user_id = Auth::user()->id;
        $booking->service_provider_id = $request->input('service_provider_id');
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

        $booked = new ServiceBooked();
        $booked->service_id = $request->input('service_id');
        $booked->book_id = $booking->id;
        $booked->service_provider_id = $request->input('service_provider_id');
        $booked->total = $request->input('total');
        $booked->save();

        $transaction = new ServiceTransaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->book_id = $booking->id;
        $transaction->mode = $request->input('payment_mode');
        $transaction->status = 'pending';
        $transaction->save();

        session()->flash('message', 'Your message has been send successfully!');

        return redirect()->route('home');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceBooking;
use App\Models\ServicePayment;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentConfirmationMail;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\DB;
use KingFlamez\Rave\Facades\Rave as Flutterwave;

class PaymentController extends Controller
{
    //
    public function showPaymentPage($booking_id)
    {
        $booking = ServiceBooking::findOrFail($booking_id);
        return view('services.form', compact('booking'));
    }

    public function processPayment(Request $request)
    {
        $booking = ServiceBooking::findOrFail($request->booking_id);

        $data = [
            'tx_ref' => 'TRX-' . time(),
            'amount' => $booking->total,
            'currency' => 'USD',
            'payment_options' => 'card, mobilemoney, ussd',
            'redirect_url' => route('payment.callback'),
            'customer' => [
                'email' => $booking->email,
                'phone_number' => $booking->phone,
                'name' => $booking->names
            ],
            'meta' => [
                'booking_id' => $booking->id
            ],
            'customizations' => [
                'title' => 'Service Payment',
                'description' => 'Payment for service booking'
            ]
        ];

        return Flutterwave::initializePayment($data);
    }

    public function paymentCallback()
    {
        $status = request()->status;

        if ($status == 'successful') {
            $transactionID = request()->transaction_id;
            $transactionData = Flutterwave::verifyTransaction($transactionID);

            $booking = ServiceBooking::find($transactionData['meta']['booking_id']);
            $booking->payment_status = 'paid';
            $booking->save();

            return redirect()->route('home')->with('success', 'Payment successful!');
        } else {
            return redirect()->route('home')->with('error', 'Payment failed.');
        }
    }
}

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
use App\Mail\UserBookingMail;
use App\Models\Service;
use App\Models\Staff; // Import the Staff model if not already imported
use App\Models\StaffMember;
use App\Models\StaffBooking; // Import the StaffBooking model
use Illuminate\Support\Facades\Log;
use Exception;

class BookingController extends Controller
{
    public function bookNow(Request $request)
    {
        try {
            $validated = $request->validate([
                'service_provider_id' => 'required|exists:service_providers,id',
                'service_id' => 'required|exists:services,id',
                'payment_mode' => 'required|string',
                'names' => 'required|string|max:255',
                'email' => 'required|email',  // User's email
                'proEmail' => 'required|email', // Service provider's email
                'phone' => 'required|string|max:15',
                'location' => 'required|string|max:255',
                'notes' => 'nullable|string',
                'date' => 'required|date',
                'time' => 'required|date_format:H:i',
                'total' => 'required',
            ]);

            // Fetch the service
            $service = Service::find($validated['service_id']);
            if (!$service) {
                Alert::error('Error', 'Service not found.');
                return redirect()->back();
            }

            $booking = new ServiceBooking();
            $booking->user_id = Auth::user()->id;
            $booking->service_provider_id = $validated['service_provider_id'];
            $booking->service_id = $validated['service_id'];
            $booking->status = 'pending';
            $booking->total = $validated['total'];
            $booking->payment_mode = $validated['payment_mode'];
            $booking->names = $validated['names'];
            $booking->email = $validated['email'];
            $booking->phone = $validated['phone'];
            $booking->location = $validated['location'];
            $booking->notes = $validated['notes'];
            $booking->date = $validated['date'];
            $booking->time = $validated['time'];

            // Assign staff
            if ($request->has('staff_id') && !empty($request->input('staff_id'))) {
                $booking->staff_id = $request->input('staff_id');
            } else {
                $availableStaff = StaffMember::where('status', 'available')->first();
                if ($availableStaff) {
                    $booking->staff_id = $availableStaff->id;
                }
            }

            $booking->save();

            // Save staff booking
            if ($booking->staff_id) {
                $staffBooking = new StaffBooking();
                $staffBooking->service_id = $booking->service_id;
                $staffBooking->staff_id = $booking->staff_id;
                $staffBooking->status = 'pending';
                $staffBooking->time = $booking->time;
                $staffBooking->save();
            }

            // Prepare email data
            $mailData = [
                'payment_mode' => $validated['payment_mode'],
                'names' => $validated['names'],
                'proEmail' => $validated['proEmail'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'location' => $validated['location'],
                'notes' => $validated['notes'] ?? 'No additional notes provided.',
                'date' => $validated['date'],
                'time' => $validated['time'],
                'service_name' => $service->name, // Get service name from the model
                'url' => '#',
            ];

            try {
                // Send email to the Service Provider
                Mail::to($mailData['proEmail'])->send(new bookMail($mailData));

                // Send email to the User who booked
                Mail::to($mailData['email'])->send(new UserBookingMail($mailData));
            } catch (Exception $e) {
                Log::error('Failed to send booking email: ' . $e->getMessage());
                Alert::error('Email Error', 'Booking was successful, but the confirmation email could not be sent.');
                return redirect()->route('home');
            }

            Alert::success('Thank You', 'Your booking has been sent successfully, now proceeding with payment.');

            return redirect()->route('home.payment'['booking_id' => $booking->id]);
        } catch (Exception $e) {
            Log::error('Booking failed: ' . $e->getMessage());
            Alert::error('Error', 'Something went wrong. Please try again.');
            return redirect()->back();
        }
    }

    public function BookingService($service_slug)
    {
        $service = Service::where('slug', $service_slug)->first();

        // Get available staff members for the service
        $staffMembers = StaffMember::where('service_provider_id', $service->service_provider_id)->with('services')->where('status', 'available')
            ->get();
        // $staffMembers = StaffMember::where('service_id', $service->id)
        //                     ->where('status', 'available')
        //                     ->get();

        return view('services.booking', compact('service', 'staffMembers'));
    }

    public function paymentProcess()
    {
        return view('payments.index');
    }
    public function processPayment(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:service_bookings,id',
            'payment_method' => 'required|string',
            'card_number' => 'required_if:payment_method,card|digits:16',
            'expiry_date' => 'required_if:payment_method,card|date_format:m/y',
            'cvv' => 'required_if:payment_method,card|digits:3',
        ]);

        $booking = ServiceBooking::findOrFail($request->booking_id);

        // Simulate a transaction ID
        $transactionId = 'TRX' . strtoupper(uniqid());

        // Save the payment record
        $payment = new ServicePayment();
        $payment->booking_id = $booking->id;
        $payment->user_id = $booking->user_id;
        $payment->amount = $booking->total;
        $payment->payment_method = $request->payment_method;
        $payment->transaction_id = $transactionId;
        $payment->status = 'successful';
        $payment->save();

        // Update booking status
        $booking->status = 'paid';
        $booking->save();

        Alert::success('Payment Successful', 'Your payment has been processed successfully.');

        return redirect()->route('home');
    }
}

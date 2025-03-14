<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceBooked;
use App\Models\ServiceBooking;
use App\Models\ServiceTransaction;
use App\Models\ServicePayment;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\bookMail;
use App\Mail\PaymentConfirmationMail;
use App\Mail\UserBookingMail;
use App\Models\Service;
use App\Models\StaffMember;
use App\Models\StaffBooking;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Handles service booking request.
     */
    public function bookNow(Request $request)
    {
        try {
            $validated = $request->validate([
                'service_provider_id' => 'required|exists:service_providers,id',
                'service_id' => 'required|exists:services,id',
                'payment_mode' => 'required|string',
                'names' => 'required|string|max:255',
                'email' => 'required|email',
                'proEmail' => 'required|email',
                'phone' => 'required|string|max:15',
                'location' => 'required|string|max:255',
                'notes' => 'nullable|string',
                'date' => 'required|date',
                'time' => 'required|date_format:H:i',
                'total' => 'required|numeric|min:0',
            ]);

            $service = Service::findOrFail($validated['service_id']);

            $booking = new ServiceBooking();
            $booking->user_id = Auth::id();
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

            // Assign staff if provided
            if ($request->filled('staff_id')) {
                $staff = StaffMember::find($request->staff_id);
                if ($staff && $staff->status === 'available') {
                    $booking->staff_id = $staff->id;
                }
            } else {
                $availableStaff = StaffMember::where('status', 'available')->first();
                if ($availableStaff) {
                    $booking->staff_id = $availableStaff->id;
                }
            }

            $booking->save();

            // Save staff booking if assigned
            if ($booking->staff_id) {
                StaffBooking::create([
                    'service_id' => $booking->service_id,
                    'staff_id' => $booking->staff_id,
                    'status' => 'pending',
                    'time' => $booking->time,
                ]);
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
                'service_name' => $service->name,
                'url' => '#',
            ];

            try {
                Mail::to($mailData['proEmail'])->send(new bookMail($mailData));
                Mail::to($mailData['email'])->send(new UserBookingMail($mailData));
            } catch (Exception $e) {
                Log::error('Failed to send booking email: ' . $e->getMessage());
                Alert::error('Email Error', 'Booking was successful, but the confirmation email could not be sent.');
            }

            // Redirect to the modal page for payment options
            return redirect()->route('booking.confirmation', ['booking_id' => $booking->id]);
        } catch (Exception $e) {
            Log::error('Booking failed: ' . $e->getMessage());
            Alert::error('Booking Failed', 'An error occurred: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    public function showConfirmation($booking_id)
    {
        $booking = ServiceBooking::findOrFail($booking_id);
        return view('services.booking-confirmation', compact('booking'));
    }

    /**
     * Displays the booking form for a specific service.
     */
    public function BookingService($service_slug)
    {
        $service = Service::where('slug', $service_slug)->firstOrFail();

        // Get available staff members for the service
        $staffMembers = StaffMember::where('service_provider_id', $service->service_provider_id)
            ->where('status', 'available')
            ->with('services')
            ->get();

        return view('services.booking', compact('service', 'staffMembers'));
    }

    /**
     * Shows the payment page.
     */
    public function paymentProcess()
    {
        return view('payments.index');
    }

    /**
     * Processes service payments.
     */
    public function processPayment(Request $request)
    {
        // Validate request based on the payment mode
        $validationRules = [
            'booking_id' => 'required|exists:service_bookings,id',
            'payment_mode' => 'required|string|in:card,cash,mobile_money',
            'user_id' => 'required',
            'total' => 'required',
        ];

        // Additional validation rules based on payment mode
        if ($request->payment_mode === 'card') {
            $validationRules = array_merge($validationRules, [
                'card_number' => 'required|digits:16',
                'expiry_date' => 'required|date_format:m/y',
                'cvv' => 'required|digits:3',
            ]);
        } elseif ($request->payment_mode === 'mobile_money') {  // Fixed the payment mode name here
            $validationRules = array_merge($validationRules, [
                'transaction_id' => 'required|string',
            ]);
        }

        // Apply the validation
        $request->validate($validationRules);

        // Start database transaction to ensure atomicity
        DB::beginTransaction();

        try {
            // Retrieve the booking
            $booking = ServiceBooking::findOrFail($request->booking_id);

            // Check if the booking is canceled
            if ($booking->status === 'canceled') {
                Alert::error('Booking Canceled', 'The booking has been canceled, so payment cannot be processed.');
                return redirect()->route('home');
            }

            // Prevent duplicate payments
            if ($booking->payment_status === 'paid') {
                Alert::warning('Payment Already Processed', 'This booking has already been paid.');
                return redirect()->route('home');
            }

            // Initialize transaction ID and payment status
            $paymentStatus = 'pending';
            $transactionId = null;

            // Handle payments based on the payment mode
            if ($request->payment_mode === 'card') {
                $transactionId = 'TRX' . strtoupper(uniqid());
                $paymentStatus = 'successful';
            } elseif ($request->payment_mode === 'mobile_money') {
                $transactionId = $request->transaction_id;
                $paymentStatus = 'successful';
            } elseif ($request->payment_mode === 'cash') {
                $transactionId = 'CASH-' . strtoupper(uniqid());
                $paymentStatus = 'pending';
            }

            // Create payment record
            $payment = new ServicePayment();
            $payment->booking_id = $request->input('booking_id');
            $payment->user_id = $request->input('user_id');
            $payment->amount = $request->input('total');
            $payment->payment_mode = $request->input('payment_mode');
            $payment->transaction_id = $transactionId;
            $payment->status = $paymentStatus;
            $payment->save();

            // Update booking status and associate payment_id if payment is successful
            if ($paymentStatus === 'successful') {
                $booking->payment_status = 'paid';
                $booking->payment_id = $payment->id;
                $booking->save();
            }

            // Commit the transaction if no error occurs
            DB::commit();

            // Send confirmation email if payment was successful
            if ($paymentStatus === 'successful') {
                try {
                    Mail::to($booking->email)->send(new PaymentConfirmationMail($booking));
                } catch (Exception $e) {
                    Log::error('Payment email failed: ' . $e->getMessage());
                }
            }

            // Alert user about successful payment
            Alert::success('Payment Processed', 'Your payment has been recorded successfully.');
            return redirect()->route('home');
        } catch (\Exception $e) {
            // In case of any exception, rollback the transaction and log the error
            DB::rollBack();
            Log::error('Payment processing failed: ' . $e->getMessage());

            // Display a generic error message to the user
            Alert::error('Payment Failed', 'An error occurred while processing your payment. Please try again later.');
            return redirect()->route('home');
        }
    }
}

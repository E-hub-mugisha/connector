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
use App\Models\Staff; // Import the Staff model if not already imported
use App\Models\StaffMember;
use App\Models\StaffBooking; // Import the StaffBooking model
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function bookNow(Request $request)
{
    // Validate the incoming request
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
        'total' => 'required',
    ]);

    // Create a new service booking
    $booking = new ServiceBooking();
    $booking->user_id = Auth::user()->id;
    $booking->service_provider_id = $validated['service_provider_id'];
    $booking->service_id = $validated['service_id'];
    $booking->status = 'pending';
    $booking->total = $validated['total']; // Make sure this comes from the request or calculation
    $booking->payment_mode = $validated['payment_mode'];
    $booking->names = $validated['names'];
    $booking->email = $validated['email'];
    $booking->phone = $validated['phone'];
    $booking->location = $validated['location'];
    $booking->notes = $validated['notes'];
    $booking->date = $validated['date'];
    $booking->time = $validated['time'];

    // Assign the selected staff member or default to the first available staff
    if ($request->has('staff_id') && $request->input('staff_id') !== '') {
        $booking->staff_id = $request->input('staff_id');
    } else {
        // Fallback logic: Automatically assign an available staff member (based on availability)
        $availableStaff = StaffMember::where('status', 'available')->first();
        if ($availableStaff) {
            $booking->staff_id = $availableStaff->id;
        }
    }

    // Save the booking to the ServiceBooking table
    $booking->save();

    // Now, insert into the staff_bookings table
    if ($booking->staff_id) {
        $staffBooking = new StaffBooking();
        $staffBooking->service_id = $booking->service_id;
        $staffBooking->staff_id = $booking->staff_id;
        $staffBooking->status = 'pending';  // You can change this based on your needs
        $staffBooking->time = $booking->time;
        $staffBooking->save();
    }

    // Prepare email data
    $mailData = [
        'payment_mode' => $validated['payment_mode'],
        'names' => $validated['names'],
        'proEmail' => $validated['proEmail'], // Ensure proEmail exists in the request
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'location' => $validated['location'],
        'notes' => $validated['notes'],
        'date' => $validated['date'],
        'time' => $validated['time'],
        'service_id' => $validated['service_id'], // Ensure service_name exists in the request
        'url' => '#',
    ];

    try {
        // Send email to the service provider
        Mail::to($mailData['proEmail'])
            ->send(new bookMail($mailData));
    } catch (\Exception $e) {
        // Log error or alert user
        Log::error('Failed to send booking email: ' . $e->getMessage());
        return redirect()->route('home')->with('error', 'Booking was successful, but failed to send confirmation email.');
    }

    // Success alert
    alert()->success('Thank You', 'Your booking has been sent successfully.');

        // Redirect to the homepage or booking confirmation page
        return redirect()->route('home');
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
}

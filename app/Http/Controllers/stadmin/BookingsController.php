<?php

namespace App\Http\Controllers\stadmin;

use App\Http\Controllers\Controller;
use App\Mail\bookMail;
use App\Models\ServiceBooking;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\feedBack;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $orders = ServiceBooking::where('service_provider_id', $sprovider->id)->get();
        $services = Service::where('service_provider_id', $sprovider->id)->get();
        return view('stadmin.bookings.index',compact('orders','services','sprovider'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->utype = 'CST';
        $user->password = Hash::make($request['phone']);
        $user->save();

        $booking = new ServiceBooking();
        $booking->user_id = Auth::user()->id;
        $booking->service_provider_id = $request->input('service_provider_id');
        $booking->service_id = $request->input('service_id');
        $booking->status = 'pending';
        $booking->total = $request->input('total');
        $booking->payment_mode = $request->input('payment_mode');
        $booking->names = $request->input('name');
        $booking->email = $request->input('email');
        $booking->phone = $request->input('phone');
        $booking->location = $request->input('location');
        $booking->notes = $request->input('notes');
        $booking->date = $request->input('date');
        $booking->time = $request->input('time');

        $booking->save();


        alert()->success('Thank You', 'Your booking have been sent successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookings = ServiceBooking::where('id', $id)->first();
        return view('stadmin.bookings.show',compact('bookings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function approveBooking($id)
    {
        $bookings = ServiceBooking::findOrFail($id);
        $bookings->status = "approved";
        $bookings->save();


        $responseData = [
            'name' => Auth::user()->name,
            'names' => $bookings->names,
            'email' => $bookings->email,
            'status' => $bookings->status,
            $proFeed = Auth::user()->email,
        ];

        Mail::to($responseData['email'])
            ->cc($proFeed)
            ->send(new feedBack($responseData));

        alert()->success('SuccessAlert', 'Booking Approved');
        session()->flash('message', 'Booking Approved');
     
        return redirect()->route( 'serviceProviderBooking.index')
                        ->with('success','updated successfully');
    }

    public function CompleteBooking($id)
    {
        $bookings = ServiceBooking::findOrFail($id);
        $bookings->status = "completed";
        $bookings->save();


        $responseData = [
            'name' => Auth::user()->name,
            'names' => $bookings->names,
            'email' => $bookings->email,
            'status' => $bookings->status,
            $proFeed = Auth::user()->email,
        ];

        Mail::to($responseData['email'])
            ->cc($proFeed)
            ->send(new feedBack($responseData));

        alert()->success('SuccessAlert', 'Booking Completed');
        session()->flash('message', 'Order Completed');
     
        return redirect()->route( 'serviceProviderBooking.index')
                        ->with('success','updated successfully');
    }

    public function cancelBooking($id)
    {
        $bookings = ServiceBooking::findOrFail($id);
        $bookings->status = "decline";
        $bookings->save();


        $responseData = [
            'name' => Auth::user()->name,
            'names' => $bookings->names,
            'email' => $bookings->email,
            'status' => $bookings->status,
            $proFeed = Auth::user()->email,
        ];

        Mail::to($responseData['email'])
            ->cc($proFeed)
            ->send(new feedBack($responseData));

        alert()->success('SuccessAlert', 'booking canceled');
        session()->flash('message', 'booking canceled');
     
        return redirect()->route( 'serviceProviderBooking.index')
                        ->with('success','updated successfully');
    }
}

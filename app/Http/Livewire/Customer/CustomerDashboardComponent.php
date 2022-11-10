<?php

namespace App\Http\Livewire\Customer;

use App\Models\Order;
use App\Models\ServiceBooking;
use App\Models\ServiceTransaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CustomerDashboardComponent extends Component
{
    public $booking_id;


    public function deliveredOrder($booking_id)
    {
        $serviceBookings = ServiceBooking::find($booking_id);
        $serviceBookings->status = "completed";
        $serviceBookings->save();
    }
    public function cancelOrder($booking_id)
    {
        $serviceBookings = ServiceBooking::find($booking_id);
        $serviceBookings->status = "decline";
        $serviceBookings->save();
    }
    public function render()
    {
        $productOrders = Order::where('user_id', Auth::user()->id)->paginate(12);
        $serviceBookings = ServiceBooking::where('user_id', Auth::user()->id)->paginate(12);
        return view('livewire.customer.customer-dashboard-component',['serviceBookings'=>$serviceBookings,'productOrders'=>$productOrders])->layout('layouts.base');
    }
}

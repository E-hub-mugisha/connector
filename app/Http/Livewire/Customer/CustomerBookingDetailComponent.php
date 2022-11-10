<?php

namespace App\Http\Livewire\Customer;

use Livewire\Component;
use App\Models\ServiceBooking;
use Illuminate\Support\Facades\Auth;

class CustomerBookingDetailComponent extends Component
{
    public $booking_id;

    public function mount($booking_id)
    {
        $this->booking_id = $booking_id;
    }

    public function render()
    {
        $serviceBookings = ServiceBooking::where('user_id', Auth::user()->id)->where('id',$this->booking_id)->first();
        return view('livewire.customer.customer-booking-detail-component',['serviceBookings'=>$serviceBookings])->layout('layouts.base');
    }
}

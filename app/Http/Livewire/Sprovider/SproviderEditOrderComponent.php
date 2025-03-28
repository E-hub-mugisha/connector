<?php

namespace App\Http\Livewire\Sprovider;

use App\Models\Service;
use App\Models\ServiceBooked;
use Livewire\Component;
use App\Models\ServiceBooking;
use Illuminate\Support\Facades\Auth;

class SproviderEditOrderComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function render()
    {
        $services = Service::all();
        
        $serviceBookings = ServiceBooking::where('id',$this->order_id)->first();
        return view('livewire.sprovider.sprovider-edit-order-component',['serviceBookings'=>$serviceBookings])->layout('layouts.guest');
    }
}

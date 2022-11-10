<?php

namespace App\Http\Livewire\Sprovider;
use App\Models\Booking;
use App\Models\ServiceBooking;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceProvider;

class SproviderOrderComponent extends Component
{
    public function deleteOrder($order_id)
    {
        $order = ServiceBooking::find($order_id);
        
        $order->delete();
        session()->flash('message','Order Cancelled');
    }
    public function validateOrder($order_id)
    {
        $order = ServiceBooking::find($order_id);
        $order->status = "completed";
        $order->save();
        session()->flash('message','Order completed');
    }
    public function cancelOrder($order_id)
    {
        $order = ServiceBooking::find($order_id);
        $order->status = "decline";
        $order->save();
        session()->flash('message','Order cancelled');
    }
    public function render()
    {
        $sprovider = ServiceProvider::where('user_id',Auth::user()->id)->first();
        $orders = ServiceBooking::where('service_provider_id',$sprovider->id)->get();
        return view('livewire.sprovider.sprovider-order-component',['orders'=>$orders])->layout('layouts.guest');
    }
}

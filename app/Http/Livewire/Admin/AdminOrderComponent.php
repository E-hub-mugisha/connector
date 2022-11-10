<?php

namespace App\Http\Livewire\Admin;

use App\Models\Booking;
use Livewire\Component;
use App\Models\ServiceBooking;
use Livewire\WithPagination;

class AdminOrderComponent extends Component
{
    use WithPagination;

    public function deleteOrder($order_id)
    {
        $order = Booking::find($order_id);
        
        $order->delete();
        session()->flash('message','Order Cancelled');
    }
    public function validateOrder($order_id)
    {
        $order = Booking::find($order_id);
        $order->status = "completed";
        $order->save();
        session()->flash('message','Order completed');
    }
    public function cancelOrder($order_id)
    {
        $order = Booking::find($order_id);
        $order->status = "decline";
        $order->save();
        session()->flash('message','Order cancelled');
    }
    public function render()
    {
        $orders = ServiceBooking::paginate(12);
        return view('livewire.admin.admin-order-component',['orders'=>$orders])->layout('layouts.app');
    }
}

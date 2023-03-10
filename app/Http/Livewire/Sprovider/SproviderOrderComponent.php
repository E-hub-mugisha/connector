<?php

namespace App\Http\Livewire\Sprovider;

use App\Models\Booking;
use App\Models\ServiceBooking;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Mail;
use App\Mail\feedBack;
use RealRashid\SweetAlert\Facades\Alert;

class SproviderOrderComponent extends Component
{
    public function deleteOrder($order_id)
    {
        $order = ServiceBooking::find($order_id);

        $order->delete();
        session()->flash('message', 'Order Cancelled');
    }
    public function validateOrder($order_id)
    {
        $order = ServiceBooking::find($order_id);
        $order->status = "completed";
        $order->save();


        $responseData = [
            'name' => Auth::user()->name,
            'names' => $order->names,
            'email' => $order->email,
            'status' => $order->status,
            $proFeed = Auth::user()->email,
        ];

        Mail::to($responseData['email'])
            ->cc($proFeed)
            ->send(new feedBack($responseData));

        alert()->success('SuccessAlert', 'Order completed');
        session()->flash('message', 'Order completed');
    }
    public function cancelOrder($order_id)
    {
        $order = ServiceBooking::find($order_id);
        $order->status = "decline";
        $order->save();
        $responseData = [
            'name' => Auth::user()->name,
            'names' => $order->names,
            'email' => $order->email,
            'status' => $order->status,
            $proFeed = Auth::user()->email,
        ];

        Mail::to($responseData['email'])
            ->cc($proFeed)
            ->send(new feedBack($responseData));

        alert()->success('SuccessAlert', 'Order cancelled');
        session()->flash('message', 'Order cancelled');
    }
    public function render()
    {
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $orders = ServiceBooking::where('service_provider_id', $sprovider->id)->get();
        return view('livewire.sprovider.sprovider-order-component', ['orders' => $orders])->layout('layouts.guest');
    }
}

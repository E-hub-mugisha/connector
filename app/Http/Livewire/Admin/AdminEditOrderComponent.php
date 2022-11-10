<?php

namespace App\Http\Livewire\Admin;

use App\Models\Booking;
use Livewire\Component;

class AdminEditOrderComponent extends Component
{
    public $service_name;
    public $service_id;
    public $service_provider;
    public $service_category;
    public $name;
    public $email;
    public $phone;
    public $location;
    public $date;
    public $time;
    public $total;
    public $discount;
    public $status;
    public $description;
    public $payment_mode;
    public $order_id;

    public function mount($order_id)
    {
        $order = Booking::where('id', $order_id)->first();
        $this->order_id = $order->id;
        $this->service_id = $order->service_id;
        $this->service_name = $order->service_name;
        $this->service_provider = $order->service_provider;
        $this->service_category = $order->service_category;
        $this->name = $order->name;
        $this->email = $order->email;
        $this->phone = $order->phone;
        $this->location = $order->location;
        $this->date = $order->date;
        $this->time = $order->time;
        $this->total = $order->total;
        $this->discount = $order->discount;
        $this->status = $order->status;
        $this->payment_mode = $order->payment_mode;
        $this->description = $order->description;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'service_id' => 'required',
            'service_name' => 'required',
            'service_provider' => 'required',
            'service_category' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'date' => 'required',
            'time' => 'required',
            'description' => 'required',
            'payment_mode' => 'required',
            'discount' => 'required',
            'total' => 'required',
            'status' => 'required',

        ]);
    }

    public function updateOrder()
    {
        $this->validate([
            'service_id' => 'required',
            'service_name' => 'required',
            'service_provider' => 'required',
            'service_category' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'date' => 'required',
            'time' => 'required',
            'description' => 'required',
            'payment_mode' => 'required',
            'discount' => 'required',
            'status' => 'required',
            'total' => 'required',
        ]);

        $order = Booking::find($this->order_id);
        $order->service_id = $this->service_id;
        $order->service_name = $this->service_name;
        $order->service_provider = $this->service_provider;
        $order->service_category = $this->service_category;
        $order->name = $this->name;
        $order->email = $this->email;
        $order->phone = $this->phone;
        $order->location = $this->location;
        $order->date = $this->date;
        $order->time = $this->time;
        $order->total = $this->total;
        $order->discount = $this->discount;
        $order->status = $this->status;
        $order->payment_mode = $this->payment_mode;
        $order->description = $this->description;

        $order->save();
        session()->flash('message', 'order updated successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-order-component')->layout('layouts.app');
    }
}

<?php

namespace App\Http\Livewire\Customer;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CustomerPorderComponent extends Component
{
    public $porder_id;

    public function deliveredOrder($porder_id)
    {
        $productOrder = Order::find($porder_id);
        $productOrder->status = "completed";
        $productOrder->save();
    }
    public function cancelOrder($porder_id)
    {
        $productOrder = Order::find($porder_id);
        $productOrder->status = "decline";
        $productOrder->save();
    }

    public function mount($porder_id)
    {
        $this->porder_id = $porder_id;
    }
    public function render()
    {
        $productOrder = Order::where('user_id', Auth::user()->id)->where('id',$this->porder_id)->first();
        return view('livewire.customer.customer-porder-component', ['productOrder'=>$productOrder])->layout('layouts.base');
    }
}

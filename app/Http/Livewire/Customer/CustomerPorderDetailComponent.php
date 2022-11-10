<?php

namespace App\Http\Livewire\Customer;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CustomerPorderDetailComponent extends Component
{
    public $porder_id;

    public function mount($porder_id)
    {
        $this->porder_id = $porder_id;
    }

    public function deliveredOrder($porder_id)
    {
        $porder = Order::find($porder_id);
        $porder->status = "completed";
        $porder->save();
        session()->flash('message','Order completed');
    }
    public function cancelOrder($porder_id)
    {
        $porder = Order::find($porder_id);
        $porder->status = "decline";
        $porder->save();
        session()->flash('message','Order cancelled');
    }
    public function render()
    {
        $porder = Order::where('user_id', Auth::user()->id)->where('id',$this->porder_id)->first();
        return view('livewire.customer.customer-porder-detail-component',['porder'=>$porder])->layout('layouts.base');
    }
}

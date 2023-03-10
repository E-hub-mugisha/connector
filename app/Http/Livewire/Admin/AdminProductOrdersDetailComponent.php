<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class AdminProductOrdersDetailComponent extends Component
{
    public $order_id;

    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function deliveredOrder($porder_id)
    {
        $porder = Order::find($porder_id);
        $porder->status = "completed";
        $porder->save();
        session()->flash('message','Order Delivered');
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
        $porder = Order::where('id', $this->order_id)->first();
        return view('livewire.admin.admin-product-orders-detail-component',['porder'=>$porder])->layout('layouts.app');
    }
}

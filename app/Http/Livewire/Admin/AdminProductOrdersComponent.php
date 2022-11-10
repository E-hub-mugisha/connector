<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;


class AdminProductOrdersComponent extends Component
{
    public function render()
    {
        $porders = Order::paginate(12);
        return view('livewire.admin.admin-product-orders-component',['porders'=>$porders])->layout('layouts.app');
    }
}

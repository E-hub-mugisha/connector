<?php

namespace App\Http\Livewire\Order;

use Livewire\Component;

class OrderComponent extends Component
{
    public function render()
    {
        return view('livewire.order.order-component')->layout('layouts.base');
    }
}

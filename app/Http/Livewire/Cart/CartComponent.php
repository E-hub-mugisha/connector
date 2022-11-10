<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use Cart;

class CartComponent extends Component
{
    public function increaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
    }
    public function decreaseQuantity($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
    }
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        session()->flash('success_message','item has been removed');
    }
    public function destroyAll()
    {
        Cart::destroy();
        session()->flash('success_message','item has been removed');
    }

    
    
    public function render()
    {
        
        return view('livewire.cart.cart-component')->layout('components.shop');
    }
}

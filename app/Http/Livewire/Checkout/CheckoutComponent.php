<?php

namespace App\Http\Livewire\Checkout;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Cart;

class CheckoutComponent extends Component
{
    public $names;
    public $email;
    public $phone;
    public $location;
    public $notes;

    public $payment_mode;
    public $thankyou;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'names' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'notes' => 'required',
            'payment_mode' => 'required',
        ]);
    }

    public function placeOrder()
    {
        $this->validate([
            'names' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'notes' => 'required',
            'payment_mode' => 'required',
        ]);

        foreach (Cart::content() as $item) {
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->subtotal = $item->subtotal;
            $order->total = $item->total;
            $order->names = $this->names;
            $order->email = $this->email;
            $order->phone = $this->phone;
            $order->location = $this->location;
            $order->notes = $this->notes;
            $order->status = 'pending';
            $order->payment_mode = $this->payment_mode;

            $order->save();
        }

        foreach (Cart::content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if ($this->payment_mode == 'cash-on-delivery') {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'cash-on-delivery';
            $transaction->status = 'pending';
            $transaction->save();
        }

        $this->thankyou = 1;
        Cart::destroy();
        session()->forget('checkout');
    }
    public function verifyForCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else if ($this->thankyou) {
            return redirect()->route('thank-you');
        }
        // else if(!session()->get('checkout'))
        // {
        //     return redirect()->route('product.cart');
        // }
    }
    public function render()
    {
        $this->verifyForCheckout();
        $users = User::where('id', Auth::user()->id)->first();
        return view('livewire.checkout.checkout-component', ['users' => $users])->layout('components.shop');
    }
}

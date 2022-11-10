<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'regular_price' => $request->regular_price,
            'quantity' => $request->quantity,
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('product.cart');
    }
}

<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductDetailComponent extends Component
{
    public $product_slug;

    public function mount($product_slug)
    {
        $this->product_slug = $product_slug;
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','item added in cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        $product = Product::where('slug', $this->product_slug)->first();
        $r_products = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(5)->get();
        return view('livewire.shop.product-detail-component',['product'=>$product,'r_products'=>$r_products])->layout('components.shop');
    }
}

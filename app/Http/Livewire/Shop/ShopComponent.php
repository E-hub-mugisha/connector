<?php

namespace App\Http\Livewire\Shop;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;

class ShopComponent extends Component
{
    use WithPagination;
    public $sorting;

    public function mount()
    {
        $this->sorting = "default";
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','item added in cart');
        return redirect()->route('product.cart');
    }
    public function render()
    {
        if($this->sorting=='date')
        {
            $products = Product::orderBy('created_at','DESC')->paginate(12);
        }
        else if($this->sorting=='price')
        {
            $products = Product::orderBy('regular_price','ASC')->paginate(12);
        }
        else if($this->sorting=='price-desc')
        {
            $products = Product::orderBy('regular_price','DESC')->paginate(12);
        }
        else{
            $products = Product::paginate(12);
        }
        
        $categories = Category::all();
        $sproducts = Product::inRandomOrder()->take(4)->get();
        
        return view('livewire.shop.shop-component',['products'=>$products,'sproducts'=>$sproducts,'categories'=>$categories])->layout('components.shop');
    }
}

<?php

namespace App\Http\Livewire\Shop;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Str;

class ProductBrandComponent extends Component
{
    use WithPagination;
    public $brand;
    public function mount($brand)
    {
        $this->brand = $brand;
    }
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','item added in cart');
        return redirect()->route('product.cart');
    }
    public function render()
    {
        $categories = Category::all();
        $brands = Product::where('brand',$this->brand)->paginate(12);
        return view('livewire.shop.product-brand-component',['brands'=>$brands,'categories'=>$categories])->layout('components.shop');
    }
}

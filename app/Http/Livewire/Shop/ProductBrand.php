<?php

namespace App\Http\Livewire\Shop;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductBrand extends Component
{
    use WithPagination;
    public $sorting;
    public $brand;

    public function mount($brand)
    {
        $this->sorting = "default";
        $this->brand = $brand;
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
        $products = Product::where('brand', $this->brand)->get();
        return view('livewire.shop.product-brand',['products'=>$products,'categories'=>$categories])->layout('components.shop');
    }
}

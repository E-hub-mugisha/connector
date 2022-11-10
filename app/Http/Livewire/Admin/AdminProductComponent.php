<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    public function deleteProduct($product_id)
    {
        $product = Product::find($product_id);
        if($product->image)
        {
            unlink('assets/images/products'."/".$product->image);
        }
        $product->delete();
        session()->flash('message','Product  deleted');
    }
    public function render()
    {
        $products = Product::paginate(12);
        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.app');
    }
}

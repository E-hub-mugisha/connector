<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminEditProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $brand;
    public $newimage;
    public $category_id;
    public $regular_price;
    public $stock_status;
    public $image;
    public $quantity;
    public $description;
    public $short_description;
    public $subcategory;

    public $product_id;

    public function mount($product_id)
    {
        $product = Product::find($product_id);
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->brand = $product->brand;
        $this->category_id = $product->category_id;
        $this->subcategory = $product->subcategory;
        $this->regular_price = $product->regular_price;
        $this->short_description = $product->short_description;
        $this->stock_status = $product->stock_status;
        $this->description = $product->description;
        $this->quantity = $product->quantity;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',
            'brand' => 'required',
            'category_id' => 'required',
            'subcategory' => 'required',
            'regular_price' => 'required',
            'description' => 'required',
            'short_description' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required',
        ]);
        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage' => 'required|mimes: jpeg,png,jpg'
            ]);
        }
    }

    public function updateProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'brand$brand' => 'required',
            'category_id' => 'required',
            'subcategory' => 'required',
            'regular_price' => 'required',
            'description' => 'required',
            'short_description' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required',
        ]);
        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes: jpeg,png,jpg'
            ]);
        }

        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->brand = $this->brand;
        $product->category_id = $this->category_id;
        $product->subcategory = $this->subcategory;
        $product->regular_price = $this->regular_price;
        $product->short_description = $this->short_description;
        $product->stock_status = $this->stock_status;
        $product->description = $this->description;
        $product->quantity = $this->quantity;

        if($this->newimage)
        {
            
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('products', $imageName);
            $product->image = $imageName;
        }

        $product->save();
        session()->flash('message','product updated successfully!');

    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-product-component',['categories'=>$categories])->layout('layouts.app');
    }
}

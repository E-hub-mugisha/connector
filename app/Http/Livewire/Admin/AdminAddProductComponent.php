<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $brand;
    public $category_id;
    public $regular_price;
    public $stock_status;
    public $image;
    public $quantity;
    public $description;
    public $short_description;
    public $scategory_id;

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
            'regular_price' => 'required',
            'image' => 'required|mimes:jpeg,png',
            'description' => 'required',
            'short_description' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required',
        ]);
    }

    public function createProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'brand' => 'required',
            'category_id' => 'required',
            'regular_price' => 'required',
            'image' => 'required|mimes:jpeg,png',
            'description' => 'required',
            'short_description' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required',
        ]);

        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->brand = $this->brand;
        $product->category_id = $this->category_id;
        $product->regular_price = $this->regular_price;
        $product->short_description = $this->short_description;
        $product->stock_status = $this->stock_status;
        $product->description = $this->description;
        $product->quantity = $this->quantity;

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image = $imageName;

        if($this->scategory_id)
        {
            $product->subcategory_id = $this->scategory_id;
        }

        $product->save();
        session()->flash('message','product created successfully!');

    }
    public function changeSubcategory()
    {
        $this->scategory_id = 0;
    }
    public function render()
    {
        $categories = Category::all();
        $scategories = Subcategory::where('category_id',$this->category_id)->get();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories,'scategories'=>$scategories])->layout('layouts.app');
    }
}

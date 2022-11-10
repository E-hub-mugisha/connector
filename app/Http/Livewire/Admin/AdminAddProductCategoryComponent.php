<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use App\Models\Category;

class AdminAddProductCategoryComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:jpeg,png'
        ]);
    }

    public function createProductCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:jpeg,png'
        ]);

        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('category/products',$imageName);
        $category->image = $imageName;
        $category->save();
        session()->flash('message', 'category save successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-product-category-component')->layout('layouts.app');
    }
}

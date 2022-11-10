<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AdminEditProductCategoryComponent extends Component
{
    use WithFileUploads;
    public $category_id;
    public $name;
    public $slug;
    public $image;
    public $newimage;
    public $featured;

    public function mount($category_id)
    {
        $category = Category::find($category_id);
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->image = $category->image;
        $this->featured = $category->featured;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required'
        ]);
        
        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage' => 'required|mimes: jpeg,png,jpg'
            ]);
        }
    }

    public function updateProductCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes: jpeg,png,jpg'
            ]);
        }

        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->featured = $this->featured;
        if($this->newimage)
        {
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('category/products',$imageName);
            $category->image = $imageName;
        }
        $category->save();
        session()->flash('message', 'category updated');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-product-category-component')->layout('layouts.app');
    }
}

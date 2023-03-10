<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddServiceCategoryComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;
    public $service_category_id;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:jpeg,png'
        ]);
    }

    public function createNewCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'required|mimes:jpeg,png'
        ]);
        if ($this->service_category_id) {
            $scategory = new ServiceSubCategory();
            $scategory->name = $this->name;
            $scategory->slug = $this->slug;
            $scategory->service_category_id = $this->service_category_id;
            $scategory->save();
        } else {
            $scategory = new ServiceCategory();
            $scategory->name = $this->name;
            $scategory->slug = $this->slug;
            $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
            $this->image->storeAs('category', $imageName);
            $scategory->image = $imageName;
            $scategory->save();
        }
        session()->flash('message', 'category save successfully');
    }
    public function render()
    {
        $categories = ServiceCategory::all();
        return view('livewire.admin.admin-add-service-category-component', ['categories' => $categories])->layout('layouts.app');
    }
}

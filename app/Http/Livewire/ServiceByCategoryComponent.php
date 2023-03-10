<?php

namespace App\Http\Livewire;

use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use Livewire\Component;
use Illuminate\Support\Str;

class ServiceByCategoryComponent extends Component
{
    public $category_slug;
    public $scategory_slug;

    public function mount($category_slug, $scategory_slug = null)
    {
        $this->category_slug = $category_slug;
        $this->scategory_slug = $scategory_slug;
    }
    public function render()
    {
        if ($this->scategory_slug) {
            $scategory = ServiceSubCategory::where('slug', $this->scategory_slug)->first();
            
        } else {
            $scategory = ServiceCategory::where('slug',$this->category_slug)->first();
            
        }
        $scategories = ServiceCategory::all();
        
        return view('livewire.service-by-category-component',['scategory'=>$scategory,'scategories'=>$scategories])->layout('layouts.base');
    }
}

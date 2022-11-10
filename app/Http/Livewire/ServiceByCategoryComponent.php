<?php

namespace App\Http\Livewire;

use App\Models\ServiceCategory;
use Livewire\Component;

class ServiceByCategoryComponent extends Component
{
    public $category_slug;

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
    }
    public function render()
    {
        $scategories = ServiceCategory::all();
        $scategory = ServiceCategory::where('slug',$this->category_slug)->first();
        return view('livewire.service-by-category-component',['scategory'=>$scategory,'scategories'=>$scategories])->layout('layouts.base');
    }
}

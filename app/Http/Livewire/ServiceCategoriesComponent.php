<?php

namespace App\Http\Livewire;

use App\Models\ServiceCategory;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceCategoriesComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $scategories = ServiceCategory::paginate(12);
        return view('livewire.service-categories-component', ['scategories'=>$scategories])->layout('layouts.base');
    }
}

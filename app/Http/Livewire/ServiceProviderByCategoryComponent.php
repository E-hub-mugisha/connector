<?php

namespace App\Http\Livewire;

use App\Models\ServiceProvider;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Service;
use App\Models\ServiceCategory;

class ServiceProviderByCategoryComponent extends Component
{
    use WithPagination;
    public $service_category_name;

    public function mount($service_category_name)
    {
        $this->service_category_name = $service_category_name;
    }
    public function render()
    {
        $scategory = ServiceCategory::where('slug',$this->service_category_name)->first();
        $sproviders = ServiceProvider::where('service_category_id',$scategory->id)->paginate(9);
        return view('livewire.service-provider-by-category-component',['sproviders'=>$sproviders])->layout('layouts.base');
    }
}

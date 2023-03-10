<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\Service;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ServiceByLocationComponent extends Component
{
    use WithPagination;
    public $service_location;

    public function mount($service_location)
    {
        $this->service_location = $service_location;
    }
    public function render()
    {
        $scategories = ServiceCategory::all();
        $locations = Service::where('location',$this->service_location)->paginate(12);
        return view('livewire.service-by-location-component',['locations'=>$locations,'scategories'=>$scategories])->layout('layouts.base');
    }
}

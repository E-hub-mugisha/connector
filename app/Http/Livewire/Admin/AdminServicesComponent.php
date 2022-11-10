<?php

namespace App\Http\Livewire\Admin;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithPagination;

class AdminServicesComponent extends Component
{
    use WithPagination;
    public function deleteService($service_id)
    {
        $service = Service::find($service_id);
        if ($service->thumbnail) 
        {
            unlink('assets/images/products/thumbnails'."/".$service->thumbnail);
        }

        if($service->image)
        {
            unlink('assets/images/products'."/".$service->image);
        }
        $service->delete();
        session()->flash('message','service  deleted');
    }
    public function render()
    {
        $services = Service::paginate(10);
        return view('livewire.admin.admin-services-component',['services'=>$services])->layout('layouts.app');
    }
}

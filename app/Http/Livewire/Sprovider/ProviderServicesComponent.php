<?php

namespace App\Http\Livewire\Sprovider;

use Livewire\Component;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceProvider;
use Livewire\WithPagination;

class ProviderServicesComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $sprovider = ServiceProvider::where('user_id',Auth::user()->id)->first();
        $services = Service::where('service_provider_id',$sprovider->id)->paginate(10);
        return view('livewire.sprovider.provider-services-component',['services'=>$services])->layout('layouts.guest');
    }
}

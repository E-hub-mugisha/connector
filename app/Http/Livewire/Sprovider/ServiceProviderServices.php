<?php

namespace App\Http\Livewire\Sprovider;

use Livewire\Component;
use App\Models\Service;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class ServiceProviderServices extends Component
{
    public function render()
    {
        $sprovider = ServiceProvider::where('user_id',Auth::user()->id)->first();
        $services = Service::where('service_provider_id',$sprovider->id)->get();
        return view('livewire.sprovider.service-provider-services',['services'=>$services])->layout('layouts.guest');
    }
}

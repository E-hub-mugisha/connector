<?php

namespace App\Http\Livewire\Sprovider;

use Livewire\Component;
use App\Models\Service;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class ServicesProviderServiceOfferingComponent extends Component
{
    public function render()
    {
        $sprovider = ServiceProvider::where('user_id',Auth::user()->id)->first();
        $offerings = Service::where('service_provider_id',$sprovider->id)->get();
        return view('livewire.sprovider.services-provider-service-offering-component',['offerings'=>$offerings])->layout('layouts.guest');
    }
}

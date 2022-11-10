<?php

namespace App\Http\Livewire\Sprovider;

use Livewire\Component;
use App\Models\Service;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceProvider;

class SproviderServiceComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $sprovider = ServiceProvider::where('user_id',Auth::user()->id)->first();
        $services = Service::where('service_provider_id',$sprovider->id)->get();
        return view('livewire.sprovider.sprovider-service-component',['services'=>$services,'sprovider'=>$sprovider])->layout('layouts.guest');
    }
}

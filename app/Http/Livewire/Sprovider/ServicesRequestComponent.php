<?php

namespace App\Http\Livewire\Sprovider;

use Livewire\Component;
use App\Models\ServiceProvider;
use App\Models\ServiceBooking;
use Illuminate\Support\Facades\Auth;

class ServicesRequestComponent extends Component
{
    public function render()
    {
        $sprovider = ServiceProvider::where('user_id',Auth::user()->id)->first();
        $orders = ServiceBooking::where('service_provider_id',$sprovider->id)->get();
        return view('livewire.sprovider.services-request-component',['orders'=>$orders]);
    }
}

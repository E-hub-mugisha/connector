<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceProvider;
use App\Models\ServiceBooking;
use Illuminate\Support\Str;

class ServiceProviderProfileComponent extends Component
{
    public $sprovider_id;

    public function mount($sprovider_id)
    {
        $this->sprovider_id = $sprovider_id;
    }
    public function render()
    {
        $sproviders = ServiceProvider::where('id',$this->sprovider_id)->first();
        return view('livewire.service-provider-profile-component',['sproviders'=>$sproviders])->layout('layouts.base');
    }
}


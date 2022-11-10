<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceProvider;

class ServiceProviderProfileComponent extends Component
{
    public $sprovider_name;

    public function mount($sprovider_name)
    {
        $this->sprovider_name = $sprovider_name;
    }
    public function render()
    {
        $sproviders = ServiceProvider::where('sprovider_name',$this->sprovider_name)->first();
        return view('livewire.service-provider-profile-component',['sproviders'=>$sproviders])->layout('layouts.base');
    }
}


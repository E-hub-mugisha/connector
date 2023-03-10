<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ServiceProvider;
use Illuminate\Support\Str;

class ServiceProviderByLocationComponent extends Component
{
    use WithPagination;
    public $slocation;

    public function mount($slocation)
    {
        $this->slocation = $slocation;
    }
    public function render()
    {
        $sproviders = ServiceProvider::where('service_locations',$this->slocation)->paginate(9);
        return view('livewire.service-provider-by-location-component',['sproviders'=>$sproviders])->layout('layouts.base');
    }
}

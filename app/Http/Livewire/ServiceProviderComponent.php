<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\ServiceProvider;

class ServiceProviderComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $sproviders = ServiceProvider::paginate(12);
        return view('livewire.service-provider-component',['sproviders'=>$sproviders])->layout('layouts.base');
    }
}

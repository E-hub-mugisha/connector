<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ServiceProvider;
use Livewire\WithPagination;

class AdminServiceProvidersComponent extends Component
{
    use WithPagination;

    public function activate($sprovider_id)
    {
        $sprovider = ServiceProvider::find($sprovider_id);
        $sprovider->status = "Activated";
        $sprovider->save();
        session()->flash('message','sproviders activated');
    }
    public function deactivate($sprovider_id)
    {
        $sprovider = ServiceProvider::find($sprovider_id);
        $sprovider->status = "Deactivated";
        $sprovider->save();
        session()->flash('message','sproviders deactivated');
    }
    
    public function render()
    {
        $sproviders = ServiceProvider::paginate(9);
        return view('livewire.admin.admin-service-providers-component',['sproviders' => $sproviders])->layout('layouts.app');
    }
}

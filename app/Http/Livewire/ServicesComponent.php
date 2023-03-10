<?php

namespace App\Http\Livewire;

use App\Models\Service;
use App\Models\ServiceCategory;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class ServicesComponent extends Component
{ 
    use WithPagination;
    public function render()
    {
        $scategories = ServiceCategory::all();
        $services = Service::paginate(12);
        return view('livewire.services-component',['services'=>$services,'scategories'=>$scategories])->layout('layouts.base');
    }
}

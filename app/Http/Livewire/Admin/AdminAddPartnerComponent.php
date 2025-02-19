<?php

namespace App\Http\Livewire\Admin;

use App\Models\PartnerLogo;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AdminAddPartnerComponent extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $name;
    public $image;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'image' => 'required|mimes:jpeg,png'
        ]);
    }

    public function addNewPartner()
    {
        $this->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpeg,png'
        ]);

        $sliders = new PartnerLogo();
        $sliders->name = $this->name;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('partner/',$imageName);
        $sliders->image = $imageName;
        $sliders->save();
        session()->flash('message', 'logo save sucessfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-partner-component')->layout('layouts.app');
    }
}

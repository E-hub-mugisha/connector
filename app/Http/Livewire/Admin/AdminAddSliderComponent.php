<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminAddSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $image;
    public $status=0;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            'image' => 'required|mimes:jpeg,png'
        ]);
    }

    public function addNewSlider()
    {
        $this->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpeg,png'
        ]);

        $sliders = new Slider();
        $sliders->title = $this->title;
        $sliders->status = $this->status;
        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('slider',$imageName);
        $sliders->image = $imageName;
        $sliders->save();
        session()->flash('message', 'slider save sucessfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-slider-component')->layout('layouts.app');
    }
}

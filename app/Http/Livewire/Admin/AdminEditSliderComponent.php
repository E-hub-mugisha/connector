<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminEditSliderComponent extends Component
{
    use WithFileUploads;
    public $slide_id;
    public $title;
    public $image;
    public $status;
    public $newimage;

    public function mount($slide_id)
    {
        $sliders = Slider::find($slide_id);
        $this->slide_id = $sliders->id;
        $this->title = $sliders->title;
        $this->status = $sliders->status;
        $this->image = $sliders->image;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'title' => 'required',
            
        ]);
        if($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage' => 'required|mimes: jpeg,png'
            ]);
        }
    }

    public function updateSlider()
    {
        $this->validate([
            'title' => 'required',
            
        ]);

        if($this->newimage)
        {
            $this->validate([
                'newimage' => 'required|mimes: jpeg,png'
            ]);
        }

        $sliders = Slider::find($this->slide_id);
        $sliders->title = $this->title;
        $sliders->status = $this->status;
        if($this->newimage)
        {
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('slider',$imageName);
            $sliders->image = $imageName;
        }
        $sliders->save();
        session()->flash('message', 'slider updated');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-slider-component')->layout('layouts.app');
    }
}

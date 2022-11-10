<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSliderComponent extends Component
{
    use WithPagination;
    public function deleteSlider($id)
    {
        $sliders = Slider::find($id);
        if($sliders->image)
        {
            unlink('assets/images/slider'.'/'.$sliders->image);
        }
        $sliders->delete();
        session()->flash('message','service category deleted');
    }
    public function render()
    {
        $sliders = Slider::paginate(10);
        return view('livewire.admin.admin-slider-component',['sliders'=>$sliders])->layout('layouts.app');
    }
}

<?php

namespace App\Http\Livewire;
use Illuminate\Support\Str;

use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Slider;
use Livewire\Component;
use App\Models\Blogs;
use App\Models\ServiceProvider;


class HomeComponent extends Component
{
    public function render()
    {
        $sproviders = ServiceProvider::inRandomOrder()->take(6)->get();
        $scategories = ServiceCategory::inRandomOrder()->take(6)->get();
        $fservices = Service::where('featured',1)->inRandomOrder()->take(6)->get();
        $fscategories = ServiceCategory::where('featured',1)->inRandomOrder()->take(4)->get();
        $sid = ServiceCategory::whereIn('slug',['ac','tv','refrigrator','geyser','water-purifier'])->get()->pluck('id');
        $aservices = Service::whereIn('service_category_id',$sid)->inRandomOrder()->take(8)->get();
        $cid = ServiceCategory::whereIn('slug',['home-cleaning','laundry','cleaning'])->get()->pluck('id');
        $cleanservices = Service::whereIn('service_category_id',$cid)->inRandomOrder()->take(8)->get();
        $services = Service::inRandomOrder()->take(8)->get();
        $sliders = Slider::where('status',1)->get();
        $blogs = Blogs::inRandomOrder()->take(6)->get();
        return view('livewire.home-component',[
            'sproviders' => $sproviders,
            'blogs'=>$blogs,
            'scategories'=>$scategories,
            'fservices'=>$fservices,
            'fscategories'=>$fscategories,
            'aservices'=>$aservices,
            'services'=>$services,
            'cleanservices'=>$cleanservices,
            'sliders'=>$sliders
            ])->layout('layouts.base');
    }
}

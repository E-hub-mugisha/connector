<?php

namespace App\Http\Livewire\Sprovider;

use Livewire\Component;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class AddServiceComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $tagline;
    public $service_category_id;
    public $service_provider_id;
    public $price;
    public $discount;
    public $discount_type;
    public $image;
    public $thumbnail;
    public $description;
    public $inclusion;
    public $exclusion;
    public $duration;
    public $location;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',
            'tagline' => 'required',
            'service_category_id' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,png',
            'thumbnail' => 'required|mimes:jpeg,png',
            'description' => 'required',
            'inclusion' => 'required',
            'exclusion' => 'required',
            'duration' => 'required',
            'location' => 'required',
        ]);
    }

    public function createService()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'tagline' => 'required',
            'service_category_id' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,png',
            'thumbnail' => 'required|mimes:jpeg,png',
            'description' => 'required',
            'inclusion' => 'required',
            'exclusion' => 'required',
            'duration' => 'required',
            'location' => 'required',
        ]);
        
        $service = new Service();
        $sprovider = ServiceProvider::where('user_id',Auth::user()->id)->first();
        $service->name = $this->name;
        $service->slug = $this->slug;
        $service->tagline = $this->tagline;
        $service->service_category_id = $this->service_category_id;
        $service->service_provider_id = $sprovider->id;
        $service->price = $this->price;
        $service->discount = $this->discount;
        $service->discount_type = $this->discount_type;
        $service->duration = $this->duration;
        $service->description = $this->description;
        $service->location = $this->location;
        $service->inclusion = str_replace("\n",'|',trim($this->inclusion));
        $service->exclusion = str_replace("\n",'|',trim($this->exclusion));
        

        $imageName = Carbon::now()->timestamp . '.' . $this->thumbnail->extension();
        $this->thumbnail->storeAs('products/thumbnails',$imageName);
        $service->thumbnail = $imageName;

        $imageName2 = Carbon::now()->timestamp . '.' . $this->image->extension();
        $this->image->storeAs('products',$imageName2);
        $service->image = $imageName2;

        $service->save();
        
        alert()->success('SuccessAlert','Thank you for reaching out to Homiez; we will get back to you soon');

        session()->flash('message','Service created successfully!');

    }
    public function render()
    {
        $categories = ServiceCategory::all();
        $sprovider = ServiceProvider::where('user_id',Auth::user()->id)->first();
        return view('livewire.sprovider.add-service-component',['categories'=>$categories,'sprovider'=>$sprovider])->layout('layouts.guest');
    }
}

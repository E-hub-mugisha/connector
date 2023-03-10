<?php

namespace App\Http\Livewire\Sprovider;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use App\Models\Service;
use Illuminate\Support\Str;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class EditProviderServicesComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $tagline;
    public $service_category_id;
    public $price;
    public $discount;
    public $discount_type;
    public $image;
    public $thumbnail;
    public $description;
    public $inclusion;
    public $exclusion;
    public $service_id;
    public $service_provider_id;
    public $newthumbnail;
    public $newimage;
    public $featured;
    public $duration;
    public $location;

    public function mount($service_slug)
    {
        $service = Service::where('slug', $service_slug)->first();
        $this->service_id= $service->id;
        $this->name = $service->name;
        $this->slug = $service->slug;
        $this->tagline = $service->tagline;
        $this->service_provider_id = $service->service_provider_id;
        $this->service_category_id = $service->service_category_id;
        $this->price = $service->price;
        $this->discount = $service->discount;
        $this->discount_type = $service->discount_type;
        $this->featured = $service->featured;
        $this->image = $service->image;
        $this->thumbnail = $service->thumbnail;
        $this->description = $service->description;
        $this->duration = $service->duration;
        $this->location = $service->location;
        $this->inclusion = str_replace("|", "\n", $service->inclusion);
        $this->exclusion = str_replace("|", "\n", $service->exclusion);
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required',
            'slug' => 'required',
            'tagline' => 'required',
            'service_category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'inclusion' => 'required',
            'exclusion' => 'required',
            'service_provider_id' => 'required',
            'duration' => 'required',
            'location' => 'required',
        ]);
        if ($this->newimage) {
            $this->validateOnly($fields, [
                'newimage' => 'required|mimes:jpeg,png'
            ]);
        }

        if ($this->newthumbnail) {
            $this->validateOnly($fields, [
                'newthumbnail' => 'required|mimes:jpeg,png'
            ]);
        }
    }

    public function updateService()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'tagline' => 'required',
            'service_category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'inclusion' => 'required',
            'exclusion' => 'required',
            'service_provider_id' => 'required',
            'duration' => 'required',
            'location' => 'required',
        ]);

        if ($this->newimage) {
            $this->validate([
                'newimage' => 'required|mimes:jpeg,png'
            ]);
        }

        if ($this->newthumbnail) {
            $this->validate([
                'newthumbnail' => 'required|mimes:jpeg,png'
            ]);
        }

        $service = Service::find($this->service_id);
        $sprovider = ServiceProvider::where('user_id',Auth::user()->id)->first();
        $service->name = $this->name;
        $service->slug = $this->slug;
        $service->tagline = $this->tagline;
        $service->service_category_id = $this->service_category_id;
        $service->service_provider_id = $sprovider->id;
        $service->price = $this->price;
        $service->discount = $this->discount;
        $service->discount_type = $this->discount_type;
        $service->featured = $this->featured;
        $service->description = $this->description;
        $service->duration = $this->duration;
        $service->location = $this->location;
        $service->inclusion = str_replace("\n", '|', trim($this->inclusion));
        $service->exclusion = str_replace("\n", '|', trim($this->exclusion));

        if ($this->newthumbnail) 
        {
            unlink('assets/images/products/thumbnails'."/".$service->thumbnail);
            $imageName = Carbon::now()->timestamp . '.' . $this->newthumbnail->extension();
            $this->newthumbnail->storeAs('products/thumbnails', $imageName);
            $service->thumbnail = $imageName;
        }

        if($this->newimage)
        {
            unlink('assets/images/products'."/".$service->image);
            $imageName2 = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('products', $imageName2);
            $service->image = $imageName2;
        }
        
        $service->save();
        session()->flash('message', 'Service updated successfully!');
    }
    public function render()
    {
        $categories = ServiceCategory::all();
        $sprovider = ServiceProvider::where('user_id',Auth::user()->id)->first();
        return view('livewire.sprovider.edit-provider-services-component',['sprovider'=>$sprovider,'categories' => $categories])->layout('layouts.guest');
    }
}

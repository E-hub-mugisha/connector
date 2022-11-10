<?php

namespace App\Http\Livewire\Sprovider;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\ServiceCategory;

class EditSproviderProfileComponent extends Component
{
    use WithFileUploads;
    public $service_provider_id;
    public $image;
    public $about;
    public $city;
    public $service_category_id;
    public $service_locations;
    public $sprovider_name;
    public $nid;
    public $criminal_record;
    public $certificate;

    public $newimage;

    public function mount()
    {
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $this->service_provider_id = $sprovider->id;
        $this->sprovider_name = $sprovider->user->name;
        $this->nid = $sprovider->nid;
        $this->certificate = $sprovider->certificate;
        $this->criminal_record = $sprovider->criminal_record;
        $this->image = $sprovider->image;
        $this->about = $sprovider->about;
        $this->city = $sprovider->city;
        $this->service_category_id = $sprovider->service_category_id;
        $this->service_locations = $sprovider->service_locations;
    }

    public function updateProfile()
    {
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        if ($this->newimage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('sproviders', $imageName);
            $sprovider->image = $imageName;
        }
        if ($this->nid) {
            $documentName = Carbon::now()->timestamp . '.' . $this->nid->extension();
            $this->nid->storeAs('documents', $documentName);
            $sprovider->nid = $documentName;
        }
        if ($this->certificate) {
            $certificateName = Carbon::now()->timestamp . '.' . $this->certificate->extension();
            $this->certificate->storeAs('documents', $certificateName);
            $sprovider->certificate = $certificateName;
        }
        if ($this->criminal_record) {
            $recordName = Carbon::now()->timestamp . '.' . $this->criminal_record->extension();
            $this->criminal_record->storeAs('documents', $recordName);
            $sprovider->criminal_record = $recordName;
        }

        $sprovider->sprovider_name = $this->sprovider_name;
        $sprovider->about = $this->about;
        $sprovider->city = $this->city;
        $sprovider->service_category_id = $this->service_category_id;
        $sprovider->service_locations = $this->service_locations;
        $sprovider->save();

        session()->flash('message', 'Profile has been updated successfully!');
    }
    public function render()
    {
        $scategories = ServiceCategory::all();
        $sprovider = ServiceProvider::where('user_id',Auth::user()->id)->first();
        return view('livewire.sprovider.edit-sprovider-profile-component',['scategories'=>$scategories,'sprovider'=>$sprovider])->layout('layouts.guest');
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\ServiceProviderRating;
use Livewire\Component;

class SProviderRating extends Component
{
    public $rating;
    public $comment;
    public $currentId;
    public $sproviders;
    public $hideForm;

    protected $rules = [
        'rating' => ['required', 'in:1,2,3,4,5'],
        'comment' => 'required',

    ];

    public function mount()
    {
        if(auth()->user()){
            $rating = ServiceProviderRating::where('user_id', auth()->user()->id)->where('service_provider_id', $this->sproviders->id)->first();
            if (!empty($rating)) {
                $this->rating  = $rating->rating;
                $this->comment = $rating->comment;
                $this->currentId = $rating->id;
            }
        }
        return view('livewire.s-provider-rating');
    }

    public function delete($id)
    {
        $rating = ServiceProviderRating::where('id', $id)->first();
        if ($rating && ($rating->user_id == auth()->user()->id)) {
            $rating->delete();
        }
        if ($this->currentId) {
            $this->currentId = '';
            $this->rating  = '';
            $this->comment = '';
        }
    }

    public function rate()
    {
        $rating = ServiceProviderRating::where('user_id', auth()->user()->id)->where('service_provider_id', $this->sproviders->id)->first();
        $this->validate();
        if (!empty($rating)) {
            $rating->user_id = auth()->user()->id;
            $rating->service_provider_id = $this->sproviders->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->status = 1;
            try {
                $rating->update();
            } catch (\Throwable $th) {
                throw $th;
            }
            session()->flash('message', 'Success!');
        } else {
            $rating = new ServiceProviderRating();
            $rating->user_id = auth()->user()->id;
            $rating->service_provider_id = $this->sproviders->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->status = 1;
            try {
                $rating->save();
            } catch (\Throwable $th) {
                throw $th;
            }
            $this->hideForm = true;
        }
    }
    public function render()
    {
        $comments = ServiceProviderRating::where('service_provider_id', $this->sproviders->id)->where('status', 1)->with('user')->get();
        return view('livewire.s-provider-rating',['comments'=>$comments]);
    }
}

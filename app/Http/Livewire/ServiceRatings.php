<?php

namespace App\Http\Livewire;

use App\Models\ServiceRating;
use Livewire\Component;

class ServiceRatings extends Component
{
    public $rating;
    public $comment;
    public $currentId;
    public $service;
    public $hideForm;

    protected $rules = [
        'rating' => ['required', 'in:1,2,3,4,5'],
        'comment' => 'required',

    ];

    public function mount()
    {
        if(auth()->user()){
            $rating = ServiceRating::where('user_id', auth()->user()->id)->where('service_id', $this->service->id)->first();
            if (!empty($rating)) {
                $this->rating  = $rating->rating;
                $this->comment = $rating->comment;
                $this->currentId = $rating->id;
            }
        }
        return view('livewire.service-ratings');
    }

    public function delete($id)
    {
        $rating = ServiceRating::where('id', $id)->first();
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
        $rating = ServiceRating::where('user_id', auth()->user()->id)->where('service_id', $this->service->id)->first();
        $this->validate();
        if (!empty($rating)) {
            $rating->user_id = auth()->user()->id;
            $rating->service_id = $this->service->id;
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
            $rating = new ServiceRating;
            $rating->user_id = auth()->user()->id;
            $rating->service_id = $this->service->id;
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
        $comments = ServiceRating::where('service_id', $this->service->id)->where('status', 1)->with('user')->get();
        return view('livewire.service-ratings',['comments'=>$comments]);
    }
}

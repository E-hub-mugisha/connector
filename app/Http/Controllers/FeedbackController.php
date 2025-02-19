<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $feedback = new Feedback();
        $feedback->name = Auth::user()->name;
        $feedback->email = Auth::user()->email;
        $feedback->message = $request->input('message');
        $feedback->Service_Provider_ID = $request->input('Service_Provider_ID');
        
        $feedback->save();
        

        return back()->with('success', 'Feedback added successfully!');
    }

    public function RatingStore(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $rating = new Rating();
        $rating->name = Auth::user()->name;
        $rating->email = Auth::user()->email;
        $rating->rating = $request->input('rating');
        $rating->message = $request->input('message');
        $rating->Service_Provider_ID = $request->input('Service_Provider_ID');
        
        $rating->save();
        

        return back()->with('success', 'Feedback added successfully!');
    }
}

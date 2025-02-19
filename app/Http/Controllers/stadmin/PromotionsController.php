<?php

namespace App\Http\Controllers\stadmin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PromotionsController extends Controller
{
    public function index()
    {
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $promotions = Promotion::where('service_provider_id', $sprovider->id)->get();
        $services = Service::where('service_provider_id', $sprovider->id)->get();
        $categories = ServiceCategory::all();
        return view('stadmin.promotions.index', compact('promotions','services','categories','sprovider'));
    }
    public function storePromotion(Request $request)
    {
        $request->validate([
            'service_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'discount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $promotion = new Promotion();
        // $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $promotion->service_provider_id = $request->input('service_provider_id');
        $promotion->service_id = $request->input('service_id');
        $promotion->category_id = $request->input('category_id');
        $promotion->title = $request->input('title');
        $promotion->description = $request->input('description');
        $promotion->discount = $request->input('discount');
        $promotion->start_date = $request->input('start_date');
        $promotion->end_date = $request->input('end_date');
        
        $promotion->save();

        return redirect()->back()->with('success', 'Promotion created successfully!');
    }
    public function update(Request $request, $id)
{
    // Validate incoming data
    $request->validate([
        'service_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'discount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
    ]);

    // Retrieve the promotion
    $promotion = Promotion::findOrFail($id);

    if (!$promotion) {
        return redirect()->back()->withErrors('Promotion not found.');
    }

    // Update the promotion fields
    $promotion->service_id = $request->service_id;
    $promotion->category_id = $request->category_id;
    $promotion->title = $request->title;
    $promotion->description = $request->description;
    $promotion->discount = $request->discount;
    $promotion->start_date = $request->start_date;
    $promotion->end_date = $request->end_date;

    // Save and check for success
    if ($promotion->save()) {
        return redirect()->route('promotions.index')->with('success', 'Promotion updated successfully.');
    } else {
        return redirect()->back()->withErrors('Failed to update promotion.');
    }
}
}

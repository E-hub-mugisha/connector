<?php

namespace App\Http\Controllers\service_providers;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    public function getPortfolio()
    {
        $portfolios = Portfolio::all();
        return view('stadmin.ServicePadminPortfolio', compact('portfolios'));
    }
    public function addPortfolio()
    {
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $services = Service::where('service_provider_id', $sprovider->id)->get();
        return view('stadmin.add-portfolio', compact('services'));
    }
    public function createPortfolioService(Request $request)
    {

        $portfolio = new Portfolio();
        $image = $request->file('image');

        $portfolio->service_id = $request->input('service_id');
        $portfolio->tag = $request->input('tag');
        $imageName = time() . rand(1, 99) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $portfolio->image = '/images/' . $imageName;
        if ($portfolio->save()) {
            return redirect('stadmin.ServicePadminPortfolio')->with('success', "Added Successfully");
        }




        return redirect()->back();
    }
    public function upload(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'user_id' => 'required|exists:users,id',
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $service = Service::findOrFail($request->service_id);
        $user = Auth::user()->id;

        foreach ($request->file('images') as $image) {
            $path = $image->store('images'); // You may want to customize the storage path

            $service->images()->create([
                'user_id' => $user->id,
                'path' => $path,
            ]);
        }

        return redirect()->back()->with('success', 'Images uploaded successfully');
    }
}

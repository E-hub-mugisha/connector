<?php

namespace App\Http\Controllers\stadmin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $services = Service::where('service_provider_id', $sprovider->id)->get();
        $portfolios = Portfolio::where('service_provider_id', $sprovider->id)->get();
        return view('stadmin.portfolio.index', compact('portfolios','services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $portfolio = new Portfolio();
        $image = $request->file('image');
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $portfolio->service_provider_id = $sprovider->id;
        $portfolio->service_id = $request->input('service_id');
        $portfolio->tag = $request->input('tag');
        $destinationPath = 'image/portfolios/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        $portfolio['image'] = "$profileImage";
        if ($portfolio->save()) {
            return redirect()->route('sprovider.portfolio')->with('success', "Added Successfully");
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $services = Service::where('service_provider_id', $sprovider->id)->get();
        return view('stadmin.portfolio.show', compact('portfolio','services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $image = $request->file('image');

        $portfolio->service_id = $request->input('service_id');
        $portfolio->tag = $request->input('tag');
        $imageName = time() . rand(1, 99) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $portfolio->image = '/images/' . $imageName;
        if ($portfolio->save()) {
            return redirect()->route('sprovider.portfolio')->with('success', "updated Successfully");
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();
     
        return redirect()->route( 'sprovider.portfolio')
                        ->with('success','deleted successfully');
    }
}

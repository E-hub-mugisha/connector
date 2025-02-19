<?php

namespace App\Http\Controllers\stadmin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        return view('stadmin.account.index', compact('sprovider'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $scategories = ServiceCategory::all();
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        return view('stadmin.account.edit', ['scategories' => $scategories, 'sprovider' => $sprovider]);
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
        $request->validate([
            'about' => 'required',
            'city' => 'required',
            'image' => 'required|mimes:jpeg,png'
        ]);
        $sprovider = ServiceProvider::findORFail($id);
        $sprovider->sprovider_name = Auth::user()->name;
        $sprovider->about = $request->input('about');
        $sprovider->skills = $request->input('skills');
        $sprovider->qualification = $request->input('qualification');
        $sprovider->experience = $request->input('experience');
        $sprovider->city = $request->input('city');
        $sprovider->service_category_id = $request->input('service_category_id');
        $sprovider->service_locations = $request->input('service_locations');
        $sprovider->proEmail = Auth::user()->email;

        if ($image = $request->file('image')) {
            $destinationPath = 'image/profile/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $sprovider['image'] = "$profileImage";
        }
        $sprovider->update();

        session()->flash('message', 'Profile has been updated successfully!');
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
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Adverts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Adverts::latest()->paginate(6);
        return view('livewire.admin.adverts', compact('adverts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livewire.admin.adverts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adverts = new Adverts();
        $adverts->user_id = Auth::user()->id;
        $adverts->name = Auth::user()->name;
        $adverts->title = $request->input('title');
        $adverts->category = $request->input('category');
        $adverts->subcategory = $request->input('subcategory');
        
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        $adverts->save();
   
        return redirect()->route('livewire.admin.adverts')->with('success','Advert created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adverts  $adverts
     * @return \Illuminate\Http\Response
     */
    public function show(Adverts $adverts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adverts  $adverts
     * @return \Illuminate\Http\Response
     */
    public function edit(Adverts $adverts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adverts  $adverts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adverts $adverts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adverts  $adverts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adverts $adverts)
    {
        //
    }
}

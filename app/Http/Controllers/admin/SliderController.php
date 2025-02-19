<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sliders = Slider::all();
        return view('admin.sliders.index',compact('sliders'));
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
        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpeg,png'
        ]);

        $slider = new  Slider();
        $slider->title = $request->input('title');
        $slider->status = $request->input("status");

        if ($image = $request->file('image')) {
            $destinationPath = 'image/slider/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $slider['image'] = "$profileImage";
        }

        $slider->save();
        session()->flash('message', 'slider created successfully!');
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
        //
        $slider = Slider::findOrFail($id);
        return view('admin.sliders.show', compact('slider'));
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
        $slider = Slider::findOrFail($id);
        return view('admin.sliders.edit', compact('slider'));
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
        $slider = Slider::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpeg,png'
        ]);

        $slider->title = $request->input('title');
        $slider->status = $request->input("status");

        if ($image = $request->file('image')) {
            $destinationPath = 'image/slider/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $slider['image'] = "$profileImage";
        }

        $slider->update();
        session()->flash('message', 'slider updated successfully!');
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
        $slider = Slider::findOrFail($id);
        unlink(public_path()."/image/slider/".$slider->image);
        $slider->delete();
       Session()->flash('message','Slider has been deleted Successfully!');
       return redirect()->route('admin.slider');
    }
}

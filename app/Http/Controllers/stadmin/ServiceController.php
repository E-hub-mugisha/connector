<?php

namespace App\Http\Controllers\stadmin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use App\Models\ServiceSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ServiceController extends Controller
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
        return view('stadmin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ServiceCategory::all();
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        return view('stadmin.services.create', compact('categories', 'sprovider'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategory = ServiceSubCategory::where('name', $request->input('sub_category'))
            ->where('service_category_id', $request->input('service_category_id'))
            ->first();

        if (!$subcategory) {
            // Create a new subcategory if not found
            $subcategory = new ServiceSubCategory();
            $subcategory->name = $request->input('sub_category');
            $subcategory->service_category_id = $request->input('service_category_id');
            $subcategory->slug = Str::slug($request->input('sub_category')); // optional
            $subcategory->save();
        }
        $subcategoryId = $subcategory->id;

        $service = new Service();
        $image = $request->file('image');
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $service->name = $request->input('name');
        $slugName = Str::slug($request->input("name"));
        $service->slug = $slugName;
        $service->service_category_id = $request->input('service_category_id');
        $service->sub_category_id = $subcategoryId;
        $service->service_provider_id = $sprovider->id;
        $service->price = $request->input('price');
        $service->discount = $request->input('discount');
        $service->discount_type = $request->input('discount_type');
        $service->duration = $request->input('duration');
        $service->description = $request->input('description');
        $service->location = $request->input('location');
        $service->inclusion = str_replace("\n", '|', trim($request->input('inclusion')));
        $service->exclusion = str_replace("\n", '|', trim($request->input('exclusion')));

        if ($image = $request->file('image')) {
            $destinationPath = 'image/services/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $service['image'] = "$profileImage";
        }
        $service->save();

        alert()->success('SuccessAlert', 'Thank you for reaching out t0; we will get back to you soon');

        session()->flash('message', 'Service created successfully!');

        return redirect()->route('serviceProvider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $details = Service::where('slug', $slug)->first();
        return view('stadmin.services.show', compact('details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::where('id', $id)->first();
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        return view('stadmin.services.edit', compact('service', 'sprovider'));
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

        $service = Service::findOrFail($id);
        $image = $request->file('image');
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $service->name = $request->input('name');
        $slugName = Str::slug($request->input("name"));
        $service->slug = $slugName;
        $service->service_category_id = $request->input('service_category_id');
        $subcategory = ServiceSubCategory::where('name', $request->input('sub_category'))
            ->where('service_category_id', $request->input('service_category_id'))
            ->first();

        if (!$subcategory) {
            // Create a new subcategory if not found
            $subcategory = new ServiceSubCategory();
            $subcategory->name = $request->input('sub_category');
            $subcategory->service_category_id = $request->input('service_category_id');
            $subcategory->slug = Str::slug($request->input('sub_category')); // optional
            $subcategory->save();
        }
        $subcategoryId = $subcategory->id;
        $service->sub_category_id = $subcategoryId;
        $service->service_provider_id = $sprovider->id;
        $service->price = $request->input('price');
        $service->discount = $request->input('discount');
        $service->discount_type = $request->input('discount_type');
        $service->duration = $request->input('duration');
        $service->description = $request->input('description');
        $service->location = $request->input('location');
        $service->inclusion = str_replace("\n", '|', trim($request->input('inclusion')));
        $service->exclusion = str_replace("\n", '|', trim($request->input('exclusion')));

        if ($image = $request->file('image')) {
            $destinationPath = 'image/services/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $service['image'] = "$profileImage";
        }

        $service->save();

        alert()->success('SuccessAlert', 'Thank you for reaching out t0; we will get back to you soon');

        session()->flash('message', 'Service created successfully!');

        return redirect()->route('serviceProvider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('serviceProvider.index')
            ->with('success', 'deleted successfully');
    }
}

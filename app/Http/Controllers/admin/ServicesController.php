<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use App\Models\ServiceSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', ['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createService()
    {
        $categories = ServiceCategory::all();
        $sprovider = ServiceProvider::all();
        return view('admin.services.create', ['categories' => $categories,'sprovider'=>$sprovider]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postService(Request $request)
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
        $service->service_provider_id = $request->input('service_provider_id');
        $service->name = $request->input('name');
        $slugName = Str::slug($request->input("name"));
        $service->slug = $slugName;
        $service->service_category_id = $request->input('service_category_id');
        $service-> sub_category_id = $subcategoryId;
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
        return redirect()->route('admin.all_services');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showService($slug)
    {
        $service = Service::where('slug', '=', $slug)->first();
        return view('admin.services.show', ['service' => $service]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editService($id)
    {
        $categories = ServiceCategory::all();
        $subcategory = ServiceSubCategory::all();
        
        $service = Service::findOrFail($id);
        $sprovider = ServiceProvider::where('id', $service->service_provider_id)->first();
        return view('admin.services.edit', ['categories' => $categories, 'sprovider' => $sprovider, 'service' => $service, 'subcategory' => $subcategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateService(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'service_category_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'inclusion' => 'required',
            'exclusion' => 'required',
            'service_provider_id' => 'required',
            'duration' => 'required',
            'location' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
            'thumbnail' => 'required|mimes:jpeg,png,jpg'
        ]);
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


        $service->name = $request->input('name');
        $slugName = Str::slug($request->input("name"));
        $service->slug = $slugName;
        $service->service_provider_id = $request->input('service_provider_id');
        $service->service_category_id = $request->input('service_category_id');
        $service-> sub_category_id = $subcategoryId;
        $service->price = $request->input('price');
        $service->discount = $request->input('discount');
        $service->discount_type = $request->input('discount_type');
        $service->featured = $request->input('featured');
        $service->description = $request->input('description');
        $service->duration = $request->input('duration');
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
        session()->flash('message', 'Service updated successfully!');
        return redirect()->route('admin.all_services');
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

        session()->flash('message', 'service deleted');
        return redirect()->route('admin.all_services');
    }
}

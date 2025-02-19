<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scategories = ServiceCategory::all();
        return view('admin.service-category.index', ['scategories' => $scategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ServiceCategory::all();
        return view('admin.service-category.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createNewCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->input('service_category_id')) {
            $scategory = new ServiceSubCategory();
            $scategory->name = $request->input('name');
            $slugTitle = Str::slug($request->input("name"));
            $scategory->slug = $slugTitle;
            $scategory->service_category_id = $request->input('service_category_id');
            $scategory->save();
        } else {
            $scategory = new ServiceCategory();
            $scategory->name = $request->input('name');
            $slugTitle = Str::slug($request->input("name"));
            $scategory->slug = $slugTitle;
            if ($image = $request->file('image')) {
                $destinationPath = 'image/categories/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $scategory['image'] = "$profileImage";
                $scategory->save();
            }
        }

        session()->flash('message', 'category created');
        return redirect()->route('admin.service_categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showServiceByCategory($category_slug)
    {
        $category = ServiceCategory::where('slug', $category_slug)->first();
        $services = Service::where('service_category_id', $category->id)->paginate(10);
        return view('admin.service-category.show-service', ['category_name' => $category->name, 'services' => $services]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scategory = ServiceCategory::findOrFail($id);
        return view('admin.service-category.edit', compact('scategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateServiceCategory(Request $request, $id)
    {
        $scategory = ServiceCategory::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $scategory->name = $request->input('name');
        $slugName = Str::slug($request->input("name"));
        $scategory->slug = $slugName;
        $scategory->featured = $request->input('featured');

        if ($image = $request->file('image')) {
            $destinationPath = 'image/categories/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $scategory['image'] = "$profileImage";
        }

        $scategory->update();

        session()->flash('message', 'category updated');
        return redirect()->route('admin.service_categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scategory = ServiceCategory::findOrFail($id);
        $scategory->delete();

        session()->flash('message', 'category deleted');
        return redirect()->route('admin.service_categories');
    }

    public function SubCat()
    {
        $scategories = ServiceSubCategory::all();
        $categories = ServiceCategory::all();
        return view('admin.service-category.subcategory', ['scategories' => $scategories, 'categories' => $categories]);
    }
    public function NewSubCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'service_category_id',
        ]);

        $scategory = new ServiceSubCategory();
        $slugTitle = Str::slug($request->input("name"));
        $scategory->slug = $slugTitle;
        $scategory->name = $request->input('name');
        $scategory->service_category_id = $request->input('service_category_id');
        $scategory->save();

        session()->flash('message', 'Sub category created');
        return redirect()->back();
    }
    public function destroySub($id)
    {
        $subcategory = ServiceSubCategory::findOrFail($id);
        $subcategory->delete();

        session()->flash('message', 'Sub category deleted');
        return redirect()->back();
    }
}

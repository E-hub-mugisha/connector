<?php

namespace App\Http\Controllers\service_categories;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\ServiceMedia;
use App\Models\ServiceProvider;
use App\Models\ServiceSubCategory;

class ServiceCategoriesController extends Controller
{
    public function AllCategories()
    {
        $sproviders = ServiceProvider::inRandomOrder()->take(6)->get();
        $scategories = ServiceCategory::inRandomOrder()->paginate(12);
        return view('services.service-categories', compact('scategories', 'sproviders'));
    }
    public function ByCategories($category_slug, $scategory_slug = null)
    {
        if ($scategory_slug) {
            $scategory = ServiceSubCategory::where('slug', $scategory_slug)->first();
        } else {
            $scategory = ServiceCategory::where('slug', $category_slug)->first();
        }
        $scategories = ServiceCategory::all();

        return view('services.service-by-category', compact('scategory', 'scategories'));
    }
    public function AllServices()
    {
        $scategories = ServiceCategory::all();
        $services = Service::inRandomOrder()->paginate(8);
        return view('services.services', compact('services', 'scategories'));
    }
    public function ServiceDetail($service_slug)
    {
        $service = Service::where('slug', $service_slug)->first();
        $medias = ServiceMedia::where('servce_id', $service->id);
        $r_service = Service::where('service_category_id', $service->service_category_id)->where('slug', '!=', $service_slug)->inRandomOrder()->first();
        return view('services.service-details', compact('service', 'r_service','medias'));
    }
    public function ByLocation($service_location)
    {
        $scategories = ServiceCategory::all();
        $locations = Service::where('location', $service_location)->paginate(9);
        return view('services.service-by-location', compact('locations', 'scategories'));
    }
    public function showServicesBySubcategory($subcategory_slug)
    {
        // Retrieve services within a specific subcategory
        // Find the subcategory by slug
        $subcategory = ServiceSubcategory::where('slug', $subcategory_slug)->firstOrFail();

        // Get all services that belong to this subcategory
        $services = Service::where('sub_category_id', $subcategory->id)->get();
        $scategories = ServiceCategory::all();

        // Return view with services data
        return view('services.service-by-subcategory', compact('services', 'scategories'));
    }
    public function search(Request $request)
    {
        $categories = ServiceCategory::all();
        $subcategories = ServiceSubcategory::all();
$locations = Service::all()->unique('location');

        $query = Service::query();

        // Filter by name, category, and subcategory
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('service_category_id', $request->input('category_id'));
        }

        if ($request->filled('subcategory_id')) {
            $query->where('sub_category_id', $request->input('subcategory_id'));
        }
        
        if ($request->filled('location')) {
            $query->where('location', $request->input('location'));
        }

        $services = $query->get();

        return view('services.search', compact('services', 'categories', 'subcategories','locations'));
    }
}

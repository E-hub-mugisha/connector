<?php

namespace App\Http\Controllers\stadmin;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ServiceProvider;
use App\Models\Service;
use App\Models\User;
use App\Models\ServiceBooking;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\DB;

class StadminController extends Controller
{
    public function SDashboard()
    {
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();

        if ($sprovider) {
            $orders = ServiceBooking::where('service_provider_id', $sprovider->id)->get();
            
            // Orders
            $totalOrders = ServiceBooking::count() ?? 0; // Ensure 0 if there are no orders
            $serviceProviderOrders = $orders->count(); // Count the service provider's orders
        
            // Percentage of the service provider's orders compared to all orders
            $percentage = ($totalOrders > 0) ? ($serviceProviderOrders / $totalOrders) * 100 : 0;
        
            // Services
            $services = Service::where('service_provider_id', $sprovider->id)->get();
            $totalService = $services->count(); // Total services offered by the provider
        
            // Total Amount
            $totalAmount = ServiceBooking::where('service_provider_id', $sprovider->id)->sum('total') ?? 0; // Ensure 0 if no bookings
        
            // Ratings
            $totalRating = Rating::where('service_provider_id', $sprovider->id)->get();
            $ratings = Rating::count() ?? 0; // Count all ratings
            $serviceProviderRatings = $totalRating->count(); // Count the service provider's ratings
        
            // Percentage of the service provider's ratings compared to all ratings
            $percentageRating = ($ratings > 0) ? ($serviceProviderRatings / $ratings) * 100 : 0;
        
            // Revenue by service type (location in this case)
            $revenueByServiceType = ServiceBooking::select('location', DB::raw('SUM(total) as total_revenue'))
                ->where('service_provider_id', $sprovider->id)
                ->groupBy('location')
                ->get();
                
            $ordersGraph = ServiceBooking::where('service_provider_id', $sprovider->id)
        ->selectRaw('status, COUNT(*) as count')
        ->groupBy('status')
        ->get();
        
        $locationData = ServiceBooking::where('service_provider_id', $sprovider->id)
        ->selectRaw('location, COUNT(*) as count')
        ->groupBy('location')
        ->get();
        
        $showModal = false;

    if ($sprovider && (empty($sprovider->sprovider_name) || empty($sprovider->proEmail))) {
        $showModal = true;
    }
            return view('stadmin.ServicePadminDashboard', compact('showModal','sprovider', 'orders', 'revenueByServiceType', 'percentageRating', 'percentage', 'totalService', 'totalAmount', 'totalRating','ordersGraph','locationData'));
        
        } else {
            // Handle the case where the service provider is not found by setting default values to 0
            return view('stadmin.ServicePadminDashboard')->with([
                'sprovider' => null,
                'orders' => collect([]), // Empty collection for orders
                'revenueByServiceType' => collect([]), // Empty collection for revenue
                'percentage' => 0,
                'percentageRating' => 0,
                'totalService' => 0,
                'totalAmount' => 0,
                'totalRating' => collect([]), // Empty collection for ratings
            ]);
        }
        
    }
    public function ServiceOffering()
    {
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $offerings = Service::where('service_provider_id', $sprovider->id)->get();
        return view('stadmin.ServicePadminServices', compact('offerings'));
    }
    public function ServiceOfferingDetail($slug)
    {
        $details = Service::where('slug', $slug)->first();
        return view('stadmin.ServicePadminServiceDetail', compact('details'));
    }
    public function ServiceOfferingAddPage()
    {
        $categories = ServiceCategory::all();
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        return view('stadmin.ServicePadminAddService', compact('categories', 'sprovider'));
    }
    public function addService(Request $request)
    {
        $imagePath = $request->file('image');
        $image = $imagePath->store('images', 'public');
        $thumbnailPath = $request->file('thumbnail');
        $thumbnail = $thumbnailPath->store('thumbnails', 'public');

        $service = new Service();
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $service->name = $request->input('name');
        $service->slug = $request->input('slug');
        $service->tagline = $request->input('tagline');
        $service->service_category_id = $request->input('service_category_id');
        $service->service_provider_id = $sprovider->id;
        $service->price = $request->input('price');
        $service->discount = $request->input('discount');
        $service->discount_type = $request->input('discount_type');
        $service->duration = $request->input('duration');
        $service->description = $request->input('description');
        $service->location = $request->input('location');
        $service->inclusion = str_replace("\n", '|', trim($request->input('inclusion')));
        $service->exclusion = str_replace("\n", '|', trim($request->input('exclusion')));
        $service->image = $image;

        if ($image = $request->file('image')) {
            $destinationPath = 'services/images/';
            $serviceImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $serviceImage);
            $input['image'] = "$serviceImage";
        }
        if ($thumbnail = $request->file('thumbnail')) {
            $destinationPath = 'services/thumbnails/';
            $serviceThumbnail = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destinationPath, $serviceThumbnail);
            $input['thumbnail'] = "$serviceThumbnail";
        }

        $service->save();

        alert()->success('SuccessAlert', 'Thank you for reaching out t0; we will get back to you soon');

        session()->flash('message', 'Service created successfully!');

        return redirect()->back();
    }
    public function ServiceBookings()
    {
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $orders = ServiceBooking::where('service_provider_id', $sprovider->id)->get();
        return view('stadmin.ServicePadminBooking', compact('orders'));
    }
    public function ServiceOrderDetail($id)
    {
        $orders = ServiceBooking::where('id', $id)->first();
        return view('stadmin.ServiceOrderDetail', compact('orders'));
    }

    public function ServiceEditDetail($id)
    {
        $service = Service::where('id', $id)->first();
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        return view('stadmin.ServicePadminEditService', compact('service', 'sprovider'));
    }

    public function updateService(Request $request, $id)
    {
        $imagePath = $request->file('image');
        $image = $imagePath->store('images', 'public');
        $thumbnailPath = $request->file('thumbnail');
        $thumbnail = $thumbnailPath->store('thumbnails', 'public');

        $service = Service::where('id', $id);
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $service->name = $request->input('name');
        $service->slug = $request->input('slug');
        $service->tagline = $request->input('tagline');
        $service->service_category_id = $request->input('service_category_id');
        $service->service_provider_id = $sprovider->id;
        $service->price = $request->input('price');
        $service->discount = $request->input('discount');
        $service->discount_type = $request->input('discount_type');
        $service->duration = $request->input('duration');
        $service->description = $request->input('description');
        $service->location = $request->input('location');
        $service->inclusion = str_replace("\n", '|', trim($request->input('inclusion')));
        $service->exclusion = str_replace("\n", '|', trim($request->input('exclusion')));
        $service->image = $image;

        if ($image = $request->file('image')) {
            $destinationPath = 'services/images/';
            $serviceImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $serviceImage);
            $input['image'] = "$serviceImage";
        }
        if ($thumbnail = $request->file('thumbnail')) {
            $destinationPath = 'services/thumbnails/';
            $serviceThumbnail = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            $thumbnail->move($destinationPath, $serviceThumbnail);
            $input['thumbnail'] = "$serviceThumbnail";
        }

        $service->update();

        alert()->success('SuccessAlert', 'Thank you for reaching out t0; we will get back to you soon');

        session()->flash('message', 'Service created successfully!');

        return redirect()->back();
    }
    public function SClients()
    {
        $sprovider = ServiceProvider::where('user_id', Auth::user()->id)->first();
        $clients = ServiceBooking::where('service_provider_id', $sprovider->id)->get();
        return view('stadmin.customers.index', compact('clients'));
    }
    public function SClientDetail($user_id)
    {
        $clients = User::where('id', $user_id)
    ->first();
    $orders = ServiceBooking::where('user_id', $clients->id)
    ->get();
        return view('stadmin.customers.show', compact('clients','orders'));
    }
}

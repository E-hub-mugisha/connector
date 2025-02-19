<?php

namespace App\Http\Controllers\service_providers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailInquiry;
use App\Models\Feedback;
use App\Models\Portfolio;
use App\Models\Rating;
use App\Models\ServiceCategory;
use App\Models\WorkingHour;
use Carbon\Carbon;
use App\Models\Promotion;

class ServiceProvidersController extends Controller
{
    public function serviceProviders()
    {
        $sproviders = ServiceProvider::paginate(12);
        return view('service_provider.serviceProviders',compact('sproviders'));
    }
    public function profile($sprovider_id)
    {
        $sproviders = ServiceProvider::where('id',$sprovider_id)->first();
        $portfolios = Portfolio::where('service_provider_id', $sproviders->id)->get();
        $workingHours = WorkingHour::where('sprovider_id', $sprovider_id)->get();
        $feedback = Feedback::where('Service_Provider_ID', $sprovider_id)->where('approved', true)->get();
        $ratings = Rating::where('Service_provider_ID', $sprovider_id)->where('approved', true)->get();
        $averageRating = Rating::where('Service_provider_ID', $sprovider_id)->where('approved', true)->avg('rating');
        $averageRating = round($averageRating, 1);
        $promotions = Promotion::where('service_provider_id', $sprovider_id)->where('end_date', '>=', Carbon::now())->get();
        return view('service_provider.serviceProviderProfile',compact('sproviders','portfolios','workingHours','feedback','ratings','averageRating','promotions'));
    }
    public function sendEmailInquiry(Request $request)
    {
        $mailData = [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'proEmail' => $request->get('proEmail'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ];

        Mail::to($mailData['proEmail'])
            ->send(new EmailInquiry($mailData));

        alert()->success('Thank You', 'Your message have been sent successfully.');
        return redirect()->back();
    }
    public function ProviderByLocation($location)
    {
        $sproviders = ServiceProvider::where('service_locations',$location)->paginate(9);
        return view('service_provider.serviceProviderByLocation',compact('sproviders'));
    }
    public function serviceProviderByCategory($service_category_name)
    {
        $scategory = ServiceCategory::where('slug',$service_category_name)->first();
        $sproviders = ServiceProvider::where('service_category_id',$scategory->id)->paginate(9);
        return view('service_provider.serviceProviderByCategory',compact('sproviders'));
    }
    
}

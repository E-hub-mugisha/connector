<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceProvider;
use App\Models\ServiceCategory;
use App\Models\Slider;
use App\Models\Blogs;
use App\Models\Order;
use App\Models\PartnerLogo;
use App\Models\Portfolio;
use App\Models\Promotion;
use App\Models\ServiceSubCategory;
use App\Models\Subcategory;
use App\Models\User;
use App\Models\Feedback;
use App\Models\ServiceBooking;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function home()
    {
        $sproviders = ServiceProvider::inRandomOrder()->take(6)->get();
        $scategories = ServiceCategory::inRandomOrder()->take(6)->get();
        $fservices = Service::where('featured',1)->inRandomOrder()->take(6)->get();
        $fscategories = ServiceCategory::where('featured',1)->inRandomOrder()->take(4)->get();
        $sid = ServiceCategory::whereIn('slug',['ac','tv','refrigrator','geyser','water-purifier'])->get()->pluck('id');
        $aservices = Service::whereIn('service_category_id',$sid)->inRandomOrder()->take(8)->get();
        $cid = ServiceCategory::whereIn('slug',['home-cleaning','laundry','cleaning'])->get()->pluck('id');
        $cleanservices = Service::whereIn('service_category_id',$cid)->inRandomOrder()->take(8)->get();
        $services = Service::inRandomOrder()->take(8)->get();
        $sliders = Slider::where('status',1)->inRandomOrder()->get();
        $blogs = Blogs::where('status','approved')->inRandomOrder()->take(3)->get();
        $totalSales = Order::where('status', 'delivered')->count();
        $totalDone = ServiceBooking::where('status', 'completed')->count();
        $totalSprovider = ServiceProvider::all()->count();
        $partners = PartnerLogo::all();
        $portfolios = Portfolio::inRandomOrder()->take(10)->get();
        $promotions = Promotion::where('end_date', '>=', Carbon::now())->get();
        $subcategories = ServiceSubCategory::inRandomOrder()->take(8)->get();
        $feedbacks = Feedback::inRandomOrder()->take(6)->get();
        return view('pages.home',compact(
            'sproviders',
            'blogs',
            'scategories',
            'fservices',
            'fscategories',
            'aservices',
            'services',
            'cleanservices',
            'sliders',
            'totalSales',
            'totalSprovider',
            'partners',
            'portfolios',
            'promotions',
            'subcategories',
            'feedbacks',
            'totalDone'
            ));
    }
    public function blog()
    {
        $categories = ServiceCategory::all();
    $subcategories = ServiceSubCategory::all();
        $blogs = Blogs::where('status','approved')->simplePaginate(6);
        
        return view('pages.blog',compact('blogs','categories', 'subcategories'));
    }
    public function blogDetail($blog_slug)
    {
        $blog = Blogs::where('slug',$blog_slug)->first();
        $blog->increment('views');
        $r_blog = Blogs::inRandomOrder()->where('status','approved')->take(6)->get();
        return view('pages.blog-detail',compact('blog','r_blog'));
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function sendMessage(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        alert()->success('Thank You', 'Your message have been sent successfully.');
        session()->flash('message', 'Your message has been send successfully!');
        return redirect()->route('home');
    }
    public function SearchBlog(Request $request)
{
    $query = $request->input('query');

    // Search for posts based on the title, content, category, or subcategory
    $blogs = Blogs::where('title', 'like', "%{$query}%")
                 ->orWhere('content', 'like', "%{$query}%")
                 ->orWhere('blog_category', 'like', "%{$query}%")
                 ->orWhere('sub_category', 'like', "%{$query}%")
                 ->get();

    return view('pages.blogsearch', compact('blogs', 'query'));
}
public function showByCategory($category)
{
    $blogs = Blogs::where('blog_category', $category)->simplePaginate(6);
    return view('pages.blogCategory', compact('blogs', 'category'));
}

}

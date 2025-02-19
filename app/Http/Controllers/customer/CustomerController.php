<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ServiceBooking;
use App\Models\User;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceSubCategory;
use App\Models\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\bookMail;
use App\Mail\EmailInquiry;
use App\Models\Feedback;
use App\Models\Portfolio;
use App\Models\Rating;
use App\Models\WorkingHour;
use Carbon\Carbon;
use App\Models\Promotion;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productOrders = Order::where('user_id', Auth::user()->id)->paginate(12);
        $serviceBookings = ServiceBooking::where('user_id', Auth::user()->id)->paginate(12);
        $bookings = ServiceBooking::where('user_id', Auth::user()->id)->paginate(12);
        $user = Auth::user();
        return view('customers.customer-dashboard', compact('serviceBookings', 'productOrders', 'bookings', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customerProfile()
    {
        $profile = User::where('id', Auth::user()->id)->first();
        return  view('customers.customer-profile', compact('profile'));
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
        $user = User::where('id', Auth::user()->id)->first();
        return view('customers.customer-profile-edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpdateProfile(Request $request, $id)
    {
        //
        $user = User::find($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $user->update($request->all());

        return redirect()->route('customer-profile')->with('success', 'Profile updated successfully!');
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
    public function cancelBooking($id)
    {
        $bookings = ServiceBooking::findOrFail($id);
        $bookings->status = "canceled";
        $bookings->save();


        $responseData = [
            'name' => Auth::user()->name,
            'names' => $bookings->names,
            'email' => $bookings->email,
            'status' => $bookings->status,
            $proFeed = Auth::user()->email,
        ];

        Mail::to($responseData['email'])
            ->cc($proFeed)
            ->send(new feedBack($responseData));

        alert()->success('SuccessAlert', 'booking canceled');
        session()->flash('message', 'booking canceled');
     
        return redirect()->back()
                        ->with('success','updated successfully');
    }
    public function GetService()
    {
        $services = Service::all();
        return view('customers.services.index', compact('services'));
    }
    public function showService($slug)
    {
        $details = Service::where('slug', $slug)->first();
        return view('customers.services.show',compact('details'));
    }
    public function CustomerBooking($slug)
    {
        $service = Service::where('slug', $slug)->first();
        return view('customers.services.booking',compact('service'));
    }
    public function ServiceBook(Request $request)
    {

        $booking = new ServiceBooking();
        $booking->user_id = Auth::user()->id;
        $booking->service_provider_id = $request->input('service_provider_id');
        $booking->service_id = $request->input('service_id');
        $booking->status = 'pending';
        $booking->total = $request->input('total');
        $booking->payment_mode = $request->input('payment_mode');
        $booking->names = $request->input('names');
        $booking->email = $request->input('email');
        $booking->phone = $request->input('phone');
        $booking->location = $request->input('location');
        $booking->notes = $request->input('notes');
        $booking->date = $request->input('date');
        $booking->time = $request->input('time');

        $booking->save();

        $mailData = [
            'payment_mode' => $request->get('payment_mode'),
            'names' => $request->get('names'),
            'proEmail' => $request->get('proEmail'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'location' => $request->get('location'),
            'notes' => $request->get('notes'),
            'date' => $request->get('date'),
            'time' => $request->get('time'),
            'service_name' => $request->get('service_name'),
            'url' => '#',
        ];

        Mail::to($mailData['proEmail'])
            ->send(new bookMail($mailData));

        alert()->success('Thank You', 'Your booking have been sent successfully.');

        return redirect()->route('customer.dashboard');
    }
    public function CustomerServiceBooked()
    {
        $bookings = ServiceBooking::where('user_id', Auth::user()->id)->paginate(12);
        return view('customers.bookings.index', compact('bookings'));
    }
    public function ServiceBookedDetail($id)
    {
        $booking = ServiceBooking::findOrFail($id);
     
        return view('customers.bookings.show', compact('booking'));
    }
    public function BookingReschedule(Request $request, $id)
    {
        $bookings = ServiceBooking::findOrFail($id);
        $bookings->date = $request->input('date');
        $bookings->time = $request->input('time');
        $bookings->status = "rescheduled";
        $bookings->save();


        $responseData = [
            'name' => Auth::user()->name,
            'names' => $bookings->names,
            'email' => $bookings->email,
            'status' => $bookings->status,
            $proFeed = Auth::user()->email,
        ];

        Mail::to($responseData['email'])
            ->cc($proFeed)
            ->send(new feedBack($responseData));

        alert()->success('SuccessAlert', 'booking Rescheduled');
        session()->flash('message', 'booking Rescheduled');
     
        return redirect()->route('CustomerServiceBooked')
                        ->with('success','updated successfully');
    }
    public function CustomerSearch(Request $request)
    {
        $categories = ServiceCategory::all();
        $subcategories = ServiceSubcategory::all();

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

        $services = $query->get();

        return view('customers.services.search', compact('services', 'categories', 'subcategories'));
    }
    public function GetProvider()
    {
        $providers = ServiceProvider::all();
        return view('customers.providers.index', compact('providers'));
    }
    public function ServiceProviderDetail($id)
    {
        $sproviders = ServiceProvider::where('id',$id)->first();
        $portfolios = Portfolio::where('service_provider_id', $sproviders->id)->get();
        $workingHours = WorkingHour::where('sprovider_id', $id)->get();
        $feedback = Feedback::where('Service_Provider_ID', $id)->where('approved', true)->get();
        $ratings = Rating::where('Service_provider_ID', $id)->where('approved', true)->get();
        $averageRating = Rating::where('Service_provider_ID', $id)->where('approved', true)->avg('rating');
        $averageRating = round($averageRating, 1);
        $promotions = Promotion::where('service_provider_id', $id)->where('end_date', '>=', Carbon::now())->get();
        return view('customers.providers.show',compact('sproviders','portfolios','workingHours','feedback','ratings','averageRating','promotions'));
    }
    public function ServiceProviderService($id)
    {
        $services = Service::where('service_provider_id', $id)->get();
        return view('customers.providers.services',compact('services'));
    }
}

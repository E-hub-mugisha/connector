<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceProvider;
use App\Models\SProviderRating;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Rating;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;

class ServiceProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sproviders = ServiceProvider::all();
        return view('admin.service-provider.index', compact('sproviders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.service-provider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeServiceProvide(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
            'phone' => ['required'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ]);


        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'phone' => $request['phone'],
            'utype' => 'SVP'
        ]);

        ServiceProvider::create([
            'user_id' => $user->id,
            'sprovider_name' => $request['name'],
            'proEmail' => $request['email'],
        ]);

        alert()->success('Thank you', 'Your account created check the email');
        $user->notify(new WelcomeEmailNotification($user));
        return redirect()->route('admin.service_providers');
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
        $services = Service::where('service_provider_id',$id)->get();
        $reviews = SProviderRating::where('service_provider_id',$id)->get();
        $UserProvide = ServiceProvider::findOrFail($id);
        return view('admin.service-provider.show', compact('UserProvide','services','reviews'));
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
        //
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
    public function ProviderRating()
    {
        //
        $ratings = Rating::all();
        return view('admin.provider-rating.index', compact('ratings'));
    }
    public function ProviderFeedback()
    {
        //
        $feedbacks = Feedback::all();
        return view('admin.provider-feedback.index', compact('feedbacks'));
    }
    public function approveFeedback($id)
    {
        //
        $data = Feedback::findOrFail($id);
        $data->approved = "1";
        $data->save();
        Session()->flash('message', 'approved Successfully!');
        return redirect()->back();
    }
    public function approveRating($id)
    {
        //
        $data = Rating::findOrFail($id);
        $data->approved = "1";
        $data->save();
        Session()->flash('message', 'approved Successfully!');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ServiceProvider;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index', compact('users'));
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
        $user = User::findOrFail($id);
        $user->delete();
        Session()->flash('message', 'user has been deleted Successfully!');
        return redirect()->route('admin.users');
    }
    public function adminActivate($user_id)
{
    $user = User::find($user_id);

    if ($user) {
        $user->utype = "ADM";
        $user->save();
        session()->flash('message', "User {$user->name} has been activated as an admin.");
    } else {
        session()->flash('error', 'User not found.');
    }

    return redirect()->back();
}

public function customerActivate($user_id)
{
    $user = User::find($user_id);

    if ($user) {
        $user->utype = "CST";
        $user->save();
        session()->flash('message', "User {$user->name} has been activated as a customer.");
    } else {
        session()->flash('error', 'User not found.');
    }

    return redirect()->back();
}

public function providerActivate($user_id)
{
    $user = User::find($user_id);

    if ($user) {
        $user->utype = "SVP";
        $user->save();

        ServiceProvider::create([
            'user_id' => $user->id,
            'sprovider_name' => $user->name,
            'proEmail' => $user->email,
        ]);

        session()->flash('message', "User {$user->name} has been activated as a service provider.");
    } else {
        session()->flash('error', 'User not found.');
    }

    return redirect()->back();
}

}

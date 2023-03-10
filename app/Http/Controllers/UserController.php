<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\UserEmail;
use Mail;

class UserController extends Controller
{
    public function sendEmail(Request $request)
    {
        $users = User::whereIn("id", $request->ids)->get();

        foreach ($users as $key => $user) {
            Mail::to($user->email)->send(new UserEmail($user));
        }
        session()->flash('message', 'message sent successful');
        return redirect()->back();
    }
}

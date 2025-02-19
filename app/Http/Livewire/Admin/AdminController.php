<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\PartnerLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function indexPartner()
    {
        $partners = PartnerLogo::all();
        return view('livewire.admin.partners', compact('partners'));
    }
    public function storePartner(Request $request)
    {
        // Validation and store logic
        $partner = new PartnerLogo();
        $partner->name = Auth::user()->name;
        
        if ($image = $request->file('image')) {
            $destinationPath = 'image/partner/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }

        $partner->save();
   
        return redirect()->back()->with('success','logo created successfully.');
    }
}

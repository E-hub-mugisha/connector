<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function autocomplete(Request $req)
    {
        $query = $req->get('query');
        $data = Service::select('name')->where('name','LIKE','%'. $query. '%')->get();
        return response()->json($data);
    }
    
    public function searchService(Request $req)
    {
        $service_slug = Str::slug($req->q,'-');
        if($service_slug)
        {
            return redirect('/service/'.$service_slug);
        }
        else
        {
            return back();
        }
    }
}

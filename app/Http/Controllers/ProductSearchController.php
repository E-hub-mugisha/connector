<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductSearchController extends Controller
{
    public function productAutocomplete(Request $req)
    {
        $query = $req->get('query');
        $data = Product::select('name')->where('name','LIKE','%'. $query. '%')->get();
        return response()->json($data);
    }
    
    public function searchProduct(Request $req)
    {
        $product_slug = Str::slug($req->q,'-');
        if($product_slug)
        {
            return redirect($product_slug.'/product/');
        }
        else
        {
            return back();
        }
    }
}

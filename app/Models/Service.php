<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    use HasFactory;

    protected $table = "services";

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }
    public function ratings()
    {
        return $this->hasMany('App\Models\ServiceRating');
    }

    public function provider()
    {
        return $this->belongsTo(ServiceProvider::class, 'service_provider_id');
    }
    public static function getService()
    {
        $services = DB::table('services')->select('id','name','service_category_id','service_provider_id','price','discount','discount_type','location','created_at')->get();
        return $services;
    }
    public function subCategories()
    {
        return $this->belongsTo(ServiceSubCategory::class,'subcategory_id');
    }
}

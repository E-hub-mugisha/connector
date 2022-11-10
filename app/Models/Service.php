<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    
}

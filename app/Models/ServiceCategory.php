<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;

    protected $table = "service_categories";

    public function services()
    {
        return $this->hasMany(Service::class);
    }
    public function subcategories()
    {
        return $this->hasMany(ServiceSubCategory::class,'service_category_id');
    }
}

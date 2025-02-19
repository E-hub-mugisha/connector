<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug','service_category_id'
    ];
    public function subcategories()
    {
        $this->belongsTo(ServiceCategory::class);
    }
    
    public function services()
    {
        return $this->hasMany(Service::class, 'sub_category_id');
    }
}

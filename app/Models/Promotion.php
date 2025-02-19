<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_provider_id',
        'service_id',
        'category_id',
        'title',
        'description',
        'discount',
        'start_date',
        'end_date',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class);
    }
}

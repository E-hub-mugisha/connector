<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'image'];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'service_provider_id', 'id');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
    public function serviceBookings()
    {
        return $this->hasMany(ServiceBooking::class);
    }
}

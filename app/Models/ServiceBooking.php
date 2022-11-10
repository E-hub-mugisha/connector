<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBooking extends Model
{
    use HasFactory;
    protected $table = 'service_bookings';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function serviceBooked()
    {
        return $this->hasMany(ServiceBooked::class);
    }
    public function serviceTransaction()
    {
        return $this->hasOne(ServiceTransaction::class);
    }
}

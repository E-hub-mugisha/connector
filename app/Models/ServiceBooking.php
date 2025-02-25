<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingMail;

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
    public static function boot()
    {
        parent::boot();
        static::created(function ($item) {
            $adminEmail = "kabosierik@gmail.com";
            Mail::to($adminEmail)->send(new BookingMail($item));
        });
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class);
    }
    public function staffMembers()
    {
        return $this->belongsToMany(StaffMember::class, 'service_staff');
    }
}

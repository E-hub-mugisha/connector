<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingMail;

class Booking extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();
        static::created(function ($item){
            $adminEmail = "kabosierik@gmail.com";
            $providerEmail = $item['proEmail'];
            Mail::to($adminEmail)
                  ->cc($providerEmail)->send(new BookingMail($item));
        });
    }
}

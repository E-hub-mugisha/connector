<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'booking_id',
        'user_id',
        'amount',
        'payment_method',
        'transaction_id',
        'status',
    ];

    public function booking()
    {
        return $this->belongsTo(ServiceBooking::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

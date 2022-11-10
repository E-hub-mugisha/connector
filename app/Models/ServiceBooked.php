<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBooked extends Model
{
    use HasFactory;
    protected $table = 'service_bookeds';

    public function serviceBooking()
    {
        return $this->belongsTo(ServiceBooking::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

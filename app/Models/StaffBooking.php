<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffBooking extends Model
{
    use HasFactory;
    protected $fillable = ['service_id', 'staff_id', 'status', 'time'];

    // Relationship to the Service model
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Relationship to the Staff model
    public function staff()
    {
        return $this->belongsTo(StaffMember::class);
    }
}

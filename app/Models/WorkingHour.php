<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'sprovider_id',
        'day',
        'start_time',
        'end_time',
        'is_closed',
    ];

    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class, 'sprovider_id');
    }
}

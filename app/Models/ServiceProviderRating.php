<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProviderRating extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function service_provider()
    {
        return $this->belongsTo('App\Models\ServiceProvider');
    }
}

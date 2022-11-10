<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRating extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'comment'
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function service()
    {
        return $this->belongsTo('App\Models\Service');
    }
}

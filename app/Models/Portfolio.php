<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $table = "portfolios";
    
    public function service()
    {
       return $this->belongsTo(Service::class);
    }
    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class);
    }
}

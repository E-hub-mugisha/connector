<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffMember extends Model
{
    use HasFactory;
    protected $fillable = ['service_provider_id', 'name', 'email', 'role'];

    public function serviceProvider()
    {
        return $this->belongsTo(ServiceProvider::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_staff');
    }
}

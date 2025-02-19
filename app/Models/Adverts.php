<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adverts extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'name', 'title','user_id','category','subcategory','image'
    ];
}

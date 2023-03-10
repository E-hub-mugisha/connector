<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewsMail;

class Newsletter extends Model
{
    use HasFactory;
    public $fillable = ['names', 'email'];
    public static function boot()
    {
        parent::boot();
        static::created(function ($item){
            $newsLetter = "kabosierik@gmail.com";
            Mail::to($newsLetter)->send(new NewsMail($item));
        });
    }
}

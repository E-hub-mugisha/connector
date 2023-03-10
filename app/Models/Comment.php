<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = "comments";
    protected $fillable = [
        'blog_id',
        'user_id',
        'comment_body'
    ];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }
    public function comment()
    {
        return $this->belongsTo(Blogs::class, 'blog_id','id');
    }
}

<?php

namespace App\Models\Blog;

use App\Models\User;
use App\Models\Blog\Blog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloglike extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id', 'user_id', 'status'
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

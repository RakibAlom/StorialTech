<?php

namespace App\Models\Blog;

use App\Models\User;
use App\Models\Blog\Blog;
use App\Models\Blog\Blogcommentreply;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogcomment extends Model
{
    use HasFactory;

    protected $fillable = [
        'blog_id','user_id','message'
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function commentreply()
    {
        return $this->hasMany('App\Models\Blog\Blogcommentreply', 'comment_id');
    }
}

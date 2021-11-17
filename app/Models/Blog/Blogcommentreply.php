<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Blog\Blog;
use App\Models\Blog\Blogcomment;

class Blogcommentreply extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id','blog_id','user_id','message'
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->belongsTo('App\Models\Blog\Blogcomment','comment_id');
    }
}

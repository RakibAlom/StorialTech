<?php

namespace App\Models\Blog;

use App\Models\Category\CategoryBlog;
use App\Models\Blog\BlogCategory;
use App\Models\User;
use App\Models\Blog\Bloglike;
use App\Models\Blog\Blogcomment;
use App\Models\Blog\Blogcommentreply;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','title','slug','body','date','month','year','image','keywords','views','status','created_at','updated_at'
    ];

    public function categoryblog()
    {
        return $this->belongsToMany('App\Models\Category\CategoryBlog','blog_categories','blog_id','category_id');
    }

    public function category()
    {
        return $this->hasMany('App\Models\Blog\BlogCategory');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function like()
    {
        return $this->hasMany(Bloglike::class);
    }

    public function comment()
    {
        return $this->hasMany(Blogcomment::class);
    }

    public function commentreply()
    {
        return $this->hasMany(Blogcommentreply::class);
    }

    public function path()
    {
        return route('show.blog', $this->slug);
    }

    public function fb()
    {
        return url("https://www.facebook.com/sharer.php?u=" . route('show.blog', $this->slug));
    }

    public function twitter()
    {
        return url("https://twitter.com/intent/tweet?url=" . route('show.blog', $this->slug));
    }

    public function pin()
    {
        return url("https://www.pinterest.com/pin/create/button/?url=" . route('show.blog', $this->slug));
    }
}

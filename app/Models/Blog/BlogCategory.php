<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    public function categoryblog()
    {
        return $this->belongsTo('App\Models\Category\CategoryBlog', 'category_id');
    }

    public function blog()
    {
        return $this->belongsTo('App\Models\Blog\Blog', 'blog_id');
    }
}

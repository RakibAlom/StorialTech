<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog\Blog;
use App\Models\Category\CategoryBlog;

class BlogPublicController extends Controller
{
    // Blog FUNCTION
   public function index()
   {
        $blogs = Blog::where('status', 1)->latest()->paginate(12);
        return view('blog.index', compact('blogs'));
   }

   public function categoryblog($slug)
   {
       $category = CategoryBlog::where('slug', $slug)->first();
       $category->update([
            'views' => $category->views + 1,
        ]);
       $blogs = $category->blog()->where('status', 1)->latest()->paginate(12);
       return view('blog.categoryshow', compact('blogs','category'));
   }

   public function show($slug)
   {
       $blog = Blog::where('slug', $slug)->first();
       $blog->update([
           'views' => $blog->views + 1,
       ]);
       return view('blog.show', compact('blog'));
   }
}

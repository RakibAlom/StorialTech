<?php

namespace App\Http\Controllers\Blog;

use App\Models\Blog\Blog;
use App\Models\Blog\Bloglike;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogLikeController extends Controller
{
    public function like(Blog $blog)
    {
        $like = Bloglike::create([
            'blog_id' => $blog->id,
            'user_id' => Auth::id(),
            'status' => 1,
        ]);

        if($like)
        {
           $notification = array(
                'messege' => 'You liked this blog!',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }

    public function unlike(Bloglike $like)
    {

        $like->delete();

        if($like)
        {
            $notification = array(
                'messege' => 'You removed liked from blog!',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }else{
            $notification = array(
                'messege' => 'Something went wrong!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }
    }
}

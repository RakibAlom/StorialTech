<?php

namespace App\Http\Controllers\Blog;

use App\Models\Blog\Blog;
use App\Models\Blog\Blogcomment;
use App\Models\Blog\Blogcommentreply;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogCommentController extends Controller
{
    public function comment($blog)
    {
        $blog = Blog::findOrFail($blog);

        request()->validate([
            'message' => 'required|max:300',
        ]);

        $comment = Blogcomment::create([
            'blog_id' => $blog->id,
            'user_id' => Auth::id(),
            'message' => request()->message,
        ]);

        if($comment){
           $notification = array(
                'messege' => 'You just commented!',
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

    public function update(Blogcomment $comment)
    {
        $comment->update([
            'message' => request()->message,
        ]);

        if($comment){
            $notification = array(
                'messege' => 'Just update your comment!',
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

    public function delete(Blogcomment $comment)
    {
        $comment->delete();

        if($comment){
            $notification = array(
                'messege' => 'Deleted your comment!',
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

    public function commentReply($comment)
    {
        $comment = Blogcomment::findOrFail($comment);

        request()->validate([
            'message' => 'required|max:300',
        ]);

        $comment = Blogcommentreply::create([
            'comment_id' => $comment->id,
            'blog_id' => $comment->blog_id,
            'user_id' => Auth::id(),
            'message' => request()->message,
        ]);

        if($comment){
            $notification = array(
                'messege' => 'You just reyply a comment!',
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

    public function updateReply(Blogcommentreply $comment)
    {
        $comment->update([
            'message' => request()->message,
        ]);

        if($comment){
            $notification = array(
                'messege' => 'You just update your reply!',
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

    public function deleteReply(Blogcommentreply $comment)
    {
        $comment->delete();

        if($comment){
            $notification = array(
                'messege' => 'Deleted your reply!',
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

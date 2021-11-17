<?php

namespace App\Http\Controllers\Story;

use App\Http\Controllers\Controller;
use App\Models\Story\Story;
use App\Models\Story\Storylike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryLikeController extends Controller
{
    public function like(Story $story)
    {
        $like = Storylike::create([
            'story_id' => $story->id,
            'user_id' => Auth::id(),
            'status' => 1,
        ]);

        if($like)
        {
           $notification = array(
                'messege' => 'You liked this story!',
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

    public function unlike(Storylike $like)
    {
        
        $like->delete();

        if($like)
        {
            $notification = array(
                'messege' => 'You removed liked from story!',
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

<?php

namespace App\Http\Controllers\Tutorial;

use App\Http\Controllers\Controller;
use App\Models\Tutorial\Tutorial;
use App\Models\Tutorial\Tutoriallike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorialLikeController extends Controller
{
    public function like(Tutorial $tutorial)
    {
        $like = Tutoriallike::create([
            'tutorial_id' => $tutorial->id,
            'user_id' => Auth::id(),
            'status' => 1,
        ]);

        if($like)
        {
           $notification = array(
                'messege' => 'You liked this tutorial!',
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

    public function unlike(Tutoriallike $like)
    {
        
        $like->delete();

        if($like)
        {
           $notification = array(
                'messege' => 'You removed like from tutorial!',
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

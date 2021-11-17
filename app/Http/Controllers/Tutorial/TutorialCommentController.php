<?php

namespace App\Http\Controllers\Tutorial;

use App\Http\Controllers\Controller;
use App\Models\Tutorial\Tutorial;
use App\Models\Tutorial\Tutorialcomment;
use App\Models\Tutorial\Tutorialcommentreply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorialCommentController extends Controller
{
    public function comment($tutorial)
    {
        $tutorial = Tutorial::findOrFail($tutorial);

        request()->validate([
            'message' => 'required|max:300',
        ]);

        $comment = Tutorialcomment::create([
            'tutorial_id' => $tutorial->id,
            'user_id' => Auth::id(),
            'message' => request()->message,
        ]);
        
        $notification = array(
            'messege' => 'You just commented!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function update(Tutorialcomment $comment)
    {
        $comment->update([
            'message' => request()->message,
        ]);

        $notification = array(
            'messege' => 'Just update your comment!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function delete(Tutorialcomment $comment)
    {
        $comment->delete();

        $notification = array(
            'messege' => 'Deleted Your Comment!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function commentReply($comment)
    {
        $comment = Tutorialcomment::findOrFail($comment);

        request()->validate([
            'message' => 'required|max:300',
        ]);

        $comment = Tutorialcommentreply::create([
            'comment_id' => $comment->id,
            'tutorial_id' => $comment->tutorial_id,
            'user_id' => Auth::id(),
            'message' => request()->message,
        ]);

        $notification = array(
            'messege' => 'You just reply a comment!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function updateReply(Tutorialcommentreply $comment)
    {
        $comment->update([
            'message' => request()->message,
        ]);

        $notification = array(
            'messege' => 'You just update your reply!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function deleteReply(Tutorialcommentreply $comment)
    {
        $comment->delete();

        $notification = array(
            'messege' => 'Deleted Your Reply!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}

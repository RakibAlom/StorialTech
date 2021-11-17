<?php

namespace App\Http\Controllers\Story;

use App\Http\Controllers\Controller;
use App\Models\Story\Story;
use App\Models\Story\Storycomment;
use App\Models\Story\Storycommentreply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryCommentController extends Controller
{
    public function comment($story)
    {
        $story = Story::findOrFail($story);

        request()->validate([
            'message' => 'required|max:300',
        ]);

        $comment = Storycomment::create([
            'story_id' => $story->id,
            'user_id' => Auth::id(),
            'message' => request()->message,
        ]);

        $notification = array(
            'messege' => 'You just commented!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function update(Storycomment $comment)
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

    public function delete(Storycomment $comment)
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
        $comment = Storycomment::findOrFail($comment);

        request()->validate([
            'message' => 'required|max:300',
        ]);

        $comment = Storycommentreply::create([
            'comment_id' => $comment->id,
            'story_id' => $comment->story_id,
            'user_id' => Auth::id(),
            'message' => request()->message,
        ]);

        $notification = array(
            'messege' => 'You just reply a comment!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function updateReply(Storycommentreply $comment)
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

    public function deleteReply(Storycommentreply $comment)
    {
        $comment->delete();

        $notification = array(
            'messege' => 'Deleted Your Reply!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}

<?php

namespace App\Http\Controllers\Tool;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\Story\Story;
use App\Models\Tutorial\Tutorial;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function feed() 
    {
        return view ('feed.feed-list');
    }

    public function feedNews()
    {
        $news = Blog::where('status',1)->orderBy('id','desc')->limit(15)->get();
        return response()->view('feed.feed', compact('news'))->header('Content-Type', 'application/xml');
    }

    public function feedTutorial()
    {
        $tutorials = Tutorial::where('status',1)->orderBy('id','desc')->limit(12)->get();
        return response()->view('feed.feed', compact('tutorials'))->header('Content-Type', 'application/xml');
    }

    public function feedStory()
    {
        $stories = Story::where('status',1)->orderBy('id','desc')->limit(12)->get();
        return response()->view('feed.feed', compact('stories'))->header('Content-Type', 'application/xml');
    }
}

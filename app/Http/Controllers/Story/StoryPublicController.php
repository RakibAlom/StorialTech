<?php

namespace App\Http\Controllers\Story;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Story\Story;
use App\Models\Category\CategoryStory;

class StoryPublicController extends Controller
{
    // STORY FUNCTION
   public function index()
   {
        $stories = Story::where('status', 1)->latest()->paginate(12);
        return view('story.index', compact('stories'));
   }
   public function loadmore(Request $request)
   {
        if($request->ajax()){
            if($request->id){
                $stories = Story::where('status', 1)->latest()->where('id', '<', $request->id)->take(12)->get();
            }else{
                $stories = Story::where('status', 1)->latest()->skip(3)->take(6)->get();
            }
        }
       return view('story.get_data', compact('stories'));

   }
   public function categorystory($slug)
   {
       $category = CategoryStory::where('slug', $slug)->first();
       $category->update([
            'views' => $category->views + 1,
        ]);
       $stories = $category->story()->where('status', 1)->latest()->paginate(12);
       return view('story.categoryshow', compact('stories','category'));
   }

   public function show($slug)
   {
       $story = Story::where('slug', $slug)->first();
       $story->update([
           'views' => $story->views + 1,
       ]);
       return view('story.show', compact('story'));
   }
}

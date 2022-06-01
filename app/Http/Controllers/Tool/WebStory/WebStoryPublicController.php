<?php

namespace App\Http\Controllers\Tool\WebStory;

use App\Http\Controllers\Controller;
use App\Models\Tools\WebStory;
use Illuminate\Http\Request;

class WebStoryPublicController extends Controller
{
    // WEB STORY FUNCTION
   public function index()
   {
        $webstories = WebStory::where('status', 1)->orderBy('id', 'desc')->paginate(12);
        return view('tools.webstory.webstories', compact('webstories'));
   }

   public function show($slug)
   {
     $webstory = WebStory::where('slug', $slug)->first();
     return view('tools.webstory.show', compact('webstory'));
   }
}

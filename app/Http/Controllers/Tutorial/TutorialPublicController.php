<?php

namespace App\Http\Controllers\Tutorial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tutorial\Tutorial;
use App\Models\Category\CategoryTutorial;
use App\Models\Tag\TagTutorial;

class TutorialPublicController extends Controller
{
   // TUTORIAL FUNCTION
   public function index()
   {
        $tutorials = Tutorial::where('status', 1)->latest()->paginate(12);
        return view('tutorial.index', compact('tutorials'));
   }
   public function loadmore(Request $request)
   {
        if($request->ajax()){
            if($request->id){
                $tutorials = Tutorial::where('status', 1)->latest()->where('id', '<', $request->id)->take(12)->get();
            }else{
                $tutorials = Tutorial::where('status', 1)->latest()->skip(3)->take(12)->get();
            }
        }
       return view('tutorial.get_data', compact('tutorials'));

   }
   public function categoryTutorial($slug)
   {
       $category = CategoryTutorial::where('slug', $slug)->first();
       $category->update([
            'views' => $category->views + 1,
        ]);
       $tutorials = $category->tutorial()->where('status', 1)->latest()->paginate(12);
       return view('tutorial.categoryshow', compact('tutorials','category'));
   }

   public function tagTutorial($slug)
   {
       $tag = TagTutorial::where('slug', $slug)->first();
       $tag->update([
            'views' => $tag->views + 1,
        ]);
       $tutorials = $tag->tutorial()->where('status', 1)->latest()->paginate(12);
       return view('tutorial.tagshow', compact('tutorials','tag'));
   }



   public function show($slug)
   {
       $tutorial = Tutorial::where('slug', $slug)->first();
       $tutorial->update([
           'views' => $tutorial->views + 1,
       ]);
       return view('tutorial.show', compact('tutorial'));
   }
}

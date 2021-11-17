<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;
use App\Models\Tag\TagTemplate;
use App\Models\Tag\TagTutorial;
use Illuminate\Http\Request;

class BasicController extends Controller
{
    public function getName(Request $request)
    {
        $slug = strtolower(str_replace(array(' ',';','!','=','@','#','--','–','(',')','%','^','~','*','/','.',',','ред','+',' - ',' | ', '{','}','[',']','"','<','>',':',':-','---','&',' & '), '-', request()->name));

        return response()->json(['slug' => $slug]);
    }

    public function getTitle(Request $request)
    {
        $slug = strtolower(str_replace(array(' ',';','!','=','@','#','--','–','(',')','%','^','~','*','/','.',',','ред','+',' - ',' | ', '{','}','[',']','"','<','>',':',':-','---','&',' & '), '-', request()->title));

        return response()->json(['slug' => $slug]);
    }
    
    public function getUnique(Request $request)
    {
        $slug = strtoupper(uniqid());

        return response()->json(['slug' => $slug]);
    }

    // GET TUTORIAL CATEGORY FUNCTION
    public function getTutorialCategory($id)
    {
        $tags = TagTutorial::where('category_id', $id)->where('status', 1)->get();
        return response()->json($tags);
    }

    // GET TUTORIAL CATEGORY FUNCTION
    public function getTemplateCategory($id)
    {
        $tags = TagTemplate::where('category_id', $id)->where('status', 1)->get();
        return response()->json($tags);
    }
}

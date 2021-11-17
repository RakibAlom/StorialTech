<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category\CategoryTemplate;
use App\Models\Tag\TagTemplate;
use App\Models\Template\Template;

class TemplatePublicController extends Controller
{
    // TEMPLATE FUNCTION
    public function index()
    {
         $templates = Template::where('status', 1)->latest()->paginate(12);
         return view('template.index', compact('templates'));
    }
    public function loadmore(Request $request)
    {
         if($request->ajax()){
             if($request->id){
                 $templates = Template::where('status', 1)->latest()->where('id', '<', $request->id)->take(12)->get();
             }else{
                 $templates = Template::where('status', 1)->latest()->skip(3)->take(6)->get();
             }
         }
        return view('template.get_data', compact('templates'));

    }
    public function categorytemplate($slug)
    {
        $category = CategoryTemplate::where('slug', $slug)->first();
        $category->update([
            'views' => $category->views + 1,
        ]);
        $templates = $category->template()->where('status', 1)->latest()->paginate(12);
        return view('template.categoryshow', compact('templates','category'));
    }

    public function tagtemplate($slug)
    {
        $tag = TagTemplate::where('slug', $slug)->first();
        $tag->update([
            'views' => $tag->views + 1,
        ]);
        $templates = $tag->template()->where('status', 1)->latest()->paginate(12);
        return view('template.tagshow', compact('templates','tag'));
    }

    public function show($slug)
    {
        $template = Template::where('slug', $slug)->first();
        $template->update([
            'views' => $template->views + 1,
        ]);
        return view('template.show', compact('template'));
    }
}

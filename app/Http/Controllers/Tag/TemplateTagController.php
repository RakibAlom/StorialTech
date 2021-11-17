<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Category\CategoryTemplate;
use App\Models\Tag\TagTemplate;
use Illuminate\Http\Request;

class TemplateTagController extends Controller
{
    public function index()
    {
        $tags = TagTemplate::where('status', 0)->orWhere('status', 1)->get();
        $count = 1;
        return view('admin.template.tag.index', compact('tags','count'));
    }

    public function trash()
    {
        $tags = TagTemplate::where('status', 9)->get();
        $count = 1;
        return view('admin.template.tag.trash', compact('tags','count'));
    }

    public function create()
    {
        $categories = CategoryTemplate::where('status', 1)->get();
        return view('admin.template.tag.create', compact('categories'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'category_id' => 'required',
            'slug' => 'required|unique:tag_templates',
        ]);
        $tag = TagTemplate::create([
            'name' => request('name'),
            'category_id' => request('category_id'),
            'slug' => request('slug'),
            'snumber' => TagTemplate::max('snumber') + 1,
        ]);

        if($tag)
        {
            return redirect()->back()->with('success', 'New Tag Publish!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function edit(TagTemplate $tag)
    {
        $categories = CategoryTemplate::all();
        return view('admin.template.tag.edit', compact('tag','categories'));
    }

    public function update(TagTemplate $tag)
    {
        $data = request()->validate([
            'name' => 'required',
            'category_id' => 'required',
            'slug' => 'required',
        ]);

        $tag->update($data);

        if($tag)
        {
            return redirect()->back()->with('success', 'Tag Updated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function deactive(TagTemplate $tag)
    {
        $tag->update(['status' => 0]);

        if($tag)
        {
            return redirect()->back()->with('success', 'Tag Deactived!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(TagTemplate $tag)
    {
        $tag->update(['status' => 1]);

        if($tag)
        {
            return redirect()->back()->with('success', 'Tag Activated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(TagTemplate $tag)
    {
        $tag->update(['status' => 9]);

        if($tag)
        {
            return redirect()->back()->with('delete', 'Tag moved to trash!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(TagTemplate $tag)
    {
        $tag->delete();

        if($tag)
        {
            return redirect()->back()->with('delete', 'Tag Has Been Deleted Permanently!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }
}

<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Category\CategoryTutorial;
use App\Models\Tag\TagTutorial;
use Illuminate\Http\Request;

class TutorialTagController extends Controller
{
    public function index()
    {
        $tags = TagTutorial::where('status', 0)->orWhere('status', 1)->get();
        $count = 1;
        return view('admin.tutorial.tag.index', compact('tags','count'));
    }

    public function trash()
    {
        $tags = TagTutorial::where('status', 9)->get();
        $count = 1;
        return view('admin.tutorial.tag.trash', compact('tags','count'));
    }

    public function create()
    {
        $categories = CategoryTutorial::where('status', 1)->get();
        return view('admin.tutorial.tag.create', compact('categories'));
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'category_id' => 'required',
            'slug' => 'required|unique:tag_tutorials',
        ]);
        $tag = TagTutorial::create([
            'name' => request('name'),
            'category_id' => request('category_id'),
            'slug' => request('slug'),
            'snumber' => TagTutorial::max('snumber') + 1,
        ]);

        if($tag)
        {
            return redirect()->back()->with('success', 'New Tag Publish!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function edit(TagTutorial $tag)
    {
        $categories = CategoryTutorial::all();
        return view('admin.tutorial.tag.edit', compact('tag','categories'));
    }

    public function update(TagTutorial $tag)
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

    public function deactive(TagTutorial $tag)
    {
        $tag->update(['status' => 0]);

        if($tag)
        {
            return redirect()->back()->with('success', 'Tag Deactived!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(TagTutorial $tag)
    {
        $tag->update(['status' => 1]);

        if($tag)
        {
            return redirect()->back()->with('success', 'Tag Activated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(TagTutorial $tag)
    {
        $tag->update(['status' => 9]);

        if($tag)
        {
            return redirect()->back()->with('delete', 'Tag moved to trash!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(TagTutorial $tag)
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

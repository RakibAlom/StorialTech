<?php

namespace App\Http\Controllers\Story;

use App\Http\Controllers\Controller;
use App\Models\Category\CategoryStory;
use App\Models\Story\Story;
use App\Models\Story\StoryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::where('status', 1)->latest()->get();
        $count = 1;
        return view('admin.story.index', compact('stories','count'));
    }

    public function show($slug)
    {
        $story = Story::where('slug', $slug)->first();
        return view('admin.story.show', compact('story'));
    }

    public function pending()
    {
        $stories = Story::where('status', 0)->latest()->get();
        $count = 1;
        return view('admin.story.index', compact('stories','count'));
    }

    public function deactiveList()
    {
        $stories = Story::where('status', 2)->latest()->get();
        $count = 1;
        return view('admin.story.index', compact('stories','count'));
    }

    public function trash()
    {
        $stories = Story::where('status', 9)->latest()->get();
        $count = 1;
        return view('admin.story.trash', compact('stories','count'));
    }

    public function create()
    {
        $categories = CategoryStory::where('status', 1)->orderBy('name','asc')->get();
        return view('admin.story.create', compact('categories'));
    }

    public function edit(Story $story)
    {
        $categories = CategoryStory::orderBy('name','asc')->get();
        return view('admin.story.edit', compact('story','categories'));
    }

    public function store()
    {
        $this->validateData();

        $check = Story::where('slug', request()->slug)->first();

        if(!$check){
            $story = Story::create([
                'user_id' => Auth::id(),
                'title' => request('title'),
                'slug' => request('slug'),
                'body' => request('body'),
                'date' => date('d'),
                'month' => date('F'),
                'year' => date('Y'),
                'keywords' => request('keywords'),
                'status' => 1,
            ]);
        }else{
            $story = Story::create([
                'user_id' => Auth::id(),
                'title' => request('title'),
                'slug' => request('slug') . '-' . uniqid(),
                'body' => request('body'),
                'date' => date('d'),
                'month' => date('F'),
                'year' => date('Y'),
                'keywords' => request('keywords'),
                'status' => 1,
            ]);
        }

        $this->storeImage($story);
        if(request()->category_id){
            foreach(request()->category_id as $key=>$category_id){
                $category = New StoryCategory();
                $category->category_id = $category_id;
                $category->story_id = $story->id;
                $category->save();
            }
        }


        if($story)
        {
            return back()->with('success', 'Story Publish Successfully!');
        }else{
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    public function update(Story $story)
    {
        $this->validateData();

        $story->update([
            'title' => request('title'),
            'slug' => request('slug'),
            'body' => request('body'),
            'keywords' => request('keywords'),
        ]);

        $this->storeImage($story);

        if(request()->category_id){
            foreach($story->category as $item){
                $item->delete();
            }

            foreach(request()->category_id as $key=>$category_id){
                $category = New StoryCategory();
                $category->category_id = $category_id;
                $category->story_id = $story->id;
                $category->save();
            }
        }


        if($story)
        {
            return back()->with('success', 'Story Updated Successfully!');
        }else{
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    public function deactive(Story $story)
    {
        $story->update(['status' => 2]);

        if($story)
        {
            return back()->with('success', 'Story Deactived!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(Story $story)
    {
        $story->update(['status' => 1]);

        if($story)
        {
            return back()->with('success', 'Story Activated!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function approve(Story $story)
    {
        $story->update(['status' => 1]);

        if($story)
        {
            return back()->with('success', 'Story Approved!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(Story $story)
    {
        $story->update(['status' => 9]);

        if($story)
        {
            return back()->with('delete', 'Story moved to trash!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(Story $story)
    {
        if($story->image){
            unlink('storage/app/public/'.$story->image);
        }
        $story->delete();

        if($story)
        {
            return back()->with('delete', 'Story Deleted Permanently!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }


    // PRIVATE FUNCTION
    private function validateData()
    {
        return request()->validate([
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'sometimes|file|image|max:120',
            'keywords' => '',
        ]);
    }

    private function storeImage($story)
    {
        if(request()->has('image'))
        {
            if(request()->oldimage){
                unlink('storage/app/public/'.$story->image);
            }
            $story->update([
                'image' => request()->image->store('image/story', 'public'),
            ]);
        }
    }


    // MODERATOR FUNCTION 
    public function mindex()
    {
        $aid = Auth::id();
        $stories = Story::where('status', 1)->where('user_id', $aid)->latest()->get();
        $count = 1;
        return view('admin.story.index', compact('stories','count'));
    }

    public function mdeactiveList()
    {
        $aid = Auth::id();
        $stories = Story::where('status', 2)->where('user_id', $aid)->latest()->get();
        $count = 1;
        return view('admin.story.index', compact('stories','count'));
    }


    public function medit(Story $mstory)
    {
        $aid = Auth::id();
        $story = Story::where('id', $mstory->id)->where('user_id', $aid)->first();
        $categories = CategoryStory::orderBy('name','asc')->get();
        return view('admin.story.edit', compact('story','categories'));
    }

    public function mupdate(Story $mstory)
    {
        $aid = Auth::id();
        $story = Story::where('id', $mstory->id)->where('user_id', $aid)->first();
        $this->validateData();
        $story->update([
            'title' => request('title'),
            'slug' => request('slug'),
            'body' => request('body'),
            'keywords' => request('keywords'),
        ]);

        $this->storeImage($story);

        if(request()->category_id){
            foreach($story->category as $item){
                $item->delete();
            }

            foreach(request()->category_id as $key=>$category_id){
                $category = New StoryCategory();
                $category->category_id = $category_id;
                $category->story_id = $story->id;
                $category->save();
            }
        }


        if($story)
        {
            return back()->with('success', 'Story Updated Successfully!');
        }else{
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    public function mdeactive(Story $mstory)
    {
        $aid = Auth::id();
        $story = Story::where('id', $mstory->id)->where('user_id', $aid)->first();
        $story->update(['status' => 2]);

        if($story)
        {
            return back()->with('success', 'Story Deactived!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function mactive(Story $mstory)
    {
        $aid = Auth::id();
        $story = Story::where('id', $mstory->id)->where('user_id', $aid)->first();
        $story->update(['status' => 1]);

        if($story)
        {
            return back()->with('success', 'Story Activated!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function mapprove(Story $mstory)
    {
        $aid = Auth::id();
        $story = Story::where('id', $mstory->id)->where('user_id', $aid)->first();
        $story->update(['status' => 1]);
        if($story)
        {
            return back()->with('success', 'Story Approved!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function msoftDelete(Story $mstory)
    {
        $aid = Auth::id();
        $story = Story::where('id', $mstory->id)->where('user_id', $aid)->first();
        $story->update(['status' => 9]);

        if($story)
        {
            return back()->with('delete', 'Story Deleted!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }
}

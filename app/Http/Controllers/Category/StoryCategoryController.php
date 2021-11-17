<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category\CategoryStory;
use Illuminate\Http\Request;

class StoryCategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryStory::where('status', 0)->orWhere('status', 1)->get();
        $count = 1;
        return view('admin.story.category.index', compact('categories','count'));
    }

    public function trash()
    {
        $categories = CategoryStory::where('status', 9)->get();
        $count = 1;
        return view('admin.story.category.trash', compact('categories','count'));
    }

    public function create()
    {
        return view('admin.story.category.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required|unique:category_stories',
        ]);
        $category = CategoryStory::create([
            'name' => request('name'),
            'slug' => request('slug'),
            'snumber' => CategoryStory::max('snumber') + 1,
        ]);

        if($category)
        {
            return redirect()->back()->with('success', 'New Category Publish!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function edit(CategoryStory $category)
    {
        return view('admin.story.category.edit', compact('category'));
    }

    public function update(CategoryStory $category)
    {
        $data = request()->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $category->update($data);

        if($category)
        {
            return redirect()->back()->with('success', 'Category Updated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function deactive(CategoryStory $category)
    {
        $category->update(['status' => 0]);

        if($category)
        {
            return redirect()->back()->with('success', 'Category Deactived!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(CategoryStory $category)
    {
        $category->update(['status' => 1]);

        if($category)
        {
            return redirect()->back()->with('success', 'Category Activated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(CategoryStory $category)
    {
        $category->update(['status' => 9]);

        if($category)
        {
            return redirect()->back()->with('delete', 'Category moved to trash!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(CategoryStory $category)
    {
        $category->delete();

        if($category)
        {
            return redirect()->back()->with('delete', 'Category Has Been Deleted Permanently!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }
}

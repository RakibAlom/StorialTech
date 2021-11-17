<?php

namespace App\Http\Controllers\Category;

use App\Models\Category\CategoryBlog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryBlog::where('status', 0)->orWhere('status', 1)->get();
        $count = 1;
        return view('admin.blog.category.index', compact('categories','count'));
    }

    public function trash()
    {
        $categories = CategoryBlog::where('status', 9)->get();
        $count = 1;
        return view('admin.blog.category.trash', compact('categories','count'));
    }

    public function create()
    {
        return view('admin.blog.category.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required|unique:category_blogs',
        ]);
        $category = CategoryBlog::create([
            'name' => request('name'),
            'slug' => request('slug'),
            'snumber' => CategoryBlog::max('snumber') + 1,
        ]);

        if($category)
        {
            return redirect()->back()->with('success', 'New Category Publish!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function edit(CategoryBlog $category)
    {
        return view('admin.blog.category.edit', compact('category'));
    }

    public function update(CategoryBlog $category)
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

    public function deactive(CategoryBlog $category)
    {
        $category->update(['status' => 0]);

        if($category)
        {
            return redirect()->back()->with('success', 'Category Deactived!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(CategoryBlog $category)
    {
        $category->update(['status' => 1]);

        if($category)
        {
            return redirect()->back()->with('success', 'Category Activated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(CategoryBlog $category)
    {
        $category->update(['status' => 9]);

        if($category)
        {
            return redirect()->back()->with('delete', 'Category moved to trash!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(CategoryBlog $category)
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

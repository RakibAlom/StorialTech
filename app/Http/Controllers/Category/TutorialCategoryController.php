<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category\CategoryTutorial;
use Illuminate\Http\Request;

class TutorialCategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryTutorial::where('status', 0)->orWhere('status', 1)->get();
        $count = 1;
        return view('admin.tutorial.category.index', compact('categories','count'));
    }

    public function trash()
    {
        $categories = CategoryTutorial::where('status', 9)->get();
        $count = 1;
        return view('admin.tutorial.category.trash', compact('categories','count'));
    }

    public function create()
    {
        return view('admin.tutorial.category.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required|unique:category_tutorials',
        ]);
        $category = CategoryTutorial::create([
            'name' => request('name'),
            'slug' => request('slug'),
            'snumber' => CategoryTutorial::max('snumber') + 1,
        ]);

        if($category)
        {
            return redirect()->back()->with('success', 'New Category Publish.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function edit(CategoryTutorial $category)
    {
        return view('admin.tutorial.category.edit', compact('category'));
    }

    public function update(CategoryTutorial $category)
    {
        $data = request()->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $category->update($data);

        if($category)
        {
            return redirect()->back()->with('success', 'Category Updated.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function deactive(CategoryTutorial $category)
    {
        $category->update(['status' => 0]);

        if($category)
        {
            return redirect()->back()->with('success', 'Category Deactived.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(CategoryTutorial $category)
    {
        $category->update(['status' => 1]);

        if($category)
        {
            return redirect()->back()->with('success', 'Category Activated.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(CategoryTutorial $category)
    {
        $category->update(['status' => 9]);

        if($category)
        {
            return redirect()->back()->with('delete', 'Category moved to trash.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(CategoryTutorial $category)
    {
        $category->delete();

        if($category)
        {
            return redirect()->back()->with('delete', 'Category Has Been Deleted Permanently.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }
}

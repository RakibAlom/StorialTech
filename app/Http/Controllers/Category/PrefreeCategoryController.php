<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category\CategoryPrefree;

class PrefreeCategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryPrefree::where('status', 0)->orWhere('status', 1)->get();
        $count = 1;
        return view('admin.source.category.index', compact('categories','count'));
    }

    public function trash()
    {
        $categories = CategoryPrefree::where('status', 9)->get();
        $count = 1;
        return view('admin.source.category.trash', compact('categories','count'));
    }

    public function create()
    {
        return view('admin.source.category.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required|unique:category_prefrees',
        ]);
        $category = CategoryPrefree::create([
            'name' => request('name'),
            'slug' => request('slug'),
            'snumber' => CategoryPrefree::max('snumber') + 1,
        ]);

        if($category)
        {
            return redirect()->back()->with('success', 'New Source Category Publish.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function edit(CategoryPrefree $category)
    {
        return view('admin.source.category.edit', compact('category'));
    }

    public function update(CategoryPrefree $category)
    {
        $data = request()->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $category->update($data);

        if($category)
        {
            return redirect()->back()->with('success', 'Source Category Updated.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function deactive(CategoryPrefree $category)
    {
        $category->update(['status' => 0]);

        if($category)
        {
            return redirect()->back()->with('success', 'Source Category Deactived.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(CategoryPrefree $category)
    {
        $category->update(['status' => 1]);

        if($category)
        {
            return redirect()->back()->with('success', 'Source Category Activated.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(CategoryPrefree $category)
    {
        $category->update(['status' => 9]);

        if($category)
        {
            return redirect()->back()->with('delete', 'Source Category moved to trash.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(CategoryPrefree $category)
    {
        $category->delete();

        if($category)
        {
            return redirect()->back()->with('delete', 'Source Category Has Been Deleted Permanently.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }
}

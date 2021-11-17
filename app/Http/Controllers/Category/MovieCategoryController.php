<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category\CategoryMovie;
use Illuminate\Http\Request;

class MovieCategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryMovie::where('status', 0)->orWhere('status', 1)->get();
        $count = 1;
        return view('admin.movie.category.index', compact('categories','count'));
    }

    public function trash()
    {
        $categories = CategoryMovie::where('status', 9)->get();
        $count = 1;
        return view('admin.movie.category.trash', compact('categories','count'));
    }

    public function create()
    {
        return view('admin.movie.category.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required|unique:category_movies',
        ]);
        $category = CategoryMovie::create([
            'name' => request('name'),
            'slug' => request('slug'),
            'snumber' => CategoryMovie::max('snumber') + 1,
        ]);

        if($category)
        {
            return redirect()->back()->with('success', 'Movie Category Publish');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong');
        }
    }

    public function edit(CategoryMovie $category)
    {
        return view('admin.movie.category.edit', compact('category'));
    }

    public function update(CategoryMovie $category)
    {
        $data = request()->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $category->update($data);

        if($category)
        {
            return redirect()->back()->with('success', 'Category Updated');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong');
        }
    }

    public function deactive(CategoryMovie $category)
    {
        $category->update(['status' => 0]);

        if($category)
        {
            return redirect()->back()->with('success', 'Movie Category Deactived');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong');
        }
    }

    public function active(CategoryMovie $category)
    {
        $category->update(['status' => 1]);

        if($category)
        {
            return redirect()->back()->with('success', 'Movie Category Activated');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong');
        }
    }

    public function softDelete(CategoryMovie $category)
    {
        $category->update(['status' => 9]);

        if($category)
        {
            return redirect()->back()->with('delete', 'Movie Category moved to trash');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong');
        }
    }

    public function permanentDelete(CategoryMovie $category)
    {
        $category->delete();

        if($category)
        {
            return redirect()->back()->with('delete', 'Movie Category Has Been Deleted Permanently');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong');
        }
    }
}

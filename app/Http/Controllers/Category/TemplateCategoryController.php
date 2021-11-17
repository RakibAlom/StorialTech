<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category\CategoryTemplate;
use Illuminate\Http\Request;

class TemplateCategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryTemplate::where('status', 0)->orWhere('status', 1)->get();
        $count = 1;
        return view('admin.template.category.index', compact('categories','count'));
    }

    public function trash()
    {
        $categories = CategoryTemplate::where('status', 9)->get();
        $count = 1;
        return view('admin.template.category.trash', compact('categories','count'));
    }

    public function create()
    {
        return view('admin.template.category.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required|unique:category_templates',
        ]);
        $category = CategoryTemplate::create([
            'name' => request('name'),
            'slug' => request('slug'),
            'snumber' => CategoryTemplate::max('snumber') + 1,
        ]);

        if($category)
        {
            return redirect()->back()->with('success', 'New Category Publish.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function edit(CategoryTemplate $category)
    {
        return view('admin.template.category.edit', compact('category'));
    }

    public function update(CategoryTemplate $category)
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

    public function deactive(CategoryTemplate $category)
    {
        $category->update(['status' => 0]);

        if($category)
        {
            return redirect()->back()->with('success', 'Category Deactived.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(CategoryTemplate $category)
    {
        $category->update(['status' => 1]);

        if($category)
        {
            return redirect()->back()->with('success', 'Category Activated.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(CategoryTemplate $category)
    {
        $category->update(['status' => 9]);

        if($category)
        {
            return redirect()->back()->with('delete', 'Category moved to trash.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(CategoryTemplate $category)
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

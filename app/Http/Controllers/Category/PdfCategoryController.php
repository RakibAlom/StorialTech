<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category\CategoryPdf;
use Illuminate\Http\Request;

class PdfCategoryController extends Controller
{
    public function index()
    {
        $categories = CategoryPdf::where('status', 0)->orWhere('status', 1)->get();
        $count = 1;
        return view('admin.pdf.category.index', compact('categories','count'));
    }

    public function trash()
    {
        $categories = CategoryPdf::where('status', 9)->get();
        $count = 1;
        return view('admin.pdf.category.trash', compact('categories','count'));
    }

    public function create()
    {
        return view('admin.pdf.category.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required|unique:category_pdfs',
        ]);
        $category = CategoryPdf::create([
            'name' => request('name'),
            'slug' => request('slug'),
            'snumber' => CategoryPdf::max('snumber') + 1,
        ]);

        if($category)
        {
            return redirect()->back()->with('success', 'New PDF Category Publish.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function edit(CategoryPdf $category)
    {
        return view('admin.pdf.category.edit', compact('category'));
    }

    public function update(CategoryPdf $category)
    {
        $data = request()->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $category->update($data);

        if($category)
        {
            return redirect()->back()->with('success', 'PDF Category Updated.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function deactive(CategoryPdf $category)
    {
        $category->update(['status' => 0]);

        if($category)
        {
            return redirect()->back()->with('success', 'PDF Category Deactived.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(CategoryPdf $category)
    {
        $category->update(['status' => 1]);

        if($category)
        {
            return redirect()->back()->with('success', 'PDF Category Activated.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(CategoryPdf $category)
    {
        $category->update(['status' => 9]);

        if($category)
        {
            return redirect()->back()->with('delete', 'PDF Category moved to trash.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(CategoryPdf $category)
    {
        $category->delete();

        if($category)
        {
            return redirect()->back()->with('delete', 'PDF Category Has Been Deleted Permanently.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }
}

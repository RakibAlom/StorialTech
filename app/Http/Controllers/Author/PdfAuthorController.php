<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Author\AuthorPdf;
use Illuminate\Http\Request;

class PdfAuthorController extends Controller
{
    public function index()
    {
        $authors = AuthorPdf::where('status', 0)->orWhere('status', 1)->get();
        $count = 1;
        return view('admin.pdf.author.index', compact('authors','count'));
    }

    public function trash()
    {
        $authors = AuthorPdf::where('status', 9)->get();
        $count = 1;
        return view('admin.pdf.author.trash', compact('authors','count'));
    }

    public function create()
    {
        return view('admin.pdf.author.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required|unique:author_pdfs',
        ]);
        $author = AuthorPdf::create([
            'name' => request('name'),
            'slug' => request('slug'),
            'snumber' => AuthorPdf::max('snumber') + 1,
        ]);

        if($author)
        {
            return redirect()->back()->with('success', 'New PDF Series Publish.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function edit(AuthorPdf $author)
    {
        return view('admin.pdf.author.edit', compact('author'));
    }

    public function update(AuthorPdf $author)
    {
        $data = request()->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $author->update($data);

        if($author)
        {
            return redirect()->back()->with('success', 'PDF Series Updated.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function deactive(AuthorPdf $author)
    {
        $author->update(['status' => 0]);

        if($author)
        {
            return redirect()->back()->with('success', 'PDF Series Deactived.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(AuthorPdf $author)
    {
        $author->update(['status' => 1]);

        if($author)
        {
            return redirect()->back()->with('success', 'PDF Series Activated.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(AuthorPdf $author)
    {
        $author->update(['status' => 9]);

        if($author)
        {
            return redirect()->back()->with('delete', 'PDF Series moved to trash.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(AuthorPdf $author)
    {
        $author->delete();

        if($author)
        {
            return redirect()->back()->with('delete', 'PDF Series Has Been Deleted Permanently.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }
}

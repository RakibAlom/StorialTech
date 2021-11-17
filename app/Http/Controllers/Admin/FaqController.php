<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = faq::where('status', 0)->orWhere('status', 1)->get();
        $count = 1;
        return view('admin.faq.index', compact('faqs','count'));
        
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function trash()
    {
        $faqs = faq::where('status', 9)->get();
        $count = 1;
        return view('admin.faq.trash', compact('faqs','count'));
    }

    public function store()
    {
        $data = request()->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = faq::create($data);

        if($faq)
        {
            return redirect()->back()->with('success', 'New FAQ Publish!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function edit(faq $faq)
    {
        return view('admin.faq.edit', compact('faq'));

    }

    public function update(faq $faq)
    {
        $data = request()->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq->update($data);

        if($faq)
        {
            return redirect()->back()->with('success', 'FAQ Updated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function deactive(faq $faq)
    {
        $faq->update(['status' => 0]);

        if($faq)
        {
            return redirect()->back()->with('success', 'FAQ Deactived.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(faq $faq)
    {
        $faq->update(['status' => 1]);

        if($faq)
        {
            return redirect()->back()->with('success', 'FAQ Activated.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(faq $faq)
    {
        $faq->update(['status' => 9]);

        if($faq)
        {
            return redirect()->back()->with('delete', 'FAQ moved to trash.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(faq $faq)
    {
        $faq->delete();

        if($faq)
        {
            return redirect()->back()->with('delete', 'FAQ Has Been Deleted Permanently.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }
}

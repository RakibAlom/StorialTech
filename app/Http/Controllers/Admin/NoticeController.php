<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function index()
    {
        return view('admin.notice.index');
    }

    public function create()
    {
        return view('admin.notice.create');
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'required',
            'slug' => 'required|unique:notices',
            'notice' => 'required',
            'image' => '',
        ]);

        $notice = Notice::create($data);
        $this->storeFile($notice);

        if($notice)
        {
            return redirect()->back()->with('success', 'New Notice Publish!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function edit(Notice $notice)
    {
        return view('admin.notice.edit', compact($notice));

    }

    public function update(Notice $notice)
    {
        $data = request()->validate([
            'title' => 'required',
            'slug' => 'required',
            'notice' => 'required',
            'image' => '',
        ]);

        $notice->update($data);
        $this->storeFile($notice);

        if($notice)
        {
            return redirect()->back()->with('success', 'Notice Updated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function deactive(Notice $notice)
    {
        $notice->update(['status' => 0]);

        if($notice)
        {
            return redirect()->back()->with('success', 'Notice Deactived.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(Notice $notice)
    {
        $notice->update(['status' => 1]);

        if($notice)
        {
            return redirect()->back()->with('success', 'Notice Activated.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(Notice $notice)
    {
        $notice->update(['status' => 9]);

        if($notice)
        {
            return redirect()->back()->with('delete', 'Notice moved to trash.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(Notice $notice)
    {
        if($notice->image){
            unlink('storage/app/public/'. $notice->image);
        }
        $notice->delete();

        if($notice)
        {
            return redirect()->back()->with('delete', 'Notice Has Been Deleted Permanently.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    private function storeFile($notice)
    {
        if(request()->has('image')){
            if(request()->has('oldimage')) {
                unlink('storage/app/public/'. $notice->image);
            }
            $notice->update([
                'image' => request()->image->store('image/notice', 'public'),
            ]);
        }
    }
    
}

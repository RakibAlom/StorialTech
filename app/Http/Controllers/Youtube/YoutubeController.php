<?php

namespace App\Http\Controllers\Youtube;

use App\Http\Controllers\Controller;
use App\Models\Youtube\Youtube;
use Illuminate\Http\Request;

class YoutubeController extends Controller
{
    public function index()
    {
        $youtubes = Youtube::where('status', 1)->orWhere('status', 0)->get();
        $count = 1;
        return view('admin.youtube.index', compact('youtubes','count'));
    }

    public function trash()
    {
        $youtubes = Youtube::where('status',9)->get();
        $count = 1;
        return view('admin.youtube.trash', compact('youtubes','count'));
    }

    public function create()
    {
        return view('admin.youtube.create');
    }

    public function show($slug)
    {
        $youtube = Youtube::where('slug', $slug)->first();
        return view('admin.youtube.show',compact('youtube'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'slug' => 'required|unique:youtubes',
            'elink' => 'required',
            'clink' => 'required',
            'body' => 'required',
            'keywords' => 'required',
            'image' => 'sometimes|file|image|max:120',
        ]);

        $youtube = Youtube::create($data);
        $this->storeFile($youtube);

        if($youtube)
        {
            return redirect()->back()->with('success', 'New YouTube Channel Publish!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function edit(Youtube $youtube)
    {
        return view('admin.youtube.edit', compact('youtube'));

    }

    public function update(Youtube $youtube)
    {
        $data = request()->validate([
            'name' => 'required',
            'slug' => 'required',
            'elink' => 'required',
            'clink' => 'required',
            'body' => 'required',
            'keywords' => 'required',
            'image' => 'sometimes|file|image|max:120',
        ]);
        
        $update_date = $youtube->updated_at;
        $youtube->update(['created_at' => $update_date]);

        $youtube->update($data);
        $this->storeFile($youtube);

        if($youtube)
        {
            return redirect()->back()->with('success', 'YouTube Channel Updated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function deactive(Youtube $youtube)
    {
        $youtube->update(['status' => 0]);

        if($youtube)
        {
            return redirect()->back()->with('success', 'YouTube Channel Deactived.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(Youtube $youtube)
    {
        $youtube->update(['status' => 1]);

        if($youtube)
        {
            return redirect()->back()->with('success', 'YouTube Channel Activated.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(Youtube $youtube)
    {
        $youtube->update(['status' => 9]);

        if($youtube)
        {
            return redirect()->back()->with('delete', 'YouTube Channel moved to trash.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(Youtube $youtube)
    {
        if($youtube->image){
            unlink('storage/app/public/'. $youtube->image);
        }

        $youtube->delete();

        if($youtube)
        {
            return redirect()->back()->with('delete', 'Youtube Channel Has Been Deleted Permanently.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    private function storeFile($youtube)
    {
        if(request()->has('image'))
        {
            if(request()->oldimage){
                unlink('storage/app/public/'. request()->oldimage);
            }
            $youtube->update([
                'image' => request()->image->store('image/youtube', 'public'),
            ]);
        }
    }
}

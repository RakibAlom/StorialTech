<?php

namespace App\Http\Controllers\Tool\WebStory;

use App\Http\Controllers\Controller;
use App\Models\Tools\WebStory;
use Auth;
use Illuminate\Http\Request;

class WebStoryController extends Controller
{
    public function index()
    {
        $webstories = WebStory::where('status', 1)->orderBy('id', 'desc')->get();
        $count = 1;
        return view('admin.tools.webstories.index', compact('webstories','count'));
    }

    public function indexGrid()
    {
        $webstories = WebStory::where('status', 1)->orderBy('id', 'desc')->paginate(24);
        $count = 1;
        return view('admin.tools.webstories.indexgrid', compact('webstories','count'));
    }

    public function show($slug)
    {
        $webstory = WebStory::where('slug', $slug)->first();
        return view('admin.tools.webstories.show', compact('webstory'));
    }

    public function pending()
    {
        $webstories = WebStory::where('status', 0)->orderBy('id', 'desc')->get();
        $count = 1;
        return view('admin.tools.webstories.index', compact('webstories','count'));
    }

    public function deactiveList()
    {
        $webstories = WebStory::where('status', 2)->orderBy('id', 'desc')->get();
        $count = 1;
        return view('admin.tools.webstories.index', compact('webstories','count'));
    }

    public function trash()
    {
        $webstories = WebStory::where('status', 9)->orderBy('id', 'desc')->get();
        $count = 1;
        return view('admin.tools.webstories.trash', compact('webstories','count'));
    }

    public function create()
    {
        return view('admin.tools.webstories.create');
    }

    public function edit(WebStory $webstory)
    {
        return view('admin.tools.webstories.edit', compact('webstory'));
    }

    public function store()
    {
        $this->validateData();

        $check = WebStory::where('slug', request()->slug)->first();

        if(!$check){
            $webstory = WebStory::create([
                'user_id' => Auth::id(),
                'title' => request('title'),
                'slug' => request('slug'),
                'image_link' => request('image_link'),
                'embed_code' => request('embed_code'),
                'status' => 1,
            ]);
        }else{
            $webstory = WebStory::create([
                'user_id' => Auth::id(),
                'title' => request('title'),
                'slug' => request('slug') . '-' . uniqid(),
                'image_link' => request('image_link'),
                'embed_code' => request('embed_code'),
                'status' => 1,
            ]);
        }

        $this->storeImage($webstory);


        if($webstory)
        {
            return back()->with('success', 'Web Story Publish!');
        }else{
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    public function update(WebStory $webstory)
    {
        $this->validateData();

        $webstory->update([
            'title' => request('title'),
            'slug' => request('slug'),
            'image_link' => request('image_link'),
            'embed_code' => request('embed_code'),
        ]);

        $this->storeImage($webstory);

        if($webstory)
        {
            return back()->with('success', 'Web Story Updated!');
        }else{
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    public function deactive(WebStory $webstory)
    {
        $webstory->update(['status' => 2]);

        if($webstory)
        {
            return back()->with('success', 'Web Story Deactived!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(WebStory $webstory)
    {
        $webstory->update(['status' => 1]);

        if($webstory)
        {
            return back()->with('success', 'Web Story Activated!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function approve(WebStory $webstory)
    {
        $webstory->update(['status' => 1]);

        if($webstory)
        {
            return back()->with('success', 'Web Story Approved!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(WebStory $webstory)
    {
        $webstory->update(['status' => 9]);

        if($webstory)
        {
            return back()->with('delete', 'Web Story moved to trash!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(WebStory $webstory)
    {
        if($webstory->image){
            unlink('storage/app/public/' . $webstory->image);
        }
        $webstory->delete();

        if($webstory)
        {
            return back()->with('delete', 'Web Story Deleted Permanently!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }


    // PRIVATE FUNCTION
    private function validateData()
    {
        return request()->validate([
            'title' => 'required',
            'slug' => 'required',
            'embed_code' => 'required',
            'image' => 'sometimes|file|image|max:120',
            'image_link' => '',
        ]);
    }

    private function storeImage($webstory)
    {
        if(request()->has('image'))
        {
            if(request()->oldimage){
                unlink('storage/app/public/'.$webstory->image);
            }
            $webstory->update([
                'image' => request()->image->store('image/webstory', 'public'),
            ]);
        }
    }


    // MODERAOTR FUNCTION
    public function mindex()
    {
        $aid = Auth::id();
        $webstories = WebStory::where('status', 1)->where('user_id', $aid)->orderBy('id', 'desc')->get();
        $count = 1;
        return view('admin.tools.webstories.index', compact('webstories','count'));
    }

    public function mdeactiveList()
    {
        $aid = Auth::id();
        $webstories = WebStory::where('status', 2)->where('user_id', $aid)->orderBy('id', 'desc')->get();
        $count = 1;
        return view('admin.tools.webstories.index', compact('webstories','count'));
    }

    public function medit(WebStory $mwebstory)
    {
        $aid = Auth::id();
        $webstory = WebStory::where('id', $mwebstory->id)->where('user_id', $aid)->first();
        return view('admin.tools.webstories.edit', compact('webstory'));
    }


    public function mupdate(WebStory $mwebstory)
    {
        $aid = Auth::id();
        $webstory = WebStory::where('id', $mwebstory->id)->where('user_id', $aid)->first();

        $this->validateData();

        $webstory->update([
            'title' => request('title'),
            'slug' => request('slug'),
            'image_link' => request('image_link'),
            'embed_code' => request('embed_code'),
        ]);

        $this->storeImage($webstory);

        if($webstory)
        {
            return back()->with('success', 'Web Story Updated!');
        }else{
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    public function mdeactive(WebStory $mwebstory)
    {
        $aid = Auth::id();
        $webstory = WebStory::where('id', $mwebstory->id)->where('user_id', $aid)->first();

        $webstory->update(['status' => 2]);

        if($webstory)
        {
            return back()->with('success', 'Web Story Deactived!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function mactive(WebStory $mwebstory)
    {
        $aid = Auth::id();
        $webstory = WebStory::where('id', $mwebstory->id)->where('user_id', $aid)->first();

        $webstory->update(['status' => 1]);

        if($webstory)
        {
            return back()->with('success', 'Web Story Activated!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function mapprove(WebStory $mwebstory)
    {
        $aid = Auth::id();
        $webstory = WebStory::where('id', $mwebstory->id)->where('user_id', $aid)->first();

        $webstory->update(['status' => 1]);

        if($webstory)
        {
            return back()->with('success', 'Web Story Approved!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function msoftDelete(WebStory $mwebstory)
    {
        $aid = Auth::id();
        $webstory = WebStory::where('id', $mwebstory->id)->where('user_id', $aid)->first();
        
        $webstory->update(['status' => 9]);

        if($webstory)
        {
            return back()->with('delete', 'Web Story Deleted!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }
}

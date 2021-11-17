<?php

namespace App\Http\Controllers\Tutorial;

use App\Http\Controllers\Controller;
use App\Models\Category\CategoryTutorial;
use App\Models\Tag\TagTutorial;
use App\Models\Tutorial\Tutorial;
use App\Models\Tutorial\TutorialCategory;
use App\Models\Tutorial\TutorialTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorialController extends Controller
{
    public function index()
    {
        $tutorials = Tutorial::where('status', 1)->latest()->get();
        $count = 1;
        return view('admin.tutorial.index', compact('tutorials','count'));
    }

    public function show($slug)
    {
        $tutorial = Tutorial::where('slug', $slug)->first();
        return view('admin.tutorial.show', compact('tutorial'));
    }

    public function pending()
    {
        $tutorials = Tutorial::where('status', 0)->latest()->get();
        $count = 1;
        return view('admin.tutorial.index', compact('tutorials','count'));
    }

    public function deactiveList()
    {
        $tutorials = Tutorial::where('status', 2)->latest()->get();
        $count = 1;
        return view('admin.tutorial.index', compact('tutorials','count'));
    }

    public function trash()
    {
        $tutorials = Tutorial::where('status', 9)->latest()->get();
        $count = 1;
        return view('admin.tutorial.trash', compact('tutorials','count'));
    }

    public function create()
    {
        $categories = CategoryTutorial::where('status', 1)->orderBy('name','asc')->get();
        $tags = TagTutorial::where('status', 1)->orderBy('name','asc')->get();
        return view('admin.tutorial.create', compact('categories','tags'));
    }

    public function edit(Tutorial $tutorial)
    {
        $categories = CategoryTutorial::orderBy('name','asc')->get();
        $tags = TagTutorial::orderBy('name','asc')->get();
        return view('admin.tutorial.edit', compact('tutorial','categories','tags'));
    }

    public function store()
    {
        $this->validateData();
        $check = Tutorial::where('slug', request()->slug)->first();
        
        if(!$check) {
            $tutorial = Tutorial::create([
                'user_id' => Auth::id(),
                'title' => request('title'),
                'slug' => request('slug'),
                'body' => request('body'),
                'vlink' => request('vlink'),
                'date' => date('d'),
                'month' => date('F'),
                'year' => date('Y'),
                'keywords' => request('keywords'),
                'preview_code' => request('preview_code'),
                'status' => 1,
            ]);
        }else{
            $tutorial = Tutorial::create([
                'user_id' => Auth::id(),
                'title' => request('title'),
                'slug' => request('slug') . '-' . uniqid(),
                'body' => request('body'),
                'vlink' => request('vlink'),
                'date' => date('d'),
                'month' => date('F'),
                'year' => date('Y'),
                'keywords' => request('keywords'),
                'preview_code' => request('preview_code'),
                'status' => 1,
            ]);
        }

        $this->storeImage($tutorial);

        $category = New TutorialCategory();
        $category->category_id = request()->category_id;
        $category->tutorial_id = $tutorial->id;
        $category->save();

        if(request()->tag_id){
            foreach(request()->tag_id as $key=>$tag_id){
                $category = New TutorialTag();
                $category->tag_id = $tag_id;
                $category->tutorial_id = $tutorial->id;
                $category->save();
            }
        }


        if($tutorial)
        {
            return redirect()->back()->with('success', 'Tutorial Publish Successfully!');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }

    public function update(Tutorial $tutorial)
    {
        $this->validateData();

        $tutorial->update([
            'title' => request('title'),
            'slug' => request('slug'),
            'body' => request('body'),
            'vlink' => request('vlink'),
            'keywords' => request('keywords'),
            'preview_code' => request('preview_code'),
        ]);

        $update_date = $tutorial->updated_at;
        $tutorial->update(['created_at' => $update_date]);
        
        $this->storeImage($tutorial);

        if(request()->category_id) {
            $tutorial->tutorialcategory->delete();

            $category = New TutorialCategory();
            $category->category_id = request()->category_id;
            $category->tutorial_id = $tutorial->id;
            $category->save();
        }

        if(request()->tag_id){
            foreach($tutorial->tag as $item){
                $item->delete();
            }

            foreach(request()->tag_id as $key=>$tag_id){
                $category = New TutorialTag();
                $category->tag_id = $tag_id;
                $category->tutorial_id = $tutorial->id;
                $category->save();
            }
        }


        if($tutorial)
        {
            return redirect()->back()->with('success', 'Tutorial Updated Successfully!');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }

    public function deactive(Tutorial $tutorial)
    {
        $tutorial->update(['status' => 2]);

        if($tutorial)
        {
            return redirect()->back()->with('success', 'Tutorial Deactived!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(Tutorial $tutorial)
    {
        $tutorial->update(['status' => 1]);

        if($tutorial)
        {
            return redirect()->back()->with('success', 'Tutorial Activated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function approve(Tutorial $tutorial)
    {
        $tutorial->update(['status' => 1]);

        if($tutorial)
        {
            return redirect()->back()->with('success', 'Tutorial Approved!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(Tutorial $tutorial)
    {
        $tutorial->update(['status' => 9]);

        if($tutorial)
        {
            return redirect()->back()->with('delete', 'Tutorial moved to trash!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(Tutorial $tutorial)
    {
        if($tutorial->image){
            unlink('storage/app/public/'.$tutorial->image);
        }
        $tutorial->delete();

        if($tutorial)
        {
            return redirect()->back()->with('delete', 'Tutorial Deleted Permanently!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }


    // PRIVATE FUNCTION
    private function validateData()
    {
        return request()->validate([
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'sometimes|file|image|max:250',
            'keywords' => '',
        ]);
    }

    private function storeImage($tutorial)
    {
        if(request()->has('image'))
        {
            if(request()->oldimage){
                unlink('storage/app/public/'.$tutorial->image);
            }
            $tutorial->update([
                'image' => request()->image->store('image/tutorial', 'public'),
            ]);
        }
    }


    // MODERATOR FUNCTION
    public function mindex()
    {
        $aid = Auth::id();
        $tutorials = Tutorial::where('status', 1)->where('user_id', $aid)->latest()->get();
        $count = 1;
        return view('admin.tutorial.index', compact('tutorials','count'));
    }

    public function mdeactiveList()
    {
        $aid = Auth::id();
        $tutorials = Tutorial::where('status', 2)->where('user_id', $aid)->latest()->get();
        $count = 1;
        return view('admin.tutorial.index', compact('tutorials','count'));
    }

    public function medit(Tutorial $mtutorial)
    {
        $aid = Auth::id();
        $tutorial = Tutorial::where('id', $mtutorial->id)->where('user_id', $aid)->first();
        $categories = CategoryTutorial::orderBy('name','asc')->get();
        $tags = TagTutorial::orderBy('name','asc')->get();
        return view('admin.tutorial.edit', compact('tutorial','categories','tags'));
    }

    public function mupdate(Tutorial $mtutorial)
    {
        $aid = Auth::id();
        $tutorial = Tutorial::where('id', $mtutorial->id)->where('user_id', $aid)->first();
        $this->validateData();
        $tutorial->update([
            'title' => request('title'),
            'slug' => request('slug'),
            'body' => request('body'),
            'vlink' => request('vlink'),
            'keywords' => request('keywords'),
            'preview_code' => request('preview_code'),
        ]);

        $this->storeImage($tutorial);

        if(request()->category_id) {
            $tutorial->tutorialcategory->delete();

            $category = New TutorialCategory();
            $category->category_id = request()->category_id;
            $category->tutorial_id = $tutorial->id;
            $category->save();
        }

        if(request()->tag_id){
            foreach($tutorial->tag as $item){
                $item->delete();
            }

            foreach(request()->tag_id as $key=>$tag_id){
                $category = New TutorialTag();
                $category->tag_id = $tag_id;
                $category->tutorial_id = $tutorial->id;
                $category->save();
            }
        }

        if($tutorial)
        {
            return redirect()->back()->with('success', 'Tutorial Updated Successfully!');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }

    public function mdeactive(Tutorial $mtutorial)
    {
        $aid = Auth::id();
        $tutorial = Tutorial::where('id', $mtutorial->id)->where('user_id', $aid)->first();
        $tutorial->update(['status' => 2]);

        if($tutorial)
        {
            return redirect()->back()->with('success', 'Tutorial Deactived!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function mactive(Tutorial $mtutorial)
    {
        $aid = Auth::id();
        $tutorial = Tutorial::where('id', $mtutorial->id)->where('user_id', $aid)->first();
        $tutorial->update(['status' => 1]);

        if($tutorial)
        {
            return redirect()->back()->with('success', 'Tutorial Activated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function mapprove(Tutorial $mtutorial)
    {
        $aid = Auth::id();
        $tutorial = Tutorial::where('id', $mtutorial->id)->where('user_id', $aid)->first();
        $tutorial->update(['status' => 1]);

        if($tutorial)
        {
            return redirect()->back()->with('success', 'Tutorial Approved!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function msoftDelete(Tutorial $mtutorial)
    {
        $aid = Auth::id();
        $tutorial = Tutorial::where('id', $mtutorial->id)->where('user_id', $aid)->first();
        $tutorial->update(['status' => 9]);

        if($tutorial)
        {
            return redirect()->back()->with('delete', 'Tutorial Deleted!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }
}

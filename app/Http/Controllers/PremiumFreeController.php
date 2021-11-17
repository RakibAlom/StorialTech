<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Source\PreemiumFree;
use App\Models\Category\CategoryPrefree;
use Illuminate\Support\Facades\Auth;

class PremiumFreeController extends Controller
{
    public function index()
    {
        $sources = PreemiumFree::where('status', 1)->latest()->get();
        $count = 1;

        $autodelete = PreemiumFree::all();
        // foreach($autodelete as $item)
        // {
        //     if($item->delete_time < $item->created_at->diffForHumans()->format('H')){
        //         $item->delete();
        //     }
        // }
        return view('admin.source.index', compact('sources','count'));
    }

    public function show($slug)
    {
        $source = PreemiumFree::where('slug', $slug)->first();
        return view('admin.source.show', compact('source'));
    }

    public function deactiveList()
    {
        $sources = PreemiumFree::where('status', 2)->latest()->get();
        $count = 1;
        return view('admin.source.index', compact('sources','count'));
    }

    public function trash()
    {
        $sources = PreemiumFree::where('status', 9)->latest()->get();
        $count = 1;
        return view('admin.source.trash', compact('sources','count'));
    }

    public function create()
    {
        $categories = CategoryPrefree::where('status', 1)->get();
        return view('admin.source.create', compact('categories'));
    }

    public function edit(PreemiumFree $source)
    {
        $categories = CategoryPrefree::all();
        return view('admin.source.edit', compact('source','categories'));
    }

    public function store()
    {
        $this->validateData();
        
        $check = PreemiumFree::where('slug', request()->slug)->first();

        if(!$check)
        {
            $source = PreemiumFree::create([
                'user_id' => Auth::id(),
                'title' => request('title'),
                'slug' => request('slug'),
                'category_id' => request('category_id'),
                'type' => request('type'),
                'delete_time' => request('delete_time'),
                'body' => request('body'),
            ]);
        }else{
            $source = PreemiumFree::create([
            'user_id' => Auth::id(),
                'title' => request('title'),
                'slug' => request('slug') . '-' . uniqid(),
                'category_id' => request('category_id'),
                'type' => request('type'),
                'delete_time' => request('delete_time'),
                'body' => request('body'),
            ]);
        }

        if($source)
        {
            return redirect()->back()->with('success', 'Source Publish Successfully!');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }

    public function update(PreemiumFree $source)
    {
        $this->validateUpdateData();

        $source->update([
            'user_id' => Auth::id(),
            'title' => request('title'),
            'slug' => request('slug'),
            'category_id' => request('category_id'),
            'type' => request('type'),
            'delete_time' => request('delete_time'),
            'body' => request('body'),
        ]);

        if($source)
        {
            return redirect()->back()->with('success', 'Source Updated Successfully!');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }

    public function deactive(PreemiumFree $source)
    {
        $source->update(['status' => 2]);

        if($source)
        {
            return redirect()->back()->with('success', 'Source Deactived!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(PreemiumFree $source)
    {
        $source->update(['status' => 1]);

        if($source)
        {
            return redirect()->back()->with('success', 'Source Activated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(PreemiumFree $source)
    {
        $source->update(['status' => 9]);

        if($source)
        {
            return redirect()->back()->with('delete', 'Source moved to trash!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(PreemiumFree $source)
    {
        $source->delete();

        if($source)
        {
            return redirect()->back()->with('delete', 'Source Deleted Permanently!');
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
            'category_id' => 'required',
            'body' => 'required',
        ]);
    }

    private function validateUpdateData()
    {
        return request()->validate([
            'title' => 'required',
            'slug' => 'required',
            'category_id' => 'required',
            'body' => 'required',
        ]);
    }


    // MODERATOR FUNCTION
    public function mindex()
    {
        $aid = Auth::id();
        $sources = PreemiumFree::where('status', 1)->where('user_id', $aid)->latest()->get();
        $count = 1;
        $autodelete = PreemiumFree::all();
        return view('admin.source.index', compact('sources','count'));
    }

    public function mdeactiveList()
    {
        $aid = Auth::id();
        $sources = PreemiumFree::where('status', 2)->where('user_id', $aid)->latest()->get();
        $count = 1;
        return view('admin.source.index', compact('sources','count'));
    }

    public function medit(PreemiumFree $msource)
    {
        $aid = Auth::id();
        $source = PreemiumFree::where('id', $msource->id)->where('user_id', $aid)->first();
        $categories = CategoryPrefree::all();
        return view('admin.source.edit', compact('source','categories'));
    }

    public function mupdate(PreemiumFree $msource)
    {
        $aid = Auth::id();
        $source = PreemiumFree::where('id', $msource->id)->where('user_id', $aid)->first();
        $this->validateUpdateData();

        $source->update([
            'user_id' => Auth::id(),
            'title' => request('title'),
            'slug' => request('slug'),
            'category_id' => request('category_id'),
            'type' => request('type'),
            'delete_time' => request('delete_time'),
            'body' => request('body'),
        ]);

        if($source)
        {
            return redirect()->back()->with('success', 'Source Updated Successfully!');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }

    public function mdeactive(PreemiumFree $msource)
    {
        $aid = Auth::id();
        $source = PreemiumFree::where('id', $msource->id)->where('user_id', $aid)->first();

        $source->update(['status' => 2]);

        if($source)
        {
            return redirect()->back()->with('success', 'Source Deactived!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function mactive(PreemiumFree $msource)
    {
        $aid = Auth::id();
        $source = PreemiumFree::where('id', $msource->id)->where('user_id', $aid)->first();

        $source->update(['status' => 1]);

        if($source)
        {
            return redirect()->back()->with('success', 'Source Activated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function msoftDelete(PreemiumFree $msource)
    {
        $aid = Auth::id();
        $source = PreemiumFree::where('id', $msource->id)->where('user_id', $aid)->first();
        
        $source->update(['status' => 9]);

        if($source)
        {
            return redirect()->back()->with('delete', 'Source Deleted!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    // SOURCE PUBLICE FUNCTION
   public function source()
   {
        $sources = PreemiumFree::where('status', 1)->latest()->paginate(15);
        return view('source.index', compact('sources'));
   }
   
   public function loadmore(Request $request)
   {
        if($request->ajax()){
            if($request->id){
                $sources = PreemiumFree::where('status', 1)->latest()->where('id', '<', $request->id)->take(15)->get();
            }else{
                $sources = PreemiumFree::where('status', 1)->latest()->skip(6)->take(9)->get();
            }
        }
       return view('source.get_data', compact('sources'));
   }
   
   public function categorysource($slug)
   {
       $category = CategoryPrefree::where('slug', $slug)->first();
       $category->update([
            'views' => $category->views + 1,
        ]);
       $sources = PreemiumFree::where('category_id', $category->id)->where('status', 1)->latest()->paginate(15);
       return view('source.categoryshow', compact('sources','category'));
   }
   public function sourceshow($slug)
   {
       $source = PreemiumFree::where('slug', $slug)->first();
       $source->update([
           'views' => $source->views + 1,
       ]);
       return view('source.show', compact('source'));
   }

}

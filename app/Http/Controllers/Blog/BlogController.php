<?php

namespace App\Http\Controllers\Blog;

use App\Models\Category\CategoryBlog;
use App\Models\Blog\Blog;
use App\Models\Blog\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 1)->latest()->get();
        $count = 1;
        return view('admin.blog.index', compact('blogs','count'));
    }

    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return view('admin.blog.show', compact('blog'));
    }

    public function pending()
    {
        $blogs = Blog::where('status', 0)->latest()->get();
        $count = 1;
        return view('admin.blog.index', compact('blogs','count'));
    }

    public function deactiveList()
    {
        $blogs = Blog::where('status', 2)->latest()->get();
        $count = 1;
        return view('admin.blog.index', compact('blogs','count'));
    }

    public function trash()
    {
        $blogs = Blog::where('status', 9)->latest()->get();
        $count = 1;
        return view('admin.blog.trash', compact('blogs','count'));
    }

    public function create()
    {
        $categories = CategoryBlog::where('status', 1)->orderBy('name','asc')->get();
        return view('admin.blog.create', compact('categories'));
    }

    public function edit(Blog $blog)
    {
        $categories = CategoryBlog::orderBy('name','asc')->get();
        return view('admin.blog.edit', compact('blog','categories'));
    }

    public function store()
    {
        $this->validateData();

        $check = Blog::where('slug', request()->slug)->first();

        if(!$check){
            $blog = Blog::create([
                'user_id' => Auth::id(),
                'title' => request('title'),
                'slug' => request('slug'),
                'body' => request('body'),
                'date' => date('d'),
                'month' => date('F'),
                'year' => date('Y'),
                'keywords' => request('keywords'),
                'status' => 1,
            ]);
        }else{
            $blog = Blog::create([
                'user_id' => Auth::id(),
                'title' => request('title'),
                'slug' => request('slug') . '-' . uniqid(),
                'body' => request('body'),
                'date' => date('d'),
                'month' => date('F'),
                'year' => date('Y'),
                'keywords' => request('keywords'),
                'status' => 1,
            ]);
        }

        $this->storeImage($blog);
        if(request()->category_id){
            foreach(request()->category_id as $key=>$category_id){
                $category = New BlogCategory();
                $category->category_id = $category_id;
                $category->blog_id = $blog->id;
                $category->save();
            }
        }


        if($blog)
        {
            return back()->with('success', 'Blog Publish Successfully!');
        }else{
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    public function update(Blog $blog)
    {
        $this->validateData();

        $blog->update([
            'title' => request('title'),
            'slug' => request('slug'),
            'body' => request('body'),
            'keywords' => request('keywords'),
        ]);

        $this->storeImage($blog);

        if(request()->category_id){
            foreach($blog->category as $item){
                $item->delete();
            }

            foreach(request()->category_id as $key=>$category_id){
                $category = New BlogCategory();
                $category->category_id = $category_id;
                $category->blog_id = $blog->id;
                $category->save();
            }
        }


        if($blog)
        {
            return back()->with('success', 'Blog Updated Successfully!');
        }else{
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    public function deactive(Blog $blog)
    {
        $blog->update(['status' => 2]);

        if($blog)
        {
            return back()->with('success', 'Blog Deactived!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(Blog $blog)
    {
        $blog->update(['status' => 1]);

        if($blog)
        {
            return back()->with('success', 'Blog Activated!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function approve(Blog $blog)
    {
        $blog->update(['status' => 1]);

        if($blog)
        {
            return back()->with('success', 'Blog Approved!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(Blog $blog)
    {
        $blog->update(['status' => 9]);

        if($blog)
        {
            return back()->with('delete', 'Blog moved to trash!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(Blog $blog)
    {
        if($blog->image){
            unlink('storage/app/public/'.$blog->image);
        }
        $blog->delete();

        if($blog)
        {
            return back()->with('delete', 'Blog Deleted Permanently!');
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
            'body' => 'required',
            'image' => 'sometimes|file|image|max:120',
            'keywords' => '',
        ]);
    }

    private function storeImage($blog)
    {
        if(request()->has('image'))
        {
            if(request()->oldimage){
                unlink('storage/app/public/'.$blog->image);
            }
            $blog->update([
                'image' => request()->image->store('image/blog', 'public'),
            ]);
        }
    }


    // MODERAOTR FUNCTION
    public function mindex()
    {
        $aid = Auth::id();
        $blogs = Blog::where('status', 1)->where('user_id', $aid)->latest()->get();
        $count = 1;
        return view('admin.blog.index', compact('blogs','count'));
    }

    public function mdeactiveList()
    {
        $aid = Auth::id();
        $blogs = Blog::where('status', 2)->where('user_id', $aid)->latest()->get();
        $count = 1;
        return view('admin.blog.index', compact('blogs','count'));
    }

    public function medit(Blog $mblog)
    {
        $aid = Auth::id();
        $blog = Blog::where('id', $mblog->id)->where('user_id', $aid)->first();
        $categories = CategoryBlog::orderBy('name','asc')->get();
        return view('admin.blog.edit', compact('blog','categories'));
    }


    public function mupdate(Blog $mblog)
    {
        $aid = Auth::id();
        $blog = Blog::where('id', $mblog->id)->where('user_id', $aid)->first();

        $this->validateData();

        $blog->update([
            'title' => request('title'),
            'slug' => request('slug'),
            'body' => request('body'),
            'keywords' => request('keywords'),
        ]);

        $this->storeImage($blog);

        if(request()->category_id){
            foreach($blog->category as $item){
                $item->delete();
            }

            foreach(request()->category_id as $key=>$category_id){
                $category = New BlogCategory();
                $category->category_id = $category_id;
                $category->blog_id = $blog->id;
                $category->save();
            }
        }


        if($blog)
        {
            return back()->with('success', 'Blog Updated Successfully!');
        }else{
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    public function mdeactive(Blog $mblog)
    {
        $aid = Auth::id();
        $blog = Blog::where('id', $mblog->id)->where('user_id', $aid)->first();

        $blog->update(['status' => 2]);

        if($blog)
        {
            return back()->with('success', 'Blog Deactived!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function mactive(Blog $mblog)
    {
        $aid = Auth::id();
        $blog = Blog::where('id', $mblog->id)->where('user_id', $aid)->first();

        $blog->update(['status' => 1]);

        if($blog)
        {
            return back()->with('success', 'Blog Activated!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function mapprove(Blog $mblog)
    {
        $aid = Auth::id();
        $blog = Blog::where('id', $mblog->id)->where('user_id', $aid)->first();

        $blog->update(['status' => 1]);

        if($blog)
        {
            return back()->with('success', 'Blog Approved!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function msoftDelete(Blog $mblog)
    {
        $aid = Auth::id();
        $blog = Blog::where('id', $mblog->id)->where('user_id', $aid)->first();
        
        $blog->update(['status' => 9]);

        if($blog)
        {
            return back()->with('delete', 'Blog Deleted!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }
}

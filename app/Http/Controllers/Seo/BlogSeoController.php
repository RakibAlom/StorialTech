<?php

namespace App\Http\Controllers\Seo;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\Seo\SeoBlog;
use Illuminate\Http\Request;

class BlogSeoController extends Controller
{
    public function index()
    {
        $seo = SeoBlog::first();
        return view ('admin.seo.blogseo', compact('seo'));
    }

    public function store()
    {
        $seo = SeoBlog::create($this->validateData());
        $this->storeCoverImage($seo);

        if($seo)
        {
            return back()->with('success', 'BLOG SEO INFO CREATED!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function update()
    {
        $seo = SeoBlog::first();
        $seo->update($this->validateData());
        $this->storeCoverImage($seo);

        if($seo)
        {
            return back()->with('success', 'BLOG SEO INFO UPDATED');
        }else{
            return back()->with('error', 'Error, Soemting Went Wrong!');
        }
    }

    private function validateData() 
    {
        return request()->validate([
            'title' => 'required',
            'description' => 'required',
            'keywords' => 'required',
            'cover_image' => 'sometimes|file|image|max:120',
            'sp_title_plus' => '',
        ]);
    }

    private function storeCoverImage($seo) 
    {
        if(request()->has('cover_image')) {
            if(request()->oldcover){
                unlink('storage/app/public/'.request()->oldcover);
            }
            $seo->update([
                'cover_image' => request()->cover_image->store('image/seo','public'),
            ]);
        }
    }

}

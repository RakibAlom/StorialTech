<?php

namespace App\Http\Controllers\Seo;

use App\Http\Controllers\Controller;
use App\Models\Seo\SeoPdf;
use Illuminate\Http\Request;

class PdfSeoController extends Controller
{
    public function index()
    {
        $seo = SeoPdf::first();
        return view ('admin.seo.pdfseo', compact('seo'));
    }

    public function store()
    {
        $seo = SeoPdf::create($this->validateData());
        $this->storeCoverImage($seo);

        if($seo)
        {
            return redirect()->back()->with('success', 'PDF SEO INFO CREATED!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function update()
    {
        $seo = SeoPdf::first();
        $seo->update($this->validateData());
        $this->storeCoverImage($seo);

        if($seo)
        {
            return redirect()->back()->with('success', 'PDF SEO INFO UPDATED');
        }else{
            return redirect()->back()->with('error', 'Error, Soemting Went Wrong!');
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

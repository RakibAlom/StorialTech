<?php

namespace App\Http\Controllers\Seo;

use App\Http\Controllers\Controller;
use App\Models\Seo\SeoTutorial;
use Illuminate\Http\Request;

class TutorialSeoController extends Controller
{
    public function index()
    {
        $seo = SeoTutorial::first();
        return view ('admin.seo.tutorialseo', compact('seo'));
    }

    public function store()
    {
        $seo = SeoTutorial::create($this->validateData());
        $this->storeCoverImage($seo);

        if($seo)
        {
            return redirect()->back()->with('success', 'TUTORIAL SEO INFO CREATED!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function update()
    {
        $seo = SeoTutorial::first();
        $seo->update($this->validateData());
        $this->storeCoverImage($seo);

        if($seo)
        {
            return redirect()->back()->with('success', 'TUTORIAL SEO INFO UPDATED');
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

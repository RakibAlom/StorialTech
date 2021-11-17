<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\About;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.setup.about', compact('about'));
    }

    public function store()
    {
        $data = $this->validateData();
        $about = About::create($data);
        $this->storeImage($about);

        if($about)
        {
            return redirect()->back()->with('success', 'About Publish!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function update()
    {

        $data = $this->validateData();
        $about = About::first();
        $about->update($data);
        $this->storeImage($about);

        if($about)
        {
            return redirect()->back()->with('success', 'About Information Updated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    private function validateData()
    {
        return request()->validate([
            'about' => 'required',
            'image' => 'sometimes|file|image|max:100',
        ]);
    }

    private function storeImage($about)
    {
        if(request()->has('image'))
        {
            if(request()->oldimage){
                unlink('storage/app/public/'. request()->oldimage);
            }
            $about->update([
                'image' => request()->image->store('image/about', 'public'),
            ]);
        }
    }
}

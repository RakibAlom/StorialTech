<?php

namespace App\Http\Controllers\Tool\Backlink;

use App\Http\Controllers\Controller;
use App\Models\Tools\BacklinkPageDetails;
use Illuminate\Http\Request;

class BacklinkPageDetailsController extends Controller
{
    public function index()
    {
        $backlinks = BacklinkPageDetails::first();
        return view ('admin.tools.backlinks.backlinkspagedetails', compact('backlinks'));
    }

    public function store()
    {
        $backlinks = BacklinkPageDetails::create($this->validateData());
        $this->storeCoverImage($backlinks);

        if($backlinks)
        {
            return back()->with('success', 'BACKLINKS PAGE INFO CREATED!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function update()
    {
        $backlinks = BacklinkPageDetails::first();
        $backlinks->update($this->validateData());
        $this->storeCoverImage($backlinks);

        if($backlinks)
        {
            return back()->with('success', 'BACKLINKS PAGE INFO UPDATED');
        }else{
            return back()->with('error', 'Error, Soemting Went Wrong!');
        }
    }

    private function validateData() 
    {
        return request()->validate([
            'title' => 'required',
            'meta_title' => 'required',
            'slogan' => '', 
            'description' => 'required',
            'keywords' => 'required',
            'cover_image' => 'sometimes|file|image|max:200',
        ]);
    }

    private function storeCoverImage($backlinks) 
    {
        if(request()->has('cover_image')) {
            if(request()->oldcover){
                unlink('storage/app/public/'.request()->oldcover);
            }
            $backlinks->update([
                'cover_image' => request()->cover_image->store('image/backlinks','public'),
            ]);
        }
    }
}

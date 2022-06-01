<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Custom\PlatformControl;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function index()
    {
        $platform = PlatformControl::first();
        return view ('admin.custom.platformcontrol', compact('platform'));
    }

    public function store()
    {
        $platform = PlatformControl::create($this->validateData());

        if($platform)
        {
            return back()->with('success', 'PLATFORM CONTROL CREATED!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function update()
    {
        $platform = PlatformControl::first();
        $platform->update($this->validateData());

        if($platform)
        {
            return back()->with('success', 'PLATFORM CONTROL UPDATED');
        }else{
            return back()->with('error', 'Error, Soemting Went Wrong!');
        }
    }

    private function validateData() 
    {
        return request()->validate([
            'story_status' => '',
            'tutorial_status' => '',
            'pdf_status' => '',
            'template_status' => '',
            'movie_status' => '',
            'blog_status' => '',
            'source_status' => '',
            'youtube_status' => '',
            'backlinks_status' => '',
            'tools_status' => '',
            'web_stories_status' => '',
        ]);
    }
}

<?php

namespace App\Http\Controllers\Ads;

use App\Http\Controllers\Controller;
use App\Models\Ads\AdsCode;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function index()
    {
        $ads = AdsCode::first();
        return view ('admin.ads.adscode', compact('ads'));
    }

    public function store()
    {
        $ads = AdsCode::create($this->validateData());

        if($ads)
        {
            return redirect()->back()->with('success', 'You Publish Ads Program!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function update()
    {
        $seo = AdsCode::first();
        $seo->update($this->validateData());

        if($seo)
        {
            return redirect()->back()->with('success', 'Your Ads Program Updated!');
        }else{
            return redirect()->back()->with('error', 'Error, Soemting Went Wrong!');
        }
    }

    private function validateData() 
    {
        return request()->validate([
            'section_top_banner_ads' => '',
            'section_bottom_banner_ads' => '',
            'single_post_top_ads' => '',
            'single_post_bottom_ads' => '',
            'sidebar_top_ads' => '',
            'sidebar_bottom_ads' => '',
        ]);
    }
}

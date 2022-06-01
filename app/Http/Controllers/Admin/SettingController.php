<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('admin.setup.setting', compact('setting'));
    }

    public function store()
    {
        $setting = Setting::create($this->validateData());
        $this->storeFile($setting);

        if($setting)
        {
            return redirect()->back()->with('success', 'Setting Information Publish!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function update()
    {

        $setting = Setting::first();
        $setting->update($this->validateData());
        $this->storeFile($setting);

        if($setting)
        {
            return redirect()->back()->with('success', 'Setting Information Updated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    private function validateData()
    {
        return request()->validate([
            'title' => '',
            'email' => '',
            'phone_1' => '',
            'phone_2' => '',
            'address' => '',
            'fb_link' => '',
            'twitter_link' => '',
            'instagram_link' => '',
            'youtube_link' => '',
            'github_link' => '',
            'pinterest_link' => '',
            'telegram_link' => '',
            'whatsapp_link' => '',
            'discord_link' => '',
            'description' => '',
            'keywords' => '',
            'short_about' => '',
            'copyright' => '',
            'favicon' => 'sometimes|file|image|max:20',
            'logo' => 'sometimes|file|image|max:50',
            'cover_image' => 'sometimes|file|image|max:120',
            'donate_image' => 'sometimes|file|image|max:120',
        ]);
    }

    private function storeFile($setting)
    {
        if(request()->has('favicon')){
            if(request()->oldfavicon){
                unlink('storage/app/public/'.request()->oldfavicon);
            }
            $setting->update([
                'favicon' => request()->favicon->store('image/setting', 'public'),
            ]);
        }

        if(request()->has('logo')){
            if(request()->oldlogo){
                unlink('storage/app/public/'.request()->oldlogo);
            }
            $setting->update([
                'logo' => request()->logo->store('image/setting', 'public'),
            ]);
        }

        if(request()->has('cover_image')){
            if(request()->oldcover){
                unlink('storage/app/public/'.request()->oldcover);
            }
            $setting->update([
                'cover_image' => request()->cover_image->store('image/setting', 'public'),
            ]);
        }

        if(request()->has('donate_image')){
            if(request()->olddonateimage){
                unlink('storage/app/public/'.request()->oldcover);
            }
            $setting->update([
                'donate_image' => request()->donate_image->store('image/setting', 'public'),
            ]);
        }
    }

}

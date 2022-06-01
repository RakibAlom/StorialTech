<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Custom\CustomCode;
use Illuminate\Http\Request;

class CustomCodeController extends Controller
{
    public function index()
    {
        $custom = CustomCode::first();
        return view ('admin.custom.code', compact('custom'));
    }

    public function store()
    {
        $custom = CustomCode::create($this->validateData());

        if($custom)
        {
            return redirect()->back()->with('success', 'CUSTOM CODE CREATED!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function update()
    {
        $custom = CustomCode::first();
        $custom->update($this->validateData());

        if($custom)
        {
            return redirect()->back()->with('success', 'CUSTOM CODE UPDATED');
        }else{
            return redirect()->back()->with('error', 'Error, Soemting Went Wrong!');
        }
    }

    private function validateData() 
    {
        return request()->validate([
            'header_custom_code' => '',
            'header_custom_css' => '',
            'footer_custom_code' => '',
            'footer_custom_js' => '',
        ]);
    }
}

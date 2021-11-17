<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Privacy;
use Illuminate\Http\Request;

class PrivacyCotroller extends Controller
{
    public function index()
    {
        $privacy = Privacy::first();
        return view('admin.setup.privacy', compact('privacy'));
    }

    public function store()
    {
        $data = $this->validateData();
        $privacy = Privacy::create($data);

        if($privacy)
        {
            return redirect()->back()->with('success', 'Privacy Policy Publish.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function update()
    {

        $data = $this->validateData();
        $privacy = Privacy::first();
        $privacy->update($data);

        if($privacy)
        {
            return redirect()->back()->with('success', 'Privacy Policy Updated.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    private function validateData()
    {
        return request()->validate([
            'privacy' => 'required'
        ]);
    }
}

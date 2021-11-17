<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Help;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    public function index()
    {
        $helps = Help::first();
        return view('admin.setup.helps', compact('helps'));
    }

    public function store()
    {
        $data = $this->validateData();
        $help = Help::create($data);

        if($help)
        {
            return redirect()->back()->with('success', 'Helps Information Publish!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function update()
    {

        $data = $this->validateData();
        $help = Help::first();
        $help->update($data);

        if($help)
        {
            return redirect()->back()->with('success', 'Helps Information Updated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    private function validateData()
    {
        return request()->validate([
            'helps' => 'required'
        ]);
    }
}

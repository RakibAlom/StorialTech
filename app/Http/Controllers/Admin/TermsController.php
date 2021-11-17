<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Term;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index()
    {
        $terms = Term::first();
        return view('admin.setup.terms', compact('terms'));
    }

    public function store()
    {
        $data = $this->validateData();
        $terms = Term::create($data);

        if($terms)
        {
            return redirect()->back()->with('success', 'Terms & Condition Publish!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function update()
    {

        $data = $this->validateData();
        $terms = Term::first();
        $terms->update($data);

        if($terms)
        {
            return redirect()->back()->with('success', 'Terms & Condition Information Updated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    private function validateData()
    {
        return request()->validate([
            'terms' => 'required'
        ]);
    }
}

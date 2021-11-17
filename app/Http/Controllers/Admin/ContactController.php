<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Contact;
use App\Models\Admin\Setting;

use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::where('status', 1)->latest()->get();
        return view('admin.setup.contact', compact('contact'));
    }

    public function store()
    {
        $setting = Setting::first();
        $data = $this->validateData();
        $contact = Contact::create($data);
        Mail::to($setting->email)->send(new \App\Mail\ContactMail($contact));

        return back()->with('success', 'Thanks for contact with us, We will get back to you soon!');
    }

    public function delete(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Delete Contact this message!');

    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);
    }
}

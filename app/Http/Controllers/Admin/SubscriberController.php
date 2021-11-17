<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        return view('admin.subscriber.index');
    }

    public function store()
    {
        $data = request()->validate([
            'email' => 'required',
        ]);

        $check = Subscriber::where('email', request()->email)->first();

        if(!$check){
            $subscriber = Subscriber::create($data);
            if($subscriber){
                $notification = array(
                    'messege' => 'Thank You For Subscribe!',
                    'alert-type' => 'success'
                );
                return back()->with($notification);
            }
        }else{
            $notification = array(
                'messege' => 'Already Subscribed!',
                'alert-type' => 'info'
            );
            return back()->with($notification);
        }
    }


    public function deactive(Subscriber $subscriber)
    {
        $subscriber->update(['status' => 0]);

        if($subscriber)
        {
            return redirect()->back()->with('success', 'Subscriber Deactived.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(Subscriber $subscriber)
    {
        $subscriber->update(['status' => 1]);

        if($subscriber)
        {
            return redirect()->back()->with('success', 'Subscriber Activated.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(Subscriber $subscriber)
    {
        $subscriber->update(['status' => 9]);

        if($subscriber)
        {
            return redirect()->back()->with('delete', 'Subscriber moved to trash.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(Subscriber $subscriber)
    {
        $subscriber->delete();

        if($subscriber)
        {
            return redirect()->back()->with('delete', 'Subscriber Has Been Deleted Permanently.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }
}

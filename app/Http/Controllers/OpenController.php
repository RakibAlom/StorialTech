<?php

namespace App\Http\Controllers;

use App\Models\Admin\About;
use App\Models\Admin\Term;
use App\Models\Admin\faq;
use App\Models\Admin\Privacy;
use App\Models\Admin\Help;
use App\Models\Admin\Subscriber;
use App\Models\Admin\Setting;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

class OpenController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        $about = About::first();
        if($about){
            $about->update([
                'views' => $about->views + 1,
            ]);
        }
        return view('about', compact('about'));
    }

    public function terms()
    {
        $terms = Term::first();
        if($terms){
            $terms->update([
                'views' => $terms->views + 1,
            ]);
        }
        return view('terms', compact('terms'));
    }

    public function privacy()
    {
        $privacy = Privacy::first();
        if($privacy){
            $privacy->update([
                'views' => $privacy->views + 1,
            ]);
        }
        return view('privacy', compact('privacy'));
    }

    public function help()
    {
        $help = Help::first();
        if($help){
            $help->update([
                'views' => $help->views + 1,
            ]);
        }
        return view('help', compact('help'));
    }

    public function notfound()
    {
        return view('404');
    }

    public function contact()
    {
        return view('contact');
    }

    public function faq()
    {
        $faqs = faq::where('status', 1)->get();
        return view('faq', compact('faqs'));
    }


}

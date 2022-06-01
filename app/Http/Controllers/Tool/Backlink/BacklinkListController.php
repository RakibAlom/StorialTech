<?php

namespace App\Http\Controllers\Tool\Backlink;

use App\Http\Controllers\Controller;
use App\Models\Tools\BacklinkList;
use App\Models\Tools\BacklinkPageDetails;
use Illuminate\Http\Request;

class BacklinkListController extends Controller
{
    public function publicIndex() 
    {
        $backlinks = BacklinkList::where('status', 1)->orderBy('authority_site','asc')->get();
        $count = 1;
        $pageviews = BacklinkPageDetails::first();
        $pageviews->update(['views' => $pageviews->views + 1]);
        return view ('tools.backlinks.backlinkslist', compact('backlinks','count'));
    }

    public function index() 
    {
        $backlinks = BacklinkList::where('status', 1)->latest()->get();
        $count = 1;
        return view ('admin.tools.backlinks.backlinks', compact('backlinks','count'));
    }

    public function create()
    {
        return view ('admin.tools.backlinks.create');
    }

    public function store()
    {
        $this->validateData();

        foreach(request()->authority_site as $key=>$site){
            $backlinks = New BacklinkList();
            $backlinks->authority_site = $site;
            $backlinks->tld = request()->tld[$key];
            $backlinks->website_link = request()->website_link[$key];
            $backlinks->dr = request()->dr[$key];
            $backlinks->link_type = request()->link_type[$key];
            $backlinks->save();
        }

        if($backlinks)
        {
            return back()->with('success', 'Backlinks Publish Successfully!');
        }else{
            return back()->with('error', 'Something Went Wrong!');
        }
    }

    public function edit(BacklinkList $backlinks)
    {
        return view('admin.tools.backlinks.edit', compact('backlinks'));
    }

    public function update(BacklinkList $backlinks)
    {
        $this->validateData();
        
        $backlinks->update([
            'authority_site' => request('authority_site'),
            'tld' => request('tld'),
            'link_type' => request('link_type'),
            'dr' => request('dr'),
            'website_link' => request('website_link'),
        ]);

        if($backlinks)
        {
            return back()->with('success', 'Backlinks Updated!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function trash() 
    {
        $backlinks = BacklinkList::where('status', 9)->latest()->get();
        $count = 1;
        return view ('admin.tools.backlinks.trash', compact('backlinks','count'));
    }

    public function active(BacklinkList $backlinks)
    {
        $backlinks->update(['status' => 1]);

        if($backlinks)
        {
            return back()->with('success', 'Backlinks Activated!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(BacklinkList $backlinks)
    {
        $backlinks->update(['status' => 9]);

        if($backlinks)
        {
            return back()->with('delete', 'Backlinks moved to trash!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(BacklinkList $backlinks)
    {
        $backlinks->delete();

        if($backlinks)
        {
            return back()->with('delete', 'Backlinks Has Been Deleted Permanently!');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    private function validateData()
    {
        return request()->validate([
            'authority_site' => 'required',
            'tld' => 'required',
            'link_type' => 'required',
            'dr' => 'required',
            'website_link' => 'required',
        ]);
    }
    
}

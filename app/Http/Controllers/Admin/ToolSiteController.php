<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tools\ToolSiteLink;
use Illuminate\Http\Request;

class ToolSiteController extends Controller
{
    public function index()
    {
        $toolsite = ToolSiteLink::where('status', 1)->orderBy('tool_name', 'asc')->get();
        $count = 1;
        return view('admin.custom.moretools', compact('toolsite','count'));
    }


    public function store()
    {
        request()->validate([
            'tool_name' => 'required',
            'tool_title' => '',
            'website_links' => 'required',
            'tool_details' => '',
            'tool_icon' => '',
        ]);
        $toolsite = ToolSiteLink::create([
            'tool_name' => request('tool_name'),
            'tool_title' => request('tool_title'),
            'website_links' => request('website_links'),
            'tool_details' => request('tool_details'),
            'tool_icon' => request('tool_icon'),
            'serial' => ToolSiteLink::max('serial') + 1,
        ]);

        if($toolsite)
        {
            return back()->with('success', 'New Tool Site Publish.');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function delete(ToolSiteLink $tool)
    {
        $tool->delete();

        if($tool)
        {
            return back()->with('delete', 'Tool Site Has Been Deleted Permanently.');
        }else{
            return back()->with('error', 'Error, Something Went Wrong!');
        }
    }
}

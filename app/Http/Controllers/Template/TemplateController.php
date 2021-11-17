<?php

namespace App\Http\Controllers\Template;

use App\Http\Controllers\Controller;
use App\Models\Category\CategoryTemplate;
use App\Models\Tag\TagTemplate;
use App\Models\Template\Template;
use App\Models\Template\Templatecategory;
use App\Models\Template\Templatedownload;
use App\Models\Template\Templatetag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    public function index()
    {
        $templates = Template::where('status', 1)->latest()->get();
        $count = 1;
        return view('admin.template.index', compact('templates','count'));
    }

    public function show($slug)
    {
        $template = Template::where('slug', $slug)->first();
        return view('admin.template.show', compact('template'));
    }

    public function pending()
    {
        $templates = Template::where('status', 0)->latest()->get();
        $count = 1;
        return view('admin.template.index', compact('templates','count'));
    }

    public function deactiveList()
    {
        $templates = Template::where('status', 2)->latest()->get();
        $count = 1;
        return view('admin.template.index', compact('templates','count'));
    }

    public function trash()
    {
        $templates = Template::where('status', 9)->latest()->get();
        $count = 1;
        return view('admin.template.trash', compact('templates','count'));
    }

    public function create()
    {
        $categories = CategoryTemplate::where('status', 1)->orderBy('name','asc')->get();
        $tags = TagTemplate::where('status', 1)->orderBy('name','asc')->get();
        return view('admin.template.create', compact('categories','tags'));
    }

    public function edit(Template $template)
    {
        $categories = CategoryTemplate::orderBy('name','asc')->get();
        $tags = TagTemplate::orderBy('name','asc')->get();
        return view('admin.template.edit', compact('template','categories','tags'));
    }

    public function store()
    {
        $this->validateData();
        $check = Template::where('slug', request()->slug)->first();

        if(!$check){
            $template = Template::create([
                'user_id' => Auth::id(),
                'title' => request('title'),
                'slug' => request('slug'),
                'body' => request('body'),
                'date' => date('d'),
                'month' => date('F'),
                'year' => date('Y'),
                'keywords' => request('keywords'),
                'status' => 1,
            ]);
        }else{
            $template = Template::create([
                'user_id' => Auth::id(),
                'title' => request('title'),
                'slug' => request('slug') . '-' . strtoupper(uniqid()),
                'body' => request('body'),
                'date' => date('d'),
                'month' => date('F'),
                'year' => date('Y'),
                'keywords' => request('keywords'),
                'status' => 1,
            ]);
        }
        
        $this->storeImage($template);
        $this->storeFile($template);

        $category = New Templatecategory();
        $category->category_id = request()->category_id;
        $category->template_id = $template->id;
        $category->save();

        if(request()->tag_id){
            foreach(request()->tag_id as $key=>$tag_id){
                $category = New Templatetag();
                $category->tag_id = $tag_id;
                $category->template_id = $template->id;
                $category->save();
            }
        }

        if(request()->download_link){
            foreach(request()->download_link as $key=>$link){
                $download = New Templatedownload();
                $download->link = $link;
                $download->template_id = $template->id;
                $download->save();
            }
        }


        if($template)
        {
            return redirect()->back()->with('success', 'Template Publish Successfully!');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }

    public function update(Template $template)
    {
        $this->validateData();

        $template->update([
            'title' => request('title'),
            'slug' => request('slug'),
            'body' => request('body'),
            'keywords' => request('keywords'),
        ]);

        $update_date = $template->updated_at;
        $template->update(['created_at' => $update_date]);
        
        $this->storeImage($template);
        $this->storeFile($template);

        if(request()->category_id) {
            $template->Templatecategory->delete();

            $category = New Templatecategory();
            $category->category_id = request()->category_id;
            $category->template_id = $template->id;
            $category->save();
        }

        if(request()->tag_id){
            foreach($template->tag as $item){
                $item->delete();
            }

            foreach(request()->tag_id as $key=>$tag_id){
                $category = New Templatetag();
                $category->tag_id = $tag_id;
                $category->template_id = $template->id;
                $category->save();
            }
        }

        if(request()->download_link){
            foreach($template->download as $item)
            {
                $item->delete();
            }
            foreach(request()->download_link as $key=>$link){
                $download = New Templatedownload();
                $download->link = $link;
                $download->template_id = $template->id;
                $download->save();
            }
        }


        if($template)
        {
            return redirect()->back()->with('success', 'Template Updated Successfully!');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }

    public function deactive(Template $template)
    {
        $template->update(['status' => 2]);

        if($template)
        {
            return redirect()->back()->with('success', 'Template Deactived!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(Template $template)
    {
        $template->update(['status' => 1]);

        if($template)
        {
            return redirect()->back()->with('success', 'Template Activated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function approve(Template $template)
    {
        $template->update(['status' => 1]);

        if($template)
        {
            return redirect()->back()->with('success', 'Template Approved!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(Template $template)
    {
        $template->update(['status' => 9]);

        if($template)
        {
            return redirect()->back()->with('delete', 'Template moved to trash!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(Template $template)
    {
        if($template->image){
            unlink('storage/app/public/'.$template->image);
        }
        if($template->file){
            unlink('storage/app/public/'.$template->file);
        }
        $template->delete();

        if($template)
        {
            return redirect()->back()->with('delete', 'Template Deleted Permanently!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }


    // PRIVATE FUNCTION
    private function validateData()
    {
        return request()->validate([
            'title' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'sometimes|file|image|max:120',
            'keywords' => '',
        ]);
    }

    private function storeImage($template)
    {
        if(request()->has('image'))
        {
            if(request()->oldimage){
                unlink('storage/app/public/'.$template->image);
            }
            $template->update([
                'image' => request()->image->store('image/template', 'public'),
            ]);
        }
    }

    private function storeFile($template)
    {
        if(request()->has('file'))
        {
            if(request()->oldfile){
                unlink('storage/app/public/'.$template->file);
            }
            $template->update([
                'file' => request()->file->store('file/template', 'public'),
            ]);
        }
    }


    // MODERATOR FUNCTION
    public function mindex()
    {
        $aid = Auth::id();
        $templates = Template::where('status', 1)->where('user_id', $aid)->latest()->get();
        $count = 1;
        return view('admin.template.index', compact('templates','count'));
    }

    public function mdeactiveList()
    {
        $aid = Auth::id();
        $templates = Template::where('status', 2)->where('user_id', $aid)->latest()->get();
        $count = 1;
        return view('admin.template.index', compact('templates','count'));
    }

    public function medit(Template $mtemplate)
    {
        $aid = Auth::id();
        $template = Template::where('id', $mtemplate->id)->where('user_id', $aid)->first();
        $categories = CategoryTemplate::orderBy('name','asc')->get();
        $tags = TagTemplate::orderBy('name','asc')->get();
        return view('admin.template.edit', compact('template','categories','tags'));
    }

    public function mupdate(Template $mtemplate)
    {
        $aid = Auth::id();
        $template = Template::where('id', $mtemplate->id)->where('user_id', $aid)->first();
        $this->validateData();

        $template->update([
            'title' => request('title'),
            'slug' => request('slug'),
            'body' => request('body'),
            'keywords' => request('keywords'),
        ]);

        $this->storeImage($template);

        $this->storeFile($template);

        if(request()->category_id) {
            $template->Templatecategory->delete();

            $category = New Templatecategory();
            $category->category_id = request()->category_id;
            $category->template_id = $template->id;
            $category->save();
        }

        if(request()->tag_id){
            foreach($template->tag as $item){
                $item->delete();
            }

            foreach(request()->tag_id as $key=>$tag_id){
                $category = New Templatetag();
                $category->tag_id = $tag_id;
                $category->template_id = $template->id;
                $category->save();
            }
        }

        if(request()->download_link){
            foreach($template->download as $item)
            {
                $item->delete();
            }
            foreach(request()->download_link as $key=>$link){
                $download = New Templatedownload();
                $download->link = $link;
                $download->template_id = $template->id;
                $download->save();
            }
        }


        if($template)
        {
            return redirect()->back()->with('success', 'Template Updated Successfully!');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }

    public function mdeactive(Template $mtemplate)
    {
        $aid = Auth::id();
        $template = Template::where('id', $mtemplate->id)->where('user_id', $aid)->first();
        $template->update(['status' => 2]);

        if($template)
        {
            return redirect()->back()->with('success', 'Template Deactived!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function mactive(Template $mtemplate)
    {
        $aid = Auth::id();
        $template = Template::where('id', $mtemplate->id)->where('user_id', $aid)->first();
        $template->update(['status' => 1]);

        if($template)
        {
            return redirect()->back()->with('success', 'Template Activated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function mapprove(Template $mtemplate)
    {
        $aid = Auth::id();
        $template = Template::where('id', $mtemplate->id)->where('user_id', $aid)->first();
        $template->update(['status' => 1]);

        if($template)
        {
            return redirect()->back()->with('success', 'Template Approved!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function msoftDelete(Template $mtemplate)
    {
        $aid = Auth::id();
        $template = Template::where('id', $mtemplate->id)->where('user_id', $aid)->first();
        $template->update(['status' => 9]);

        if($template)
        {
            return redirect()->back()->with('delete', 'Template Deleted!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }
}

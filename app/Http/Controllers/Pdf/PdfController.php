<?php

namespace App\Http\Controllers\Pdf;


use App\Http\Controllers\Controller;
use App\Models\Author\AuthorPdf;
use App\Models\Category\CategoryPdf;
use App\Models\Pdf\Pdf;
use App\Models\Pdf\Pdfauthor;
use App\Models\Pdf\Pdfcategory;
use App\Models\Pdf\Pdfdownload;
use App\Models\Pdf\Pdfseries;
use App\Models\Series\SeriesPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PdfController extends Controller
{
    public function index()
    {
        $pdfs = Pdf::where('status', 1)->latest()->get();
        $count = 1;
        return view('admin.pdf.index', compact('pdfs','count'));
    }

    public function show($slug)
    {
        $pdf = Pdf::where('slug', $slug)->first();
        return view('admin.pdf.show', compact('pdf'));
    }

    public function deactiveList()
    {
        $pdfs = Pdf::where('status', 2)->latest()->get();
        $count = 1;
        return view('admin.pdf.index', compact('pdfs','count'));
    }

    public function trash()
    {
        $pdfs = Pdf::where('status', 9)->latest()->get();
        $count = 1;
        return view('admin.pdf.trash', compact('pdfs','count'));
    }

    public function create()
    {
        $categories = CategoryPdf::where('status', 1)->orderBy('name','asc')->get();
        $authors = AuthorPdf::where('status', 1)->orderBy('name','asc')->get();
        $serieses = SeriesPdf::where('status', 1)->orderBy('name','asc')->get();
        return view('admin.pdf.create', compact('categories','authors','serieses'));
    }

    public function edit(Pdf $pdf)
    {
        $categories = CategoryPdf::orderBy('name','asc')->get();
        $authors = AuthorPdf::orderBy('name','asc')->get();
        $serieses = SeriesPdf::orderBy('name','asc')->get();
        return view('admin.pdf.edit', compact('pdf','categories','authors','serieses'));
    }

    public function store()
    {
        $this->validateData();
        
        $check = Pdf::where('slug', request()->slug)->first();
        
        if(!$check){
            $pdf = Pdf::create([
                'user_id' => Auth::id(),
                'title' => request('title'),
                'slug' => request('slug'),
                'name' => request('name'),
                'review' => request('review'),
                'translated' => request('translated'),
                'publisher' => request('publisher'),
                'published' => request('published'),
                'pages' => request('pages'),
                'size' => request('size'),
                'date' => date('d'),
                'month' => date('F'),
                'year' => date('Y'),
                'keywords' => request('keywords'),
                'status' => 1,
            ]);
        }else{
            $pdf = Pdf::create([
                'user_id' => Auth::id(),
                'title' => request('title'),
                'slug' => request('slug') . '-' . uniqid(),
                'name' => request('name'),
                'review' => request('review'),
                'translated' => request('translated'),
                'publisher' => request('publisher'),
                'published' => request('published'),
                'pages' => request('pages'),
                'size' => request('size'),
                'date' => date('d'),
                'month' => date('F'),
                'year' => date('Y'),
                'keywords' => request('keywords'),
                'status' => 1,
            ]);
        }


        $this->storeImage($pdf);
        $this->storePdf($pdf);

        foreach(request()->category_id as $key=>$category_id){
            $category = New Pdfcategory();
            $category->category_id = $category_id;
            $category->pdf_id = $pdf->id;
            $category->save();
        }
        if(request()->author_id){
            foreach(request()->author_id as $key=>$author_id){
                $author = New Pdfauthor();
                $author->author_id = $author_id;
                $author->pdf_id = $pdf->id;
                $author->save();
            }
        }
        if(request()->series_id){
            foreach(request()->series_id as $key=>$series_id){
                $series = New Pdfseries();
                $series->series_id = $series_id;
                $series->pdf_id = $pdf->id;
                $series->save();
            }
        }
        if(request()->download_link){
            foreach(request()->download_link as $key=>$link){
                $download = New Pdfdownload();
                $download->link = $link;
                $download->pdf_id = $pdf->id;
                $download->save();
            }
        }

        if($pdf)
        {
            return redirect()->back()->with('success', 'PDF Publish Successfully!');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }

    public function update(Pdf $pdf)
    {
        $this->validateUpdateData();
        

        $pdf->update([
            'title' => request('title'),
            'slug' => request('slug'),
            'name' => request('name'),
            'review' => request('review'),
            'translated' => request('translated'),
            'publisher' => request('publisher'),
            'published' => request('published'),
            'pages' => request('pages'),
            'size' => request('size'),
            'keywords' => request('keywords'),
        ]);
        
        $update_date = $pdf->updated_at;
        $pdf->update(['created_at' => $update_date]);

        $this->storeImage($pdf);
        $this->storePdf($pdf);

        if(request()->category_id){
            foreach($pdf->category as $item){
                $item->delete();
            }

            foreach(request()->category_id as $key=>$category_id){
                $category = New Pdfcategory();
                $category->category_id = $category_id;
                $category->pdf_id = $pdf->id;
                $category->save();
            }
        }

        if(request()->author_id){
            foreach($pdf->author as $item){
                $item->delete();
            }

            foreach(request()->author_id as $key=>$author_id){
                $author = New Pdfauthor();
                $author->author_id = $author_id;
                $author->pdf_id = $pdf->id;
                $author->save();
            }
        }

        if(request()->series_id){
            foreach($pdf->series as $item){
                $item->delete();
            }

            foreach(request()->series_id as $key=>$series_id){
                $series = New Pdfseries();
                $series->series_id = $series_id;
                $series->pdf_id = $pdf->id;
                $series->save();
            }
        }

        if(request()->download_link){
            foreach($pdf->download as $item){
                $item->delete();
            }

            foreach(request()->download_link as $key=>$link){
                $download = New Pdfdownload();
                $download->link = $link;
                $download->pdf_id = $pdf->id;
                $download->save();
            }
        }


        if($pdf)
        {
            return redirect()->back()->with('success', 'PDF Updated Successfully!');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }

    public function deactive(Pdf $pdf)
    {
        $pdf->update(['status' => 2]);

        if($pdf)
        {
            return redirect()->back()->with('success', 'PDF Deactived!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(Pdf $pdf)
    {
        $pdf->update(['status' => 1]);

        if($pdf)
        {
            return redirect()->back()->with('success', 'PDF Activated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(Pdf $pdf)
    {
        $pdf->update(['status' => 9]);

        if($pdf)
        {
            return redirect()->back()->with('delete', 'PDF moved to trash!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(Pdf $pdf)
    {
        if($pdf->image){
            unlink('storage/app/public/'.$pdf->image);
        }
        if($pdf->file){
            unlink('storage/app/public/'.$pdf->file);
        }
        $pdf->delete();

        if($pdf)
        {
            return redirect()->back()->with('delete', 'PDF Deleted Permanently!');
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
            'name' => 'required',
            'review' => '',
            'translated' => '',
            'publisher' => '',
            'published' => '',
            'pages' => '',
            'size' => '',
            'keywords' => '',
        ]);
    }

    private function validateUpdateData()
    {
        return request()->validate([
            'title' => 'required',
            'slug' => 'required',
            'name' => 'required',
            'review' => '',
            'translated' => '',
            'publisher' => '',
            'published' => '',
            'pages' => '',
            'size' => '',
            'keywords' => '',
        ]);
    }

    private function storeImage($pdf)
    {
        request()->validate([
            'image' => 'sometimes|file|image|max:50',
        ]);

        if(request()->has('image'))
        {
            if(request()->oldimage){
                unlink('storage/app/public/'.request()->oldimage);
            }
            $pdf->update([
                'image' => request()->image->store('image/pdf', 'public'),
            ]);
        }
    }

    private function storePdf($pdf)
    {
        if(request()->has('file'))
        {
            if(request()->oldfile){
                unlink('storage/app/public/'.$pdf->file);
            }
            $pdf->update([
                'file' => request()->file->store('file/pdf', 'public'),
            ]);
        }
    }


    // MODERATOR FUNCTION
    public function mindex()
    {
        $aid = Auth::id();
        $pdfs = Pdf::where('status', 1)->where('user_id', $aid)->latest()->get();
        $count = 1;
        return view('admin.pdf.index', compact('pdfs','count'));
    }

    public function mdeactiveList()
    {
        $aid = Auth::id();
        $pdfs = Pdf::where('status', 2)->where('user_id', $aid)->latest()->get();
        $count = 1;
        return view('admin.pdf.index', compact('pdfs','count'));
    }

    public function medit(Pdf $mpdf)
    {
        $aid = Auth::id();
        $pdf = Pdf::where('id', $mpdf->id)->where('user_id', $aid)->first();
        $categories = CategoryPdf::orderBy('name','asc')->get();
        $authors = AuthorPdf::orderBy('name','asc')->get();
        $serieses = SeriesPdf::orderBy('name','asc')->get();
        return view('admin.pdf.edit', compact('pdf','categories','authors','serieses'));
    }

    public function mupdate(Pdf $mpdf)
    {
        $aid = Auth::id();
        $pdf = Pdf::where('id', $mpdf->id)->where('user_id', $aid)->first();
        $this->validateUpdateData();

        $pdf->update([
            'title' => request('title'),
            'slug' => request('slug'),
            'name' => request('name'),
            'review' => request('review'),
            'translated' => request('translated'),
            'publisher' => request('publisher'),
            'published' => request('published'),
            'pages' => request('pages'),
            'size' => request('size'),
            'keywords' => request('keywords'),
        ]);

        $this->storeImage($pdf);
        $this->storePdf($pdf);

        if(request()->category_id){
            foreach($pdf->category as $item){
                $item->delete();
            }

            foreach(request()->category_id as $key=>$category_id){
                $category = New Pdfcategory();
                $category->category_id = $category_id;
                $category->pdf_id = $pdf->id;
                $category->save();
            }
        }

        if(request()->author_id){
            foreach($pdf->author as $item){
                $item->delete();
            }

            foreach(request()->author_id as $key=>$author_id){
                $author = New Pdfauthor();
                $author->author_id = $author_id;
                $author->pdf_id = $pdf->id;
                $author->save();
            }
        }

        if(request()->series_id){
            foreach($pdf->series as $item){
                $item->delete();
            }

            foreach(request()->series_id as $key=>$series_id){
                $series = New Pdfseries();
                $series->series_id = $series_id;
                $series->pdf_id = $pdf->id;
                $series->save();
            }
        }

        if(request()->download_link){
            foreach($pdf->download as $item){
                $item->delete();
            }

            foreach(request()->download_link as $key=>$link){
                $download = New Pdfdownload();
                $download->link = $link;
                $download->pdf_id = $pdf->id;
                $download->save();
            }
        }


        if($pdf)
        {
            return redirect()->back()->with('success', 'PDF Updated Successfully!');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }

    public function mdeactive(Pdf $mpdf)
    {
        $aid = Auth::id();
        $pdf = Pdf::where('id', $mpdf->id)->where('user_id', $aid)->first();

        $pdf->update(['status' => 2]);

        if($pdf)
        {
            return redirect()->back()->with('success', 'PDF Deactived!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function mactive(Pdf $mpdf)
    {
        $aid = Auth::id();
        $pdf = Pdf::where('id', $mpdf->id)->where('user_id', $aid)->first();

        $pdf->update(['status' => 1]);

        if($pdf)
        {
            return redirect()->back()->with('success', 'PDF Activated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function msoftDelete(Pdf $mpdf)
    {
        $aid = Auth::id();
        $pdf = Pdf::where('id', $mpdf->id)->where('user_id', $aid)->first();
        
        $pdf->update(['status' => 9]);

        if($pdf)
        {
            return redirect()->back()->with('delete', 'PDF Deleted!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }
}

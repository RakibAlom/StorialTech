<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category\CategoryPdf;
use App\Models\Author\AuthorPdf;
use App\Models\Series\SeriesPdf;
use App\Models\Pdf\Pdf;

class PdfPublicController extends Controller
{
    // PDF FUNCTION
    public function index()
    {
         $pdfs = Pdf::where('status', 1)->latest()->paginate(24);
         return view('pdf.index', compact('pdfs'));
    }
   
    public function categorypdf($slug)
    {
        $category = CategoryPdf::where('slug', $slug)->first();
        $category->update([
            'views' => $category->views + 1,
        ]);
        $pdfs = $category->pdf()->where('status', 1)->latest()->paginate(24);
        return view('pdf.categoryshow', compact('pdfs','category'));
    }

    public function authorpdf($slug)
    {
        $author = AuthorPdf::where('slug', $slug)->first();
        $author->update([
            'views' => $author->views + 1,
        ]);
        $pdfs = $author->pdf()->where('status', 1)->latest()->paginate(24);
        return view('pdf.authorshow', compact('pdfs','author'));
    }

    public function seriespdf($slug)
    {
        $series = SeriesPdf::where('slug', $slug)->first();
        $series->update([
            'views' => $series->views + 1,
        ]);
        $pdfs = $series->pdf()->where('status', 1)->latest()->paginate(24);
        return view('pdf.seriesshow', compact('pdfs','series'));
    }

    public function show($slug)
    {
        $pdf = Pdf::where('slug', $slug)->first();
        $pdf->update([
            'views' => $pdf->views + 1,
        ]);
        return view('pdf.show', compact('pdf'));
    }
}

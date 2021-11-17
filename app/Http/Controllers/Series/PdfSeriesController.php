<?php

namespace App\Http\Controllers\Series;

use App\Http\Controllers\Controller;
use App\Models\Series\SeriesPdf;
use Illuminate\Http\Request;

class PdfSeriesController extends Controller
{
    public function index()
    {
        $serieses = SeriesPdf::where('status', 0)->orWhere('status', 1)->get();
        $count = 1;
        return view('admin.pdf.series.index', compact('serieses','count'));
    }

    public function trash()
    {
        $serieses = SeriesPdf::where('status', 9)->get();
        $count = 1;
        return view('admin.pdf.series.trash', compact('serieses','count'));
    }

    public function create()
    {
        return view('admin.pdf.series.create');
    }

    public function store()
    {
        request()->validate([
            'name' => 'required',
            'slug' => 'required|unique:series_pdfs',
        ]);
        $series = SeriesPdf::create([
            'name' => request('name'),
            'slug' => request('slug'),
            'snumber' => SeriesPdf::max('snumber') + 1,
        ]);

        if($series)
        {
            return redirect()->back()->with('success', 'New PDF Series Publish.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function edit(SeriesPdf $series)
    {
        return view('admin.pdf.series.edit', compact('series'));
    }

    public function update(SeriesPdf $series)
    {
        $data = request()->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $series->update($data);

        if($series)
        {
            return redirect()->back()->with('success', 'PDF Series Updated.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function deactive(SeriesPdf $series)
    {
        $series->update(['status' => 0]);

        if($series)
        {
            return redirect()->back()->with('success', 'PDF Series Deactived.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(SeriesPdf $series)
    {
        $series->update(['status' => 1]);

        if($series)
        {
            return redirect()->back()->with('success', 'PDF Series Activated.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function softDelete(SeriesPdf $series)
    {
        $series->update(['status' => 9]);

        if($series)
        {
            return redirect()->back()->with('delete', 'PDF Series moved to trash.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(SeriesPdf $series)
    {
        $series->delete();

        if($series)
        {
            return redirect()->back()->with('delete', 'PDF Series Has Been Deleted Permanently.');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }
}

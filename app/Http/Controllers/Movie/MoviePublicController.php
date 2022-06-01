<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category\CategoryMovie;
use App\Models\Movie\Movie;

class MoviePublicController extends Controller
{
    // MOVIE FUNCTION
    public function index()
    {
        $movies = Movie::with('moviecategory')->where('status', 1)->orderBy('id','desc')->paginate(20);
        $count = 1;
        return view('movie.index', compact('movies','count'));
    }

    public function latest()
    {
        $movies = Movie::with('moviecategory')->where('status', 1)->orderBy('id','desc')->paginate(20);
        $count = 1;
        return view('movie.latest', compact('movies','count'));
    }

    public function categorymovie($slug)
    {
        $category = CategoryMovie::where('slug', $slug)->first();
        $category->update([
            'views' => $category->views + 1,
        ]);
        $movies = $category->movie()->with('moviecategory')->where('status', 1)->latest()->paginate(20);
        return view('movie.categoryshow', compact('movies','category'));
    }

    public function show($slug)
    {
        $movie = Movie::where('slug', $slug)->first();
        $movie->update([
            'views' => $movie->views + 1,
        ]);
        return view('movie.show', compact('movie'));
    }
}

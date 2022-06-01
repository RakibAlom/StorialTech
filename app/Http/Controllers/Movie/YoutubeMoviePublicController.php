<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category\CategoryMovie;
use App\Models\Movie\Youtubemovie;

class YoutubeMoviePublicController extends Controller
{
    // MOVIE FUNCTION
    public function index()
    {
         $movies = Youtubemovie::with('moviecategory')->where('status', 1)->latest()->paginate(20);
         return view('movie.youtube.index', compact('movies'));
    }
    
    public function categorymovie($slug)
    {
        $category = CategoryMovie::where('slug', $slug)->first();
        $category->update([
            'views' => $category->views + 1,
        ]);
        $movies = $category->ytmovie()->with('moviecategory')->where('status', 1)->latest()->paginate(30);
        return view('movie.youtube.categoryshow', compact('movies','category'));
    }

    public function show($slug)
    {
        $movie = Youtubemovie::where('slug', $slug)->first();
        $movie->update([
            'views' => $movie->views + 1,
        ]);
        return view('movie.youtube.show', compact('movie'));
    }
}

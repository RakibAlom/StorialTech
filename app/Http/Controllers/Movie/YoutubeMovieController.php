<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Models\Category\CategoryMovie;
use App\Models\Movie\Youtubemoviecategory;
use App\Models\Movie\Youtubemovie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YoutubeMovieController extends Controller
{
    public function index()
    {
        $movies = Youtubemovie::where('status', 1)->latest()->paginate(20);
        $count = 1;
        return view('admin.movie.youtube.index', compact('movies','count'));
    }

    public function show($slug)
    {
        $movie = Youtubemovie::where('slug', $slug)->first();
        return view('admin.movie.youtube.show', compact('movie'));
    }

    public function deactiveList()
    {
        $movies = Youtubemovie::where('status', 2)->latest()->get();
        $count = 1;
        return view('admin.movie.youtube.index', compact('movies','count'));
    }

    public function trash()
    {
        $movies = Youtubemovie::where('status', 9)->latest()->get();
        $count = 1;
        return view('admin.movie.youtube.trash', compact('movies','count'));
    }

    public function create()
    {
        $categories = CategoryMovie::where('status', 1)->get();
        return view('admin.movie.youtube.create', compact('categories'));
    }

    public function edit(Youtubemovie $movie)
    {
        $categories = CategoryMovie::all();
        return view('admin.movie.youtube.edit', compact('movie','categories'));
    }

    public function store()
    {
        $this->validateData();
        $check = Movie::where('slug', request()->slug)->first();
        
        if(!$check) {
            $movie = Youtubemovie::create([
                'user_id' => Auth::id(),
                'name' => request('name'),
                'slug' => request('slug'),
                'elink' => request('elink'),
                'details' => request('details'),
                'duration' => request('duration'),
                'language' => request('language'),
                'release_date' => request('release_date'),
                'imdb_rating' => request('imdb_rating'),
                'region' => request('region'),
                'keywords' => request('keywords'),
            ]);
        }else{
            $movie = Youtubemovie::create([
                'user_id' => Auth::id(),
                'name' => request('name'),
                'slug' => strtoupper(uniqid()),
                'elink' => request('elink'),
                'details' => request('details'),
                'duration' => request('duration'),
                'language' => request('language'),
                'release_date' => request('release_date'),
                'imdb_rating' => request('imdb_rating'),
                'region' => request('region'),
                'keywords' => request('keywords'),
            ]);
        }

        $this->storeFile($movie);

        if(request()->category_id){
            foreach(request()->category_id as $key=>$category_id){
                $category = New Youtubemoviecategory();
                $category->category_id = $category_id;
                $category->youtubemovie_id = $movie->id;
                $category->save();
            }
        }

        if($movie)
        {
            return redirect()->back()->with('success', 'Movie Publish Successfully!');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }

    public function update(Youtubemovie $movie)
    {
        $this->validateData();

        $movie->update([
            'name' => request('name'),
            'slug' => request('slug'),
            'elink' => request('elink'),
            'details' => request('details'),
            'duration' => request('duration'),
            'language' => request('language'),
            'release_date' => request('release_date'),
            'imdb_rating' => request('imdb_rating'),
            'region' => request('region'),
            'keywords' => request('keywords'),
        ]);

        $this->storeFile($movie);

        if(request()->category_id){
            foreach($movie->category as $item){
                $item->delete();
            }

            foreach(request()->category_id as $key=>$category_id){
                $category = New Youtubemoviecategory();
                $category->category_id = $category_id;
                $category->youtubemovie_id = $movie->id;
                $category->save();
            }
        }

        if($movie)
        {
            return redirect()->back()->with('success', 'Movie Updated Successfully!');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }
    }

    public function deactive(Youtubemovie $movie)
    {
        $movie->update(['status' => 2]);

        if($movie)
        {
            return redirect()->back()->with('success', 'Movie Deactived!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(Youtubemovie $movie)
    {
        $movie->update(['status' => 1]);

        if($movie)
        {
            return redirect()->back()->with('success', 'Movie Activated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }



    public function softDelete(Youtubemovie $movie)
    {
        $movie->update(['status' => 9]);

        if($movie)
        {
            return redirect()->back()->with('delete', 'Movie moved to trash!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(Youtubemovie $movie)
    {
        if($movie->thumbnail){
            unlink('storage/app/public/'.$movie->thumbnail);
        }
        $movie->delete();

        if($movie)
        {
            return redirect()->back()->with('delete', 'Movie Deleted Permanently!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }


    // PRIVATE FUNCTION
    private function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'slug' => 'required',
            'elink' => 'required',
            'details' => '',
            'thumbnail' => 'sometimes|file|image|max:50',
            'keywords' => '',
        ]);
    }

    private function storeFile($movie)
    {
        if(request()->has('thumbnail'))
        {
            if(request()->oldthumbnail){
                unlink('storage/app/public/'.$movie->thumbnail);
            }
            $movie->update([
                'thumbnail' => request()->thumbnail->store('image/movie/youtube', 'public'),
            ]);
        }
    }
}

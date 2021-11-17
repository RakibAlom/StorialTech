<?php

namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Models\Category\CategoryMovie;
use App\Models\Movie\Movie;
use App\Models\Movie\MovieCategory;
use App\Models\Movie\Moviedownload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::where('status', 1)->latest()->get();
        $count = 1;
        return view('admin.movie.index', compact('movies','count'));
    }

    public function show($slug)
    {
        $movie = Movie::where('slug', $slug)->first();
        return view('admin.movie.show', compact('movie'));
    }

    public function deactiveList()
    {
        $movies = Movie::where('status', 2)->latest()->get();
        $count = 1;
        return view('admin.movie.index', compact('movies','count'));
    }

    public function trash()
    {
        $movies = Movie::where('status', 9)->latest()->get();
        $count = 1;
        return view('admin.movie.trash', compact('movies','count'));
    }

    public function create()
    {
        $categories = CategoryMovie::where('status', 1)->orderBy('name','asc')->get();
        return view('admin.movie.create', compact('categories'));
    }

    public function edit(Movie $movie)
    {
        $categories = CategoryMovie::orderBy('name','asc')->get();
        return view('admin.movie.edit', compact('movie','categories'));
    }

    public function store()
    {
        $this->validateData();
        $check = Movie::where('slug', request()->slug)->first();
        if(!$check) {
            $movie = Movie::create([
                'user_id' => Auth::id(),
                'name' => request('name'),
                'slug' => request('slug'),
                'details' => request('details'),
                'duration' => request('duration'),
                'language' => request('language'),
                'release_date' => request('release_date'),
                'imdb_rating' => request('imdb_rating'),
                'region' => request('region'),
                'keywords' => request('keywords'),
            ]);
        }else{
            $movie = Movie::create([
                'user_id' => Auth::id(),
                'name' => request('name'),
                'slug' => request('slug') . '-' . uniqid(),
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
                $category = New MovieCategory();
                $category->category_id = $category_id;
                $category->movie_id = $movie->id;
                $category->save();
            }
        }

        if(request()->download_link){
            foreach(request()->download_link as $key=>$download_link){
                $category = New Moviedownload();
                $category->link = $download_link;
                $category->quality = request()->quality[$key];
                $category->size = request()->size[$key];
                $category->movie_id = $movie->id;
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

    public function update(Movie $movie)
    {
        $this->validateData();

        $movie->update([
            'name' => request('name'),
            'slug' => request('slug'),
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
                $category = New MovieCategory();
                $category->category_id = $category_id;
                $category->movie_id = $movie->id;
                $category->save();
            }
        }

        if(request()->download_link){
            foreach($movie->download as $item){
                $item->delete();
            }

            foreach(request()->download_link as $key=>$download_link){
                $category = New Moviedownload();
                $category->link = $download_link;
                $category->quality = request()->quality[$key];
                $category->size = request()->size[$key];
                $category->movie_id = $movie->id;
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

    public function deactive(Movie $movie)
    {
        $movie->update(['status' => 2]);

        if($movie)
        {
            return redirect()->back()->with('success', 'Movie Deactived!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function active(Movie $movie)
    {
        $movie->update(['status' => 1]);

        if($movie)
        {
            return redirect()->back()->with('success', 'Movie Activated!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }



    public function softDelete(Movie $movie)
    {
        $movie->update(['status' => 9]);

        if($movie)
        {
            return redirect()->back()->with('delete', 'Movie moved to trash!');
        }else{
            return redirect()->back()->with('error', 'Error, Something Went Wrong!');
        }
    }

    public function permanentDelete(Movie $movie)
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
            'details' => '',
            'download_link' => 'required',
            'size' => '',
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
                'thumbnail' => request()->thumbnail->store('image/movie', 'public'),
            ]);
        }
    }
}

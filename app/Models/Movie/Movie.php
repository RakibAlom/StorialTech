<?php

namespace App\Models\Movie;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','name','slug','details','duration','language','region','release_date','imdb_rating','keywords','thumbnail','status','views'
    ];

    public function categorymovie()
    {
        return $this->belongsToMany('App\Models\Category\CategoryMovie','movie_categories','movie_id','category_id');
    }

    public function category()
    {
        return $this->hasMany('App\Models\Movie\MovieCategory');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function download()
    {
        return $this->hasMany('App\Models\Movie\Moviedownload');
    }

    public function path()
    {
        return route('show.movie', $this->slug );
    }

    public function fb()
    {
        return url("https://www.facebook.com/sharer.php?u=" . route('show.movie', $this->slug));
    }

    public function twitter()
    {
        return url("https://twitter.com/intent/tweet?url=" . route('show.movie', $this->slug));
    }

    public function pin()
    {
        return url("https://www.pinterest.com/pin/create/button/?url=" . route('show.movie', $this->slug));
    }
}

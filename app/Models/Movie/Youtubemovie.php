<?php

namespace App\Models\Movie;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youtubemovie extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','name','slug','elink','details','duration','language','region','release_date','imdb_rating','keywords','thumbnail','status','views'
    ];

    public function categoryytmovie()
    {
        return $this->belongsToMany('App\Models\Category\CategoryMovie','youtubemoviecategories','youtubemovie_id','category_id');
    }

    public function category()
    {
        return $this->hasMany('App\Models\Movie\Youtubemoviecategory');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function path()
    {
        return route('show.youtube.movie', $this->slug );
    }

    public function fb()
    {
        return url("https://www.facebook.com/sharer.php?u=" . route('show.youtube.movie', $this->slug));
    }

    public function twitter()
    {
        return url("https://twitter.com/intent/tweet?url=" . route('show.youtube.movie', $this->slug));
    }

    public function pin()
    {
        return url("https://www.pinterest.com/pin/create/button/?url=" . route('show.youtube.movie', $this->slug));
    }
}

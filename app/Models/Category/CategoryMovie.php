<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryMovie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','slug','status','snumber','views'
    ];

    public function movie()
    {
        return $this->belongsToMany('App\Models\Movie\Movie','movie_categories','category_id','movie_id');
    }

    public function ytmovie()
    {
        return $this->belongsToMany('App\Models\Movie\Youtubemovie','youtubemoviecategories','category_id','youtubemovie_id');
    }

    public function moviecategory()
    {
        return $this->hasMany('App\Models\Movie\MovieCategory', 'category_id');
    }

    public function path()
    {
        return route('category.movie', $this->slug );
    }

    public function ytpath()
    {
        return route('category.youtube.movie', $this->slug );
    }
}

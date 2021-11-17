<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youtubemoviecategory extends Model
{
    use HasFactory;

    public function categorymovie()
    {
        return $this->belongsTo('App\Models\Category\CategoryMovie', 'category_id');
    }

    public function movie()
    {
        return $this->belongsTo('App\Models\Movie\Youtubemovie', 'movie_id');
    }

    // public function categorymovie()
    // {
    //     return $this->belongsTo('App\Models\Category\CategoryMovie', 'category_id');
    // }

    // public function movie()
    // {
    //     return $this->belongsTo('App\Models\Movie\Movie', 'movie_id');
    // }
}

<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moviedownload extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id','quality','link','size'
    ];

    public function movie()
    {
        return $this->belongsTo('App\Models\Movie\Movie', 'movie_id');
    }
}

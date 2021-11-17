<?php

namespace App\Models\Youtube;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','slug','elink','clink','body','image','keywords','status','views','created_at','updated_at'
    ];

    public function path()
    {
        return route('show.youtube', $this->slug );
    }

    public function fb()
    {
        return url("https://www.facebook.com/sharer.php?u=" . route('show.youtube', $this->slug));
    }

    public function twitter()
    {
        return url("https://twitter.com/intent/tweet?url=" . route('show.youtube', $this->slug));
    }

    public function pin()
    {
        return url("https://www.pinterest.com/pin/create/button/?url=" . route('show.youtube', $this->slug));
    }
}

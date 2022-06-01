<?php

namespace App\Models;

use App\Models\Blog\Blog;
use App\Models\Blog\Bloglike;
use App\Models\Story\Story;
use App\Models\Story\Storylike;
use App\Models\Tutorial\Tutorial;
use App\Models\Tutorial\Tutoriallike;
use App\Models\Pdf\Pdf;
use App\Models\Template\Template;
use App\Models\Movie\Movie;
use App\Models\Movie\Youtubemovie;
use App\Models\Source\PreemiumFree;
use App\Models\Tools\WebStory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Userdetail;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'slug',
        'fullname',
        'phone',
        'birthdate',
        'gender',
        'image',
        'utype',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userdetails()
    {
        return $this->hasOne(Userdetail::class);
    }

    public function story()
    {
        return $this->hasMany(Story::class);
    }
    
    public function tutorial()
    {
        return $this->hasMany(Tutorial::class);
    }
    
    public function pdf()
    {
        return $this->hasMany(Pdf::class);
    }
    
    public function template()
    {
        return $this->hasMany(Template::class);
    }
    
    public function movie()
    {
        return $this->hasMany(Movie::class);
    }
    
    public function ytmovie()
    {
        return $this->hasMany(Youtubemovie::class);
    }
    
    public function source()
    {
        return $this->hasMany(PreemiumFree::class);
    }
    
    public function blog()
    {
        return $this->hasMany(Blog::class);
    }

    public function storylike()
    {
        return $this->hasOne(Storylike::class);
    }

    public function tutoriallike()
    {
        return $this->hasOne(Tutoriallike::class);
    }
    
    public function bloglike()
    {
        return $this->hasOne(Bloglike::class);
    }

    public function webstories()
    {
        return $this->hasMany(WebStory::class);
    }

    public function path()
    {
        return route('show.user', $this->slug );
    }

    public function fb()
    {
        return url("https://www.facebook.com/sharer.php?u=" . route('show.user', $this->slug));
    }

    public function twitter()
    {
        return url("https://twitter.com/intent/tweet?url=" . route('show.user', $this->slug));
    }

    public function pin()
    {
        return url("https://www.pinterest.com/pin/create/button/?url=" . route('show.user', $this->slug));
    }

}

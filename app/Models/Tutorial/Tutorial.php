<?php

namespace App\Models\Tutorial;

use App\Models\User;
use App\Models\Tutorial\Tutoriallike;
use App\Models\Tutorial\Tutorialcomment;
use App\Models\Tutorial\Tutorialcommentreply;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','title','slug','body','vlink','date','month','year','image','keywords', 'preview_code','views','status','created_at','updated_at'
    ];

    public function categorytutorial()
    {
        return $this->belongsToMany('App\Models\Category\CategoryTutorial','tutorial_categories','tutorial_id','category_id');
    }

    public function category()
    {
        return $this->hasMany('App\Models\Tutorial\TutorialCategory');
    }

    public function tag()
    {
        return $this->hasMany('App\Models\Tutorial\TutorialTag');
    }

    public function tagtutorial()
    {
        return $this->belongsToMany('App\Models\Tag\TagTutorial','tutorial_tags','tutorial_id','tag_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function like()
    {
        return $this->hasMany(Tutoriallike::class);
    }

    public function comment()
    {
        return $this->hasMany(Tutorialcomment::class);
    }

    public function commentreply()
    {
        return $this->hasMany(Tutorialcommentreply::class);
    }

    public function tutorialcategory()
    {
        return $this->hasOne('App\Models\Tutorial\TutorialCategory' ,'tutorial_id');
    }

    public function path()
    {
        return route('show.tutorial', $this->slug );
    }

    public function fb()
    {
        return url("https://www.facebook.com/sharer.php?u=" . route('show.tutorial', $this->slug));
    }

    public function twitter()
    {
        return url("https://twitter.com/intent/tweet?url=" . route('show.tutorial', $this->slug));
    }

    public function pin()
    {
        return url("https://www.pinterest.com/pin/create/button/?url=" . route('show.tutorial', $this->slug));
    }
}

<?php

namespace App\Models\Story;

use App\Models\Category\CategoryStory;
use App\Models\Story\StoryCategory;
use App\Models\User;
use App\Models\Story\Storylike;
use App\Models\Story\Storycomment;
use App\Models\Story\Storycommentreply;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','title','slug','body','date','month','year','image','keywords','views','status','created_at','updated_at'
    ];

    public function categorystory()
    {
        return $this->belongsToMany('App\Models\Category\CategoryStory','story_categories','story_id','category_id');
    }

    public function category()
    {
        return $this->hasMany('App\Models\Story\StoryCategory');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function like()
    {
        return $this->hasMany(Storylike::class);
    }

    public function comment()
    {
        return $this->hasMany(Storycomment::class);
    }

    public function commentreply()
    {
        return $this->hasMany(Storycommentreply::class);
    }

    public function path()
    {
        return route('show.story', $this->slug );
    }

    public function fb()
    {
        return url("https://www.facebook.com/sharer.php?u=" . route('show.story', $this->slug));
    }

    public function twitter()
    {
        return url("https://twitter.com/intent/tweet?url=" . route('show.story', $this->slug));
    }

    public function pin()
    {
        return url("https://www.pinterest.com/pin/create/button/?url=" . route('show.story', $this->slug));
    }
}

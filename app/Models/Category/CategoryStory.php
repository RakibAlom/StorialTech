<?php

namespace App\Models\Category;

use App\Models\Story\Story;
use App\Models\Story\StoryCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','slug','status','snumber','views'
    ];

    public function story()
    {
        return $this->belongsToMany('App\Models\Story\Story','story_categories','category_id','story_id');
    }

    public function storycategory()
    {
        return $this->hasMany('App\Models\Story\StoryCategory');
    }

    public function path()
    {
        return route('category.story', $this->slug );
    }
}

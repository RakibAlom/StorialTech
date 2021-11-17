<?php

namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagTutorial extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id','name','slug','snumber','status','views'
    ];

    public function categorytutorial()
    {
        return $this->belongsTo('App\Models\Category\CategoryTutorial', 'category_id');
    }

    public function tutorial()
    {
        return $this->belongsToMany('App\Models\Tutorial\Tutorial','tutorial_tags','tag_id','tutorial_id');
    }

    public function path()
    {
        return route('tag.tutorial', $this->slug );
    }

}

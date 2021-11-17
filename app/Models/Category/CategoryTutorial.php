<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTutorial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','slug','status','snumber','views'
    ];

    public function tutorial()
    {
        return $this->belongsToMany('App\Models\Tutorial\Tutorial','tutorial_categories','category_id','tutorial_id');
    }

    public function tutorialcategory()
    {
        return $this->hasMany('App\Models\Tutorial\TutorialCategory','category_id');
    }

    public function tag()
    {
        return $this->hasMany('App\Models\Tag\TagTutorial','category_id');
    }

    public function path()
    {
        return route('category.tutorial', $this->slug );
    }

}

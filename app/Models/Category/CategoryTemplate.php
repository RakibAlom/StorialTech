<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','slug','status','snumber','views'
    ];

    public function template()
    {
        return $this->belongsToMany('App\Models\Template\Template','templatecategories','category_id','template_id');
    }

    public function templatecategory()
    {
        return $this->hasMany('App\Models\Template\Templatecategory');
    }

    public function tag()
    {
        return $this->hasMany('App\Models\Tag\TagTemplate','category_id');
    }

    public function path()
    {
        return route('category.template', $this->slug );
    }
}

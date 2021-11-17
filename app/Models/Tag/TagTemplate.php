<?php

namespace App\Models\Tag;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id','name','slug','snumber','status','views'
    ];

    public function categorytemplate()
    {
        return $this->belongsTo('App\Models\Category\CategoryTemplate', 'category_id');
    }

    public function template()
    {
        return $this->belongsToMany('App\Models\Template\Template', 'templatetags','tag_id','template_id');
    }

    public function path()
    {
        return route('tag.template', $this->slug );
    }

}

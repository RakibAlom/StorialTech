<?php

namespace App\Models\Template;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','title','slug','body','date','month','year','image','file','keywords','views','status','created_at','updated_at'
    ];

    public function categorytemplate()
    {
        return $this->belongsToMany('App\Models\Category\CategoryTemplate','templatecategories','template_id','category_id');
    }

    public function tagtemplate()
    {
        return $this->belongsToMany('App\Models\Tag\TagTemplate','templatetags','template_id','tag_id');
    }

    public function category()
    {
        return $this->hasMany('App\Models\Template\Templatecategory');
    }

    public function tag()
    {
        return $this->hasMany('App\Models\Template\Templatetag');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function templatecategory()
    {
        return $this->hasOne('App\Models\Template\Templatecategory' ,'template_id');
    }

    public function templatetag()
    {
        return $this->hasOne('App\Models\Template\Templatecategory' ,'template_id');
    }

    public function download()
    {
        return $this->hasMany('App\Models\Template\Templatedownload');
    }

    public function path()
    {
        return route('show.template', $this->slug );
    }

    public function fb()
    {
        return url("https://www.facebook.com/sharer.php?u=" . route('show.template', $this->slug));
    }

    public function twitter()
    {
        return url("https://twitter.com/intent/tweet?url=" . route('show.template', $this->slug));
    }

    public function pin()
    {
        return url("https://www.pinterest.com/pin/create/button/?url=" . route('show.template', $this->slug));
    }

}

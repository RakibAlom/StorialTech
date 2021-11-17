<?php

namespace App\Models\Source;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class PreemiumFree extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','title','slug','category_id','type','delete_time','body','status','views','created_at','updated_at'
    ];

    public function prefreecategory()
    {
        return $this->belongsTo('App\Models\Category\CategoryPrefree','category_id');
    }

    public function path()
    {
        return route('show.source', $this->slug);
    }

    public function fb()
    {
        return url("https://www.facebook.com/sharer.php?u=" . route('show.source', $this->slug));
    }

    public function twitter()
    {
        return url("https://twitter.com/intent/tweet?url=" . route('show.source', $this->slug));
    }

    public function pin()
    {
        return url("https://www.pinterest.com/pin/create/button/?url=" . route('show.source', $this->slug));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPrefree extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','slug','status','snumber','views'
    ];

    public function prefree()
    {
        return $this->hasMany('App\Models\Source\PreemiumFree', 'category_id');
    }

    public function path()
    {
        return route('category.source', $this->slug );
    }
}

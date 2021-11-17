<?php

namespace App\Models\Tutorial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorialCategory extends Model
{
    use HasFactory;

    public function categorytutorial()
    {
        return $this->belongsTo('App\Models\Category\CategoryTutorial', 'category_id');
    }

    public function tutorial()
    {
        return $this->belongsTo('App\Models\Tutorial\Tutorial');
    }
}

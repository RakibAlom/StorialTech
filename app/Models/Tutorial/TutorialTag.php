<?php

namespace App\Models\Tutorial;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorialTag extends Model
{
    use HasFactory;

    public function categorytutorial()
    {
        return $this->belongsTo('App\Models\Category\CategoryTutorial', 'category_id');
    }

    public function tagtutorial()
    {
        return $this->belongsTo('App\Models\Tag\TagTutorial', 'tag_id');
    }

    public function tutorial()
    {
        return $this->belongsTo('App\Models\Tutorial\Tutorial', 'tutorial_id');
    }
}

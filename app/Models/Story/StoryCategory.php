<?php

namespace App\Models\Story;

use App\Models\Category\CategoryStory;
use App\Models\Story\Story;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryCategory extends Model
{
    use HasFactory;

    public function categorystory()
    {
        return $this->belongsTo('App\Models\Category\CategoryStory', 'category_id');
    }

    public function story()
    {
        return $this->belongsTo('App\Models\Story\Story', 'story_id');
    }
}

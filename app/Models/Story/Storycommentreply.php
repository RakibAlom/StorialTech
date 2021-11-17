<?php

namespace App\Models\Story;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Story\Story;
use App\Models\Story\Storycomment;

class Storycommentreply extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id','story_id','user_id','message'
    ];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->belongsTo('App\Models\Story\Storycomment','comment_id');
    }
}

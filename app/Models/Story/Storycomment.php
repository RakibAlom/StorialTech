<?php

namespace App\Models\Story;

use App\Models\User;
use App\Models\Story\Story;
use App\Models\Story\Storycommentreply;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storycomment extends Model
{
    use HasFactory;

    protected $fillable = [
        'story_id','user_id','message'
    ];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function commentreply()
    {
        return $this->hasMany('App\Models\Story\Storycommentreply', 'comment_id');
    }
    
}

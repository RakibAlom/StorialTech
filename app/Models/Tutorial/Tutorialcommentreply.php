<?php

namespace App\Models\Tutorial;

use App\Models\User;
use App\Models\Tutorial\Tutorial;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorialcommentreply extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_id','tutorial_id','user_id','message'
    ];

    public function tutorial()
    {
        return $this->belongsTo(Tutorial::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->belongsTo('App\Models\Tutorial\Tutorialcomment','comment_id');
    }
}

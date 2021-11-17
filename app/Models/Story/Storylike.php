<?php

namespace App\Models\Story;

use App\Models\User;
use App\Models\Story\Story;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storylike extends Model
{
    use HasFactory;

    protected $fillable = [
        'story_id', 'user_id', 'status'
    ];

    public function story()
    {
        return $this->belongsTo(Story::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

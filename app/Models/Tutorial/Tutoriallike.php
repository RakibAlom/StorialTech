<?php

namespace App\Models\Tutorial;

use App\Models\User;
use App\Models\Tutorial\Tutorial;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutoriallike extends Model
{
    use HasFactory;

    protected $fillable = [
        'tutorial_id', 'user_id', 'status'
    ];

    public function tutorial()
    {
        return $this->belongsTo(Tutorial::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

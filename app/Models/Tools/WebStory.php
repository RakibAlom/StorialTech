<?php

namespace App\Models\Tools;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'image', 'image_link', 'embed_code', 'user_id', 'status'
    ];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    public function path ()
    {
        return route('show.webstory', $this->slug);
    }
}

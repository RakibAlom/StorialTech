<?php

namespace App\Models\Custom;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatformControl extends Model
{
    use HasFactory;

    protected $fillable = [
        'story_status', 'tutorial_status', 'pdf_status', 'template_status', 'movie_status', 'blog_status', 'source_status', 'youtube_status', 'backlinks_status', 'tools_status', 'web_stories_status'
    ];
}

<?php

namespace App\Models\Seo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoTutorial extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','description','keywords','cover_image','sp_title_plus'
    ];
}

<?php

namespace App\Models\Tools;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BacklinkPageDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','meta_title','slogan','description','keywords','cover_image','views'
    ];
}

<?php

namespace App\Models\Ads;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_top_banner_ads', 'section_bottom_banner_ads', 'single_post_top_ads', 'single_post_bottom_ads', 'sidebar_top_ads', 'sidebar_bottom_ads'
    ];
}

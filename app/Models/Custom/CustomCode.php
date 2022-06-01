<?php

namespace App\Models\Custom;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'header_custom_code', 'header_custom_css', 'footer_custom_code', 'footer_custom_js'
    ];
}

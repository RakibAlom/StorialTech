<?php

namespace App\Models\Template;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Templatedownload extends Model
{
    use HasFactory;

    public function template()
    {
        return $this->belongsTo('App\Models\Template\Template', 'template_id');
    }
    
}

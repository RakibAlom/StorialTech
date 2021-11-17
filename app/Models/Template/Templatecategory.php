<?php

namespace App\Models\Template;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Templatecategory extends Model
{
    use HasFactory;

    public function categorytemplate()
    {
        return $this->belongsTo('App\Models\Category\CategoryTemplate', 'category_id');
    }

    public function template()
    {
        return $this->belongsTo('App\Models\Template\Template', 'template_id');
    }
}

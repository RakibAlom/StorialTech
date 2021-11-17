<?php

namespace App\Models\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPdf extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','slug','status','snumber','views'
    ];

    public function pdf()
    {
        return $this->belongsToMany('App\Models\Pdf\Pdf','pdfcategories','category_id','pdf_id');
    }

    public function pdfcategory()
    {
        return $this->hasMany('App\Models\Pdf\Pdfcategory', 'category_id');
    }

    public function path()
    {
        return route('category.pdf', $this->slug );
    }
}

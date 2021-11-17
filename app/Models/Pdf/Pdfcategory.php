<?php

namespace App\Models\Pdf;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdfcategory extends Model
{
    use HasFactory;

    public function categorypdf()
    {
        return $this->belongsTo('App\Models\Category\CategoryPdf', 'category_id');
    }

    public function pdf()
    {
        return $this->belongsTo('App\Models\Pdf\Pdf', 'pdf_id');
    }
}

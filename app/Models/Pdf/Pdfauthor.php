<?php

namespace App\Models\Pdf;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdfauthor extends Model
{
    use HasFactory;

    public function authorpdf()
    {
        return $this->belongsTo('App\Models\Author\AuthorPdf', 'author_id');
    }

    public function pdf()
    {
        return $this->belongsTo('App\Models\Pdf\Pdf', 'pdf_id');
    }
}

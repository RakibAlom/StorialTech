<?php

namespace App\Models\Pdf;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdfdownload extends Model
{
    use HasFactory;

    protected $fillable = [
        'pdf_id', 'link'
    ];

    public function pdf()
    {
        return $this->belongsTo('App\Models\Pdf\Pdf', 'pdf_id');
    }
}

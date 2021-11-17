<?php

namespace App\Models\Pdf;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdfseries extends Model
{
    use HasFactory;

    protected $fillable = [
        'series_id', 'pdf_id'
    ];

    public function seriespdf()
    {
        return $this->belongsTo('App\Models\Series\SeriesPdf', 'series_id');
    }

    public function pdf()
    {
        return $this->belongsTo('App\Models\Pdf\Pdf', 'pdf_id');
    }
}

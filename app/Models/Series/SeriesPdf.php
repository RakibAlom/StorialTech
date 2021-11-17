<?php

namespace App\Models\Series;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeriesPdf extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','slug','status','snumber','views'
    ];

    public function pdf()
    {
        return $this->belongsToMany('App\Models\Pdf\Pdf', 'pdfseries','series_id','pdf_id');
    }

    public function pdfseries()
    {
        return $this->hasMany('App\Models\Pdf\Pdfseries', 'series_id');
    }

    public function path()
    {
        return route('series.pdf', $this->slug );
    }
}

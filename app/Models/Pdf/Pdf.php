<?php

namespace App\Models\Pdf;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Pdf extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','title','slug','name','review','translated','publisher','published','pages','size','date','month','year','image','file','keywords','views','status','created_at','updated_at'
    ];

    public function categorypdf()
    {
        return $this->belongsToMany('App\Models\Category\CategoryPdf','pdfcategories','pdf_id','category_id');
    }

    public function seriespdf()
    {
        return $this->belongsToMany('App\Models\Series\SeriesPdf','pdfseries','pdf_id','series_id');
    }

    public function authorpdf()
    {
        return $this->belongsToMany('App\Models\Author\AuthorPdf','pdfauthors','pdf_id','author_id');
    }

    public function category()
    {
        return $this->hasMany('App\Models\Pdf\Pdfcategory');
    }

    public function author()
    {
        return $this->hasMany('App\Models\Pdf\Pdfauthor');
    }

    public function series()
    {
        return $this->hasMany('App\Models\Pdf\Pdfseries');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function download()
    {
        return $this->hasMany('App\Models\Pdf\Pdfdownload');
    }

    public function path()
    {
        return route('show.pdf', $this->slug );
    }

    public function fb()
    {
        return url("https://www.facebook.com/sharer.php?u=" . route('show.pdf', $this->slug));
    }

    public function twitter()
    {
        return url("https://twitter.com/intent/tweet?url=" . route('show.pdf', $this->slug));
    }

    public function pin()
    {
        return url("https://www.pinterest.com/pin/create/button/?url=" . route('show.pdf', $this->slug));
    }

}

<?php

namespace App\Models\Author;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorPdf extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','slug','status','snumber','views'
    ];

    public function pdf()
    {
        return $this->belongsToMany('App\Models\Pdf\Pdf', 'pdfauthors','author_id','pdf_id');
    }

    public function pdfauthor()
    {
        return $this->hasMany('App\Models\Pdf\Pdfauthor', 'author_id');
    }

    public function path()
    {
        return route('author.pdf', $this->slug );
    }
}

<?php

namespace App\Models\Tools;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BacklinkList extends Model
{
    use HasFactory;

    protected $fillable = [
        'authority_site','tld','link_type','dr','website_link','status'
    ];
}

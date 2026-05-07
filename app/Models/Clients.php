<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $fillable = [
        'cover_image',
        'title',
        'slug',
        'link',
        'publish_status',

        'meta_title',
        'meta_keywords',
        'meta_description',
        'og_image',
    ];
}






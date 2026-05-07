<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogAuthors extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'name',
        'facebook',
        'instagram',
        'twitter',
        'whatsapp',
        'phone',
        'address',
        'email',
        'slug',
        'description',
        'publish_status',
    ];
    public function blogs()
    {
        return $this->hasMany(Blog::class,'blog_authors');
    }
}

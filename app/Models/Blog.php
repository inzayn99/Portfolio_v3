<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'cover_image',
        'title',
        'color',
        'slug',
        'description',
        'banner_image',
        'blog_category',
        // 'blog_authors',
        'blog_type',
        'page_visit',
        'publish_status',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'og_image',
        'posted_by'
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class,'blog_category');
    }

    // public function authors()
    // {
    //     return $this->belongsTo(BlogCategory::class,'blog_athors');
    // }

    public function scopeStatus($query)
    {
        return $query->where('publish_status',1);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class,'post_id');
    }
    public function scopeBlog($query)
    {
        return $query->where('blog_type','like','%Blog%')->latest();
    }
    public function scopeNews($query)
    {
        return $query->where('blog_type','like','%News%')->latest();
    }
    public function scopeNotice($query)
    {
        return $query->where('blog_type','like','%Notice%')->latest();
    }
}

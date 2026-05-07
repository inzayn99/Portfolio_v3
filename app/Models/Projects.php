<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $fillable = [
        'cover_image',
        'banner_image',
        'title',
        'link',
        'github_link',
        'year',
        'made_at',
        'slug',
        'description',
        'publish_status',
        'shown_on_main',
        'shown_on_gallery',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'og_image',
    ];

    public function programmingLanguages()
    {
        return $this->belongsToMany(ProgrammingLanguage::class, 'project_programming_language', 'project_id', 'programming_language_id');
    }

    // Accessor to get built_with as array (for backward compatibility if needed)
    public function getBuiltWithAttribute()
    {
        return $this->programmingLanguages->pluck('id')->toArray();
    }
}

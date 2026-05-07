<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgrammingLanguage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'publish_status',
    ];

    public function projects()
    {
        return $this->belongsToMany(Projects::class, 'project_programming_language', 'programming_language_id', 'project_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Resume extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'resume_text',
        'resume_file_path',
    ];

    public function reactions(): HasMany
    {
        return $this->hasMany(ResumeReaction::class);
    }

}

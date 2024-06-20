<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'website',
        'address',
        'phone',
    ];

    public function resumeReactions(): HasMany
    {
        return $this->hasMany(ResumeReaction::class);
    }
}

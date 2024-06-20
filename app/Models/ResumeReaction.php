<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResumeReaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'resume_id',
        'company_id',
        'is_positive',
        'sent_at',
    ];

    protected $dates = [
        'sent_at',
    ];

    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

}

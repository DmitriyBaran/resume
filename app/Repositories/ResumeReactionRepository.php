<?php

namespace App\Repositories;

use App\Models\ResumeReaction;

class ResumeReactionRepository
{
    public function getAll(): \Illuminate\Database\Eloquent\Collection|array
    {
        return ResumeReaction::with('resume', 'company')->get();
    }

    public function create(array $data)
    {
        return ResumeReaction::create($data);
    }

    public function update(ResumeReaction $resumeReaction, array $data): bool
    {
        return $resumeReaction->update($data);
    }

    public function delete(ResumeReaction $resumeReaction): ?bool
    {
        return $resumeReaction->delete();
    }
}

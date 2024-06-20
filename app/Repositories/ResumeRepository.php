<?php

namespace App\Repositories;

use App\Models\Resume;

class ResumeRepository
{
    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return Resume::all();
    }

    public function create(array $data): Resume
    {
        $resume = new Resume();
        $resume->job_title = $data['job_title'];
        $resume->resume_text = $data['resume_text'];

        if (isset($data['resume_file'])) {
            $path = $data['resume_file']->store('resumes', 'public');
            $resume->resume_file_path = $path;
        }

        $resume->save();

        return $resume;
    }

    public function update(Resume $resume, array $data): Resume
    {
        $resume->job_title = $data['job_title'];
        $resume->resume_text = $data['resume_text'];

        if (isset($data['resume_file'])) {
            $path = $data['resume_file']->store('resumes', 'public');
            $resume->resume_file_path = $path;
        }

        $resume->save();

        return $resume;
    }

    public function delete(Resume $resume): ?bool
    {
        return $resume->delete();
    }

    public function getTopResume()
    {
        return Resume::withCount(['reactions' => function ($query) {
            $query->where('is_positive', true);
        }])->orderBy('reactions_count', 'desc')->first();
    }
}

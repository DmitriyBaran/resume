<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Http\Requests\StoreResumeRequest;
use App\Http\Requests\UpdateResumeRequest;
use App\Repositories\ResumeRepository;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ResumeController extends Controller
{
    protected ResumeRepository $resumeRepository;

    public function __construct(ResumeRepository $resumeRepository)
    {
        $this->resumeRepository = $resumeRepository;
    }

    public function index(): View
    {
        $resumes = $this->resumeRepository->getAll();
        return view('resumes.index', compact('resumes'));
    }

    public function create(): View
    {
        return view('resumes.create');
    }

    public function store(StoreResumeRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $this->resumeRepository->create($data);

        return redirect()->route('resumes.index')->with('success', 'Resume created successfully.');
    }

    public function show(Resume $resume): View
    {
        return view('resumes.show', compact('resume'));
    }

    public function edit(Resume $resume): View
    {
        return view('resumes.edit', compact('resume'));
    }

    public function update(UpdateResumeRequest $request, Resume $resume): RedirectResponse
    {
        $data = $request->validated();

        $this->resumeRepository->update($resume, $data);

        return redirect()->route('resumes.index')->with('success', 'Resume updated successfully.');
    }

    public function destroy(Resume $resume): RedirectResponse
    {
        $this->resumeRepository->delete($resume);

        return redirect()->route('resumes.index')->with('success', 'Resume deleted successfully.');
    }

    public function statistics(): View
    {
        $topResume = $this->resumeRepository->getTopResume();

        return view('resumes.statistics', compact('topResume'));
    }
}

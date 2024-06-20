<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResumeReactionRequest;
use App\Http\Requests\UpdateResumeReactionRequest;
use App\Models\Company;
use App\Models\Resume;
use App\Models\ResumeReaction;
use App\Repositories\ResumeReactionRepository;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ResumeReactionController extends Controller
{
    protected ResumeReactionRepository $resumeReactionRepository;

    public function __construct(ResumeReactionRepository $resumeReactionRepository)
    {
        $this->resumeReactionRepository = $resumeReactionRepository;
    }

    public function index(): View
    {
        $reactions = $this->resumeReactionRepository->getAll();
        return view('resume_reactions.index', compact('reactions'));
    }

    public function create(): View
    {
        $resumes = Resume::all();
        $companies = Company::all();
        return view('resume_reactions.create', compact('resumes', 'companies'));
    }

    public function store(StoreResumeReactionRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->resumeReactionRepository->create($data);
        return redirect()->route('resume-reactions.index')->with('success', 'Resume reaction recorded successfully.');
    }

    public function show(ResumeReaction $resumeReaction): View
    {
        return view('resume_reactions.show', compact('resumeReaction'));
    }

    public function edit(ResumeReaction $resumeReaction): View
    {
        $companies = Company::all();
        return view('resume_reactions.edit', compact('resumeReaction', 'companies'));
    }

    public function update(UpdateResumeReactionRequest $request, ResumeReaction $resumeReaction): RedirectResponse
    {
        $data = $request->validated();
        $data['sent_at'] = $resumeReaction->sent_at;

        $this->resumeReactionRepository->update($resumeReaction, $data);
        return redirect()->route('resume-reactions.index')->with('success', 'Resume reaction updated successfully.');
    }

    public function destroy(ResumeReaction $resumeReaction): RedirectResponse
    {
        $this->resumeReactionRepository->delete($resumeReaction);
        return redirect()->route('resume-reactions.index')->with('success', 'Resume reaction deleted successfully.');
    }
}

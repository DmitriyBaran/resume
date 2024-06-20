@extends('layouts.app')

@section('content')
    <h1>Resume Statistics</h1>
    @if ($topResume)
        <div class="grid-item">
            <h2>Top Resume</h2>
            <p>Job Title: {{ $topResume->job_title }}</p>
            <p>Positive Reactions: {{ $topResume->reactions_count }}</p>
        </div>
    @else
        <p>No resume has positive reactions yet.</p>
    @endif
@endsection

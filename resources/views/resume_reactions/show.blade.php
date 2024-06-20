@extends('layouts.app')

@section('content')
    <h1>Resume Reaction Details</h1>
    <div>
        <h2>{{ $resumeReaction->resume->job_title }} at {{ $resumeReaction->company->name }}</h2>
        <p>Positive Reaction: {{ $resumeReaction->is_positive ? 'Yes' : 'No' }}</p>
        <p>Sent At: {{ $resumeReaction->sent_at }}</p>
    </div>
    <a href="{{ route('resume-reactions.edit', $resumeReaction) }}">Edit</a>
    <form action="{{ route('resume-reactions.destroy', $resumeReaction) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('resume-reactions.index') }}">Back to Reactions List</a>
@endsection

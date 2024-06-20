@extends('layouts.app')

@section('content')
    <h1>Resume Reactions</h1>
    <a href="{{ route('resume-reactions.create') }}">Record New Reaction</a>
    <div class="grid-container">
        @foreach ($reactions as $reaction)
            <div class="grid-item">
                <h2>{{ $reaction->resume->job_title }} at {{ $reaction->company->name }}</h2>
                <p>Positive Reaction: {{ $reaction->is_positive ? 'Yes' : 'No' }}</p>
                <p>Sent At: {{ $reaction->sent_at }}</p>
                <a href="{{ route('resume-reactions.show', $reaction) }}">View</a>
                <a href="{{ route('resume-reactions.edit', $reaction) }}">Edit</a>
                <form action="{{ route('resume-reactions.destroy', $reaction) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection

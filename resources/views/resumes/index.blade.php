@extends('layouts.app')

@section('content')
    <h1>Resumes</h1>
    <a href="{{ route('resumes.create') }}">Create New Resume</a>
    <ul>
        @foreach ($resumes as $resume)
            <li>
                <a href="{{ route('resumes.show', $resume) }}">{{ $resume->job_title }}</a>
                <form action="{{ route('resumes.destroy', $resume) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection

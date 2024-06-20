@extends('layouts.app')

@section('content')
    <h1>{{ $resume->job_title }}</h1>
    <p>{{ $resume->resume_text }}</p>
    @if ($resume->resume_file_path)
        <a href="{{ asset('storage/' . $resume->resume_file_path) }}" target="_blank">Download Resume</a>
    @endif
    <a href="{{ route('resumes.edit', $resume) }}">Edit</a>
@endsection

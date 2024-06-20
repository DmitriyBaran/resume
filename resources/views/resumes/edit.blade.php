@extends('layouts.app')

@section('content')
    <h1>Edit Resume</h1>
    <form action="{{ route('resumes.update', $resume) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="job_title">Job Title:</label>
        <input type="text" name="job_title" id="job_title" value="{{ $resume->job_title }}" required>
        <label for="resume_text">Resume Text:</label>
        <textarea name="resume_text" id="resume_text">{{ $resume->resume_text }}</textarea>
        <label for="resume_file">Resume File:</label>
        <input type="file" name="resume_file" id="resume_file">
        <button type="submit">Update</button>
    </form>
@endsection

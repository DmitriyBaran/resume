@extends('layouts.app')

@section('content')
    <h1>Create Resume</h1>
    <form action="{{ route('resumes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="job_title">Job Title:</label>
        <input type="text" name="job_title" id="job_title" required>
        <label for="resume_text">Resume Text:</label>
        <textarea name="resume_text" id="resume_text"></textarea>
        <label for="resume_file">Resume File:</label>
        <input type="file" name="resume_file" id="resume_file">
        <button type="submit">Create</button>
    </form>
@endsection

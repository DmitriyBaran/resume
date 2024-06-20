@extends('layouts.app')

@section('content')
    <h1>Record New Reaction</h1>
    <form action="{{ route('resume-reactions.store') }}" method="POST">
        @csrf
        <label for="resume_id">Resume</label>
        <select name="resume_id" id="resume_id" required>
            @foreach ($resumes as $resume)
                <option value="{{ $resume->id }}">{{ $resume->job_title }}</option>
            @endforeach
        </select>

        <label for="company_id">Company</label>
        <select name="company_id" id="company_id" required>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>

        <label for="is_positive">Positive Reaction</label>
        <select name="is_positive" id="is_positive" required>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>

        <label for="sent_at">Sent At</label>
        <input type="datetime-local" name="sent_at" id="sent_at" required>

        <button type="submit">Record Reaction</button>
    </form>
@endsection

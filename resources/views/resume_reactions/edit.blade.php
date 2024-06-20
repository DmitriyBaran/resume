@extends('layouts.app')
@section('content')
    <h1>Edit Reaction</h1>
    <form action="{{ route('resume-reactions.update', $resumeReaction) }}" method="POST">
        @csrf
        @method('PUT')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label for="resume_id">Resume</label>
        <p>{{ $resumeReaction->resume->job_title }}</p>


        <label for="company_id">Company</label>
        <select name="company_id" id="company_id" required>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}" {{ $company->id == $resumeReaction->company_id ? 'selected' : '' }}>{{ $company->name }}</option>
            @endforeach
        </select>

        <label for="is_positive">Positive Reaction</label>
        <select name="is_positive" id="is_positive" required>
            <option value="1" {{ $resumeReaction->is_positive ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ !$resumeReaction->is_positive ? 'selected' : '' }}>No</option>
        </select>

        <input type="hidden" name="sent_at" id="sent_at" value="{{ now()->format('Y-m-d\TH:i') }}">


        <button type="submit">Update Reaction</button>
    </form>
    <a href="{{ route('resume-reactions.index') }}">Back to Reactions List</a>
@endsection

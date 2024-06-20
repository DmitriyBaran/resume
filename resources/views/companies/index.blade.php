@extends('layouts.app')

@section('content')
    <h1>Companies</h1>
    <a href="{{ route('companies.create') }}">Create New Company</a>
    <ul>
        @foreach ($companies as $company)
            <li>
                <a href="{{ route('companies.show', $company) }}">{{ $company->name }}</a>
                <form action="{{ route('companies.destroy', $company) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection

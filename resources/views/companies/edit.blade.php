@extends('layouts.app')

@section('content')
    <h1>Edit Company</h1>
    <form action="{{ route('companies.update', $company) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $company->name }}" required>
        <label for="website">Website:</label>
        <input type="text" name="website" id="website" value="{{ $company->website }}">
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" value="{{ $company->address }}">
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="{{ $company->phone }}">
        <button type="submit">Update</button>
    </form>
@endsection

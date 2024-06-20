@extends('layouts.app')

@section('content')
    <h1>Create Company</h1>
    <form action="{{ route('companies.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <label for="website">Website:</label>
        <input type="text" name="website" id="website">
        <label for="address">Address:</label>
        <input type="text" name="address" id="address">
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone">
        <button type="submit">Create</button>
    </form>
@endsection

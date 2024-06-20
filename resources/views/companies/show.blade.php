@extends('layouts.app')

@section('content')
    <h1>{{ $company->name }}</h1>
    <p>Website: {{ $company->website }}</p>
    <p>Address: {{ $company->address }}</p>
    <p>Phone: {{ $company->phone }}</p>
    <a href="{{ route('companies.edit', $company) }}">Edit</a>
@endsection

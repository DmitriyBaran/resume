<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<nav>
    <ul>
        <li><a href="{{ route('companies.index') }}">Companies</a></li>
        <li><a href="{{ route('resumes.index') }}">Resumes</a></li>
        <li><a href="{{ route('resume-reactions.index') }}">Reactions</a></li>
        <li><a href="{{ route('resumes.statistics') }}">Statistics</a></li>
    </ul>
</nav>
<div class="container">
    @yield('content')
</div>
</body>
</html>

@extends('layouts.app')

@section('content')
<h1>{{ $job->title }}</h1>
<p>{{ $job->description }}</p>
<p>Skills: {{ $job->required_skills }}</p>
<p>Location: {{ $job->location }}</p>
<p>Salary: ${{ $job->salary }}</p>
<p>Experience Level: {{ $job->experience_level }}</p>
@endsection

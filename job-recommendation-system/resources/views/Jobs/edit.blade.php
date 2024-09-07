@extends('layouts.app')

@section('content')
<h1>Edit Job Listing</h1>
<form action="{{ route('jobs.update', $job->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ $job->title }}" required>
    </div>
    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description" required>{{ $job->description }}</textarea>
    </div>
    <div>
        <label for="required_skills">Required Skills</label>
        <textarea id="required_skills" name="required_skills" required>{{ $job->required_skills }}</textarea>
    </div>
    <div>
        <label for="location">Location</label>
        <input type="text" id="location" name="location" value="{{ $job->location }}" required>
    </div>
    <div>
        <label for="salary">Salary</label>
        <input type="number" id="salary" name="salary" value="{{ $job->salary }}" step="0.01" required>
    </div>
    <div>
        <label for="experience_level">Experience Level</label>
        <input type="text" id="experience_level" name="experience_level" value="{{ $job->experience_level }}" required>
    </div>
    <button type="submit">Update Job Listing</button>
</form>
@endsection

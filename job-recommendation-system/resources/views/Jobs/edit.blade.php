@extends('layouts.app')

@section('content')
<h1>Create Job Listing</h1>
<form action="{{ route('jobs.store') }}" method="POST">
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" id="title" name="title" required>
    </div>
    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description" required></textarea>
    </div>
    <div>
        <label for="required_skills">Required Skills</label>
        <textarea id="required_skills" name="required_skills" required></textarea>
    </div>
    <div>
        <label for="location">Location</label>
        <input type="text" id="location" name="location" required>
    </div>
    <div>
        <label for="salary">Salary</label>
        <input type="number" id="salary" name="salary" step="0.01" required>
    </div>
    <div>
        <label for="experience_level">Experience Level</label>
        <input type="text" id="experience_level" name="experience_level" required>
    </div>
    <button type="submit">Create Job Listing</button>
</form>
@endsection

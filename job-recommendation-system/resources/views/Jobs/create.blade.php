@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Job Listing</h1>

    <form action="{{ route('jobs.store') }}" method="POST">
        @csrf

        <!-- Title -->
        <div class="form-group">
            <label for="title">Job Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Other fields here -->

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Create Job</button>
    </form>
</div>
@endsection

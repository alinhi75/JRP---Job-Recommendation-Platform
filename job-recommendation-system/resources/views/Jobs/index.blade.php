@extends('layouts.app')

@section('content')
    <h1>Job Listings</h1>
    <ul>
        @foreach ($jobs as $job)
            <li>
                <a href="{{ route('jobs.show', $job) }}">{{ $job->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection

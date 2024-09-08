<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        // Validate and store the job listing
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        // Validate and update the job listing
    }

    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index');
    }

    public function fetchJobs()
    {
        $apiKey = env('INDEED_API_KEY');
        $response = Http::get('http://api.indeed.com/ads/apisearch', [
            'q' => 'software engineer',
            'l' => 'San Francisco',
            'userip' => request()->ip(),
            'useragent' => request()->userAgent(),
            'format' => 'json',
            'v' => '2',
            'limit' => 10,
            'apiKey' => $apiKey,
        ]);

        return response()->json($response->json());
    }
}

<?php
namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'required_skills' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'experience_level' => 'required|string|max:255',
        ]);

        $jobListing = new JobListing();
        $jobListing->user_id = auth()->id(); // Assuming the user is an employer
        $jobListing->title = $request->title;
        $jobListing->description = $request->description;
        $jobListing->required_skills = $request->required_skills;
        $jobListing->location = $request->location;
        $jobListing->salary = $request->salary;
        $jobListing->experience_level = $request->experience_level;
        $jobListing->save();

        return redirect()->route('jobs.index')->with('success', 'Job listing created successfully.');
    }

    public function show(JobListing $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function edit(JobListing $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, JobListing $job)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'required_skills' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric',
            'experience_level' => 'required|string|max:255',
        ]);

        $job->title = $request->title;
        $job->description = $request->description;
        $job->required_skills = $request->required_skills;
        $job->location = $request->location;
        $job->salary = $request->salary;
        $job->experience_level = $request->experience_level;
        $job->save();

        return redirect()->route('jobs.index')->with('success', 'Job listing updated successfully.');
    }

    public function destroy(JobListing $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job listing deleted successfully.');
    }
}

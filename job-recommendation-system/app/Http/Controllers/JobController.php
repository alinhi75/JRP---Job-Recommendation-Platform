<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|numeric',
            'experience_level' => 'nullable|string|max:255',
        ]);

        $job = Job::create($validatedData);

        return response()->json(['message' => 'Job created successfully!', 'job' => $job], 201);
    }
}

<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\JobRecommendation;  // Your Eloquent model for job recommendations

class JobRecommendationController extends Controller
{
    public function getRecommendations(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'resume' => 'required|string',
            'skills' => 'required|array',
        ]);

        // Define the Python API URL
        $pythonApiUrl = 'http://127.0.0.1:5000/api/recommend-jobs';

        // Send profile data to Python service
        $response = Http::post($pythonApiUrl, $validatedData);

        if ($response->successful()) {
            $recommendedJobs = $response->json()['recommended_jobs'];  // Get the list of jobs from Python

            // Store recommendations in the database
            foreach ($recommendedJobs as $job) {
                JobRecommendation::create([
                    'user_id' => $validatedData['user_id'],
                    'job_id' => $job['job_id'] ?? null,  // If you store job listings separately
                    'job_title' => $job['title'],
                    'company' => $job['company'],
                    'location' => $job['location'] ?? null,
                    'match_score' => $job['match_score'],
                ]);
            }

            return response()->json([
                'message' => 'Recommendations fetched and stored successfully!',
                'recommended_jobs' => $recommendedJobs,
            ], 200);
        }

        return response()->json(['message' => 'Failed to get recommendations'], 500);
    }
}

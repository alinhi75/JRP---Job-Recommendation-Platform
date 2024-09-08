<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{
    /**
     * Send user profile data to the Python API.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendProfileData(Request $request)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'user_id' => 'required|integer',
        'resume' => 'required|string',
        'skills' => 'required|array',
    ]);

    // Define the URL of the Python service
    $pythonApiUrl = 'http://127.0.0.1:5000/api/recommend-jobs';

    // Force JSON encoding on Laravel's side
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
    ])->post($pythonApiUrl, json_encode($validatedData));

    // Check the response status and return the appropriate response
    if ($response->successful()) {
        return response()->json(['message' => 'Profile data sent successfully!', 'data' => $response->json()], 200);
    }

    return response()->json(['message' => 'Failed to send profile data.'], $response->status());
}


}

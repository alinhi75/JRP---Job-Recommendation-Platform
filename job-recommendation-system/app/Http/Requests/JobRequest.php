<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Set this to true if you want all users to be able to make this request
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'required_skills' => 'nullable|string',
            'location' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
            'experience_level' => 'required|string|in:beginner,intermediate,advanced',
        ];
    }

    /**
     * Get custom attribute names for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'job title',
            'description' => 'job description',
            'required_skills' => 'required skills',
            'location' => 'job location',
            'salary' => 'salary',
            'experience_level' => 'experience level',
        ];
    }
}

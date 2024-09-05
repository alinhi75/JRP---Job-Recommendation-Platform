
# AI-Powered Job Recommendation System

## Overview
This platform recommends jobs based on a user�s profile, skill set, and experience using machine learning. 
Users can create profiles, upload resumes, and get personalized job matches.

## Technology Stack
- **Laravel**: Backend API to manage user accounts, job listings, and communication with the AI engine.
- **Python**: Machine learning models to analyze job descriptions and resumes, powered by NLP libraries.
- **JavaScript (Vue.js/React)**: Frontend with dynamic dashboards and job recommendation display.

## Features
- User authentication and profile management.
- Job listing CRUD operations for employers.
- AI-driven job recommendations using NLP and ML algorithms.
- Interactive job recommendation dashboard with real-time updates.

## How It Works
1. Users create profiles and upload their resumes.
2. The backend sends the profile and resume data to the Python ML engine.
3. The ML engine returns top job recommendations based on the user�s skills and work experience.
4. Jobs are displayed on the frontend with real-time filtering options.

## Installation
1. Clone the repository: `git clone https://github.com/yourusername/AI-Job-Recommendation-System.git`
2. Install Laravel dependencies: `composer install`
3. Install frontend dependencies: `npm install`
4. Set up the environment variables in `.env`.
5. Run migrations: `php artisan migrate`
6. Start the development server: `php artisan serve`

## Python Setup
1. Navigate to the `ai-engine` folder.
2. Create a virtual environment: `python -m venv venv`
3. Activate the virtual environment: `source venv/bin/activate`
4. Install dependencies: `pip install -r requirements.txt`
5. Start the Flask API: `python app.py`

## Deployment
- **Backend**: Deploy the Laravel API using AWS, Heroku, or DigitalOcean.
- **Python Service**: Deploy the Flask/FastAPI service using Heroku or AWS Lambda.
- **Frontend**: Host the React/Vue.js frontend on platforms like Vercel or Netlify.

## License
This project is open-source and licensed under the MIT License.

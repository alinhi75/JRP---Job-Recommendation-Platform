from flask import Flask, request, jsonify

app = Flask(__name__)

# Route to handle incoming profile data
@app.route('/api/recommend-jobs', methods=['POST'])
def recommend_jobs():
    # Check if the request is JSON
    if not request.is_json:
        return jsonify({"error": "Unsupported Media Type, expecting JSON"}), 415

    # Get the JSON data from the request
    data = request.get_json()

    # Process the data (assuming recommendation logic happens here)
    user_id = data.get('user_id')
    resume = data.get('resume')
    skills = data.get('skills')

    recommended_jobs = [
        {
            'job_id': 1,
            'title': 'Python Developer',
            'company': 'TechCorp',
            'location': 'Remote',
            'match_score': 85
        }
    ]

    return jsonify({
        'message': 'Jobs recommended successfully!',
        'user_id': user_id,
        'recommended_jobs': recommended_jobs
    })
    
    print(request.headers)
    print(request.get_data())

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000, debug=True)

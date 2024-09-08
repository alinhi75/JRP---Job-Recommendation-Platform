import requests
from bs4 import BeautifulSoup

def fetch_job_listings():
    url = 'https://example-job-site.com'
    headers = {'User-Agent': 'Mozilla/5.0'}
    response = requests.get(url, headers=headers)
    soup = BeautifulSoup(response.text, 'html.parser')

    job_listings = []
    for job in soup.find_all('div', class_='job-listing'):
        title = job.find('h2').text
        location = job.find('span', class_='location').text
        description = job.find('p', class_='description').text
        salary = job.find('span', class_='salary').text if job.find('span', class_='salary') else None
        experience_level = job.find('span', class_='experience-level').text if job.find('span', class_='experience-level') else None
        
        job_listings.append({
            'title': title,
            'location': location,
            'description': description,
            'salary': salary,
            'experience_level': experience_level
        })

    return job_listings

def send_jobs_to_laravel(job_listings):
    laravel_api_url = 'http://localhost:8000/api/jobs'
    headers = {'Content-Type': 'application/json'}

    for job in job_listings:
        response = requests.post(laravel_api_url, json=job, headers=headers)
        if response.status_code == 201:
            print(f"Job '{job['title']}' stored successfully.")
        else:
            print(f"Failed to store job '{job['title']}': {response.text}")

if __name__ == '__main__':
    jobs = fetch_job_listings()
    send_jobs_to_laravel(jobs)

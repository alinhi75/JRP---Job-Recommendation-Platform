from selenium import webdriver
from selenium.webdriver.common.by import By

def fetch_job_listings():
    driver = webdriver.Chrome(executable_path='/path/to/chromedriver')
    driver.get('https://example-job-site.com')

    job_listings = []
    jobs = driver.find_elements(By.CLASS_NAME, 'job-listing')
    for job in jobs:
        title = job.find_element(By.TAG_NAME, 'h2').text
        location = job.find_element(By.CLASS_NAME, 'location').text
        description = job.find_element(By.CLASS_NAME, 'description').text
        job_listings.append({
            'title': title,
            'location': location,
            'description': description
        })

    driver.quit()
    return job_listings

if __name__ == '__main__':
    jobs = fetch_job_listings()
    print(jobs)

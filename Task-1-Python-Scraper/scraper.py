import requests
from bs4 import BeautifulSoup
import csv 

url = 'https://stackoverflow.com/questions/tagged/python'

csv_filename = 'stackoverflow_questions.csv'

csv_file = open(csv_filename, 'w', newline='', encoding='utf-8')

csv_writer = csv.writer(csv_file)
csv_writer.writerow(['Title', 'Description', 'Tags'])


print("Fetching webpage...")
response = requests.get(url)
print("Webpage fetched successfully.")

soup = BeautifulSoup(response.content, 'html.parser')

question_summaries = soup.find_all('div', class_='s-post-summary')

print(f"Found {len(question_summaries)} questions. Writing to {csv_filename}...")

for summary in question_summaries:
    title = summary.find('h3', class_='s-post-summary--content-title').a.text

    description_element = summary.find('div', class_='s-post-summary--content-excerpt')
    description = description_element.text.strip() if description_element else "No description found."

    tags_container = summary.find('div', class_='s-post-summary--meta-tags')
    tag_elements = tags_container.find_all('a', class_='post-tag')
    tags_list = [tag.text for tag in tag_elements]

    tags_string = ', '.join(tags_list)

    csv_writer.writerow([title, description, tags_string])

csv_file.close()

print(f"\nSuccess! All data has been saved to '{csv_filename}'.")
# Web Dev Assignment Submission- Purabh Singh

This repository contains the solutions for the web development assignment, which consists of two main tasks.

## Task 1: Python Web Scraper

This task involves a Python script that scrapes the Stack Overflow questions page for the 'python' tag.

### Features
- Extracts the question title, description, and associated tags.
- Saves the extracted data into a structured `stackoverflow_questions.csv` file.
- Uses the `requests` and `BeautifulSoup` libraries.

### How to Run
1. Ensure you have Python installed.
2. Install the required libraries: `pip install requests beautifulsoup4`
3. Run the script from the command line: `python scraper.py`
4. The output will be generated in the `stackoverflow_questions.csv` file.

---

## Task 2: PHP/MySQL CRUD Application

This is a full-stack web application for managing a simple task list.

### Features
- **Full CRUD Functionality:** Create, Read, Update, and Delete tasks.
- **User Authentication:** A secure login/logout system using PHP sessions.
- **Multi-Page Interface:** A clean, user-friendly interface split across multiple pages for better usability.
- **LAMP Stack:** Built using PHP for the backend, MySQL for the database, and hosted on an Apache server (via XAMPP).

### How to Set Up
1. You will need a local server environment like XAMPP or MAMP.
2. Place the `task-manager` folder inside your server's `htdocs` directory.
3. Using a tool like phpMyAdmin, create a database named `my_tasks`.
4. Run the SQL queries provided in the instructions to create the `tasks` and `users` tables.
5. Access the application in your browser at `http://localhost/task-manager/`.
6. Default login credentials are: **Username:** `admin`, **Password:** `password123`.

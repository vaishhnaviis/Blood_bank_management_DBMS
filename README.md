# Blood Donation Management System

## Overview

The Blood Donation Management System is a comprehensive web application designed to facilitate and manage blood donations. This application provides various features including user registration, profile management, blood donation requests, and administrative functionalities. It leverages PHP for server-side logic, HTML for the structure, CSS for styling, and JavaScript for interactive elements.

## Project Structure

The project is organized into the following structure:

- **Folders:**
  - `vaishhnaviis/`: Contains core project files and settings.
  - `Blood/`: Contains files related to blood donation functionalities.
  - `admin/`: Contains files related to the administrative panel.
  - `css/`: Contains stylesheet files for styling the application.
  - `fonts/`: Contains font files used in the project.
  - `function1/`: Contains additional function-related files.
  - `functions/`: Contains PHP functions used throughout the application.
  - `images/`: Contains images used in the project.
  - `js/`: Contains JavaScript files for client-side scripting.
  - `style/`: Contains additional stylesheet files.

## Installation

To set up the Blood Donation Management System on your local machine, follow these steps:

1. **Clone the Repository:**
   ```bash
   git clone <repository-url>

Set Up the Environment: Ensure you have a web server with PHP and a MySQL database installed. You can use tools like XAMPP, WAMP, or MAMP for this purpose.

Configure the Database:

Import the database schema from the provided SQL file (if available) into your MySQL database.
Open config.php and update it with your database connection details (hostname, username, password, and database name).
Run the Application:

Place the project files in the web server's root directory (e.g., htdocs in XAMPP).
Access the application via http://localhost/your-project-folder in your web browser.
Usage
User Features
Registration: Users can register by visiting register.php.
Login: Existing users can log in through login.php.
Profile Management: Users can view and update their profiles on profile.php.
Blood Donation Requests: Users can submit and track donation requests via request.php.
Admin Features
Manage Donations: Admins can manage blood donations through the admin panel files.
View Requests: Admins can view and process blood donation requests.
Contributing
We welcome contributions to this project! If you'd like to contribute, please follow these steps:

Fork the Repository: Create a personal copy of the repository on GitHub.
Create a Branch: Create a new branch for your changes.

git checkout -b feature/your-feature

Make Changes: Implement your changes and test them thoroughly.
Commit Changes: Commit your changes with a descriptive message.

git commit -m "Add feature: your feature description"

Push Changes: Push your changes to your forked repository.

git push origin feature/your-feature

Open a Pull Request: Go to the original repository and open a pull request from your branch.

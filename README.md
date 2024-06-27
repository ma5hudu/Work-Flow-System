# Work-Flow-System

## Description

This project is a web-based workflow system developed in PHP to capture customer information and visualize financial data. Users enter customer details and upload an Excel file with the customer's income and expenses for the last 12 months via simple HTML forms. The data is processed, stored in a MySQL database, and displayed as a temporal graph using CanvasJS.

## Technologies Used

- **PhpSpreadsheet**: A PHP library for reading and writing spreadsheet files.
- **CanvasJS**: A JavaScript library for creating interactive charts.
- **phpMyAdmin**: A web interface for managing MySQL databases.
- **MySQL**: A relational database management system.
- **HTML**: Markup language for creating the web pages.
- **CSS**: Stylesheet language for styling the web pages.
- **PHP**: The server-side scripting language used for the project.

## Requirements

- **PHP**: The server-side scripting language used for the project.
- **WampServer**: A Windows web development environment for Apache, MySQL, and PHP.
- **phpMyAdmin**: A web interface for managing MySQL databases.
- **MySQL**: A relational database management system.
- **Composer**: A dependency manager for PHP.
- **PhpSpreadsheet**: A PHP library for reading and writing spreadsheet files.
- **HTML**: Markup language for creating the web pages.
- **CSS**: Stylesheet language for styling the web pages.
- **VS Code / Notepad**: Recommended text editors for coding.

## Setup

1. **Clone the Repository**

   ```sh
git clone https://github.com/ma5hudu/Work-Flow-System.git
   ```

   Save the project into the `www` folder inside your WampServer directory.

2. **Check PHP Installation**
   Open Command Prompt and type:

   ```sh
   php -v
   ```

   If PHP is installed, you should see version information. If not, download and install PHP from [php.net](https://www.php.net/downloads).

3. **Install WampServer**
   If you don't have WampServer, download it from [SourceForge](https://sourceforge.net/projects/wampserver/reviews) and install it. Open WampServer and wait for it to complete loading. You should see a green icon indicating that all services are running.

4. **Access phpMyAdmin**
   Open your default browser (usually Microsoft Edge on Windows) and go to:

   ```
   http://localhost/phpmyadmin
   ```

   Log in with the username `root` and leave the password field empty.

5. **Install PhpSpreadsheet**
   Open the terminal in your project directory and run:

   ```sh
   composer require phpoffice/phpspreadsheet
   ```

   If Composer is not installed on your machine, download and install it from [getcomposer.org](https://getcomposer.org/download/).

6. **Run the Database Setup Script**
   In your browser, go to:

   ```sh
   http://localhost/work-flow-system/setup.php
   ```

   This will create the required database and tables.

7. **Run the Application**
   In your browser, go to:
   ```
   http://localhost/work-flow-system/index.php
   ```
   This will run your application.

## Usage Instructions
Make sure your project is saved in the www folder inside your WampServer directory.

1. In your browser, go to:

   ```
   http://localhost/work-flow-system/index.php
   ```

   This will run your application.

2. Fill in the form with your first name, last name, and date of birth, then click the save button.

3. Upload the Excel file that contains the customer's income and expenses data, and then click the submit button.

4. After submitting the file, click the next button that will redirect you to view the graph containing the customer's income and expenditure for the last 12 months.

##Assumptions
Assumes the user has a working installation of PHP, WampServer, and MySQL.
Assumes the Excel file is correctly formatted with income and expenses data.
I assume the person running this program is using windows
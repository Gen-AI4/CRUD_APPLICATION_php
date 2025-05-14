# CRUD Application in PHP

This is a simple CRUD (Create, Read, Update, Delete) web application built using **PHP** and **MySQLi**. It allows users to add, view, update, and delete student records consisting of a name and email address.

## Features

- Add new student records
- Display all existing records in a table
- Edit existing records
- Delete records
- User-friendly interface
- Basic client-side confirmation on delete action

## Technologies Used

- PHP
- MySQL
- HTML/CSS
- MySQLi (for database operations)

## Requirements

- PHP 7.x or higher
- MySQL/MariaDB
- Web server (Apache, Nginx, or similar)
- Browser

## Database Setup

1. **Create the Database**

    ```sql
    CREATE DATABASE CRUD;
    ```

2. **Create the Table**

    ```sql
    USE CRUD;

    CREATE TABLE crud (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL
    );
    ```

## How to Run

1. Clone or download this repository to your web server's root directory (e.g., `htdocs` in XAMPP or `www` in WAMP).

2. Make sure your MySQL server is running.

3. Import the SQL commands above into your MySQL server to create the database and table.

4. Start your local server and navigate to the application in your browser:

    ```
    http://localhost/your-folder-name/
    ```

5. Begin using the application by adding new student records.

# PHP MySQL Users Table

A simple web application built using PHP and MySQL.

The application allows users to:

- Add a name and age using a form.
- Store submitted data in a MySQL database.
- Display all records in a table.
- Change the status value between `0` and `1` using a Toggle button.
- Update the displayed data immediately after adding or changing a record.

## Technologies Used

- PHP
- MySQL
- HTML
- CSS
- InfinityFree Hosting

## Database Structure

The project uses a table named `users` with the following columns:

| Column | Type | Description |
|---|---|---|
| id | INT | Primary key with AUTO_INCREMENT |
| name | VARCHAR(100) | User name |
| age | INT | User age |
| status | TINYINT | Status value, either 0 or 1 |

## How It Works

The PHP file connects to the MySQL database, receives data from the form, inserts new records, retrieves all stored records, and updates the status when the Toggle button is clicked.

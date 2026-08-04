# PHP & MySQL Web Task

## Task Description

This task is a simple webpage created using PHP, HTML, CSS, and MySQL.

The webpage allows the user to enter a name and age, store the submitted data in a MySQL database, display all stored records in a table, and change the status of each record between `0` and `1` using a Toggle button.

## Task Requirements

- Create a one-line form containing:
  - Name input
  - Age input
  - Submit button
- Store the submitted data in a MySQL database.
- Display all records from the database in a table.
- Display the following columns:
  - ID
  - Name
  - Age
  - Status
  - Action
- Add a Toggle button for every record.
- Change the status value between `0` and `1`.
- Display the updated status immediately after pressing the Toggle button.

## Technologies Used

- PHP
- HTML
- CSS
- MySQL
- phpMyAdmin
- InfinityFree Hosting

## Database Structure

A MySQL database was created using InfinityFree and managed through phpMyAdmin.

The table used in this task is named:

```text
users
```

The table contains the following columns:

| Column | Type | Description |
|---|---|---|
| `id` | INT | Primary key with Auto Increment |
| `name` | VARCHAR(100) | Stores the user's name |
| `age` | INT | Stores the user's age |
| `status` | TINYINT | Stores either 0 or 1 |

## SQL Table Creation

The following SQL command can be used to create the `users` table:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    status TINYINT NOT NULL DEFAULT 0
);
```

## Database Connection

The PHP file connects to the MySQL database using the following information:

```php
$servername = "YOUR_DATABASE_HOST";
$username = "YOUR_DATABASE_USERNAME";
$password = "YOUR_DATABASE_PASSWORD";
$dbname = "YOUR_DATABASE_NAME";
```

The real database password should not be uploaded to GitHub.

## How the Task Works

### 1. Database Connection

PHP connects to the MySQL database using the `mysqli` class.

If the connection fails, an error message is displayed.

### 2. Adding a New Record

The user enters a name and age in the form.

The form sends the submitted values to the same PHP file using the `POST` method.

PHP then inserts the values into the `users` table.

Every new record starts with a status value of:

```text
0
```

### 3. Displaying Records

PHP retrieves all records from the `users` table using a `SELECT` query.

The records are displayed inside an HTML table containing:

```text
ID | Name | Age | Status | Action
```

### 4. Toggling the Status

Each record contains a Toggle button.

When the button is pressed, PHP updates the selected record.

The status changes as follows:

```text
0 → 1
1 → 0
```

The page reloads after the update, so the new status appears immediately.

## Main SQL Queries

### Insert Query

```sql
INSERT INTO users (name, age, status)
VALUES (?, ?, 0);
```

### Select Query

```sql
SELECT id, name, age, status
FROM users
ORDER BY id ASC;
```

### Toggle Query

```sql
UPDATE users
SET status = IF(status = 0, 1, 0)
WHERE id = ?;
```

## File Structure

```text
php-mysql-task/
│
├── index.php
└── README.md
```

## Running the Task

1. Create a MySQL database.
2. Create the `users` table using the provided SQL command.
3. Open the PHP file.
4. Add the correct database connection information.
5. Upload the PHP file to the `htdocs` folder in InfinityFree.
6. Open the website URL in the browser.
7. Enter a name and age.
8. Press the Submit button.
9. The new record will appear in the table.
10. Press Toggle to change the status between `0` and `1`.

## Task Result

The completed webpage can:

- Accept a name and age from the user.
- Store the entered information in MySQL.
- Display all database records.
- Change the status of any record.
- Show the updated value immediately.

## Security Note

Database passwords and private connection information should not be published on GitHub.

Before uploading the PHP file, replace the real password with:

```php
$password = "YOUR_DATABASE_PASSWORD";
```

## Author

Ahmed Abdullah

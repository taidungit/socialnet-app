# SocialNet Project - Web Application Mock Project

## Student Information
- **Name**: Nguyen Tai Dung
- **Student ID**: 1695191

## ⚠️ Important Notes for Grading
- **Password Storage**: For convenience during testing, passwords are stored as **plain text** (not hashed). This allows for easy verification of login credentials directly from the `account` table.
- **Database Setup**: Please import the `db.sql` file provided in the root directory. It contains the necessary schema and sample data to run the application immediately.
- **Environment**: The application expects a MySQL server with a database named `socialnet`. Please update the connection parameters in the PHP files if necessary to match your local testing environment.

## 🚀 Extra Features
- **Admin Access Control**: Access to `/admin/newuser.php` is restricted. Only the user with the username 'admin' is authorized to create new accounts. Unauthorized users are automatically redirected to the Home page.
- **System Statistics**: The Home page features a live counter showing the total number of registered members in the system.
- **SQL Injection Prevention**: All user-provided data is sanitized using `mysqli_real_escape_string` before being used in database queries.

## Project Structure
- `/admin/newuser.php`: Admin form to add users.
- `/socialnet/`: Contains all user-facing pages (signin, index, profile, etc.).
- `db.sql`: Database export file.

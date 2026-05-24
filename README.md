# SocialNet Project - Web Application Mock Project

## Student Information
- **Name**: Nguyen Tai Dung
- **Student ID**: 1695191

## ⚠️ Vulnerability Notice (Attack Branch)
> This is the `attack` branch, which is explicitly configured to demonstrate and execute web security exploits. The codebase here intentionally contains critical vulnerabilities (such as CSRF, Stored XSS, SQL Injection, and Session Fixation) for proof-of-concept testing.
> To see the completely secured and patched version of this application, please switch to the **`defense`** branch.

## ⚠️ Important Notes for Grading
- **Password Security (Branch: attack)**: The application has been upgraded to store passwords securely using cryptographic hashing (**Bcrypt** via PHP's `password_hash()`). Raw passwords are no longer visible in the database.
- **Testing Credentials**: To facilitate immediate testing, all standard mock accounts in the provided `db.sql` share a common raw password: **`123456`**
- **Database Setup**: Please import the updated `db.sql` file provided in the root directory. It contains the latest secure schema and pre-hashed sample user data.
- **Environment**: The application expects a MySQL server with a database named `socialnet`. Please update the connection parameters in the PHP files (or your database configuration file) if necessary to match your local testing environment.

## 🚀 Extra Features & Mitigations
- Password Hashing: All user passwords are now securely processed using strong cryptographic hashing algorithms before database storage, completely removing plain-text exposure.
- /socialnet/cookies.txt: Saved active session cookies data used during testing to simulate authenticated requests and session hijacking vectors
- csrf_test.html & csrf_admin.html are new files used to simulate and test Cross-Site Request Forgery (CSRF) attack vectors.

## Project Structure
- `/admin/newuser.php`: Admin form to add users (now automatically hashes new passwords).
- `/socialnet/`: Contains all user-facing pages (signin, index, profile, etc.).
- `db.sql`: Updated database export file containing pre-hashed account data.
- `csrf_test.html & csrf_admin.html` are new files used to simulate and test Cross-Site Request Forgery (CSRF) attack vectors.

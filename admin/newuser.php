<?php
// Database connection details
$servername = "localhost";
$username_db = "taidung"; 
$password_db = "123456"; 
$dbname = "socialnet";

$conn = mysqli_connect($servername, $username_db, $password_db, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $full = mysqli_real_escape_string($conn, $_POST['fullname']);
 
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    
    $sql = "INSERT INTO account (username, fullname, password) VALUES ('$user', '$full', '$pass')";
    
    if (mysqli_query($conn, $sql)) {
        $message = "<p style='color: green;'>User created successfully!</p>";
    } else {
        $message = "<p style='color: red;'>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../socialnet/style.css">
</head>
<body>
    <div class="container">
        <h2>Admin: New User</h2>
        <?php echo $message; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Create Account</button>
        </form>
    </div>
</body>
</html>

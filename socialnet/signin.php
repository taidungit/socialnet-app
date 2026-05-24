<?php
session_start();
$conn = mysqli_connect("localhost", "taidung", "123456", "socialnet");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //$user = mysqli_real_escape_string($conn, $_POST['username']);
    $user = $_POST['username'];	
    $pass = $_POST['password'];

    $sql = "SELECT * FROM account WHERE username = '$user'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        // Verify hashed password
	    if (password_verify($pass, $row['password'])) {
	    //if ($pass === $row['password']) {
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['fullname'] = $row['fullname'];
            
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "User not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In - SocialNet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>SocialNet</h2>
        <?php if ($error) echo "<p style='color:red; text-align:center;'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Log In</button>
        </form>
        <hr>
        <p style="text-align:center; font-size: 14px; color: #606770;">
            Please contact Admin to create a new account.
        </p>
    </div>
</body>
</html>

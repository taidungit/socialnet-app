<?php
session_start();
if (!isset($_SESSION['logged_in'])) { header("Location: signin.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About - SocialNet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'menubar.php'; ?>
    <div class="container">
        <h2>About Student</h2>
        <div style="text-align: center; line-height: 2;">
            <p><strong>Student Name:</strong> Nguyen Tai Dung</p>
            <p><strong>Student Number:</strong> 1695191</p>
            <p><strong>School:</strong> SoICT - HUST</p>
        </div>
    </div>
</body>
</html>

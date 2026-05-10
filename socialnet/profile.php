<?php
session_start();
if (!isset($_SESSION['logged_in'])) { header("Location: signin.php"); exit(); }

$conn = mysqli_connect("localhost", "taidung", "123456", "socialnet");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$owner = isset($_GET['owner']) ? mysqli_real_escape_string($conn, $_GET['owner']) : $_SESSION['username'];

$sql = "SELECT username, fullname, description FROM account WHERE username = '$owner'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("<div class='container' style='text-align:center;'><h2>User not found.</h2><a href='index.php'>Go Home</a></div>");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($data['fullname']); ?>'s Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'menubar.php'; ?>

    <div class="profile-card">
        <div class="avatar-placeholder">
            <?php 
                // Giải pháp an toàn tránh lỗi Fatal Error
                if (function_exists('mb_substr')) {
                    echo htmlspecialchars(mb_substr($data['fullname'], 0, 1, 'UTF-8'));
                } else {
                    echo htmlspecialchars(substr($data['fullname'], 0, 1));
                }
            ?>
        </div>

        <h2 style="margin-bottom: 5px;"><?php echo htmlspecialchars($data['fullname']); ?></h2>
        <p style="color: #65676b; margin-top: 0; margin-bottom: 25px;">
            <?php echo htmlspecialchars($data['username']); ?>
        </p>

        <div style="text-align: left;">
            <label style="font-weight: 600; color: #65676b; font-size: 0.85em; text-transform: uppercase;">About Me</label>
            <div class="description-box">
                <?php 
                    if (!empty($data['description'])) {
                        echo nl2br(htmlspecialchars($data['description']));
                    } else {
                        echo "<span style='color: #999; font-style: italic;'>No description provided yet.</span>";
                    }
                ?>
            </div>
        </div>

        <?php if ($owner === $_SESSION['username']): ?>
            <div style="margin-top: 30px; border-top: 1px solid #eee; padding-top: 20px;">
                <a href="setting.php" style="color: #1877f2; text-decoration: none; font-weight: 600;">Edit My Profile</a>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

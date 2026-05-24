<?php
session_start();
if (!isset($_SESSION['logged_in'])) { header("Location: signin.php"); exit(); }

$conn = mysqli_connect("localhost", "taidung", "123456", "socialnet");
$current_user = $_SESSION['username'];
$message = "";

$owner = isset($_GET['owner']) ? mysqli_real_escape_string($conn, $_GET['owner']) : $_SESSION['username'];

if ($owner !== $_SESSION['username']) {
    die("Bạn không có quyền chỉnh sửa hồ sơ này.");
}

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("CSRF token validation failed.");
    }

    $new_desc = mysqli_real_escape_string($conn, $_POST['description']);
    $update_sql = "UPDATE account SET description = '$new_desc' WHERE username = '$current_user'";

    if (mysqli_query($conn, $update_sql)) {
        $message = "<p style='color: green; text-align:center;'>Profile updated successfully!</p>";
    } else {
        $message = "<p style='color: red; text-align:center;'>Update failed: " . mysqli_error($conn) . "</p>";
    }
}

// Lấy description hiện tại
$res = mysqli_query($conn, "SELECT description FROM account WHERE username = '$current_user'");
$row = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Settings - SocialNet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'menubar.php'; ?>
    <div class="container">
        <h2>Edit Profile</h2>
        <?php echo $message; ?>
        <form method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <label>Profile Description:</label>
            <textarea name="description" rows="5" placeholder="Tell us about yourself..."><?php echo htmlspecialchars($row['description'] ?? ''); ?></textarea>
            <button type="submit">Update Description</button>
        </form>
    </div>
</body>
</html>

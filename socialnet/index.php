<?php
session_start();

// 1. Redirect to Signin Page if not logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: signin.php");
    exit();
}

// 2. Database Connection
$conn = mysqli_connect("localhost", "taidung", "123456", "socialnet");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$current_user = $_SESSION['username'];
$current_fullname = $_SESSION['fullname'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - SocialNet</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Tinh chỉnh thêm một chút cho trang Home */
        .home-wrapper {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .welcome-section {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            text-align: center;
            margin-bottom: 30px;
        }
        .user-list-title {
            color: #65676b;
            font-size: 1.1em;
            margin-bottom: 15px;
            padding-left: 5px;
        }
    </style>
</head>
<body>
    <?php include 'menubar.php'; ?>

    <div class="home-wrapper">
        <div class="welcome-section">
            <h1 style="margin: 0; color: #1c1e21;">Welcome, <?php echo htmlspecialchars($current_fullname); ?>!</h1>
        </div>

        <h3 class="user-list-title">Other users in system</h3>

	<?php
	// Lấy tổng số lượng user
	$sql_count = "SELECT COUNT(*) as total FROM account";
	$res_count = mysqli_query($conn, $sql_count);
	$row_count = mysqli_fetch_assoc($res_count);
	$total_users = $row_count['total'];
	?>

	<div style="background: #e7f3ff; color: #1877f2; padding: 15px; border-radius: 8px; margin-bottom: 20px; font-weight: 600; text-align: center;">
    	🌐 SocialNet Community: Currently has <?php echo $total_users; ?> active members!
	</div>	

        <?php
        // Lấy danh sách user khác (loại trừ chính mình)
        $sql = "SELECT username, fullname FROM account WHERE username != '$current_user'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="user-card" style="display: flex; justify-content: space-between; align-items: center; background: white; padding: 15px; border-radius: 8px; margin-bottom: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <div>
                        <span style="font-weight: 600; color: #1c1e21; display: block; font-size: 1.05em;">
                            <?php echo htmlspecialchars($row['fullname']); ?>
                        </span>
                        <span style="color: #65676b; font-size: 0.9em;">
                            <?php echo htmlspecialchars($row['username']); ?>
                        </span>
                    </div>
                    <a href="profile.php?owner=<?php echo urlencode($row['username']); ?>"
                       style="color: #1877f2; text-decoration: none; font-weight: 600; font-size: 0.95em;">
                       View Profile
                    </a>
                </div>
                <?php
            }
        } else {
            echo "<div style='text-align: center; color: #999; padding: 20px;'>No other users found.</div>";
        }
        ?>
    </div>
</body>
</html>




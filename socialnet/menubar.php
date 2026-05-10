<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$my_username = $_SESSION['username'] ?? '';

// Lấy tên file hiện tại (ví dụ: /socialnet/index.php)
$current_page = basename($_SERVER['PHP_SELF']);
?>

<link rel="stylesheet" href="style.css">
<nav>
    <a href="index.php" class="<?php echo ($current_page == 'index.php') ? 'active' : ''; ?>">Home</a>
    
    <a href="setting.php" class="<?php echo ($current_page == 'setting.php') ? 'active' : ''; ?>">Settings</a>
    
    <a href="profile.php" class="<?php echo ($current_page == 'profile.php' && !isset($_GET['owner'])) ? 'active' : ''; ?>">My Profile</a>
    
    <a href="about.php" class="<?php echo ($current_page == 'about.php') ? 'active' : ''; ?>">About</a>
    
    <a href="signout.php" style="color: #d32f2f;">Sign Out</a>
</nav>

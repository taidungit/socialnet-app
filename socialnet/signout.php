<?php
session_start();
// Clear all session data
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect back to Home Page (which will then redirect to Signin because session is gone)
header("Location: index.php");
exit();
?>

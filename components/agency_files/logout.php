<?php
session_start();
session_unset(); // Clear all session variables
session_destroy(); // Destroy the session

// Redirect to the dashboard after logout
header("Location: index.php?message=You have been logged out successfully");
exit;
?>

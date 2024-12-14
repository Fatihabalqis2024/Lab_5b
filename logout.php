<?php
session_start();
session_destroy();  // Clear semua data sesi
header("Location: login.php");  // Redirect ke login page
exit;
?>

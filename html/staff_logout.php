<?php
session_start();
session_destroy(); // destroy the session
header("Location: auth-login-basic-Staff.php"); // redirect to the login page
exit;
?>
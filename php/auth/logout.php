<?php
// Start the session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Unset all of the session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to the login page or any other page you want
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();

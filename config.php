<?php

// Database configuration
$dbHost = 'localhost'; // Your database host
$dbName = 'project_1'; // Your database name
$dbUser = 'root'; // Your database username
$dbPass = ''; // Your database password

// Create a MySQLi instance
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

?>

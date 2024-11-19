<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include the database configuration
include('../../config.php');
// include the functions file to call sweet alert message function
include('../sysad_functions.php');



// Function to validate email format
function validateEmail($email)
{
    // filter the email to check the entered value is a email or not 
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to validate password format
function validatePassword($password)
{
    return strlen($password) >= 8;
}

// Function to check if email already exists in the database
function emailExists($email)
{
    global $conn;
    $stmt = $conn->prepare("SELECT COUNT(user_id) as email FROM users WHERE user_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    return $count > 0;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $name = sanitizeInput($_POST["name"]);
    $email = sanitizeInput($_POST["email"]);
    $password = $_POST["password"]; // No need to sanitize password for database storage

    // store the input values in session to prevent the user to re-enter the details when error occured
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;

    $errors = array();

    // Validate email format
    if (!validateEmail($email)) {
        $errors[] = "Invalid Email";
    }

    // Validate password format
    if (!validatePassword($password)) {
        $errors[] = "Password should be at least 8 characters long";
    }

    // Check if email already exists in the database
    if (emailExists($email)) {
        $errors[] = "Email you're trying to register is already registered. Please try with another email.";
    }

    // If there are no errors, insert the user into the database
    if (empty($errors)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user into the database
        $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $hashedPassword);
        $stmt->execute();
        $stmt->close();

        // unset the sessions variables email and name if user registered successfully
        unset($_SESSION['name']);
        unset($_SESSION['email']);

        showAlert("success", "Congratulations !", "You're registered successfully. Now you can proceed to login.");
    } else {
        // Display error messages
        foreach ($errors as $error) {
            showAlert("error", "Registration Failed", $error);
        }
    }
} else {
    showAlert("error", "Failed", "Failed to register your account. Please try again later.");
}

// Redirect back to the form page if accessed directly
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
?>
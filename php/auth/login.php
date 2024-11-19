<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Include the database configuration
include('../../config.php');
// include the functions file to call sweet alert message function
include('../sysad_functions.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values from the form
    $email = sanitizeInput($_POST['email']);
    $password = $_POST['password'];

    $_SESSION['login_email'] = $email;
    // Validate input
    if (!empty($email) && !empty($password)) {
        // Prepare a SQL statement to retrieve the user from the database
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = ?");
        $stmt->bind_param("s", $email);
        // Execute the statement
        $stmt->execute();
        // Get the result
        $result = $stmt->get_result();
        // Check if the user exists
        if ($result->num_rows == 1) {
            // Fetch user details
            $user = $result->fetch_assoc();
            // Verify the password
            if (password_verify($password, $user['user_password'])) {
                // Password is correct, set session variables
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = $user['user_id'];
            } else {
                // Password is incorrect
                showAlert("error", "Invalid Password", "You've entered an wrong password. Please check password and try again");
            }
        } else {
            // User does not exist
            showAlert("question", "User not found !", "Sorry we're not able to find the associated account with your email address.");
        }
    } else {
        // Email or password is empty
        showAlert("info", "Enter your details", "Please enter your registered email and password to proceed.");
    }
    // Redirect to the dashboard or any other page after successful login
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
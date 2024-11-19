<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Include the database configuration
include('../../config.php');
// include the functions file to call sweet alert message function
include('../sysad_functions.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $postId = $_POST['post_id'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $post_details = $_POST['post_details'];

    // Check if file is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_type = $_FILES['image']['type'];

        // Generate a unique identifier for the image
        $unique_id = uniqid();
        // Get the file extension
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
        // Generate the new file name with the unique identifier
        $new_file_name = $unique_id . '.' . $file_extension;

        // Valid file extensions and maximum file size (2MB)
        $allowedExtensions = array('jpg', 'jpeg', 'png');
        $maxFileSize = 2097152; // 2MB in bytes

        // Check if uploaded file has valid extension and size
        if (in_array($file_extension, $allowedExtensions) && $file_size < $maxFileSize) {
            // Move the uploaded file to a permanent location
            $target_dir = "../../assets/posts/"; // Change this directory to your desired location
            $target_file = $target_dir . $new_file_name;
            // Move uploaded file to designated directory
            if (move_uploaded_file($file_tmp, $target_file)) {
                // Update post details in the database, including the image
                $stmt = $conn->prepare("UPDATE posts SET post_title = ?, post_category = ?, post_details = ?, post_image = ? WHERE post_id = ?");
                $stmt->bind_param("ssssi", $title, $category, $post_details, $new_file_name, $postId);
                $stmt->execute();
                $stmt->close();

                // Call showAlert function to display success message
                showAlert("success", "Updated Successfully", "Your post updated successfully.");

                // Redirect to a specific page
                header('Location: ../../manage_posts.php');
                exit(); // Stop further execution
            } else {
                echo "Error uploading the file.";
            }
        } else {
            echo "Invalid file. Please make sure the file is a JPG, JPEG, or PNG and does not exceed 2MB in size.";
        }
    } else {
        // Update post details in the database without updating the image
        $stmt = $conn->prepare("UPDATE posts SET post_title = ?, post_category = ?, post_details = ? WHERE post_id = ?");
        $stmt->bind_param("sssi", $title, $category, $post_details, $postId);
        $stmt->execute();
        $stmt->close();

        // Call showAlert function to display success message
        showAlert("success", "Posted Successfully", "Your post submitted successfully.");
        // Redirect to a specific page
        header('Location: ../../manage_posts.php');
        exit(); // Stop further execution
    }

    // Redirect to a specific page
    header('Location: ') . $_SERVER['HTTP_REFERER'];
    exit(); // Stop further execution
    // Close database connection
    $conn->close();
}

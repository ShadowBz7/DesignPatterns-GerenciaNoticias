<?php
include('../../config.php');

// Check if post_id is set and is a valid number
if (isset($_GET['post_id']) && is_numeric($_GET['post_id'])) {
    $postID = $_GET['post_id'];

    // Fetch the image filename from the database
    $sql = "SELECT post_image FROM posts WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $postID);
    $stmt->execute();
    $stmt->bind_result($imageFilename);
    $stmt->fetch();
    $stmt->close();

    // Delete the post from the database
    $deletePostSql = "DELETE FROM posts WHERE post_id = ?";
    $deletePostStmt = $conn->prepare($deletePostSql);
    $deletePostStmt->bind_param("i", $postID);
    $deletePostStmt->execute();
    $deletePostStmt->close();

    // If an image filename is found, delete the image file from the folder
    if (!empty($imageFilename)) {
        $imagePath = "../../assets/posts/" . $imageFilename; // Adjust the path to your image folder
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // Redirect to a confirmation page or any other page after deletion
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit(); // Stop further execution
} else {
    // Redirect to an error page if post_id is not set or is not a valid number
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit(); // Stop further execution
}

<?php
include '../../config.php';

// Check if post_id is set in the URL
if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    //  update the post view in the database
    $sql = "UPDATE posts SET post_views = post_views + 1 WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $stmt->close();
    // Redirect the user to the view_blog_post.php page
    header("Location: ../../view_blog_post.php?post_id=$post_id");
    exit();
} else {
    header("Location: ../../index.php");
    exit();
}
?>

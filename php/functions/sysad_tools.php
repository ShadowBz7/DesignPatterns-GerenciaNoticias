<?php
// function to get session messages
function showAlert($icon, $title, $message){
    $_SESSION['icon'] = $icon;
    $_SESSION['message'] = $message;
    $_SESSION['title'] = $title;
}


// Function to sanitize input data
function sanitizeInput($input)
{
    // remove space from the beginning and ending of the string
    $input = trim($input);
    // Convert special characters to HTML entities
    $input = htmlspecialchars($input);
    return $input;
}


// function to check if any user is logged in or not
function isLoggedIn() {
    // $_SESSION['loggedin'] check this value is set or not while user login to their account successfully
    return isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
}

// get posts views 
function getPostViewsCount($post_id) {
    global $conn;
    $sql = "SELECT post_views FROM posts WHERE post_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $stmt->bind_result($post_views);
    $stmt->fetch();
    $stmt->close();
    return $post_views;
}

// format numbers 
function formatNumber($number) {
    if ($number < 1000) {
        return $number;
    } elseif ($number < 1000000) {
        return round($number / 1000, 1) . 'K';
    } elseif ($number < 1000000000) {
        return round($number / 1000000, 1) . 'M';
    } else {
        return round($number / 1000000000, 1) . 'B';
    }
}

// count category total posts
function getCategoryPosts($category) {
    global $conn;
    $sql = "SELECT COUNT(post_id) as total_posts FROM posts WHERE post_category = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $category);
    $stmt->execute();
    $stmt->bind_result($total_posts);
    $stmt->fetch();
    $stmt->close();
    return $total_posts;
}


?>
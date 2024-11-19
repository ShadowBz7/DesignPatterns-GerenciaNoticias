<?php
// function to get the login user account name
function getLoginUser()
{
    global $conn;
    // assign empty value to variable 
    $username = "";
    if (isset($_SESSION['user_id'])) {
        $userID = $_SESSION['user_id'];

        $query = "SELECT user_name FROM users WHERE user_id = ?";
        $statement = $conn->prepare($query);
        $statement->bind_param("i", $userID);
        $statement->execute();
        $result = $statement->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $username = $row['user_name'];
        }

        $statement->close();
        return $username;
    } else {
        return $username;
    }
}


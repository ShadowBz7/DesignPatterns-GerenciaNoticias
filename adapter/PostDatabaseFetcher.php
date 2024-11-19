<?php

class PostDatabaseFetcher {
    protected $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function fetchPostsByCategory(int $userID, string $category): array {
        $stmt = $this->conn->prepare("SELECT * FROM posts WHERE post_user = ? AND post_category = ?");
        $stmt->bind_param("is", $userID, $category);
        $stmt->execute();
        $result = $stmt->get_result();
        $posts = [];

        while ($row = $result->fetch_assoc()) {
            $posts[] = $row;
        }

        return $posts;
    }
}

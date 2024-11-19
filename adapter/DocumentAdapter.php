<?php
include_once "PostListInterface.php";
class DocumentAdapter implements PostListInterface {
    private $adaptee;

    public function __construct(PostDatabaseFetcher $adaptee) {
        $this->adaptee = $adaptee;
    }

    public function getPosts(int $userID): array {
        return $this->adaptee->fetchPostsByCategory($userID, "Documentos");
    }
}

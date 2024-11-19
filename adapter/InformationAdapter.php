<?php
include_once "PostListInterface.php";
class InformationAdapter implements PostListInterface {
    private $adaptee;

    public function __construct(PostDatabaseFetcher $adaptee) {
        $this->adaptee = $adaptee;
    }

    public function getPosts(int $userID): array {
        return $this->adaptee->fetchPostsByCategory($userID, "Informações");
    }
}

<?php
include_once 'DocumentPost.php';
include_once 'PostFactory.php';

class DocumentPostFactory extends PostFactory {
    public function createPost($title, $details, $image = null) {
        return new DocumentPost($title, $details, $image);
    }
}

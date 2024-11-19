<?php
include_once 'InformationPost.php';
include_once 'PostFactory.php';

class InformationPostFactory extends PostFactory {
    public function createPost($title, $details, $image = null) {
        return new InformationPost($title, $details, $image);
    }
}

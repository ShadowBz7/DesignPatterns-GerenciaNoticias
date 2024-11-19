<?php
abstract class Post {
    public $category;
    public $title;
    public $details;
    public $image;
    public $link;

    abstract public function saveToDatabase($conn);
}


<?php
abstract class PostFactory {
    abstract public function createPost($title, $details, $image = null);
}
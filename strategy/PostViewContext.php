<?php

class PostViewContext {
    private $strategy;

    public function __construct(PostViewStrategy $strategy) {
        $this->strategy = $strategy;
    }

    public function displayPost($post) {
        return $this->strategy->viewPost($post);
    }
}
?>

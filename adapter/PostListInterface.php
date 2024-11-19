<?php

interface PostListInterface {
    public function getPosts(int $userID): array;
}

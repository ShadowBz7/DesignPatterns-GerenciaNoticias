<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <?php
            $heading = "";
            $tagline = "";
            if (basename($_SERVER['PHP_SELF']) === 'posts_by_category.php') {
                if (isset($_GET['cat_name'])) :
                    $heading = "Category : {$_GET['cat_name']}";

                endif;
            } else {
                $heading = "Welcome to Students Blogs !";
                $tagline = "Empower Your Voice, Inspire Your Future: Student Blogs - Where Ideas Take Flight!";
            }
            ?>
            <h1 class="fw-bolder"><?= $heading ?></h1>
            <p class="lead mb-0 "><?= $tagline ?></p>
        </div>
    </div>
</header>
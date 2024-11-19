<div class="card-mb-4">
    <div class="card-header">Categories</div>
    <div class="card-body">
        <div class="row">
            <?php
            $getCategoriesListsql = "SELECT DISTINCT(post_category) from posts";
            $getCategoriesListresult = $conn->query($getCategoriesListsql);

            if ($getCategoriesListresult->num_rows > 0) {
                // output data of each row
                while ($getCategoriesListrow = $getCategoriesListresult->fetch_assoc()) {
                    $cat_name = $getCategoriesListrow['post_category'];
            ?>
                    <div class="col-sm-6">
                        <ul class="list-unstyled mb-0">
                            <li class="my-3"><a href="posts_by_category.php?cat_name=<?=$cat_name?>" class="links"><?= $cat_name ?> (<?=getCategoryPosts($cat_name)?>)</a></li>
                        </ul>
                    </div>
            <?php
                }
            } else {
                echo "No Categories Found !";
            }
            ?>

        </div>
    </div>
</div>
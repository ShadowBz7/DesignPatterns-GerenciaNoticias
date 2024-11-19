<div class="col-md-12 order-lg-3 order-2">
    <!-- blog posts  -->
    <div class="row g-3 mb-3">
        <?php
        $limit = "";
        $WHERE = "";
        if (basename($_SERVER['PHP_SELF']) === 'view_blog_post.php') {
            if (isset($_GET['post_id'])) {
                $WHERE = "WHERE post_id != {$_GET['post_id']}";
            }
            $limit = "LIMIT 3";
        } elseif (basename($_SERVER['PHP_SELF']) === 'posts_by_category.php') {
            if (isset($_GET['cat_name'])) :
                $WHERE = "WHERE post_category = '{$_GET['cat_name']}'";
            endif;
        } else {
            $limit = "";
        }

        // Determine the total number of posts
        $totalPostsSql = "SELECT COUNT(*) AS total FROM posts $WHERE";
        $totalPostsResult = $conn->query($totalPostsSql);
        $totalPostsRow = $totalPostsResult->fetch_assoc();
        $totalPosts = $totalPostsRow['total'];

        // Calculate total number of pages
        $postsPerPage = 3; // Change this to adjust the number of posts per page
        $totalPages = ceil($totalPosts / $postsPerPage);

        // Determine the current page
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

        // Calculate the offset
        $offset = ($current_page - 1) * $postsPerPage;

        // Construct the SQL query with pagination
        $sql = "SELECT * FROM posts INNER JOIN users ON users.user_id = posts.post_user $WHERE ORDER BY post_views DESC LIMIT $postsPerPage OFFSET $offset";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $postID = $row['post_id'];
                $title = $row['post_title'];
                $author_id = $row['post_user'];
                $author_name = $row['user_name'];
                $category = $row['post_category'];
                $details = $row['post_details'];
                $details = strip_tags($details);

                $image = $row['post_image'];
                $image_path = "assets/posts/" . $image;
                $date = $row['post_date'];
                $format_date = date("M d, Y", strtotime($date));
                $view_post_link = "php/posts/views.php?post_id=$postID";
        ?>
                <div class="col-lg-4 col-xl-4 col-xxl-4">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            if (!empty($image)) :
                                echo '<a href="' . $view_post_link . '"><img class="blog_post_image" style="max-height : 250px;" src="' . $image_path . '" alt="..." /></a>';
                            endif;
                            ?>


                            <div class="small mb-2 text-muted"><?= $format_date ?></div>
                            <a class="btn btn-light text-dark border border-1 my-1 fw-bold" href="posts_by_category.php?cat_name=<?= $category ?>" style="font-size: 12px;"><i class="bi bi-tag-fill"></i> <?= $category ?></a>
                            <a href="<?= $view_post_link ?>" class="text-decoration-none text-dark">
                                <h2 class="card-title text-capitalize blog_title h4"><?= $title ?></h2>
                            </a>
                            <div class="text-muted details"><?= $details ?></div>
                            <a class="card-link" href="<?= $view_post_link ?>">Read more →</a>
                            <p class="card-text mt-3 author_title text-capitalize"> <i class="bi bi-eye"></i> <?=formatNumber(getPostViewsCount($postID))?> Views | Posted by
                                <a class="links" href="javascript:void(0);"><i class="bi bi-person-fill"></i> <?= $author_name ?></a>
                            </p>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "0 results";
        }
        ?>

    </div>
    <!-- Pagination-->
    <?php
if(basename($_SERVER['PHP_SELF']) === 'index.php'):

    ?>
    <nav aria-label="Pagination">
        <hr class="my-0" />
        <ul class="pagination justify-content-center my-4">
            <?php
            if ($totalPages > 1) {
                // Generate "Newer" link
                $newerPage = $current_page - 1;
                echo '<li class="page-item' . ($current_page == 1 ? ' disabled' : '') . '"><a class="page-link" href="?page=' . $newerPage . '" tabindex="-1" aria-disabled="true">Previous</a></li>';

                // Generate numeric page links
                for ($i = 1; $i <= $totalPages; $i++) {
                    echo '<li class="page-item' . ($current_page == $i ? ' active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                }

                // Generate "Older" link
                $olderPage = $current_page + 1;
                echo '<li class="page-item' . ($current_page == $totalPages ? ' disabled' : '') . '"><a class="page-link" href="?page=' . $olderPage . '">Next</a></li>';
            }
            ?>
        </ul>
    </nav>
    <?php endif; ?>
</div>

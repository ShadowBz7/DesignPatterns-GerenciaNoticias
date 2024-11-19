<?php 
include_once "./head.php";
include_once "./config.php";
include_once "./navbar.php";
include_once "./header.php";
include_once "./adapter/PostDatabaseFetcher.php";
include_once "./adapter/DocumentAdapter.php";
include_once "./adapter/InformationAdapter.php";

$userID = $_SESSION['user_id']; // ID do usuário logado

// Criar o Adaptee
$fetcher = new PostDatabaseFetcher($conn);

// Criar os Adapters
$documentAdapter = new DocumentAdapter($fetcher);
$informationAdapter = new InformationAdapter($fetcher);

// Obter os posts de cada categoria
$informationPosts = $informationAdapter->getPosts($userID);
$documentPosts = $documentAdapter->getPosts($userID);
?>

<div class="container my-4">
    <div class="row">
        <!-- Seção de Informações -->
        <div class="card-mb-4">
            <div class="card-header">
                <h5 class="card-title">Informações</h5>
            </div>
            <div class="card-body">
                <?php if (!empty($informationPosts)) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Views</th>
                                <th scope="col">Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($informationPosts as $row) { ?>
                                <tr>
                                    <th scope="row"><?= $row['post_id'] ?></th>
                                    <td><?= $row['post_title'] ?></td>
                                    <td><?= $row['post_category'] ?></td>
                                    <td><?= formatNumber(getPostViewsCount($row['post_id'])) ?></td>
                                    <td>
                                        <a href="view_blog_post.php?post_id=<?= $row['post_id'] ?>" class="btn btn-primary">View</a>
                                        <a href="edit_post.php?edit_post=<?= $row['post_id'] ?>" class="btn btn-success">Edit</a>
                                        <a href="php/posts/delete_post.php?post_id=<?= $row['post_id'] ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <h6>No Information Posts Found!</h6>
                <?php } ?>
            </div>
        </div>

        <!-- Seção de Documentos -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Documentos</h5>
            </div>
            <div class="card-body">
                <?php if (!empty($documentPosts)) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Views</th>
                                <th scope="col">Edit/Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($documentPosts as $row) { ?>
                                <tr>
                                    <th scope="row"><?= $row['post_id'] ?></th>
                                    <td><?= $row['post_title'] ?></td>
                                    <td><?= $row['post_category'] ?></td>
                                    <td><?= formatNumber(getPostViewsCount($row['post_id'])) ?></td>
                                    <td>
                                        <a href="view_blog_post.php?post_id=<?= $row['post_id'] ?>" class="btn btn-primary">View</a>
                                        <a href="edit_post.php?edit_post=<?= $row['post_id'] ?>" class="btn btn-success">Edit</a>
                                        <a href="php/posts/delete_post.php?post_id=<?= $row['post_id'] ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <h6>No Document Posts Found!</h6>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php
include('./footer.php');
include('./partials/javascripts.php');
?>

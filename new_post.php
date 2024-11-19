<?php 
include_once "./head.php";
include_once "./config.php";
include_once "./navbar.php";
include_once "./header.php"; 
?>
<!-- Page content-->
<div class="container-md my-5">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title fs-4">Post a New News</h2>
                <form action="php/posts/upload_new_post.php" class="row g-3" method="POST" enctype="multipart/form-data">
                    <!-- Campo para título -->
                    <div class="col-md-12">
                        <label for="title">Title</label>
                        <input type="text" name="title" 
                               value="<?= isset($_SESSION['post_title']) ? htmlspecialchars($_SESSION['post_title']) : ''; ?>" 
                               class="form-control" placeholder="Enter News Title" required>
                        <?php unset($_SESSION['post_title']); ?>
                    </div>

                    <!-- Campo para categoria -->
                    <div class="col-md-12">
                        <label for="category">Category</label>
                        <select name="category" class="form-control" required>
                            <option value="" selected hidden>Choose...</option>
                            <option value="Documentos" <?= isset($_SESSION['category']) && $_SESSION['category'] === 'Documentos' ? 'selected' : ''; ?>>
                                Documentos
                            </option>
                            <option value="Informações" <?= isset($_SESSION['category']) && $_SESSION['category'] === 'Informações' ? 'selected' : ''; ?>>
                                Informações
                            </option>
                        </select>
                        <?php unset($_SESSION['category']); ?>
                    </div>

                    <!-- Campo para conteúdo -->
                    <div class="col-md-12">
                        <label for="post_details">Write your news</label>
                        <textarea name="post_details" id="post_writer" class="form-control" 
                                  style="height: 400px; max-width: 100%;" 
                                  placeholder="Start writing here..." required><?= isset($_SESSION['post_details']) ? htmlspecialchars($_SESSION['post_details']) : ''; ?></textarea>
                        <?php unset($_SESSION['post_details']); ?>
                    </div>

                    <!-- Campo para link -->
                    <div class="col-md-12">
                        <label for="link">Document link</label>
                        <input type="text" name="post_link" 
                               value="<?= isset($_SESSION['post_link']) ? htmlspecialchars($_SESSION['post_link']) : ''; ?>" 
                               class="form-control" placeholder="Enter Document link">
                        <?php unset($_SESSION['post_link']); ?>
                    </div>

                    <!-- Botão de envio -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
// Footer e scripts
include('./footer.php');
include('./partials/javascripts.php');
?>

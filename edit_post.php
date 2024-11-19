<?php 
include_once "./head.php";
include_once "./config.php";
include_once "./navbar.php";
include_once "./header.php"; 
?>

<div class="container-md my-5">
    <?php
    $post_id = $_GET['edit_post'];
    $sql = "SELECT * from posts WHERE post_id = $post_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $postID = $row['post_id'];
            $title = $row['post_title'];
            $author_id = $row['post_user'];
            $category = $row['post_category'];
            $details = $row['post_details'];
            $image = $row['post_image'];
            $image_path = "assets/posts/" . $image;
            $date = $row['post_date'];
            $format_date = date("M d, Y", strtotime($date));
            $view_post_link = "view_blog_post.php?post_id=$postID";
    ?>
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title fs-4"> Post your blog </h2>
                        <form action="php/posts/edit_post.php" class="row g-3" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="post_id" value="<?=$postID?>">
                            <div class="col-md-12">
                                <label for="">Title</label>
                                <input type="text" name="title"  value="<?= $title ?>" class="form-control" placeholder="Enter Post Title" required>
                            </div>
                            <div class="col-md-12">
                                <label for="">Category</label>
                                <select name="category" class="form-control" required>
                                    <option value="" selected hidden>Choose...</option>
                                    <?php
                                    $languages = array("HTML", "CSS", "JavaScript", "Python", "Java", "C++", "Ruby", "PHP", "Swift", "SQL", "TypeScript", "Go", "Rust", "Kotlin", "Perl", "Scala", "R", "Objective-C", "Shell", "Assembly", "Dart", "Lua", "Haskell", "MATLAB", "VBA", "Clojure", "Groovy", "Delphi", "Julia", "PowerShell", "Visual Basic", "Scheme", "Elixir", "F#", "COBOL", "Django", "Lisp", "Ada", "Prolog", "Fortran", "Apex", "Racket", "Scratch", "PL/SQL", "Tcl", "ABAP", "COBOL", "Bash", "LabVIEW" , "Travel");
                                    foreach ($languages as $language) {
                                        echo "<option value='$language' " . ($category == $language ? "selected" : "") . ">$language</option>";
                                    }
                                    
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="">Write your post</label>
                                <textarea name="post_details" id="post_writer" class="form-control" style="height: 400px; max-width: 100%;" placeholder="Start writing here..." required><?=$details?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Update Banner Image</label>
                                <input type="file" name="image" class="form-control">
                                <div class="form-text"><b>Note: </b> Max. 2MB file size is allowed.</div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
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

<?php
// footer file
include('./footer.php');
// javascript file
include('partials/javascripts.php');
?>
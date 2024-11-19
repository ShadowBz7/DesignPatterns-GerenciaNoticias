<?php 
include_once "./head.php";
include_once "./config.php";
include_once "./navbar.php";
include_once "./header.php"; 
include('widgets/hero_section.php');
?>
<!-- Page content-->
<div class="container-md">
    <div class="row">
        <?php
        $widgetsFolder = 'widgets';
        $widgetFiles = [
            'featured.php',
            'search.php',
            'blog_posts.php'
        ];
        foreach ($widgetFiles as $widgetFile) {
            $filePath = "$widgetsFolder/$widgetFile";
            if (file_exists($filePath)) :
                include $filePath;
            endif;
        }
        ?>
    </div>
</div>

<?php
// footer file
include('./footer.php');
// javascript file
include('./partials/javascripts.php');
?>
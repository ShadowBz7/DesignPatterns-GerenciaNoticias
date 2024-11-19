 <!-- Responsive navbar-->
 <?php 
session_start();

include('config.php');
include('./php/sysad_functions.php');

if(isset($_SESSION['user_id'])):
$userID = $_SESSION['user_id'];
endif;
?>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <div class="center">
         <a class="navbar-brand" href="index.php">Admin Panel</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                 <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                 <?php
                    $getCategoriesListsql = "SELECT DISTINCT(post_category) from posts ORDER BY post_category ASC";
                    $getCategoriesListresult = $conn->query($getCategoriesListsql);

                    if ($getCategoriesListresult->num_rows > 0) :
                    ?>
                     <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                             Categories
                         </a>
                         <ul class="dropdown-menu">
                             <?php

                                // output data of each row
                                while ($getCategoriesListrow = $getCategoriesListresult->fetch_assoc()) {
                                    $cat_name = $getCategoriesListrow['post_category'];
                                    $redirect_URL = "posts_by_category.php?cat_name=$cat_name";
                                ?>
                                 <li class="my-1"><a class="dropdown-item" href="<?= $redirect_URL ?>"><i class="bi bi-arrow-right-short me-1"></i> <?= $cat_name ?></a></li>
                             <?php
                                }

                                ?>
                         </ul>
                     </li>
                 <?php endif; ?>
                 <?= (isLoggedIn() == true) ? include('./partials/navbars/users_navbar.php') : '' ?>
                 <?php
                    if (isLoggedIn() == true) {
                        // when user is login show logout button
                        include('widgets/logout_button.php');
                    } else {
                        // when user is not login show login or register buttons
                        // login 
                        include('modals/login_modal.php');
                        // register
                        include('modals/register_modal.php');
                    }
                    ?>
             </ul>
         </div>
     </div>
 </nav>
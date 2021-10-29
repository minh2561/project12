<?php 
    if(!isset($_SESSION['admin'])) 
    {
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access </div>";
        header('location:'.SITEURL.'index/index_admin.php');
    }

    ?>

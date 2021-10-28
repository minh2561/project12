<?php 
   
    if(!isset($_SESSION['giao_vien'])) 
    {
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access </div>";
        header('location:'.SITEURL.'index/index_gv.php');
    }

    ?>
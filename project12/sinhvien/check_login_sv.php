<?php 
    
    if(!isset($_SESSION['sinh_vien'])) 
    {   
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access </div>";
        header('location:'.SITEURL.'index.php');
    }
    // if(!isset($_SESSION['giao_vien'])) 
    // {
    //     $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access </div>";
    //     header('location:'.SITEURL.'giaovien/index.php');
    // }
    // if(!isset($_SESSION['admin'])) 
    // {
    //     $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access </div>";
    //     header('location:'.SITEURL.'admin/index.php');
    // }

?>
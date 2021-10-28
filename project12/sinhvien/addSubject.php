<?php 
include('../index/config.php');

$lop_id = $_GET['lop_id'];
$sv_id = $_GET['sv_id'];


$sql = "INSERT INTO relation_sv_mh (`sv_id`, `lop_id`) VALUES ('$sv_id','$lop_id')";

    $res = mysqli_query($conn, $sql);

    if($res==true)
    {   
        $_SESSION['add'] = "<div class='success'>ADD  Successfully.</div>";
        header('location:'.SITEURL.'sinhvien/index.php');
    }
    else
    {
        $_SESSION['add'] = "<div class='error'> Add Failed </div>";
        header('location:'.SITEURL.'sinhvien/index.php');
    }


?>
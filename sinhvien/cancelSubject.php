<?php 
include('../index/config.php');

$sv_id = $_GET['sv_id'];
$lop_id = $_GET['lop_id'];

$sql = "DELETE FROM relation_sv_mh WHERE sv_id = '$sv_id' AND lop_id='$lop_id'";

    $res = mysqli_query($conn, $sql);

    if($res==true)
    {   
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
        header('location:'.SITEURL.'sinhvien/index.php');
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
        header('location:'.SITEURL.'sinhvien/index.php');
    }



?>
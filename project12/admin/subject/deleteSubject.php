<?php
include('../../index/config.php');
$mh_id = $_GET['mh_id'];
$sql = "DELETE FROM mon_hoc WHERE mh_id ='$mh_id' ";
$res = mysqli_query($conn, $sql);
    if($res==true)
    {
        $_SESSION['delete'] = "<div class='success'> Deleted Successfully.</div>";
        header('location:'.SITEURL.'admin/index.php');
    }
    else{
        $_SESSION['delete'] = "<div class='error'>Cannot Delete Subject . Please Delete class first </div>";
        header('location:'.SITEURL.'admin/index.php');
    }

?>
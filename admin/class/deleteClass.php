<?php
include('../../index/config.php');
$lop_id = $_GET['lop_id'];
$sql = "DELETE FROM relation_sv_mh WHERE lop_id ='$lop_id'";
$res =mysqli_query($conn, $sql);
$sql1 = "DELETE FROM dang_ki_tin_chi WHERE lop_id ='$lop_id'";
$res1 = mysqli_query($conn, $sql1);
if($res==true && $res1== true)
        {
            $_SESSION['delete'] = "<div class='success'> Deleted Successfully.</div>";
            header('location:'.SITEURL.'admin/index.php');
        }
        else{
            $_SESSION['delete'] = "<div class='error'>Cannot Delete class  </div>";
            header('location:'.SITEURL.'admin/index.php');
        }
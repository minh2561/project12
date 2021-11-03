<?php
include('../../index/config.php');
$mh_id = $_GET['mh_id'];
$sql = "DELETE FROM mon_hoc WHERE mh_id ='$mh_id' ";
$res = mysqli_query($conn, $sql);
    if($res==true)
    {
        $_SESSION['delete'] = "<div class='success'>Xóa thành công</div>";
        header('location:'.SITEURL.'admin/index.php');
    }
    else{
        $_SESSION['delete'] = "<div class='error'>Đã có sinh viên đăng ký học, không thể xóa.</div>";
        header('location:'.SITEURL.'admin/index.php');
    }
?>
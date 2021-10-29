<?php 
 include('../index/config.php');
 $trang_thai =  $_GET['trang_thai'];
 $new_trang_thai = '';
 if($trang_thai == 'Đóng'){
    $new_trang_thai = 'Mở';
 }else{
    $new_trang_thai = 'Đóng';
 }
 $sql = "UPDATE `admin` SET`trang_thai`='$new_trang_thai' WHERE 1";
    $res = mysqli_query($conn, $sql); 
    if($res == TRUE)
        {
            $_SESSION['trang_thai'] = "<div class='success'> Set trang thai thanh cong </div>";
            header('location:'.SITEURL.'admin/index.php');
        }
        else{
            $_SESSION['trang_thai'] = "<div class='error'> Set trang thai that bai  </div>";
            header('location:'.SITEURL.'admin/index.php');
        }
?>
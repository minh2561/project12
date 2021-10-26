<?php
    include '../config.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM dang_ki_tin_chi WHERE lop_id = '$id'";
    $res = mysqli_query($conn,$sql);
    if($res==true){
        header("Location:index.php");
    }else{
        echo 'Error';
    }
    
?>

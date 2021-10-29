<?php
include('../index/config.php');

$gv_id = $_GET['gv_id'];
$sql = "SELECT * FROM giao_vien WHERE gv_id = '$gv_id'";
        $res = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
        if($count = 0){
            die;
        } 
        $test =  mysqli_fetch_assoc($res);
        echo $test['gv_ten'];

?>
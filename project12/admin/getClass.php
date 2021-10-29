<?php 
include('../index/config.php');
$mh_id = $_GET['mh_id'];
$sql = "SELECT * FROM dang_ki_tin_chi WHERE mh_id='$mh_id'";
        $res = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
        if($count = 0){
            die;
        } 
      $row = mysqli_fetch_all($res,MYSQLI_ASSOC); // lay tat ca du lieu tu back end 
      // MYSQLI_ASSOC dung de chuyen array sang object
      echo json_encode(["users" =>$row] ); // cho tat ca object vao mang -> ra dang array object 
       
?>
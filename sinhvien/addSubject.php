<?php 
include('../index/config.php');

$lop_id = $_GET['lop_id'];
$sv_id = $_GET['sv_id'];

$sql0 = "SELECT * FROM relation_sv_mh WHERE sv_id = '$sv_id' AND lop_id = '$lop_id'";
$res0 = mysqli_query($conn,$sql0);
$count =  mysqli_num_rows($res0);
if ($count == 0) {
$sql = "INSERT INTO relation_sv_mh (`sv_id`, `lop_id`) VALUES ('$sv_id','$lop_id')";
$sql2 = "UPDATE dang_ki_tin_chi SET lop_current_sv=lop_current_sv +1 WHERE lop_id='$lop_id'";
    $res = mysqli_query($conn, $sql);
    $res2= mysqli_query($conn,$sql2);
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
}else{
    {
        $_SESSION['add'] = "<div class='error'> Ban da dang ki mon hoc nay roi</div>";
        header('location:'.SITEURL.'sinhvien/index.php');
    }
}

?>

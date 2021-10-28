<?php
include '../config.php';
$id = $_POST['id'];
$subject = $_POST['txtSubject'];
$subjectName = $_POST['txtSubjectName'];
$sum = $_POST['txtSum'];
$className = $_POST['txtClassName'];
$date = $_POST['txtDate'];
$time = $_POST['txtTime'];
$sql = "UPDATE dang_ki_tin_chi SET 
lop_hoc_phan='$subject' , lop_ten_hoc_phan='$subjectName', lop_max_sv='$sum', lop_ten_phong='$className', 
lop_tuan_hoc = '$date', lop_gio_hoc='$time' WHERE lop_id ='$id'";
$res = mysqli_query($conn,$sql);
if($res >0){
    header('Location: index.php');
}else{
    die('Loi');
}   
mysqli_close($conn);

?>
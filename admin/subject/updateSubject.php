<?php include('../class/header.php') ?>

<?php
$mh_id = $_GET['mh_id'];
 $sql = "SELECT * FROM mon_hoc WHERE mh_id = '$mh_id'";
 $res = mysqli_query($conn,$sql);
 $count = mysqli_num_rows($res);
    if($count > 0){
        while($row = mysqli_fetch_assoc($res)){
            $mh_ten_mon = $row['mh_ten_mon'];
            $mh_thoi_gian_hoc = $row['mh_thoi_gian_hoc'];
        }
    }else{
        echo "<h1>ID sai roi</h1>";
    }
    
?>
<div class="back_sv">
<form action="" method="POST" class="container">
    <div class="form-group header_addClass">
        <label for="mh_ten_mon">Tên môn học</label>
        <input type="text" value="<?php echo $mh_ten_mon ?>" class="form-control" name="mh_ten_mon" id="mh_ten_mon" placeholder="Tên môn học">
    </div>
    <div class="form-group">
        <label for="mh_thoi_gian_hoc">Thời gian học</label>
        <input type="text" value="<?php echo $mh_thoi_gian_hoc ?>" class="form-control" name="mh_thoi_gian_hoc" id="mh_thoi_gian_hoc" placeholder="Thời gian học">
    </div>
    <!-- <div class="custom-control custom-radio">
        <input type="submit" name="submit" value="update Class" class="btn btn-danger">
    </div>
 
    <div>
        <a href="<?php echo SITEURL ?>admin">Quay lại</a>
</div> -->
    <div class="btn-group">
        <div class="custom-control custom-radio them">
        <input type="submit" name="submit" value="Update Class" class="btn btn-danger">
        </div>
    
        <div>
        <button type="button" class="btn btn-outline-danger them"> <a href="<?php echo SITEURL ?>admin">Quay lại</a></button>
    </div>
<?php 
   
    if(isset($_POST['submit']))
    {   
        $mh_id=$_GET['mh_id'];
        $mh_ten_mon = $_POST['mh_ten_mon'];
        $mh_thoi_gian_hoc = $_POST['mh_thoi_gian_hoc'];
        $sql="UPDATE `mon_hoc` SET `mh_id`='$mh_id',`mh_ten_mon`='$mh_ten_mon',`mh_thoi_gian_hoc`='$mh_thoi_gian_hoc' WHERE mh_id = '$mh_id'";
        $res = mysqli_query($conn, $sql) or die(mysqli_error());
        if($res==TRUE)
        {
            $_SESSION['update'] = "<div class='success'>Update Subject Successfully.</div>";
            header('location:'.SITEURL.'admin/index.php');
        }
        else
        {
            $_SESSION['update'] = "<div class='error'>Update Subject Admin.</div>";
            header('location:'.SITEURL.'admin/index.php');
        }

    }
    
?>
</div>
<?php include('../footer.php')?>

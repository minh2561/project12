<?php include('../class/header.php')?>
<div class="back_sv">
    <form action="" method="POST" class="container header_addClass">
  
<div class="form-group">
    <label for="mh_id">Môn học - ID</label>
    <input type="text" class="form-control" id="mh_id" name="mh_id" placeholder="VD: mh1" required>
  </div>
  <div class="form-group">
    <label for="model">Môn học - Tên môn học</label>
    <input  type="text" class="form-control" id="mh_ten_mon" name="mh_ten_mon" placeholder="VD: Toán" required>
  </div>
  <div class="form-group">
    <label for="model">Môn học - Thời gian học</label>
    <input type="text" class="form-control" id="mh_thoi_gian_hoc" name="mh_thoi_gian_hoc" placeholder="Thời gian học" required>
  </div>
  
  <div class="btn-group">
    <div class="custom-control custom-radio ">
        <input type="submit" name="submit" value="Add Class" class="btn btn-danger them">
    </div>
    <div>
    <button type="button" class="btn btn-outline-danger them"> <a href="<?php echo SITEURL ?>admin">Quay lại</a></button>
    </div>
    </div>
</form>
</div>

<?php 
    if(isset($_POST['submit'])){
        $mh_id = $_POST['mh_id'];
        $mh_ten_mon = $_POST['mh_ten_mon'];
        $mh_thoi_gian_hoc = $_POST['mh_thoi_gian_hoc'];

        $sql="INSERT INTO `mon_hoc`(`mh_id`, `mh_ten_mon`, `mh_thoi_gian_hoc`) 
        VALUES ('$mh_id','$mh_ten_mon','$mh_thoi_gian_hoc')";
        $res = mysqli_query($conn,$sql);
        if($res==TRUE)
        {
            $_SESSION['add'] = "<div class='success'> Added Subject Successfully.</div>";
           header('location:'.SITEURL.'admin/index.php');
        }
        else
        {
            $_SESSION['add'] = "<div class='error'>Failed to Add Subject.</div>";
            header('location:'.SITEURL.'admin/index.php');
        }

    }
    include('../../index/footer.php')
?>
